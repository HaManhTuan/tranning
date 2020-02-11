<?php


namespace Ecommage\Blog\Controller\Index;

class Save extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $_blogFactory;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Ecommage\Blog\Model\BlogFactory $blogFactory
    ) {
        $this->_blogFactory = $blogFactory;
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }
    public function execute()
    {
//        $table = "blogs";
//        $data = $this->getRequest()->getPost();
//        $author_id = $data['author_id'];
//        $content = $data['content'];
//        $status = $data['status'];
//        $this->_resources = \Magento\Framework\App\ObjectManager::getInstance()
//            ->get('Magento\Framework\App\ResourceConnection');
//        $connection= $this->_resources->getConnection();
//        $sql = "INSERT INTO blogs(author_id,content, status) VALUES ('".$author_id."','".$content."', '".$status."')";
//
//      if($connection->query($sql))
//       {
//            return $this->resultRedirectFactory->create()->setPath('blog/index/display');
//        }
        $post = $this->getRequest()->getPost();
        $data=array('author_id'=>$post['author_id'],'content'=>$post['content'],'status'=>$post['status']);
        try {
            $rowData = $this->_blogFactory->create();
            $rowData->setData($data);
            $rowData->save();
            $this->messageManager->addSuccess(__('Thêm thành công.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('blog/index/display');


    }
}