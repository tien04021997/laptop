<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $table = 'categories_products';
    protected $guarded = [''];

    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;

    const HOT_ON = 1;
    const HOT_OFF = 0;

    protected $active_category = [
        1 => [
            'name' => 'Hoạt động',
            'class' => 'badge-primary'
        ],

        0 => [
            'name' => 'Không hoạt động',
            'class' => 'badge-danger'
        ]
    ];

    protected $view_hot = [
        1 => [
            'name' => 'Nổi bật',
            'class' => 'badge-success'
        ],

        0 => [
            'name' => 'Không nổi bật',
            'class' => 'badge-info'
        ]
    ];

    public function getActive(){
        return array_get($this->active_category, $this->active, '[N/A]');
    }

    public function getHot(){
        return array_get($this->view_hot, $this->status, '[N/A]');
    }
}
