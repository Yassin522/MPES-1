<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public $table = 'categorys';
    public $primaryKey = 'id';
    protected $fillable =   [
        'category_name',
    ];

    public function product()
    {
        return $this->hasMany('App\Models\product');
    }
}
