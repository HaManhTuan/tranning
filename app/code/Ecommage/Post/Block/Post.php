<?php


namespace Ecommage\Post\Block;


class Post extends \Magento\Framework\View\Element\Template
{
    protected $_session;
    protected $_blogFactory;
    protected $_customers;
    public function __construct(\Magento\Framework\View\Element\Template\Context $context,
                                \Magento\Customer\Model\Session $session,
                                \Magento\Customer\Model\Customer $customers,
                                \Ecommage\Post\Model\PostFactory $blogFactory,
                                array $data = []
    )
    {

        parent::__construct($context,$data);
        $this->_session = $session;
        $this->_blogFactory = $blogFactory;
        $this->_customers = $customers;

    }
    public function getLoggedinCustomerId() {

        if ($this->_session->isLoggedIn() == true) {
            return $this->_session->getId();
        }
        return false;
    }
    public function getFormEditUrl(){
        return $this->getUrl('post/index/edit/', ['_secure' => true]);
    }
    public function getFormAddUrl(){
        return $this->getUrl('post/index/add/', ['_secure' => true]);
    }
    public function getBlogCollection(){
        $blog = $this->_blogFactory->create();
        return $blog->getCollection()->addFieldToFilter('author_id',$this->_session->getId());
    }
    public function getCustomerName()
    {
        //$id = $this->getRequest()->getParam('id');
        if ($this->_session->isLoggedIn() == true) {
            $id = $this->_session->getId();
            $blog = $this->_blogFactory->create();
            $getDataBlog = $blog->load($id);
            $author_id = $getDataBlog['author_id'];
            $customer = $this->_customers->getCollection()->addAttributeToFilter('entity_id', array('eq' => $author_id));
            $customerData = $customer->getData();
            return $customerData;
        }

    }


}