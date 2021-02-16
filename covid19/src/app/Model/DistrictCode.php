<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DistrictCode extends Model
{
    protected $table="district_codes";
    protected $primaryKey = "id";
    protected $fillable = ['id','div_id','dist_code','district_name_eng','district_name_ban'];

    /**
     * Get the list.
     */
    public static function list() {
        return static::orderBy('district_name_eng','asc')->paginate();
    }
    /**
     * Get the list.
     */
    public static function dataTable() {
        return static::orderBy('district_name_eng','asc')->get();
    }

    /**
     * Get the list by primary keys
     * @param integer|array $id
     */
    public static function getById($id){
        return static::find($id);
    }
}
