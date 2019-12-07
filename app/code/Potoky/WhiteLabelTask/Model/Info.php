<?php


namespace Potoky\WhiteLabelTask\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;

class Info extends AbstractModel implements IdentityInterface
{
    const CACHE_TAG = 'potoky_whitelabeltask_info';

    protected function _construct()
    {
        $this->_init('Potoky\WhiteLabelTask\Model\ResourceModel\Info');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}