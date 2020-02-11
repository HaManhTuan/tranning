<?php
namespace Ecommage\Blog\Block;
class Editfrm extends \Magento\Framework\View\Element\Template
{
    protected $_session;
    protected $_blogFactory;
    public function __construct(\Magento\Framework\View\Element\Template\Context $context,
                                \Magento\Customer\Model\Session $session,
                                \Ecommage\Blog\Model\BlogFactory $blogFactory,
                                array $data = []
                            )
    {

        parent::__construct($context,$data);
        $this->_session = $session;
        $this->_blogFactory = $blogFactory;
    }
    public function getFormActionEdit()
    {
        return $this->getUrl('blog/index/edit', ['_secure' => true]);
    }
    public function getDataBlogId(){
        $id = $this->getRequest()->getParam('blogId');
        $blog = $this->_blogFactory->create();
        return $blog->load($id);
    }
}
