<?php

namespace Anbis\ChefWorks\Model\ResourceModel\Projects;

use Anbis\ChefWorks\Model\Projects as Model;
use Anbis\ChefWorks\Model\ResourceModel\Projects as ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'anbis_projects_collection';

    /**
     * @inheriDoc
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
