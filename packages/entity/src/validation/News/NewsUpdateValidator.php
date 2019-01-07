<?php namespace Entity\Validation\News;

use Entity\Validation\AppValidator;
use Entity\Validation\ValidableInterface;

class NewsUpdateValidator extends AppValidator implements ValidableInterface {

    /**
     * Validation for creating a new User
     *
     * @var array
     */
    protected $rules = array(
        'news_title' => 'required',
        'news_content' => 'required',
    );
    protected $message = array(
        'news_title.required' => 'valid_news_title_required',
        'news_content.required' => 'valid_news_content_required'
    );
}
