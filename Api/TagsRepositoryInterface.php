<?php

namespace Anbis\ChefWorks\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface TagsRepositoryInterface
{
    /**
     * @param int $id
     * @return \Anbis\ChefWorks\Api\Data\TagInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById(int $id): \Anbis\ChefWorks\Api\Data\TagInterface;

    /**
     * @param \Anbis\ChefWorks\Api\Data\TagInterface $entity
     * @return \Anbis\ChefWorks\Api\Data\TagInterface
     */
    public function save(\Anbis\ChefWorks\Api\Data\TagInterface $entity): \Anbis\ChefWorks\Api\Data\TagInterface;

    /**
     * @param \Anbis\ChefWorks\Api\Data\TagInterface $entity
     * @return bool
     */
    public function delete(\Anbis\ChefWorks\Api\Data\TagInterface $entity): bool;

    /**
     * @param int $id
     * @return bool
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function deleteById(int $id): bool;

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Anbis\ChefWorks\Api\Data\TagSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}
