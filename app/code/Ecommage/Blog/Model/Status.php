<?php


namespace Ecommage\Blog\Model;

use Magento\Framework\Data\OptionSourceInterface;

class Status implements OptionSourceInterface
{

    const PUBLISH_STATUS = 1;

    /**
     * Get Grid row status type labels array.
     * @return array
     */
    public function getOptionArray()
    {
        $options = [self::PUBLISH_STATUS => __('publish'),'2' => __('draft'),'3' => __('non-publish')];
        return $options;
    }
    /**
     * Get Grid row status labels array with empty value for option element.
     *
     * @return array
     */
    public function getAllOptions()
    {
        $res = $this->getOptions();
        array_unshift($res, ['value' => '', 'label' => '']);
        return $res;
    }

    /**
     * Get Grid row type array for option element.
     * @return array
     */
    public function getOptions()
    {
        $res = [];
        foreach ($this->getOptionArray() as $index => $value) {
            $res[] = ['value' => $index, 'label' => $value];
        }
        return $res;
    }

    /**
     * {@inheritdoc}
     */
    public function toOptionArray()
    {
        return $this->getOptions();
    }
}