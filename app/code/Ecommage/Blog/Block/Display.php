<?php
namespace Ecommage\Blog\Block;
class Display extends \Magento\Framework\View\Element\Template
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
    public function getLoggedinCustomerId() {

        if ($this->_session->isLoggedIn() == true) {
            return $this->_session->getId();
        }
        return false;
    }

    public function getFormAction()
    {
        return $this->getUrl('blog/index/save', ['_secure' => true]);
    }
    public function getFormEditUrl(){
        return $this->getUrl('blog/index/Editform/', ['_secure' => true]);
    }

    public function getBlogCollection(){
        $blog = $this->_blogFactory->create();
        return $blog->getCollection()->addFieldToFilter('author_id',$this->_session->getId());
    }


}
