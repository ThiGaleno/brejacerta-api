<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;
use Illuminate\Database\Eloquent\SoftDeletes;

class Beer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 'style', 'category', 'ibu', 'abv', 'glass', 'temperature', 'food_pairing', 'url_photo'

    ];

    public function review(){
        return $this->hasMany(Review::class);
    }

}
