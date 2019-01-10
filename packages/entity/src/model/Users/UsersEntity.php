<?php namespace Entity\Users;

use Entity\AbstractEntity;
use Entity\Repository\Users\UsersRepository;
use Entity\EntityInterface;
use Entity\Validation\Users\UsersCreateValidator;
use Entity\Validation\Users\UsersUpdateValidator;

class UsersEntity extends AbstractEntity implements EntityInterface {

    /**
     * @var UsersRepository
     */
    protected $repository;

    /**
     * @var UsersCreateValidator
     */
    protected $createValidator;

    /**
     * @var UsersUpdateValidator
     */
    protected $updateValidator;

    /**
     * @var
     */
    protected $errors;

    /**
     * UsersEntity constructor.
     * @param UsersRepository $repository
     * @param UsersCreateValidator $createValidator
     * @param UsersUpdateValidator $updateValidator
     */
    public function __construct(UsersRepository $repository, UsersCreateValidator $createValidator, UsersUpdateValidator $updateValidator)
    {
        $this->repository = $repository;
        $this->createValidator = $createValidator;
        $this->updateValidator = $updateValidator;
    }

}
