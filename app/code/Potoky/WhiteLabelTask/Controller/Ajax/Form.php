<?php


namespace Potoky\WhiteLabelTask\Controller\Ajax;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Potoky\WhiteLabelTask\Model\InfoFactory;
use Magento\Framework\Message\ManagerInterface;

class Form extends Action
{
    private $infoFactory;

    protected $messageManager;

    public function __construct(Context $context, InfoFactory $infoFactory, ManagerInterface $messageManager)
    {
        $this->infoFactory = $infoFactory;
        $this->messageManager = $messageManager;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getParams();
        if (!$data['email'] || !$data['first_name'] || !$data['last_name']){
            $this->messageManager->addError(__('Your data has not been saved! Please fill in all the required fields.'));
            return;
        }
        $info = $this->infoFactory->create();
        $info->load($data['email'], 'email');
        $info->setData($data);
        $info->setId($info->getOrigData('info_id'));
        $info->save();
        $this->messageManager->addSuccess(__('Your data has been successfully saved.'));
    }
}