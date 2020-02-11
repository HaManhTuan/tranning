<?php


namespace Ecommage\Post\Model;

use Magento\Framework\Data\OptionSourceInterface;

class Status implements OptionSourceInterface
{

    const PUBLISH_STATUS = 1;
    const DRAFT_STATUS = 2;
    const NONE_PUBLISH_STATUS = 3;

    /**
     * Get Grid row status type labels array.
     * @return array
     */
    public function getOptionArray()
    {
        $options = [self::PUBLISH_STATUS => __('publish'),self::DRAFT_STATUS => __('draft'),self::NONE_PUBLISH_STATUS => __('non-publish')];
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