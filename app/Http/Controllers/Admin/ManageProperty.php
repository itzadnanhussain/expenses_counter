<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class ManageProperty extends Controller
{

    ///load_property_list
    public function load_property_list()
    {
        $data = array();
        ///common  lines
        $data['title'] = GetTitle();
        $data['property_data'] = GetByWhereRecord('tbl_properties');
        return view('admin.propertylist', $data);
    }


    ///load_property_profile
    public function load_property_profile($property_id)
    {
        $data = array();
        ///common  lines
        $data['title'] = GetTitle();
        $property_id = decryption($property_id);
        $data['property_data'] = GetByWhereRecord('tbl_properties', array('property_id'=>$property_id));
        
        return view('admin.propertyprofile', $data);
    }

    ///delete_property_process
    public function delete_property_process(Request $request)
    {
        extract($request->all());
        $where = array('property_id'=>$id);
        $is_deleted = DeleteRecord('tbl_properties', $where);
        if ($is_deleted) {
            $data = array('code' => 'success', 'message' => 'Record deleted!');
            echo json_encode($data);
            die;
        } else {
            $data = array('code' => 'warning', 'message' => 'Record not deleted!');
            echo json_encode($data);
            die;
        }
    }
}
