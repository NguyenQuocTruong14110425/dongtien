<?php namespace Entity\Validation\Languages;

use Entity\Validation\AppValidator;
use Entity\Validation\ValidableInterface;

class LanguagesUpdateValidator extends AppValidator implements ValidableInterface {

    /**
     * Validation for creating a new User
     *
     * @var array
     */
    protected $rules = array(
        'lang_code' => 'required',
    );
    protected $message = array(
        'lang_code.required' => 'valid_Languages_code_required',
    );
}
