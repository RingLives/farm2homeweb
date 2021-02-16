<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use kamruljpi\admintemplate\controllers\ProjectBaseController;

class MsmetypeController extends ProjectBaseController
{
	public function __construct() {
        $this->modelName = 'App\Model\Msmetype';
        $this->formView = 'msmetype.create';
    }
    public function getValidation($table = null) {
        return [];
    }
}