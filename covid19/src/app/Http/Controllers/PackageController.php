<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use kamruljpi\admintemplate\controllers\ProjectBaseController;

class PackageController extends ProjectBaseController
{
	public function __construct()
    {
        $this->modelName = 'App\Model\Package';
        $this->formView = 'package.create';
        $this->tableLists = array(
            'id_package' => array(
                'title' => 'ID',
                'align' => 'center',
                'class' => 'fixed-width-xs',
            ),
            'package_name' => array(
                'title' => 'Package Name',
            ),
            'package_amount' => array(
                'title' => 'Amount',
            ),
            'start_date' => array(
                'title' => 'Start Date'
            ),
            'end_date' => array(
                'title' => 'End Date'
            ),
            'is_active' => array(
                'title' => 'Status',
                'align' => 'center',
                'class' => 'fixed-width-xs',
            ),
        );
        $this->perRowbtnLists = array(
         array(
             'routeName' => 'package_mapping',
             'title' => 'Mapping',
             'params' => ['id_package'],
             // 'class' => 'btn-danger',
         )
        );
    }
    public function Mapping($id_package = null)
    {
        return '';
    }

    public function getValidation($table = null)
    {
        return [];
    }
}