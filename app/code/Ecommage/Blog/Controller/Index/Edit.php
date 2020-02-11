<?php


namespace Ecommage\Blog\Controller\Index;

class Edit extends \Magento\Framework\App\Action\Action
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
        $post = $this->getRequest()->getPost();
        $data=array('author_id'=>$post['author_id'],'content'=>$post['content'],'status'=>$post['status']);
        try {
            $rowData = $this->_blogFactory->create();
            $rowData->setData($data);
            if (isset($post['blog_id'])) {
                $rowData->setId($post['blog_id']);
            }
            $rowData->save();
            $this->messageManager->addSuccess(__('Update thành công.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('blog/index/display');
//        $table = "blogs";
//        $data = $this->getRequest()->getPost();
//        $author_id = $data['author_id'];
//        $content = $data['content'];
//        $status = $data['status'];
//        $blogid= $data['blog_id'];
//        $this->_resources = \Magento\Framework\App\ObjectManager::getInstance()
//            ->get('Magento\Framework\App\ResourceConnection');
//        $connection= $this->_resources->getConnection();
//        $sql = "UPDATE  blogs SET author_id='".$author_id."',content='".$content."', status='".$status."' WHERE  id='".$blogid."'";
//
//      if($connection->query($sql))
//       {
//            return $this->resultRedirectFactory->create()->setPath('blog/index/display');
//        }


    }
}