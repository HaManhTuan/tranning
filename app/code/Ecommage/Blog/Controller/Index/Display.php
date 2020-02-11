<?php
namespace Ecommage\Blog\Controller\Index;

class Display extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $_session;
    protected $_url;
    protected $_blogFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Customer\Model\Session $session,
        \Magento\Framework\UrlInterface $url,
        \Ecommage\Blog\Model\BlogFactory $blogFactory
    )
    {
        $this->_blogFactory = $blogFactory;
        $this->_url = $url;
        $this->_pageFactory = $pageFactory;
        $this->_session = $session;
        return parent::__construct($context);
    }
    public function execute()
    {
       if ($this->_session->isLoggedIn() == true) {
           return $this->_pageFactory->create();
      } else {
           return $this->resultRedirectFactory->create()->setPath('customer/account/login/');
      }
    }
}

