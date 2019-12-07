<?php


namespace Potoky\WhiteLabelTask\Block;

use Magento\Framework\View\Element\Template;

class Random extends Template
{
    public function _prepareLayout()
    {
        $parent = parent::_prepareLayout();
        $this->setMessage($this->_scopeConfig->getValue(
            'catalog/random_group/random_field',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE) . PHP_EOL
        );

        return $parent;
    }

    public function getTaskPageUrl()
    {
        return $this->getUrl('wl-task/');
    }
}