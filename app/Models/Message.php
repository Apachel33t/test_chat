<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'dialog_id',
        'message'
    ];

    public function dialogs()
    {
        return $this->belongsToMany(Dialog::class);
    }
}
