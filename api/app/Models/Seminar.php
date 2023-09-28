<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
    protected $fillable = [
        'status', 
        'data',
        'message' // Add any other fields you want to allow mass assignment for
        // Add other fields here
    ];
    use HasFactory;
}
