<?php namespace Entity\Validation\Product;

use Entity\Validation\AppValidator;
use Entity\Validation\ValidableInterface;

class ProductCreateValidator extends AppValidator implements ValidableInterface {

    /**
     * Validation for creating a new User
     *
     * @var array
     */
    protected $rules = array(
        'product_title' => 'required',
        'product_price' => 'required',
        'product_avatar' => 'required',
        'product_categories' => 'required',
    );
    protected $message = array(
        'product_title.required' => 'Tên sản phẩm không được bỏ trống',
        'product_price.required' => 'Giá sản phẩm không được bỏ trống',
        'product_avatar.required' => 'vui lòng tải hình ảnh hợp lệ',
        'product_categories.required' => 'chọn danh mục sản phẩm'
    );

}
