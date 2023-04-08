<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    use HasFactory;
    protected $fillable = [
        'popup_id',
        'textColor',
        'name',
        'height',
        'width',
    ];


    public function popup()
    {
        return $this->belongsTo(Popup::class);
    }
}
