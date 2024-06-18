<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //protected $table="posts" ;//指定資料表名稱
    //public $timestamps=false;//若要取消時間戳記
    protected $fillable=[
        'title',
        'content',
        'user_id',
        'views',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
