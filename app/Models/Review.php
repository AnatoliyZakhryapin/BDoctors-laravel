<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'message', 'doctor_id', 'vote_id'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function vote()
    {
        return $this->belongsTo(Vote::class);
    }
}
