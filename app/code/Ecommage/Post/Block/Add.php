<?php


namespace Ecommage\Post\Block;


class Add extends \Magento\Framework\View\Element\Template
{
    protected $_session;
    protected $_blogFactory;
    public function __construct(\Magento\Framework\View\Element\Template\Context $context,
                                \Magento\Customer\Model\Session $session,
                                \Ecommage\Post\Model\PostFactory $blogFactory,
                                array $data = []
    )
    {

        parent::__construct($context,$data);
        $this->_session = $session;
        $this->_blogFactory = $blogFactory;

    }
    public function getLoggedinCustomerId() {

        if ($this->_session->isLoggedIn() == true) {
            return $this->_session->getId();
        }
        return false;
    }
    public function getFormAction()
    {
        return $this->getUrl('post/index/save', ['_secure' => true]);
    }
    public function getListUrl()
    {
        return $this->getUrl('post/index/post', ['_secure' => true]);
    }
}