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
			$adminlogin = AdminModel::all();
			return view('admin.adminuser_manage',array('adminlogin'=>$adminlogin));
		}else{
			return redirect ('admin/login')->with('error_message','Not Logged In As Super Admin');
		}		
	}

	public function adminuser_operations()
	{
		//Get Form Data
		$username = Input::get('username');
		$first_name = Input::get('first_name');
		$last_name = Input::get('last_name');
		$email = Input::get('email');
		$role_id = Input::get('role_id');

		$update_user = AdminModel::where('username',$username)->first();
		$update_user->username = $username;
		$update_user->first_name = $first_name;
		$update_user->last_name = $last_name;
		$update_user->email = $email;
		$update_user->role_id = $role_id;
		
		$update_user->save();

		return redirect('admin/adminmanage');
	}
}
