<?php

namespace Anbis\ChefWorks\Model;

use Anbis\ChefWorks\Model\ResourceModel\Tags as ResourceModel;
use Magento\Framework\Model\AbstractModel;

class Tags extends AbstractModel implements \Anbis\ChefWorks\Api\Data\TagInterface
{
    const TAG = 'tag';

    /**
     * @var string
     */
    protected $_eventPrefix = 'anbis_tags_model';

    /**
     * @inheriDoc
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * @inheritDoc
     */
    public function getTag(): string
    {
        return $this->_getData(self::TAG);
    }

    /**
     * @inheritDoc
     */
    public function setTag(string $value)
    {
        $this->setData(self::TAG, $value);
    }
}
