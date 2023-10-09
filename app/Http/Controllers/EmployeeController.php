<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;
use Toastr;

class EmployeeController extends Controller
{
    

    public function index(){
        $data=Employee::latest()->simplepaginate(5);
        $trashdata=Employee::onlyTrashed()->latest()->simplepaginate(5);
        return view('frontend.index',compact('data','trashdata'));
    }

    public function addData(){
        return view('frontend.add');
    }

    public function storeData(Request $request){

       
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

           

            if ($image = $request->file('image')) {
                $destinationPath = 'img/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['image'] = "$profileImage";
            }
            
            $data = $request->all();
            $data['image'] = $input['image'];
            Employee::create($data);
            Toastr::success('Employee added successfully', 'Title', ["positionClass" => "toast-top-right"]);
            return redirect('/');
        }


        public function editData($id){
            $data=Employee::findOrFail($id);
            return view('frontend.edit',compact('data'));
        }


        public function updateData(Request $request, $id) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Updated validation rule for image
            ]);
        
            $data = $request->all();
            if ($image = $request->file('image')) {
                $destinationPath = 'img/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $data['image'] = "$profileImage";
            }else{
                unset($data['image']);
            }
                
            $employee = Employee::findOrFail($id);
            $employee->update($data);
        
            Toastr::success('Employee updated successfully', 'Title', ["positionClass" => "toast-top-right"]);
            return redirect('/');
        }

        public function deleteData($id){
            Employee::findOrFail($id)->delete();
            Toastr::success('Employee successfully Deleted', 'Title', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
        public function restoreData($id){
            Employee::withTrashed()->findOrFail($id)->restore();
            Toastr::success('Employee Data successfully Restore', 'Title', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
        public function ParmanentdeleteData($id){
            Employee::onlyTrashed()->findOrFail($id)->forceDelete();
            Toastr::success('Employee Deleted successfully', 'Title', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
    }
    

