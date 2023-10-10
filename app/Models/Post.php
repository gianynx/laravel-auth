<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $fillable è una buona pratica per specificare esplicitamente quali campi possono essere assegnati in massa per evitare potenziali problemi di sicurezza.
    protected $fillable = ['image', 'title', 'slug', 'body'];
}
