<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transfer extends Model
{
    protected $fillable = [
        'user_session',
        'file_path',
        'delete_time',
        'uniq_link',  
        'user_id'
    ];

    public $timestamps = true;

}
  