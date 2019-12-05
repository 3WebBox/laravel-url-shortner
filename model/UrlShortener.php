<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Uuid;

class UrlShortener extends Model
{
	use SoftDeletes;
    # Table Name    
    protected $table = 'url_shortener';

    protected $primaryKey = 'uuid';

    public $incrementing = false;
  
    # Array of fillable attributes
    protected $fillable = ['uuid','original_url','masked_url'];

    public static function boot(){
    	parent::boot();
    	self::creating(function($model){
    		$model->uuid = (string)Uuid::generate(4);
    	});
    }
    public function getUuidAttribute($uuid){
    	return strval($uuid);
    }
}
