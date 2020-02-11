<?php


namespace Ecommage\Post\Controller\Index;


class Save extends \Magento\Framework\App\Action\Action
{
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
    public function execute()
    {
        $post = $this->getRequest()->getPost();
        //print_r($post);
        $data=array('author_id'=>$post['author_id'],'content'=>$post['content'],'status'=>$post['status']);
        try {
            $rowData = $this->_blogFactory->create();
            $rowData->setData($data);
            $rowData->save();
            $this->messageManager->addSuccess(__('Thêm thành công.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('post/index/post');

    }
}