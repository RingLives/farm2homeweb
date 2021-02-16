<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    protected $primaryKey = "id_farmer";

    protected $fillable = ['name','father_name','national_id','living_address_details','living_district_name','living_type',
        'living_latitude','living_type_id','living_longitude','physical_address_details','physical_district_name',
        'physical_type','physical_type_id','physical_latitude', 'physical_longitude', 'mobile_no', 'photo','status','type'];
    /**
     * Get the list.
     */
    public static function list() {
        return static::orderBy('updated_at','desc')->where('type', '0')->paginate();
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
