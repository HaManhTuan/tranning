<?php

namespace Ecommage\Post\Controller\Index;

class EditAction extends \Magento\Framework\App\Action\Action {

	protected $_pageFactory;
	protected $_blogFactory;
	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Ecommage\Post\Model\PostFactory $blogFactory
	) {
		$this->_blogFactory = $blogFactory;
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}
	public function execute() {
		$post = $this->getRequest()->getPost();
		//print_r($post);
		$data    = array('author_id' => $post['author_id'], 'content' => $post['content'], 'status' => $post['status']);
		$rowData = $this->_blogFactory->create();
		$rowData->setData($data);
		if (isset($post['blog_id'])) {
			$rowData->setId($post['blog_id']);
		}
		if ($rowData->save()) {
			$response = $this->resultFactory
			                 ->create(\Magento\Framework\Controller\ResultFactory::TYPE_JSON)
			                 ->setData([
					'status'  => "success",
					'message' => "Update thành công"
				]);
			return $response;
		} else {
			$response = $this->resultFactory
			                 ->create(\Magento\Framework\Controller\ResultFactory::TYPE_JSON)
			                 ->setData([
					'status'  => "error",
					'message' => "Lỗi"
				]);
			return $response;
		}

	}
}