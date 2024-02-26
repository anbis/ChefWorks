<?php

namespace Anbis\ChefWorks\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface ProjectInterface extends ExtensibleDataInterface
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
    public function getTitle(): string;

    /**
     * @param string $value
     * @return void
     */
    public function setTitle(string $value);

    /**
     * @return string
     */
    public function getDescription(): string;

    /**
     * @param string $value
     * @return void
     */
    public function setDescription(string $value);

    /**
     * @return int[]
     */
    public function getTags(): array;

    /**
     * @param int[] $value
     * @return void
     */
    public function setTags(array $value);
}
