<?php namespace Entity\Validation\Transactions;

use Entity\Validation\AppValidator;
use Entity\Validation\ValidableInterface;

class TransactionsCreateValidator extends AppValidator implements ValidableInterface {

    /**
     * Validation for creating a new User
     *
     * @var array
     */
    protected $rules = array(
        'transaction_titles' => 'required',
    );
    protected $message = array(
        'transaction_titles.required' => 'valid_transaction_titles_required',
    );

}
