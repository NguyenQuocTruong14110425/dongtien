<?php namespace Entity\Product;

use Entity\AbstractEntity;
use Entity\Repository\Product\ProductRepository;
use Entity\EntityInterface;
use Entity\Validation\Product\ProductCreateValidator;
use Entity\Validation\Product\ProductUpdateValidator;

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
     * ProductEntity constructor.
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
