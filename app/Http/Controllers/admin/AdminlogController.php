<?php namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\Input;
use App\Models\AdminlogModel;
use \Illuminate\Support\Facades\Session;
use \Illuminate\Support\Facades\Validator;

class AdminlogController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| AdminlogController Controller
	|--------------------------------------------------------------------------
	|
	| This controller is for admin log
	|
	*/

	public function adminlog_create($admin_id, $logg_type, $logg_comment)
	{
		

  		$adminlog = new AdminlogModel();
		$adminlog->admin_id = $admin_id;
		$adminlog->logg_type = $logg_type;
		$adminlog->logg_comment = $logg_comment;
		
	    $adminlog->save();
		
	}

}
