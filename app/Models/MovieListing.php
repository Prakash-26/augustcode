<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieListing extends Model
{
    use HasFactory;
    protected $table = 'movie_listing';

    protected $fillable = ['name','description','youtube_url','image_url','slug','release_date'];

}
