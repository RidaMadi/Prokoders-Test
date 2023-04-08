<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Popup extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'type',
        'page_url',
        'title',
        'content',
        'positionTop',
        'positionLeft',
        'positionButton',
        'positionRight',
        'delay',
        'background_color',
        'text_color',
        'font_size',
    ];
}
