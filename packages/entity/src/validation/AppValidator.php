<?php namespace Entity\Validation;

use Illuminate\Validation\Factory;

abstract class AppValidator extends AbstractValidator {

    /**
     * Validator
     *
     * @var Illuminate\Validation\Factory
     */
    protected $validator;

    /**
     * Construct
     *
     * @param Illuminate\Validation\Factory $validator
     */
    public function __construct(Factory $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Pass the data and the rules to the validator
     *
     * @return boolean
     */
    public function passes()
    {
        $validator = $this->validator->make($this->data, $this->rules);
        if(isset($this->message))
        {
            $message = $this->message;
            $validator = $this->validator->make($this->data, $this->rules,$message);
        }
        if( $validator->fails() )
        {
            $this->errors = $validator->messages()->messages();
            return false;
        }
        return true;
    }

}
