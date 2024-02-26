<?php

namespace Anbis\ChefWorks\Model;

use Anbis\ChefWorks\Api\Data\ProjectInterface;
use Anbis\ChefWorks\Api\Data\ProjectSearchResultInterface;
use Anbis\ChefWorks\Api\Data\ProjectSearchResultInterfaceFactory;
use Anbis\ChefWorks\Api\ProjectsRepositoryInterface;
use Anbis\ChefWorks\Model\ResourceModel\Projects\Collection;
use Anbis\ChefWorks\Model\ResourceModel\Projects\CollectionFactory;
use Exception;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\CouldNotDeleteException;

class ProjectsRepository implements ProjectsRepositoryInterface
{
    /**
     * @param ProjectsFactory $modelFactory
     * @param ResourceModel\Projects $resource
     * @param ResourceModel\Projects\CollectionFactory $collectionFactory
     * @param CollectionProcessorInterface $collectionProcessor
     * @param ProjectSearchResultInterfaceFactory $searchResultFactory
     */
    public function __construct(
        private readonly ProjectsFactory                               $modelFactory,
        private readonly \Anbis\ChefWorks\Model\ResourceModel\Projects $resource,
        private readonly CollectionFactory                             $collectionFactory,
        private readonly CollectionProcessorInterface                  $collectionProcessor,
        private readonly ProjectSearchResultInterfaceFactory           $searchResultFactory
    ) {
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id): ProjectInterface
    {
        $model = $this->modelFactory->create();
        $this->resource->load($model, $id);
        if (!$model->getId()) {
            throw new NoSuchEntityException(__('Entity with id "%1" does not exist.', $id));
        }
        return $model;
    }

    /**
     * @inheritDoc
     * @throws CouldNotSaveException
     */
    public function save(ProjectInterface $entity): ProjectInterface
    {
        try {
            $this->resource->save($entity);
            $model = $this->getById($entity->getId());
        } catch (Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $model;
    }

    /**
     * @inheritDoc
     * @throws CouldNotDeleteException
     */
    public function delete(ProjectInterface $entity): bool
    {
        try {
            $this->resource->delete($entity);
        } catch (Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    /**
     * @inheritDoc
     * @throws CouldNotDeleteException
     */
    public function deleteById(int $id): bool
    {
        $model = $this->getById($id);
        return $this->delete($model);
    }

    /**
     * @inheritDoc
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        /** @var Collection $collection */
        $collection = $this->collectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        /** @var ProjectSearchResultInterface $searchResults */
        $searchResults = $this->searchResultFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }
}
