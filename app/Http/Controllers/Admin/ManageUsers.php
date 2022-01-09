<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class ManageUsers extends Controller
{

    ///lotbl_users_list
    public function load_users_list()
    {
        $data = array();
        $data['users_list'] = GetAllRecords('tbl_users');
        ///common  lines
        $data['title'] = GetTitle();
        return view('admin.userlist', $data);
    }

    ///add_user
    public function add_user()
    {
        $data = array();
        ///common  lines
        $data['title'] = GetTitle();
        return view('admin.adduser', $data);
    }


    ///edit_user
    public function edit_user($id)
    {
        $data = array();
        ///common  lines
        $data['title'] = GetTitle();
        $data['user'] = GetByWhereRecord('tbl_users', array('user_id'=> $id));
        return view('admin.edituser', $data);
    }


    ///add_user_process
    public function add_user_process(Request $request)
    {
        ///check form validation
        
        $validation = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:tbl_users',
            'phone' => 'required|min:11|numeric|unique:tbl_users',
            'simple_password' => 'required',
            'user_type' => 'required',
            'user_verified' => 'required',
            'profile' => 'required',
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
            extract($request->all());
           
            $postData = array();
            $postData['first_name'] = $first_name;
            $postData['last_name'] = $last_name;
            $postData['email'] = $email;
            $postData['phone'] = $phone;
            $postData['address'] = $address;
            ///password salt process
            $res = encryptData($simple_password);
            $postData['salt_password'] = $res['salt'];
            $postData['simple_password'] = $res['enc_text'];
            $postData['user_type'] = $user_type;
            $postData['user_verified'] = $user_verified;
            $postData['profile_image'] = '' ;

            $last_id = AddNewRecord('tbl_users', $postData);
            // echo '<pre>';
            // print_r($last_id);
            // echo '</pre>';
            // die;

            ///handle profile
            if ($request->hasfile('profile') && $last_id) {
                $file = $request->file('profile');
                $name = 'profile_'.$last_id.'.'.$file->extension();
                $file->move(public_path('admin/profiles/'.$last_id), $name);
                UpdateRecord('tbl_users', array('user_id'=>$last_id), array('profile_image' => $name));
            }

            $url = SERVER_ROOT_PATH.'admin/users_list';
            $data = array('code' => 'success_url', 'message' => 'New User Has Been Added!','redirect_url'=> $url);
            echo json_encode($data);
            die;
        }
    }

    
    ///update_user_process
    public function update_user_process(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required',Rule::unique('tbl_users')->ignore($request->user_id, 'user_id')],
            'phone' => ['required',Rule::unique('tbl_users')->ignore($request->user_id, 'user_id')],
            'user_type' => 'required',
            'user_verified' => 'required',
            'profile_status' => 'required'
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
            extract($request->all());
            $postData = array();
            $postData['first_name'] = $first_name;
            $postData['last_name'] = $last_name;
            $postData['email'] = $email;
            $postData['phone'] = $phone;
            $postData['address'] = $address;
             

            if (isset($simple_password) && !empty($simple_password)) {
                ///password salt process
                $res = encryptData($simple_password);
                $postData['salt_password'] = $res['salt'];
                $postData['simple_password'] = $res['enc_text'];
            }
           
            $postData['user_type'] = $user_type;
            $postData['user_verified'] = $user_verified;
            $postData['profile_status'] = $profile_status;
 
            UpdateRecord('tbl_users', array('user_id' => $user_id), $postData);
            $url = SERVER_ROOT_PATH.'admin/users_list';
            $data = array('code' => 'success_url', 'message' => 'User Has Been Updated!','redirect_url'=> $url);
            echo json_encode($data);
            die;
        }
    }


    ///load_user_profile
    public function load_user_profile($user_id)
    {
        $user_id = decryption($user_id);
      
        $data = array();
        ///common  lines
        $data['title'] = GetTitle();
        $data['user_data'] = GetByWhereRecord('tbl_users', array('user_id'=>$user_id));
       
     
        return view('admin.userprofile', $data);
    }

    //image_upload_process
    public function image_upload_process(Request $request)
    {
        ///image
        if ($request->hasfile('image_upload_file')) {
            extract($request->all());

            
            $path = 'Admin/profiles/' . $user_id . '/';
            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }

            $file = $request->file('image_upload_file');
            $name = 'profile_'.$user_id.'.'.$file->extension();
            $file->move(public_path('admin/profiles/'.$user_id), $name);
            UpdateRecord('tbl_users', array('user_id'=>$user_id), array('profile_image' => $name));
        
            ///Success
            $output = ADMIN_ASSETS.'profiles/'.$user_id.'/'.$name;
            $data = array('status' => true, 'output' => $output);
            echo json_encode($data);
            die;
        }
    }


    ///delete_user_process
    public function delete_user_process(Request $request)
    {
        extract($request->all());
        $where = array('user_id'=>$id);
        $is_deleted = DeleteRecord('tbl_users', $where);
        if ($is_deleted) {
            $data = array('code' => 'success', 'message' => 'Record deleted!');
            echo json_encode($data);
            die;
        } else {
            $data = array('code' => 'warning', 'message' => 'Record not deleted!');
            echo json_encode($data);
            die;
        }

        

        echo 'you are here : '.$id;
        die;
    }
}
