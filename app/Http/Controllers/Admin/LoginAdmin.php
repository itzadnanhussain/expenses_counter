<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class LoginAdmin extends Controller
{
    ///Load Helper
    public function __construct()
    {
        // parent::__construct();
        ///check session
        if (session()->get('logged_in')) {
            return redirect('admin.dashboard');
        }
    }

    ///load_login_page
    public function load_login_page()
    {
        $data = array();
        ///common  lines
        $data['title'] = GetTitle();
        return view('admin.login', $data);
    }


    ///load_login_process
    public function load_login_process(Request $request)
    {
        // echo '<pre>';
        // print_r($request->all());
        // echo '</pre>';
        // die;

        ///check form validation
        $validation = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required',
        ]);

        ///validation errors
        if ($validation->fails()) {
            ///validation errors code
            $errors = $validation->errors()->toArray();
            $error_array = array();
            foreach ($errors as $key => $value) {
                $error_array[] = array($key , $value[0]);
            }
            $data = array('code' => 'errors', 'message' => $error_array);
            echo json_encode($data);
            die;
        } else {

            ///validation ok
            $findData = GetByWhereRecord('ad_admin', array('email' => $request->email));
            $password = $request->password;
            ///Login User
            if ($findData) {
                $db_password = decryptData($findData[0]->simple_password, $findData[0]->salt_password);
                if ($password == $db_password) {

                    ///set session
                    session()->put('user_id', $findData[0]->user_id);
                    session()->put('email', $findData[0]->email);
                    session()->put('admin_logged_in', true);

                    // $data =  session()->all();
                    // echo '<pre>';
                    // print_r($data);
                    // echo '</pre>';
                    // die;

                    ///Success
                    $redirect_url = SERVER_ROOT_PATH.'admin/dashboard';
                    $data = array('code' => 'success_url', 'message' => 'Login successful', 'redirect_url' => $redirect_url);
                    echo json_encode($data);
                    die;
                } else {
                       
                    ///credential not correct
                    $data = array('code' => 'warning', 'message' => 'Sorry password does not match');
                    echo json_encode($data);
                    die;
                }
            } else {
                
                ///credential not correct
                $data = array('code' => 'warning', 'message' => 'Email Not Found');
                echo json_encode($data);
                die;
            }
        }
    }


    ///register_new user
    public function register_new_user(Request $request)
    {
        ///Register New Admin
        if (empty($findData)) {
            $postData['email'] = $request->email;
            ///Password and Salt
            $res = encryptData($request->password);
            $postData['salt_password'] = $res['salt'];
            $postData['simple_password'] = $res['enc_text'];
            AddNewRecord('ad_admin', $postData);

            ///Success
            $data = array('code' => 'success', 'message' => 'User Logged in  successfully');
            echo json_encode($data);
            die;
        }
    }



     


    ///admin_logout
    public function admin_logout()
    {
        session()->invalidate();
        session()->regenerateToken();
        return redirect('admin/login');
    }
}
