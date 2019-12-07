<?php


namespace Potoky\WhiteLabelTask\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Logger\Handler\Base;
use \Magento\Framework\Json\EncoderInterface;

class Data implements ObserverInterface
{
    private $wlOrderLogger;

    private $jsonEncoder;

    public function __construct(
        Base $wlOrderLogger,
        EncoderInterface $jsonEncoder
    )
    {
        $this->wlOrderLogger = $wlOrderLogger;
        $this->jsonEncoder = $jsonEncoder;
    }

    public function execute(Observer $observer)
    {
        $order = $observer->getOrder();
        $data = [];
        $data['order_id'] = $order->getId();
        foreach ($order->getAddresses() as $address)
        {
            if ($address->getAddressType() && $address->getAddressType() == 'shipping') {
                $street =
                $addressString = sprintf('%s, %s, %s, %s, %s.',
                    implode(' ', $address->getStreet()),
                    $address->getCity(),
                    $address->getRegion(),
                    $address->getPostcode(),
                    $address->getCountryId()
                );
                $data['shipping_address'] = str_replace(' ,', '', $addressString);
                break;
            }
        }
        $data['name'] =sprintf('%s %s',
            $order->getCustomerFirstName(),
            $order->getCustomerLastName()
        );
        $data['order_total'] = $order->getGrandTotal();
        $productString = '';
        foreach ($order->getItems() as $item)
        {
            $productString .= sprintf("%s (%s), ",
                $item->getName(),
                $item->getSku()
            );
        }
        $data['products'] = trim($productString, ', ');
        $this->wlOrderLogger->write(['formatted' => $this->jsonEncoder->encode($data) . PHP_EOL . PHP_EOL]);
    }
}