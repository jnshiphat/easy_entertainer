<?php namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\Input;
use App\Models\AdminModel;
use \Illuminate\Support\Facades\Session;
use \Illuminate\Support\Facades\Validator;
use App\Http\Controllers\admin\AdminlogController;
use DateTime;

class LoginController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| LoginController Controller
	|--------------------------------------------------------------------------
	|
	| This controller is for admin login and new admin creation
	|
	*/
	/*
	public function __construct()
	{
		$this->middleware('auth');
	}
	*/

	public function index()
	{
		return view('admin.login');
	}

	public function login_verify() //Login procedure
	{
		$username = Input::get('username');
  		$password = Input::get('password'); 
		
		$adminlogin = AdminModel::where('username','=',$username)
                                   ->where('password','=',$password)
                                   ->get();

        if(count($adminlogin)===0)
		{
		    return redirect ('admin/login')->with('error_message','Incorrect Email or Password');
		}
		else
		{ 
		    $sessiondata=array();
		    $sessiondata['user_id']=$adminlogin[0]['id'];
		    $sessiondata['username']=$adminlogin[0]['username'];
		    $sessiondata['email']=$adminlogin[0]['email'];
		    $sessiondata['role_id']=$adminlogin[0]['role_id'];
		    $sessiondata['first_name']=$adminlogin[0]['first_name'];
		    $sessiondata['last_name']=$adminlogin[0]['last_name'];
		    $sessiondata['last_logon']=$adminlogin[0]['last_logon'];
		    
		    Session::put($sessiondata);

			//Updating the time of login (last login)
			$now = new DateTime();
			$update_lastlogon = AdminModel::find($adminlogin[0]['id']);
			$update_lastlogon->last_logon = $now;
			$update_lastlogon->save();

		    return redirect('admin/admindashboard');
		      
		}
	}

	public function admin_create()
	{
		//Get Form Data
		$username = Input::get('username');
  		$password = Input::get('password');
  		$first_name = Input::get('first_name');
  		$last_name = Input::get('last_name');
  		$email = Input::get('email');
  		$role_id = Input::get('role_id');

  		//Validate Data
  		$rules = ['username' => 'required', 'password' => 'required', 'email' => 'required', 'role_id' => 'required',];
  		$validator = Validator::make(Input::all(),$rules);
  		if ($validator->fails()) {
  			return redirect ('admin/admincreate')->with('error_message','Required fields are not set');
  		}

  		//DB Unique Validation
  		$adminExist = AdminModel::where('username','=',$username)
                                   ->orWhere('email','=',$email)
                                   ->get()->count();
        if($adminExist>0)
		{
		    return redirect ('admin/admincreate')->with('error_message','Same Email or Username Exist');
		}
		
		//Save data in table
		$admin = new AdminModel();
		$admin->username = $username;
		$admin->password = $password;
		$admin->first_name = $first_name;
		$admin->last_name = $last_name;
		$admin->email = $email;
		$admin->role_id = $role_id;
	    $admin->save();

		//Sending login credential to new user
		if ($admin->save()){
			$url="http://greensolz.com/hosted_sites/product/public";
			$to      = $email;
			$subject = 'New Account';
			$message = "Dear $username ,". "\r\n";
			$message .=" A New account is created for you to use. Below is your password.To login please use url  $url". "\r\n\r\n";
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
	    $logg_type = "User Creation";
	    $logg_comment = "A new admin user has been created.";
	    $adminLog = new AdminlogController();
	    $adminLog->adminlog_create($admin_id, $logg_type, $logg_comment);


  	    return redirect ('admin/admincreate')->with('createadmin_message','New User Created');
	}

    public function adminlogout() {         
   
     	Session::flush();
     	return redirect ('admin/login')->with('error_message','Successfully Logged Out');

    }

}
