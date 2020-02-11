<?php
namespace Ecommage\Post\Block;
class View extends \Magento\Framework\View\Element\Template
{
    protected $_blogFactory;
    protected $_customers;

    public function __construct(\Magento\Framework\View\Element\Template\Context $context,
                                \Magento\Customer\Model\Session $session,
                                \Ecommage\Post\Model\PostFactory $blogFactory,
                                \Magento\Customer\Model\Customer $customers,
                                array $data = []
                            )
    {

        parent::__construct($context,$data);
        $this->_blogFactory = $blogFactory;
         $this->_customers = $customers;
    }
    public function getDataBlogId(){
        $id = $this->getRequest()->getParam('id');
        $blog = $this->_blogFactory->create();
        return $blog->load($id);
    }
    public function getCustomerName()
    {
        //Get customer by customerID
        $id = $this->getRequest()->getParam('id');
        $blog = $this->_blogFactory->create();
        $getDataBlog = $blog->load($id);
        $author_id = $getDataBlog['author_id'];
        $customer = $this->_customers->getCollection()->addAttributeToFilter('entity_id', array('eq' => $author_id));
        $customerData = $customer->getData();
        return $customerData;
    }
}
