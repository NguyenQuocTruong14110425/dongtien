<?php namespace Entity\Validation\Resources;

use Entity\Validation\AppValidator;
use Entity\Validation\ValidableInterface;

class ResourcesCreateValidator  extends AppValidator implements ValidableInterface {

    /**
     * Validation for creating a new User
     *
     * @var array
     */
    protected $rules = array(
        'resources_title' => 'required',
    );
    protected $message = array(
        'resources_title.required' => 'valid_resources_title_required'
    );

}
