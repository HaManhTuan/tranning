<?php


namespace Ecommage\Validation\Observer;
use \Magento\Framework\Event\Observer;
use \Magento\Framework\Event\ObserverInterface;

class AutoPost implements \Magento\Framework\Event\ObserverInterface
{
    protected $_customerRepositoryInterface;
    protected $_blogFactory;
    public function __construct(
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepositoryInterface,
        \Ecommage\Post\Model\PostFactory $blogFactory
    ) {
        $this->_customerRepositoryInterface = $customerRepositoryInterface;
        $this->_blogFactory = $blogFactory;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $customer = $observer->getEvent()->getCustomer();
        $data=array('author_id'=>$customer->getID(),'content'=>'Hello '.$customer->getEmail(),'status'=>'1');
        $rowData = $this->_blogFactory->create();
        $rowData->setData($data);
        $rowData->save();
    }
}
