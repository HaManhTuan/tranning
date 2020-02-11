<?php
namespace Ecommage\Blog\Model;
use Ecommage\Blog\Api\Data\BlogsInterface;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
class Blog extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'blogs';
    const STATUS_PUBLISH = 1;
    const STATUS_DRAFT = 2;
    const STATUS_NON = 3;
    protected $_cacheTag = 'blogs';
    protected function _construct()
    {
        $this->_init('Ecommage\Blog\Model\ResourceModel\Blog');
    }
    /**
     * @inheritDoc
     */
    public function getIdentities()
    {
        // TODO: Implement getIdentities() method.
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
    public function getDefaultValues()
    {
        $values = [];
        return $values;
    }
    public function getAvailableStatuses()
    {
        return [self::STATUS_PUBLISH => __('Publish'), self::STATUS_DRAFT => __('Draft'),self::STATUS_NON => __('Non-Publish')];
    }

    /**
     * Get Title.
     *
     * @return varchar
     */
    public function getAuthorId()
    {
        return $this->getData(self::AUTHORID);
    }

    /**
     * Set Title.
     */
    public function setAuthorId($authorid)
    {
        return $this->setData(self::AUTHORID, $authorid);
    }
    public function getContent()
    {
        return $this->getData(self::CONTENT);
    }

    /**
     * Set Content.
     */
    public function setContent($content)
    {
        return $this->setData(self::CONTENT, $content);
    }
    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    /**
     * Set IsActive.
     */
    public function setStatus($Status)
    {
        return $this->setData(self::STATUS, $Status);
    }
}