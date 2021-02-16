<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Msmetype extends Model
{
  protected $primaryKey = "id_msmetype";

  protected $fillable = ['type','is_active'];
  /**
    * Get the list.
    */
   public static function list() {
    return static::orderBy('updated_at','desc')->paginate();
   }
   /**
    * Get the list.
    */
   public static function dataTable() {
     return static::orderBy('updated_at','desc')->get();
   }

  /**
   * Get the list by primary keys
   * @param integer|array $id
   */
  public static function getById($id){
  	return static::find($id);
  }
}
