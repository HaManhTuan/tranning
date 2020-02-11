<?php

namespace Ecommage\HelloWorld\Observer;
use \Magento\Framework\Event\Observer;
use \Magento\Framework\Event\ObserverInterface;
class RedirectHelloWorld implements \Magento\Framework\Event\ObserverInterface
{
    protected $_responseFactory;
    protected $_url;
    /**
     * @var \Magento\Framework\App\ResponseInterface
     */
    protected $_response;
    /**
     * @param UrlInterface $url
     * @param ResponseFactory $responseFactory
     */
    public function __construct(
        \Magento\Framework\App\ResponseFactory $responseFactory,
        \Magento\Framework\UrlInterface $url,
        \Magento\Framework\App\ResponseInterface $response
    ) {
        $this->_url = $url;
        $this->_response = $response;
    }
    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        $customerBeforeAuthUrl = $this->_url->getUrl('helloworld/index/index');
        $this->_response->setRedirect($customerBeforeAuthUrl)->sendResponse();
        exit(0);
    }
}