<?php

namespace Anbis\ChefWorks\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Tags extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'anbis_tags_resource_model';

    /**
     * @inheriDoc
     */
    protected function _construct()
    {
        $this->_init('anbis_tags', 'entity_id');
        $this->_useIsObjectNew = true;
    }
}
