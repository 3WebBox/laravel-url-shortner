<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UrlShortener extends Model
{
    # Table Name    
    protected $table = 'url_shortener';
  
    # Array of fillable attributes
    protected $fillable = ['id', 'uuid','original_url','masked_url'];
}
