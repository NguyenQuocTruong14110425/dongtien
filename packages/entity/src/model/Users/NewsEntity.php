<?php namespace Entity\News;

use Entity\AbstractEntity;
use Entity\Repository\News\NewsRepository;
use Entity\EntityInterface;
use Entity\Validation\News\NewsCreateValidator;
use Entity\Validation\News\NewsUpdateValidator;

class NewsEntity extends AbstractEntity implements EntityInterface {

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
     * NewsEntity constructor.
     * @param NewsRepository $repository
     * @param NewsCreateValidator $createValidator
     * @param NewsUpdateValidator $updateValidator
     */
    public function __construct(NewsRepository $repository, NewsCreateValidator $createValidator, NewsUpdateValidator $updateValidator)
    {
        $this->repository = $repository;
        $this->createValidator = $createValidator;
        $this->updateValidator = $updateValidator;
    }

}
