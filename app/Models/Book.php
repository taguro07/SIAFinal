<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'description', 'rental_fee'];

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
