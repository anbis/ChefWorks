<?php

namespace Anbis\ChefWorks\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface TagInterface extends ExtensibleDataInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     * @return void
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getTag();

    /**
     * @param string $value
     * @return void
     */
    public function setTag(string $value);
}
