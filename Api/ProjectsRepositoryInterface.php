<?php

namespace Anbis\ChefWorks\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface ProjectsRepositoryInterface
{
    /**
     * @param int $id
     * @return \Anbis\ChefWorks\Api\Data\ProjectInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById(int $id): \Anbis\ChefWorks\Api\Data\ProjectInterface;

    /**
     * @param \Anbis\ChefWorks\Api\Data\ProjectInterface $entity
     * @return \Anbis\ChefWorks\Api\Data\ProjectInterface
     */
    public function save(\Anbis\ChefWorks\Api\Data\ProjectInterface $entity): \Anbis\ChefWorks\Api\Data\ProjectInterface;

    /**
     * @param \Anbis\ChefWorks\Api\Data\ProjectInterface $entity
     * @return bool
     */
    public function delete(\Anbis\ChefWorks\Api\Data\ProjectInterface $entity): bool;

    /**
     * @param int $id
     * @return bool
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function deleteById(int $id): bool;

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Anbis\ChefWorks\Api\Data\ProjectSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}
