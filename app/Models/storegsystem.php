<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class storegsystem extends Model
{
    protected $fillable = [
        'session_id', 'name', 'path', 'type', 'size', 'is_image','password'
    ];

    public function getReadableSizeAttribute()
    {
        $size = $this->size;

        if ($size >= 1073741824) {
            return number_format($size / 1073741824, 2) . ' GB';
        } elseif ($size >= 1048576) {
            return number_format($size / 1048576, 2) . ' MB';
        } elseif ($size >= 1024) {
            return number_format($size / 1024, 2) . ' KB';
        } else {
            return $size . ' Bytes';
        }
    }
}
