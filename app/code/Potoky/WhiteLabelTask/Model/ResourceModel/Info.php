<?php


namespace Potoky\WhiteLabelTask\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Info extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('potoky_whitelabeltask_info','info_id');
    }
}