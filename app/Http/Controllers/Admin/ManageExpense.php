<?php

namespace App\Http\Controllers\Admin;

use File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class ManageExpense extends Controller
{

    ///load_expense_list
    public function load_expense_list()
    {
        $data = array();
        ///common  lines
        $data['title'] = GetTitle();
        $data['expense_list'] = GetByWhereRecord('expenses');
        return view('admin.expenselist', $data);
    }


    ///add_expense
    public function add_expense()
    {
        $data = array();
        ///common  lines
        $data['title'] = GetTitle();
        return view('admin.addexpense', $data);
    }

    ///add_expense_process
    public function add_expense_process(Request $request)
    {
         
        ///check form validation
        $validation = Validator::make($request->all(), [
            'exp_type_id' => 'required',
            'date' => 'required',
            'amount' => 'required',
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
            
            ///handle editor images and expense
            $expense = $request->content;
            $dom = new \DomDocument();
            $dom->loadHtml($expense, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $imageFile = $dom->getElementsByTagName('img');
            foreach ($imageFile as $item => $image) {
                $data = $image->getAttribute('src');
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $imgeData = base64_decode($data);
                $image_name= "/admin/images/expense/".$exp_type_id.'/' . time().$item.'.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $imgeData);
          
                $image->removeAttribute('src');
                $image->setAttribute('src', $image_name);
            }
            $expense = $dom->saveHTML();

            ///post data to database
            $postData = array();
            $postData['exp_type_id'] = $exp_type_id;
            $postData['date'] = $date;
            $postData['amount'] = $amount;
            $postData['description'] = $expense;

            $exp_id = AddNewRecord('expenses', $postData);
            if ($exp_id) {
                $url = SERVER_ROOT_PATH.'admin/expense_list';
                $data = array('code' => 'success_url', 'message' => 'expense Has Been Updated!','redirect_url'=> $url);
                echo json_encode($data);
                die;
            }
        }
    }
 
    ///edit_expense
    public function edit_expense($id)
    {
        $data = array();
        ///common  lines
        $data['title'] = GetTitle();
        $data['cms'] = GetByWhereRecord('ad_cms', array('cms_id'=> $id));
        $data['cms_banners'] = GetByWhereRecord('ad_cms_banners', array('cms_id'=> $id));
        
         
        return view('admin.editexpense', $data);
    }
    
 
    ///update_expense_process
    public function update_expense_process(Request $request)
    {
        ///check form validation
        $validation = Validator::make($request->all(), [
             'cat_name' => 'required|unique:ad_cms',
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
            $postData['cat_name'] = ucfirst($request->cat_name);
            $is_updated = UpdateRecord('ad_cms', array('cms_id'=>$request->cms_id), $postData);
            if ($is_updated) {
                $url = SERVER_ROOT_PATH.'admin/expense_list';
                $data = array('code' => 'success_url', 'message' => 'expense Has Been Updated!','redirect_url'=> $url);
                echo json_encode($data);
                die;
            }
        }
    }
 
 
    ///delete_expense_process
    public function delete_expense_process(Request $request)
    {
        extract($request->all());
        $where = array('exp_id'=>$exp_id);
        $is_deleted = DeleteRecord('expenses', $where);
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
