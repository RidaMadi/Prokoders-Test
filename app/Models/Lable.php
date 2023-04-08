<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lable extends Model
{
    use HasFactory;

    protected $fillable = [
        'popup_id',
        'text',
        'color',
        'font_size',
        'height',
        'width',
    ];

    public function popup()
    {
        return $this->belongsTo(Popup::class);
    }
}
