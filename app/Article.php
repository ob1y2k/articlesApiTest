<?php 


namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	/**
     * The table associated with the model.
     *
     * @var string
     */
   	
   	public $timestamps = false;
   	
    protected $dates = [ 'created_at', 'updated_at' ];  
    protected $dateFormat = 'Y-m-d H:i:s';  

    protected $fillable = ['id', 'title', 'author', 'cover_photo_url', 'thumb_photo_url', 'content' , 'tags',  'created_at', 'updated_at'];
   
   
}

?>