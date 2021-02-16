<?php

namespace App\Http\Controllers;

use App\Model\DistrictCode;
use App\Model\Msmetype;
use Illuminate\Http\Request;
use kamruljpi\admintemplate\controllers\ProjectBaseController;

class MsmeController extends ProjectBaseController
{
    public function __construct() {
        $this->modelName = 'App\Model\Msme';
        $this->formView = 'msme.create';

        $this->tableLists = array(
            'id_farmer' => array(
                'title' => 'ID',
                'align' => 'center',
                'class' => 'fixed-width-xs',
            ),
            'name' => array(
                'title' => 'MSMES Name',
            ),
            'living_address_details' => array(
                'title' => 'Address Details',
                'align' => 'center',
                'class' => 'fixed-width-xs',
            ),
        );
    }
    public function getValidation($table = null) {
        return [];
    }

    public function index(){
        $this->init();

        $dataLists = $this->modelName::orderBy('updated_at','desc')->where('type', '1')->paginate();
        if(isset($dataLists) && !empty($dataLists) && count($dataLists) > 0){
            foreach ($dataLists as &$value) {
                if(isset($value->{$this->statusKey})){
                    $value->{$this->statusKey} = $this->statusHtml($value->{$this->primaryKey},$value->{$this->statusKey});
                }
            }
        }

        return view($this->baseView.$this->listView, [
            'createBtnShow' => $this->createBtnShow,
            'editBtnShow' => $this->editBtnShow,
            'deleteBtnShow' => $this->deleteBtnShow,
            'tableLists' => $this->tableLists,
            'isFillable' => $this->isFillable,
            'btnLists' => $this->btnLists,
            'pageTitle' => $this->pageTitle,
            'perRowbtnLists' => $this->perRowbtnLists,
            'fillableLists' => $this->fillableLists,
            'primaryKey' => $this->primaryKey,
            'extraBtns' => $this->extraBtns,
            'createRoute' => $this->createRoute,
            'editRoute' => $this->editRoute,
            'deleteRoute' => $this->deleteRoute,
            'statusRoute' => $this->statusRoute,
            'dataTable' => $this->dataTable,
            'modelClassName' => $this->modelClassName,
            'details' => $dataLists,
        ]);
    }

    public function displayFormView($id = null)
    {
        $this->init();

        $msme_type = Msmetype::dataTable();
        $districts = DistrictCode::dataTable();

        if(isset($this->formView) && !empty($this->formView)){
            if($id == null){
                return view($this->formView, [
                        'msme_type' => $msme_type,
                        'districts' => $districts,
                    ]);
            }else{
                return view($this->formView, [
                    'data' => $this->modelName::find($id),
                    'msme_type' => $msme_type,
                    'districts' => $districts,
                ]);
            }
        }else{
            return "formView is not defined.";
        }
    }
}
