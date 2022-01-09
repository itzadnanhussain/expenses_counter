<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class ManageReview extends Controller
{

    ///load_review_list
    public function load_review_list()
    {
        $data = array();
        ///common  lines
        $data['title'] = GetTitle();
        $data['reviews_list'] = GetByWhereRecord('ad_reviews');
        return view('admin.reviewlist', $data);
    }

    ///add_review
    public function add_review()
    {
        $data = array();
        ///common  lines
        $data['title'] = GetTitle();
        return view('admin.addreview', $data);
    }
 
 
    ///edit_review
    public function edit_review($id)
    {
        $data = array();
        ///common  lines
        $data['title'] = GetTitle();
        $data['review'] = GetByWhereRecord('ad_reviews', array('review_id'=> $id));
         
        return view('admin.editreview', $data);
    }
 
 
    ///add_review_process
    public function add_review_process(Request $request)
    {
        ///check form validation
        $validation = Validator::make($request->all(), [
             'cat_name' => 'required|unique:ad_reviews',
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
            $last_id = AddNewRecord('ad_reviews', $postData);
            if ($last_id) {
                $url = SERVER_ROOT_PATH.'admin/review_list';
                $data = array('code' => 'success_url', 'message' => 'New review Has Been Added!','redirect_url'=> $url);
                echo json_encode($data);
                die;
            }
        }
    }
 
    ///update_review_process
    public function update_review_process(Request $request)
    {
        ///check form validation
        $validation = Validator::make($request->all(), [
             'review_description' => 'required',
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
            $postData['review_description'] = $review_description;
            $is_updated = UpdateRecord('ad_reviews', array('review_id'=>$review_id), $postData);
            if ($is_updated) {
                $url = SERVER_ROOT_PATH.'admin/review_list';
                $data = array('code' => 'success_url', 'message' => 'review Has Been Updated!','redirect_url'=> $url);
                echo json_encode($data);
                die;
            }
        }
    }


    ///get_review_detail_by_id
    public function get_review_detail_by_id(Request $request)
    {
        if ($request) {
            extract($request->all());
            $review_data = GetByWhereRecord('ad_reviews', array('review_id' =>$review_id));
            $review_data = (array)$review_data[0];
           
            $data = array('code' => 'success', 'message' => $review_data);
            echo json_encode($data);
            die;
        }
    }

  
 
    ///delete_review_process
    public function delete_review_process(Request $request)
    {
        extract($request->all());
        $where = array('review_id'=>$id);
        $is_deleted = DeleteRecord('ad_reviews', $where);
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
