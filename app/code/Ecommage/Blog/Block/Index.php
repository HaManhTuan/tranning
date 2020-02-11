<?php


namespace Ecommage\Blog\Block;


class Index extends \Magento\Framework\View\Element\Template
{
    protected $_blogFactory;
    public function __construct(\Magento\Framework\View\Element\Template\Context $context,
                                \Magento\Customer\Model\Session $session,
                                \Ecommage\Blog\Model\BlogFactory $blogFactory,
                                array $data = []
    )
    {

        parent::__construct($context,$data);
        $this->_session = $session;
        $this->_blogFactory = $blogFactory;
    }
    public function getBlogCollection(){
        $blog = $this->_blogFactory->create();
        return $blog->getCollection()->addFieldToFilter('status',1);
    }
    public function getViewtUrl(){
        return $this->getUrl('blog/index/view/', ['_secure' => true]);
    }
}