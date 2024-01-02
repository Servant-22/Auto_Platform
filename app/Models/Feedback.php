<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'score'];  // De attributen die kunnen worden toegewezen
    protected $table = 'feedbacks';            // Specificeert de juiste tabelnaam

}
