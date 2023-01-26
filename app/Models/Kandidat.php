<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    use HasFactory;
    protected $table = 'kandidat';
    protected $guarded = ['id'];

    public function presma()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function wapresma()
    {
        return $this->belongsTo('App\Models\User');
    }
}
