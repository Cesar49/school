<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use Str;

class TeacherController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getTeacher();
        $data['header_title'] = "Lista de Docentes";
        return view('admin.teacher.list',$data);

    }

    public function add()
    {
        $data['header_title'] = "Agregar Docente";
        return view('admin.teacher.add',$data);

    }


    public function insert(Request $request)
   { 


       request()->validate([
          'email' => 'required|email|unique:users',
          'mobil_number' => 'max:15|min:8',
          'marital_status' => 'max:50',
       ]);

       $teacher = new User;
       $teacher->name = trim($request->name);
       $teacher->last_name = trim($request->last_name);
       $teacher->gender = trim($request->gender);
       if (!empty($request->date_of_birth)) {
       $teacher->date_of_birth = trim($request->date_of_birth);
       }

       if (!empty($request->admission_date)) {
       $teacher->admission_date = trim($request->admission_date);       
       }

       if (!empty($request->file('profile_pic'))) {
        $ext = $request->file('profile_pic')->getClientOriginalExtension();
        $file = $request->file('profile_pic');
        $randomStr = date('Ymdhis').Str::random(20);
        $filename = strtolower($randomStr).".".$ext;
        $file->move('upload/profile/',$filename);
        $teacher->profile_pic = $filename;
       }

       $teacher->marital_status = trim($request->marital_status);
       $teacher->address = trim($request->address);
       $teacher->mobil_number = trim($request->mobil_number);
       $teacher->permanent_address = trim($request->permanent_address);
       
       $teacher->qualification = trim($request->qualification);
       $teacher->work_experience = trim($request->work_experience);
       $teacher->note = trim($request->note);
       $teacher->status = trim($request->status);
       $teacher->email = trim($request->email);
       $teacher->password = Hash::make($request->password);
       $teacher->user_type = 2;
       $teacher->save();

       return redirect('admin/teacher/list')->with('success', 'Docente registrado satisfactoriamente.');

   }


   public function edit($id)
   {       
       $data['getRecord'] = User::getSingle($id);
       if (!empty($data['getRecord'])) {
          
           $data['header_title'] = 'Editar Docente';
           return view('admin.teacher.edit', $data);
       } else {
           abort(404);
       } 
   }


   public function update($id, Request $request)
   { 


       request()->validate([
          'email' => 'required|email|unique:users,email,'.$id,
          'mobil_number' => 'max:15|min:8',
          'marital_status' => 'max:50',
       ]);

       $teacher = User::getSingle($id);
       $teacher->name = trim($request->name);
       $teacher->last_name = trim($request->last_name);
       $teacher->gender = trim($request->gender);
       if (!empty($request->date_of_birth)) {
       $teacher->date_of_birth = trim($request->date_of_birth);
       }

       if (!empty($request->admission_date)) {
       $teacher->admission_date = trim($request->admission_date);       
       }

       if (!empty($request->file('profile_pic'))) {
        $ext = $request->file('profile_pic')->getClientOriginalExtension();
        $file = $request->file('profile_pic');
        $randomStr = date('Ymdhis').Str::random(20);
        $filename = strtolower($randomStr).".".$ext;
        $file->move('upload/profile/',$filename);
        $teacher->profile_pic = $filename;
       }

       $teacher->marital_status = trim($request->marital_status);
       $teacher->address = trim($request->address);
       $teacher->mobil_number = trim($request->mobil_number);
       $teacher->permanent_address = trim($request->permanent_address);
       
       $teacher->qualification = trim($request->qualification);
       $teacher->work_experience = trim($request->work_experience);
       $teacher->note = trim($request->note);
       $teacher->status = trim($request->status);
       $teacher->email = trim($request->email);
       if (!empty($request->$request->password)) {
       $student->password = Hash::make($request->password);              
       }
       $teacher->save();

       return redirect('admin/teacher/list')->with('success', 'Docente actualizado satisfactoriamente.');

   }


   public function delete($id)
   {
      
       $getRecord = User::getSingle($id);
       if (!empty($getRecord)) {
           $getRecord->is_delete = 1;
           $getRecord->save();

           return redirect()->back()->with('success', 'Docente eliminado satisfactoriamente.');
       } else {
           abort(404);
       } 

    
   }

}
