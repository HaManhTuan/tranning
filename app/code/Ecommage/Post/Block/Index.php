<?php


namespace Ecommage\Post\Block;


class Index extends \Magento\Framework\View\Element\Template
{
    protected $_postFactory;
    public function __construct(\Magento\Framework\View\Element\Template\Context $context,
                                \Magento\Customer\Model\Session $session,
                                \Ecommage\Post\Model\PostFactory $blogFactory,
                                array $data = []
    )
    {

        parent::__construct($context,$data);
        $this->_session = $session;
        $this->_postFactory = $blogFactory;
    }
    public function getBlogCollection(){
        $blog = $this->_postFactory->create();
        return $blog->getCollection()->addFieldToFilter('status',1);
    }
    public function getViewtUrl(){
        return $this->getUrl('post/index/view/', ['_secure' => true]);
    }
}