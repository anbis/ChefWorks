<?php

namespace Anbis\ChefWorks\Model\ResourceModel\Tags;

use Anbis\ChefWorks\Model\ResourceModel\Tags as ResourceModel;
use Anbis\ChefWorks\Model\Tags as Model;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'anbis_tags_collection';

    /**
     * @inheriDoc
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
