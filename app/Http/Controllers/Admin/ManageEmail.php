<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class ManageEmail extends Controller
{

    ///load_email_temp_list
    public function load_email_temp_list()
    {
        $data = array();
        ///common  lines
        $data['title'] = GetTitle();
        $data['email_templates'] = GetByWhereRecord('ad_email_templates');
        return view('admin.emaillist', $data);
    }

    ///add_email
    public function add_email_temp()
    {
        $data = array();
        ///common  lines
        $data['title'] = GetTitle();
        return view('admin.addemail', $data);
    }
   
   
    ///edit_email
    public function edit_email_temp($id)
    {
        $data = array();
        ///common  lines
        $data['title'] = GetTitle();
        $data['email_temp_data'] = GetByWhereRecord('ad_email_templates', array('etemp_id'=> $id));
           
        return view('admin.editemail', $data);
    }
   
   
    ///add_email_process
    public function add_email_temp_process(Request $request)
    {
        ///check form validation
        $validation = Validator::make($request->all(), [
               'etemp_name' => 'required|unique:ad_email_templates',
               'etemp_subject' => 'required',
               'content' => 'required',
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
            $postData = array();
            $postData['etemp_name'] =  $request->etemp_name;
            $postData['etemp_subject'] = $request->etemp_name;
            $postData['etemp_data'] = $request->content;
            $last_id = AddNewRecord('ad_email_templates', $postData);
            if ($last_id) {
                $url = SERVER_ROOT_PATH.'admin/email_temp_list';
                $data = array('code' => 'success_url', 'message' => 'New Email Templates Has Been Added!','redirect_url'=> $url);
                echo json_encode($data);
                die;
            }
        }
    }
   
    ///update_email_process
    public function update_email_temp_process(Request $request)
    {
      
         ///check form validation
        $validation = Validator::make($request->all(), [
            'etemp_name' => 'required',
            'etemp_subject' => 'required',
            'content' => 'required',
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
            $postData['etemp_name'] =  $etemp_name;
            $postData['etemp_subject'] = $etemp_name;
            $postData['etemp_data'] = $content;
            $is_updated = UpdateRecord('ad_email_templates', array('etemp_id' => $etemp_id), $postData);
            if ($is_updated) {
                $url = SERVER_ROOT_PATH.'admin/email_temp_list';
                $data = array('code' => 'success_url', 'message' => 'Email Templates Has Been Updated!','redirect_url'=> $url);
                echo json_encode($data);
                die;
            }
        }
    }
   
   
    ///delete_email_process
    public function delete_email_temp_process(Request $request)
    {
        extract($request->all());
        $where = array('etemp_id'=>$id);
        $is_deleted = DeleteRecord('ad_email_templates', $where);
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
