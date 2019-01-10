<?php namespace Entity\Validation\Product;

use Entity\Validation\AppValidator;
use Entity\Validation\ValidableInterface;

class ProductUpdateValidator extends AppValidator implements ValidableInterface {

    /**
     * Validation for creating a new User
     *
     * @var array
     */
    protected $rules = array(
        'product_title' => 'required',
    );
    protected $message = array(
        'product_title.required' => 'valid_product_title_required',
    );
}
