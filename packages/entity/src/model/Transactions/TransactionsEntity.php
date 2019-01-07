<?php namespace Entity\Transactions;

use Entity\AbstractEntity;
use Entity\Repository\Transactions\TransactionsRepository;
use Entity\EntityInterface;
use Entity\Validation\Transactions\TransactionsCreateValidator;
use Entity\Validation\Transactions\TransactionsUpdateValidator;

class TransactionsEntity extends AbstractEntity implements EntityInterface {

    /**
     * @var TransactionsRepository
     */
    protected $repository;

    /**
     * @var TransactionsCreateValidator
     */
    protected $createValidator;

    /**
     * @var TransactionsUpdateValidator
     */
    protected $updateValidator;

    /**
     * @var
     */
    protected $errors;

    /**
     * TransactionsEntity constructor.
     * @param TransactionsRepository $repository
     * @param TransactionsCreateValidator $createValidator
     * @param TransactionsUpdateValidator $updateValidator
     */
    public function __construct(TransactionsRepository $repository, TransactionsCreateValidator $createValidator, TransactionsUpdateValidator $updateValidator)
    {
        $this->repository = $repository;
        $this->createValidator = $createValidator;
        $this->updateValidator = $updateValidator;
    }

}
