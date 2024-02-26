<?php

namespace Anbis\ChefWorks\Model;

use Anbis\ChefWorks\Model\ResourceModel\Projects as ResourceModel;
use Magento\Framework\Model\AbstractModel;

class Projects extends AbstractModel implements \Anbis\ChefWorks\Api\Data\ProjectInterface
{
    const TITLE = 'title';
    const DESCRIPTION = 'description';
    const TAGS = 'tags';

    /**
     * @var string
     */
    protected $_eventPrefix = 'anbis_projects_model';

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
    public function getTitle(): string
    {
        return $this->_getData(self::TITLE);
    }

    /**
     * @inheritDoc
     */
    public function setTitle(string $value)
    {
        $this->setData(self::TITLE, $value);
    }

    /**
     * @inheritDoc
     */
    public function getDescription(): string
    {
        return $this->_getData(self::DESCRIPTION);
    }

    /**
     * @inheritDoc
     */
    public function setDescription(string $value)
    {
        $this->setData(self::DESCRIPTION, $value);
    }

    /**
     * @inheritDoc
     */
    public function getTags(): array
    {
        return $this->_getData(self::TAGS);
    }

    /**
     * @inheritDoc
     */
    public function setTags(array $value)
    {
        $this->setData(self::TAGS, $value);
    }
}
