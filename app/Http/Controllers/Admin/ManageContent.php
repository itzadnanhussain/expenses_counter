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

class ManageContent extends Controller
{

    ///load_content_list
    public function load_content_list()
    {
        $data = array();
        ///common  lines
        $data['title'] = GetTitle();
        $data['cms_list'] = GetByWhereRecord('ad_cms');
        return view('admin.contentlist', $data);
    }


    ///add_content
    public function add_content()
    {
        $data = array();
        ///common  lines
        $data['title'] = GetTitle();
        return view('admin.addcontent', $data);
    }

    ///add_content_process
    public function add_content_process(Request $request)
    {
         
        ///check form validation
        $validation = Validator::make($request->all(), [
            'page_name' => 'required',
            'content' => 'required',
            'filenames' => 'required',
            'filenames.*' => 'image'
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
            ///handle editor images and content
            $content = $request->content;
            $dom = new \DomDocument();
            $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $imageFile = $dom->getElementsByTagName('img');
            foreach ($imageFile as $item => $image) {
                $data = $image->getAttribute('src');
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $imgeData = base64_decode($data);
                $image_name= "/admin/images/cms/".$page_name.'/' . time().$item.'.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $imgeData);
          
                $image->removeAttribute('src');
                $image->setAttribute('src', $image_name);
            }
            $content = $dom->saveHTML();

            ///post data to database
            $postData = array();
            $postData['page_name'] = $page_name;
            $postData['content'] = $content;

            $cms_id = AddNewRecord('ad_cms', $postData);
            if ($cms_id) {
                ///handle multiple images
                $files = [];
                if ($request->hasfile('filenames')) {
                    foreach ($request->file('filenames') as $file) {
                        $name = time().rand(1, 100).'.'.$file->extension();
                        $file_path = 'admin/images/cms/'.$page_name;
                        $file->move(public_path($file_path), $name);
                        $file_path = 'admin/images/cms/'.$page_name.'/'.$name;
                        // $files[] = $name;
                        AddNewRecord('ad_cms_banners', array('cms_id' => $cms_id,'banner' => $file_path));
                    }
                }
                $url = SERVER_ROOT_PATH.'admin/content_list';
                $data = array('code' => 'success_url', 'message' => 'New CMS Has Been Added!','redirect_url'=> $url);
                echo json_encode($data);
                die;
            }
        }
    }
 
    ///edit_content
    public function edit_content($id)
    {
        $data = array();
        ///common  lines
        $data['title'] = GetTitle();
        $data['cms'] = GetByWhereRecord('ad_cms', array('cms_id'=> $id));
        $data['cms_banners'] = GetByWhereRecord('ad_cms_banners', array('cms_id'=> $id));
        
         
        return view('admin.editcontent', $data);
    }
    
 
    ///update_content_process
    public function update_content_process(Request $request)
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
                $url = SERVER_ROOT_PATH.'admin/content_list';
                $data = array('code' => 'success_url', 'message' => 'content Has Been Updated!','redirect_url'=> $url);
                echo json_encode($data);
                die;
            }
        }
    }
 
 
    ///delete_content_process
    public function delete_content_process(Request $request)
    {
        extract($request->all());
        $where = array('cms_id'=>$id);
        $is_deleted = DeleteRecord('ad_cms', $where);
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
