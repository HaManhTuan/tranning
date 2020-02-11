<?php


namespace Ecommage\Validation\Controller\Adminhtml\Validation;


class Save extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $_blogFactory;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Ecommage\Validation\Model\ValidationFactory $blogFactory
    ) {
        $this->_blogFactory = $blogFactory;
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            $this->_redirect('validation/validation/addrow');
            return;
        }
        try {
            $rowData = $this->_blogFactory->create();
            $rowData->setData($data);
            if (isset($data['id'])) {
                $rowData->setId($data['id']);
                $rowData->save();
                $this->messageManager->addSuccess(__('Cập nhật thành công.'));
            }
            else{
                $rowData->save();
                $this->messageManager->addSuccess(__('Thêm thành công.'));
            }
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('validation/validation/index');
    }
}