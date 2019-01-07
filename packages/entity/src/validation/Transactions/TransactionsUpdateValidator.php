<?php namespace Entity\Validation\Transactions;

use Entity\Validation\AppValidator;
use Entity\Validation\ValidableInterface;

class TransactionsUpdateValidator extends AppValidator implements ValidableInterface {

    /**
     * Validation for creating a new User
     *
     * @var array
     */
    protected $rules = array(
        'transactions_title' => 'required',
    );
    protected $message = array(
        'transactions_title.required' => 'valid_transactions_title_required',
    );
}
