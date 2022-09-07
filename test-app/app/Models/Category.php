<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'category_name',
        'user_id',
        'created_at'
    ];

    public function user(){
        //join on table name: User::class, foreign key, local key from Category::class
        return $this->hasOne(User::class,'id','user_id');
    }
}
