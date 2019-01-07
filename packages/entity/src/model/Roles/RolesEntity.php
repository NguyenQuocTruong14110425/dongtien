<?php namespace Entity\Roles;

use Entity\AbstractEntity;
use Entity\Repository\Roles\RolesRepository;
use Entity\EntityInterface;
use Entity\Validation\Roles\RolesCreateValidator;
use Entity\Validation\Roles\RolesUpdateValidator;

class RolesEntity extends AbstractEntity implements EntityInterface {

    /**
     * @var RolesRepository
     */
    protected $repository;

    /**
     * @var RolesCreateValidator
     */
    protected $createValidator;

    /**
     * @var RolesUpdateValidator
     */
    protected $updateValidator;

    /**
     * @var
     */
    protected $errors;

    /**
     * RolesEntity constructor.
     * @param RolesRepository $repository
     * @param RolesCreateValidator $createValidator
     * @param RolesUpdateValidator $updateValidator
     */
    public function __construct(RolesRepository $repository, RolesCreateValidator $createValidator, RolesUpdateValidator $updateValidator)
    {
        $this->repository = $repository;
        $this->createValidator = $createValidator;
        $this->updateValidator = $updateValidator;
    }

}
