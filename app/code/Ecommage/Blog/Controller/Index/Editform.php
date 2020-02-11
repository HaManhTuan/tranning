<?php


namespace Ecommage\Blog\Controller\Index;


use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Editform extends Action
{
    protected $_pageFactory;
    protected $_session;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        Session $session
    )
    {
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