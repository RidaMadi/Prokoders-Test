<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopupLogin extends Model
{
    use HasFactory;
    protected $fillable = [
        'popup_id',
        'user_id',
        'clicked',
        'device_type',
        'page_url',
    ];

    public function popup()
    {
        return $this->belongsTo(Popup::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
