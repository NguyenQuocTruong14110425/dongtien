<?php namespace Entity\Validation\Users;

use Entity\Validation\AppValidator;
use Entity\Validation\ValidableInterface;

class UsersUpdateValidator extends AppValidator implements ValidableInterface {

    /**
     * Validation for creating a new User
     *
     * @var array
     */
    protected $rules = array(
        'name' => 'required',
        'email' => 'required|email',
    );
    protected $message = array(
        'name.required' => 'valid_Name_required',
        'email.required' => 'valid_email_required',
        'email.email' => 'valid_email_email'
    );
}
