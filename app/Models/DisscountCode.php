<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisscountCode extends Model
{
    use HasFactory;
    protected $table = 'discountcodes';
    protected $fillable = [
        'title',
        'content',
        'code',
        'discount',
        'start_time',
        'end_time',
    ];
}
