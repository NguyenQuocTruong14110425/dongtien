<?php namespace Entity\Resources;

use Entity\AbstractEntity;
use Entity\Repository\Resources\ResourcesRepository;
use Entity\EntityInterface;
use Entity\Validation\Resources\ResourcesCreateValidator;
use Entity\Validation\Resources\ResourcesUpdateValidator;

class ResourcesEntity extends AbstractEntity implements EntityInterface {

    /**
     * @var ResourcesRepository
     */
    protected $repository;

    /**
     * @var ResourcesCreateValidator
     */
    protected $createValidator;

    /**
     * @var ResourcesUpdateValidator
     */
    protected $updateValidator;

    /**
     * @var
     */
    protected $errors;

    /**
     * ResourcesEntity constructor.
     * @param ResourcesRepository $repository
     * @param ResourcesCreateValidator $createValidator
     * @param ResourcesUpdateValidator $updateValidator
     */
    public function __construct(ResourcesRepository $repository, ResourcesCreateValidator $createValidator, ResourcesUpdateValidator $updateValidator)
    {
        $this->repository = $repository;
        $this->createValidator = $createValidator;
        $this->updateValidator = $updateValidator;
    }

}
