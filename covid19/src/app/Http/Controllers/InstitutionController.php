<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use kamruljpi\admintemplate\controllers\ProjectBaseController;

class InstitutionController extends ProjectBaseController
{
	public function __construct() {
        $this->modelName = 'App\Model\Institution';
        $this->formView = 'institution.create';
        $this->tableLists = array(
            'id_institution' => array(
                'title' => 'ID',
                'align' => 'center',
                'class' => 'fixed-width-xs',
            ),
            'name' => array(
                'title' => 'Name',
            ),
            'address_details' => array(
                'title' => 'Address',
            ),
            'district_name' => array(
                'title' => 'District',
                'getvalue' => array('model'=>'modelName','keyname'=> 'keyName'),
            ),
            'is_active' => array(
                'title' => 'Status',
                'align' => 'center',
                'class' => 'fixed-width-xs',
            ),
        );
    }
    public function getValidation($table = null) {
        return [];
        return ['name' => 'required|unique:'.$table];
    }
}