<?php

namespace Anbis\ChefWorks\Model;

use Anbis\ChefWorks\Api\Data\TagInterface;
use Anbis\ChefWorks\Api\Data\TagSearchResultInterface;
use Anbis\ChefWorks\Api\Data\TagSearchResultInterfaceFactory;
use Anbis\ChefWorks\Api\TagsRepositoryInterface;
use Anbis\ChefWorks\Model\ResourceModel\Tags\Collection;
use Anbis\ChefWorks\Model\ResourceModel\Tags\CollectionFactory;
use Exception;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\CouldNotDeleteException;

class TagsRepository implements TagsRepositoryInterface
{
    /**
     * @param TagsFactory $modelFactory
     * @param ResourceModel\Tags $resource
     * @param ResourceModel\Tags\CollectionFactory $collectionFactory
     * @param CollectionProcessorInterface $collectionProcessor
     * @param TagSearchResultInterfaceFactory $searchResultFactory
     */
    public function __construct(
        private readonly TagsFactory                               $modelFactory,
        private readonly \Anbis\ChefWorks\Model\ResourceModel\Tags $resource,
        private readonly CollectionFactory                         $collectionFactory,
        private readonly CollectionProcessorInterface              $collectionProcessor,
        private readonly TagSearchResultInterfaceFactory           $searchResultFactory
    ) {
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id): TagInterface
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
    public function save(TagInterface $entity): TagInterface
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
    public function delete(TagInterface $entity): bool
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

        /** @var TagSearchResultInterface $searchResults */
        $searchResults = $this->searchResultFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }
}
