<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Button extends Model
{
    use HasFactory;

    protected $fillable = [
        'popup_id',
        'text',
        'textColor',
        'background_color',
        'button_url',
        'button_type',
        'height',
        'width',
    ];

    public function popup()
    {
        return $this->belongsTo(Popup::class);
    }
}
