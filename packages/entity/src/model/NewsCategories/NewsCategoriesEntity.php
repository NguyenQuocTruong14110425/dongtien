<?php namespace Entity\NewsCategories;

use Entity\AbstractEntity;
use Entity\Repository\NewsCategories\NewsCategoriesRepository;
use Entity\EntityInterface;
use Entity\Validation\NewsCategories\NewsCategoriesCreateValidator;
use Entity\Validation\NewsCategories\NewsCategoriesUpdateValidator;

class NewsCategoriesEntity extends AbstractEntity implements EntityInterface {

    /**
     * @var NewsRepository
     */
    protected $repository;

    /**
     * @var NewsCreateValidator
     */
    protected $createValidator;

    /**
     * @var NewsUpdateValidator
     */
    protected $updateValidator;

    /**
     * @var
     */
    protected $errors;

    /**
     * NewsCategoriesEntity constructor.
     * @param NewsCategoriesRepository $repository
     * @param NewsCategoriesCreateValidator $createValidator
     * @param NewsCategoriesUpdateValidator $updateValidator
     */
    public function __construct(NewsCategoriesRepository $repository, NewsCategoriesCreateValidator $createValidator, NewsCategoriesUpdateValidator $updateValidator)
    {
        $this->repository = $repository;
        $this->createValidator = $createValidator;
        $this->updateValidator = $updateValidator;
    }

}
