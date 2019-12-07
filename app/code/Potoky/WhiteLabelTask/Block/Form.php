<?php


namespace Potoky\WhiteLabelTask\Block;

use Magento\Framework\View\Element\Template;

class Form extends Template
{
    public function getFormAction()
    {
        return '/wl_task/ajax/form';
    }
}