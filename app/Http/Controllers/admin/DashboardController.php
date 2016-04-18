<?php namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\Input;
use App\Models\AdminModel;
use \Illuminate\Support\Facades\Session;

class DashboardController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| LoginController Controller
	|--------------------------------------------------------------------------
	|
	| This controller is for admin dashboards
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	/*
	public function __construct()
	{
		$this->middleware('auth');
	}
	*/

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		//return view('admin.login');
	}

	public function admin_dashboard()
	{
		//if(Session::get('role_id') === 1){
		$roleId = Session::get('role_id');
		if ($roleId === 1 || $roleId === 2) {
			return view('admin.dashboard');
		}else{
			return redirect ('admin/login')->with('error_message','Not Logged In As Admin');
		}		
	}

	public function adminuser_create()
	{
		//if(Session::get('role_id') === 1){
		$roleId = Session::get('role_id');
		if ($roleId === 1) {
			return view('admin.adminuser_create');
		}else{
			return redirect ('admin/login')->with('error_message','Not Logged In As Super Admin');
		}		
	}
	
	public function adminuser_management()
	{
		//if(Session::get('role_id') === 1){
		$roleId = Session::get('role_id');
		if ($roleId === 1) {
			return view('admin.adminuser_manage');
		}else{
			return redirect ('admin/login')->with('error_message','Not Logged In As Super Admin');
		}		
	}
}
