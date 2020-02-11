<?php

namespace Ecommage\Post\Controller\Index;

use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Edit extends Action {
	protected $_pageFactory;
	protected $_session;
	protected $_blogFactory;

	public function __construct(
		Context $context,
		PageFactory $pageFactory,
		Session $session,
		\Ecommage\Post\Model\PostFactory $blogFactory
	) {
		$this->_pageFactory = $pageFactory;
		$this->_session     = $session;
		$this->_blogFactory = $blogFactory;
		return parent::__construct($context);
	}
	public function execute() {
		if ($this->_session->isLoggedIn() == true) {
			$id          = $this->getRequest()->getParam('id');
			$blog        = $this->_blogFactory->create();
			$dataPost    = $blog->load($id);
			$author_id   = $dataPost['author_id'];
			$customer_id = $this->_session->getId();

			if ($customer_id != $author_id) {
				return $this->resultRedirectFactory->create()->setPath('customer/account/login/');
			}
			if ($customer_id = $author_id) {
				return $this->_pageFactory->create();
			}
		} else {
			return $this->resultRedirectFactory->create()->setPath('customer/account/login/');
		}
	}
}
