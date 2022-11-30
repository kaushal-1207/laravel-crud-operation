<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class MyController extends Controller
{
    //
    public function createRecord(Request $request)
    {
        $rules = array(
            'email' => 'unique:customer,email',
            'contact' => 'unique:customer,contact',
        );
        $val = Validator::make($request->all(), $rules);
        if ($val->fails()) {
            $msg = "Email or Mobile has Already been Taken";
            $request->session()->flash('existsmsg', $msg);
            return redirect('create');
        } else {
            $customer_details = new Customer();
            $customer_details->name = $request->name;
            $customer_details->email = $request->email;
            $customer_details->contact = $request->contact;
            $image = $request->file('profile');
            if($image)
            {
                $image_name = time(). '.' .$image->getClientOriginalName();
                $path = public_path('/customerimage');
                $image->move($path,$image_name);
                $customer_details->profile = $image_name;
            }else{
                $customer_details->profile = '';
            }
            $saveData = $customer_details->save();
            if ($saveData) {
                return redirect('/');
            } else {
                $msg = "Something went wrong to Save Data";
                $request->session()->flash('errormsg', $msg);
                return redirect('create');
            }
        }
    }

    public function showRecords()
    {
        $customer_details = Customer::paginate(5);
        //Applying Style to Paginator
        Paginator::useBootstrap();
        $number_of_rows = DB::table('customer')->count();
        return view('/index',['customerdetails'=>$customer_details, 'number_of_rows'=>$number_of_rows]);
    }

    public function editRecordForm($id)
    {
        $data = Customer::find($id);
        return view('update',['editdetails'=>$data]);
    }

    public function updateRecord(Request $request)
    {
        $record_details = Customer::find($request->update_id);
        $record_details->name = $request->name;
        $record_details->email = $request->email;
        $record_details->contact = $request->contact;
        $image = $request->file('profile');
        if($image)
        {
            $image_name = time(). '.' .$image->getClientOriginalName();
            $path = public_path('/customerimage');
            $image->move($path,$image_name);
            $record_details->profile = $image_name;
        }
        $saveData = $record_details->save();
        if($saveData){
            $msg = "Record Updated Successfully";
            $request->session()->flash('editmsg', $msg);
        }else{
            $msg = "Something went wrong to Update Record";
            $request->session()->flash('erroreditmsg', $msg);
        }
        return redirect('/');
    }

    public function deleteRecord($id)
    {
        $record_details = Customer::find($id);
        $Data = $record_details->delete();
        if($Data){
            $msg = "Record Deleted Successfully";
            session()->flash('deletemsg', $msg);
        }else{
            $msg = "Something went wrong to Update Record";
            session()->flash('errordelmsg', $msg);
        }
        return redirect('/');
    }
}
