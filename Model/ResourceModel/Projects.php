<?php

namespace Anbis\ChefWorks\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Projects extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'anbis_projects_resource_model';

    /**
     * @inheriDoc
     */
    protected function _construct()
    {
        $this->_init('anbis_projects', 'entity_id');
        $this->_useIsObjectNew = true;
    }

    /**
     * @inheritDoc
     */
    protected function _beforeSave(\Magento\Framework\Model\AbstractModel $object)
    {
        $object->setData('tags', implode(',', $object->getData('tags')));
        return parent::_beforeSave($object);
    }

    /**
     * @inheritDoc
     */
    protected function _afterLoad(\Magento\Framework\Model\AbstractModel $object)
    {
        $object->setData('tags', explode(',', $object->getData('tags')));
        return parent::_afterLoad($object);
    }
}
