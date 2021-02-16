<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use kamruljpi\admintemplate\controllers\ProjectBaseController;
use Illuminate\Support\Facades\Hash;
class UserController extends ProjectBaseController
{
	public function __construct()
    {
        $this->modelName = 'App\User';
        $this->formView = 'user.create';
        $this->tableLists = array(
            'id' => array(
                'title' => 'ID',
                'align' => 'center',
                'class' => 'fixed-width-xs',
            ),
            'first_name' => array(
                'title' => 'First Name',
            ),
            'last_name' => array(
                'title' => 'Last Name',
            ),
            'mobile_no' => array(
                'title' => 'Mobile No',
            ),
            'is_active' => array(
                'title' => 'Status',
                'align' => 'center',
                'class' => 'fixed-width-xs',
            ),
        );
    }

    public function submit(Request $request, $url_id = null) {

        $this->init();

        $this->validate($request, $this->getValidation($this->modelObj->getTable()));

        if(isset($request->{$this->primaryKey}) && !empty($request->{$this->primaryKey}) && ($url_id != null)){
            $modelObj = $this->modelName::find($request->{$this->primaryKey});
        }else{
            $modelObj = new $this->modelName();
        }

        $modelObj->fill($request->all());
        $modelObj->name = $request->first_name." ".$request->last_name;
        if(isset($request->password) && !empty($request->password)){
            $modelObj->password = Hash::make($request->password);
        }

        if(isset($request->{$this->primaryKey}) && !empty($request->{$this->primaryKey}) && ($url_id != null)){
            $res = $modelObj->update();
        }else{
            $res = $modelObj->save();
        }

        if($res){
            if($this->isAjax){
                return json_encode([
                        'status'=>200,
                        'msg' => 'success',
                        'data' => $res
                    ]);
            }else{
                return redirect()->route($this->listRoute)->withSuccess("Successfuly created New ".$this->modelClassName.".");
            }
        }else{
            if($this->isAjax){
                return json_encode([
                        'status'=>301,
                        'msg' => 'error',
                        'data' => []
                    ]);
            }else{
                return redirect()->route($this->listRoute)->withErrors("Somethings Went Wrong! Please try Again.");
            }
        }
    }

    public function getValidation($table = null)
    {
        return [];
    }
}
