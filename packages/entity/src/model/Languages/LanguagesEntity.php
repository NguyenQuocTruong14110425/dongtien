<?php namespace Entity\Languages;

use Entity\AbstractEntity;
use Entity\Repository\Languages\LanguagesRepository;
use Entity\EntityInterface;
use Entity\Validation\Languages\LanguagesCreateValidator;
use Entity\Validation\Languages\LanguagesUpdateValidator;

class LanguagesEntity extends AbstractEntity implements EntityInterface {

    /**
     * @var LanguagesRepository
     */
    protected $repository;

    /**
     * @var LanguagesCreateValidator
     */
    protected $createValidator;

    /**
     * @var LanguagesUpdateValidator
     */
    protected $updateValidator;

    /**
     * @var
     */
    protected $errors;

    /**
     * LanguagesEntity constructor.
     * @param LanguagesRepository $repository
     * @param LanguagesCreateValidator $createValidator
     * @param LanguagesUpdateValidator $updateValidator
     */
    public function __construct(LanguagesRepository $repository, LanguagesCreateValidator $createValidator, LanguagesUpdateValidator $updateValidator)
    {
        $this->repository = $repository;
        $this->createValidator = $createValidator;
        $this->updateValidator = $updateValidator;
    }

}
