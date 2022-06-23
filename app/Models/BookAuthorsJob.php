<?php
 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class BookAuthorsJob extends Model{
   

   protected $table = 'tblauthors';

// column sa table
   protected $fillable = [
       'fullname','gender','birthday'
   ];

   public $timestamps = false;
   protected $primarykey = 'id';
}
