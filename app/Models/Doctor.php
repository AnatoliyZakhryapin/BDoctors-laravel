<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    public function messages(){
        return $this->hasMany(Message::class);
    }
    
    public function sponsorships()
    {
        return $this->belongsToMany(Sponsorship::class);
    }
}
