<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saran extends Model
{
    use HasFactory;

    protected $table = 'saran';
    protected $guarded = ['id'];

    // menghubungkan dengan table parents (user)
    public function user () {
        return $this->belongsTo("App\Models\User");
    }
}