<?php


namespace Potoky\WhiteLabelTask\Model\ResourceModel\Info;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Potoky\WhiteLabelTask\Model\Info','Potoky\WhiteLabelTask\Model\ResourceModel\Info');
    }
}