<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',  // Add any other fields you want to allow mass assignment for
        // Add other fields here
    ];
    
    use HasFactory;
}
