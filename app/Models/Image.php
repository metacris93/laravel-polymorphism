<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    const ALIAS = 'image';
    protected $guarded = [];
    public function imageable()
    {
        return $this->morphTo();
    }
}
