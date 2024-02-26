<?php

namespace Anbis\ChefWorks\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface TagSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \Anbis\ChefWorks\Api\Data\TagInterface[]
     */
    public function getItems();

    /**
     * @param \Anbis\ChefWorks\Api\Data\TagInterface[] $items
     * @return void
     */
    public function setItems(array $items);
}
