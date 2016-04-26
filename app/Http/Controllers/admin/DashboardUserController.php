<?php
/**
 * Created by PhpStorm.
 * User: JN
 * Description: For Maintaining The Functions Related to The Common Users
 * Date: 4/26/2016
 * Time: 2:13 PM
 */

namespace app\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\Input;
use \Illuminate\Support\Facades\Session;
use App\Models\UserMessageModel;

class DashboardUserController extends Controller {

     public function user_messages(){
         $roleId = Session::get('role_id');
         if ($roleId === 1 || $roleId === 2) {
             $usermassage = UserMessageModel::all();
             return view('admin.user_message',array('usermassage'=>$usermassage, "menuActive" => "usermessage"));
         }else{
             return redirect ('admin/login')->with('error_message','Not Logged In As Admin');
         }
     }
    public function user_messages_delete($mid)
    {
        $roleId = Session::get('role_id');
        if ($roleId === 1 || $roleId === 2) {
            $delete_user_messages = UserMessageModel::find($mid);
            $delete_user_messages->delete();

            //Keeping Log
            $admin_id = Session::get('user_id');
            $logg_type = "Delete Message";
            $logg_comment = "Message Deleted.";
            $adminLog = new AdminlogController();
            $adminLog->adminlog_create($admin_id, $logg_type, $logg_comment);

            return redirect('admin/usermessage');
        }
    }
}