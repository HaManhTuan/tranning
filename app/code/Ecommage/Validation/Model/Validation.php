<?php


namespace Ecommage\Validation\Model;

use Ecommage\Validation\Api\Data\GridInterface;

class Validation extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init('Ecommage\Validation\Model\ResourceModel\Validation');
    }
}