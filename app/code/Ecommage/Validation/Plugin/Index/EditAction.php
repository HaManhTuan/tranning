<?php

namespace Ecommage\Validation\Plugin\Index;

class EditAction {
	protected $resultFactory;
	protected $url;
	protected $_badwordFactory;
	protected $_pageFactory;
	public function __construct(
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Ecommage\Validation\Model\ValidationFactory $badwordFactory,
		\Magento\Framework\App\Response\RedirectInterface $redirect,
		\Magento\Framework\UrlInterface $url,
		\Magento\Framework\Controller\ResultFactory $resultFactory,
		\Magento\Framework\Message\ManagerInterface $messageManager
	) {
		$this->_badwordFactory = $badwordFactory;
		$this->url             = $url;
		$this->_pageFactory    = $pageFactory;
		$this->redirect        = $redirect;
		$this->resultFactory   = $resultFactory;
		$this->_messageManager = $messageManager;
	}
	public function aroundExecute($subject, $proceed) {
		$post       = $subject->getRequest()->getPost();
		$content    = $post['content'];
		$resultPage = $this->_badwordFactory->create();
		$collection = $resultPage->getCollection()->addFieldToSelect('bad_word')->getColumnValues('bad_word');
		foreach ($collection as $collections) {
			if (stripos($content, $collections) !== false) {
				$response = $this->resultFactory
				                 ->create(\Magento\Framework\Controller\ResultFactory::TYPE_JSON)
				                 ->setData([
						'status'  => "error",
						'message' => "Từ ".$collections." là từ bị cấm"
					]);
				return $response;
			}
		}
		$resultProceed = $proceed();
		return $resultProceed;
	}
}