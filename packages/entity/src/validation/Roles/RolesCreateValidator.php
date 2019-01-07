<?php namespace Entity\Validation\Roles;

use Entity\Validation\AppValidator;
use Entity\Validation\ValidableInterface;

class RolesCreateValidator extends AppValidator implements ValidableInterface {

    /**
     * Validation for creating a new User
     *
     * @var array
     */
    protected $rules = array(
        'name' => 'required|unique:roles',
    );
    protected $message = array(
        'name.required' => 'valid_roles_name_required',
        'name.unique' => 'valid_roles_name_unique',
    );

}
