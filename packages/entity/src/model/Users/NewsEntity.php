<?php namespace Entity\News;

use Entity\AbstractEntity;
use Entity\Repository\News\ProductRepository;
use Entity\EntityInterface;
use Entity\Validation\News\ProductCreateValidator;
use Entity\Validation\News\ProductUpdateValidator;

class NewsEntity extends AbstractEntity implements EntityInterface {

    /**
     * @var ProductRepository
     */
    protected $repository;

    /**
     * @var ProductCreateValidator
     */
    protected $createValidator;

    /**
     * @var ProductUpdateValidator
     */
    protected $updateValidator;

    /**
     * @var
     */
    protected $errors;

    /**
     * NewsEntity constructor.
     * @param ProductRepository $repository
     * @param ProductCreateValidator $createValidator
     * @param ProductUpdateValidator $updateValidator
     */
    public function __construct(ProductRepository $repository, ProductCreateValidator $createValidator, ProductUpdateValidator $updateValidator)
    {
        $this->repository = $repository;
        $this->createValidator = $createValidator;
        $this->updateValidator = $updateValidator;
    }

}
