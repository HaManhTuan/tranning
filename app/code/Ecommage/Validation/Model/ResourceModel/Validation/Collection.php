<?php
namespace Ecommage\Validation\Model\ResourceModel\Validation;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Ecommage\Validation\Model\Validation',
            'Ecommage\Validation\Model\ResourceModel\Validation');
    }
}

