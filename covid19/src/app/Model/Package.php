<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
  protected $primaryKey = "id_package";

  protected $fillable = ['package_name','package_description','packages_for','package_amount','loan_amount','package_districts','package_audience','start_date','end_date','is_active'];
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
