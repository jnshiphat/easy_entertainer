<?php namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\Input;
use App\Models\AdminModel;
use \Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| DashboardController Controller
	|--------------------------------------------------------------------------
	|
	| This controller is for - Sending admins to dashboard, allow Super Admin to Manage Admins
	|
	*/

	public function index()
	{
		//return view('admin.login');
	}

	public function admin_dashboard() //Showing Dashboard of Admin and Super Admin
	{
		$roleId = Session::get('role_id');
		if ($roleId === 1 || $roleId === 2) {
			return view('admin.dashboard',  array("menuActive"=>"dashboard"));
		}else{
			return redirect ('admin/login')->with('error_message','Not Logged In As Admin');
		}		
	}

	public function adminuser_create() //Creating Other Admins (Super Admin)
	{
		//if(Session::get('role_id') === 1){
		$roleId = Session::get('role_id');
		if ($roleId === 1) {
			return view('admin.adminuser_create',  array("menuActive"=>"admincreate"));
		}else{
			return redirect ('admin/login')->with('error_message','Not Logged In As Super Admin');
		}		
	}
	
	public function adminuser_management() //Managing Other Admins - Show the table (Super Admin)
	{
		//if(Session::get('role_id') === 1){
		$roleId = Session::get('role_id');
		if ($roleId === 1) {
			$adminlogin = AdminModel::all();
			return view('admin.adminuser_manage',array('adminlogin'=>$adminlogin, "menuActive"=>"adminmanage"));
		}else{
			return redirect ('admin/login')->with('error_message','Not Logged In As Super Admin');
		}		
	}

	public function adminuser_operations() // Admin List Data Table Operations (Super Admin)
	{
		$cUserroleId = Session::get('role_id');
		if ($cUserroleId != 1) {
			return redirect()->back();
		}
		//Get Form Data
		$username = Input::get('username');
		$first_name = Input::get('first_name');
		$last_name = Input::get('last_name');
		$email = Input::get('email');
		$role_id = Input::get('role_id');
		$password = Input::get('password');

		$update_user = AdminModel::where('username',$username)->first();
		$update_user->username = $username;
		$update_user->first_name = $first_name;
		$update_user->last_name = $last_name;
		$update_user->email = $email;
		$update_user->role_id = $role_id;
		$update_user->password = $password;
		
		$update_user->save();

		//Sending mail to user
		if ($update_user->save()){
			$url=url();
			$to      = $email;
			$subject = 'Account Updated';
			$message = "Dear $username ,". "\r\n";
			$message .=" Your account has been updated. Below is your password.To login please use url  $url". "\r\n\r\n";
			$message .="credentials:". "\r\n";
			$message .="username:$username". "\r\n\r\n";
			$message .="password:$password". "\r\n\r\n\r\n";
			$message .="Thanks.";
			$headers = 'From: webmaster@easyentertainer.com' . "\r\n" .
				'Reply-To: webmaster@easyentertainer.com' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();

			mail($to, $subject, $message, $headers);
		}

		//Keeping Log
		$admin_id = Session::get('user_id');
		$logg_type = "User Update";
		$logg_comment = "Admin User Data Updated. Username: $username";
		$adminLog = new AdminlogController();
		$adminLog->adminlog_create($admin_id, $logg_type, $logg_comment);

		return redirect('admin/adminmanage');
	}

	public function adminuser_delete($id) // Delete Admin (by Super Admin)
	{
		$roleId = Session::get('role_id');
		if ($roleId === 1) {
			$delete_adminuser = AdminModel::find($id);
			$delete_adminuser->delete();

			//Keeping Log
			$admin_id = Session::get('user_id');
			$logg_type = "Delete User";
			$logg_comment = "Admin User Deleted. UseId: $id";
			$adminLog = new AdminlogController();
			$adminLog->adminlog_create($admin_id, $logg_type, $logg_comment);

			return redirect('admin/adminmanage');
		}
	}
}
