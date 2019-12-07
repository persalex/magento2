<?php


namespace Potoky\WhiteLabelTask\Block\Adminhtml;


use Magento\Backend\Block\Widget\Grid\Container;

class Grid extends Container
{
    protected function _construct()
    {
        $this->_controller = 'adminhtml_info';
        $this->_blockGroup = 'Potoky_WhiteLabelTask';
        $this->_headerText = __('WL Task');
        $this->_addButtonLabel = __('Create New Info');
        parent::_construct();
        $this->removeButton('add');
    }
}