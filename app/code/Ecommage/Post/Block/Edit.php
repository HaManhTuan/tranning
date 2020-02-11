<?php
namespace Ecommage\Post\Block;
class Edit extends \Magento\Framework\View\Element\Template {
	protected $_session;
	protected $_blogFactory;
	public function __construct(\Magento\Framework\View\Element\Template\Context $context,
		\Magento\Customer\Model\Session $session,
		\Ecommage\Post\Model\PostFactory $blogFactory,
		array $data = []
	) {

		parent::__construct($context, $data);
		$this->_session     = $session;
		$this->_blogFactory = $blogFactory;
	}
	public function getFormActionEdit() {
		return $this->getUrl('post/index/editaction', ['_secure' => true]);
	}
	public function getDataBlogId() {
		$id       = $this->getRequest()->getParam('id');
		$blog     = $this->_blogFactory->create();
		$dataPost = $blog->load($id);
		// $author_id   = $dataPost['author_id'];
		// $customer_id = $this->_session->getId();
		// if ($customer_id != $author_id) {
		// 	return $this->resultRedirectFactory->create()->setPath('customer/account/login/');
		// }
		// if ($customer_id = $author_id) {
		// 	return $dataPost;
		// }
		return $dataPost;
	}
	public function getListUrl() {
		return $this->getUrl('post/index/post', ['_secure' => true]);
	}
}
