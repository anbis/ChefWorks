<?php

namespace Anbis\ChefWorks\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface ProjectSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \Anbis\ChefWorks\Api\Data\ProjectInterface[]
     */
    public function getItems();

    /**
     * @param \Anbis\ChefWorks\Api\Data\ProjectInterface[] $items
     * @return void
     */
    public function setItems(array $items);
}
