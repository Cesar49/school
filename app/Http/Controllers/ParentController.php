<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use Str;

class ParentController extends Controller
{
   public function list()
   {
       $data['getRecord'] = User::getParent();
       $data['header_title'] = 'Lista de Representantes';
       return view('admin.parent.list', $data);
   }

   public function add()
   {       
       $data['header_title'] = 'Agregar representante';
       return view('admin.parent.add', $data);
   }


   public function insert(Request $request)
   { 


       request()->validate([
          'email' => 'required|email|unique:users',
          'mobil_number' => 'max:15|min:8',
          'address' => 'max:255',
          'occupation' => 'max:255',
       ]);

       $parent = new User;
       $parent->name = trim($request->name);
       $parent->last_name = trim($request->last_name);
       $parent->gender = trim($request->gender);
       $parent->occupation = trim($request->occupation);
       $parent->address = trim($request->address);

       if (!empty($request->file('profile_pic'))) {
        $ext = $request->file('profile_pic')->getClientOriginalExtension();
        $file = $request->file('profile_pic');
        $randomStr = date('Ymdhis').Str::random(20);
        $filename = strtolower($randomStr).".".$ext;
        $file->move('upload/profile/',$filename);
        $parent->profile_pic = $filename;
       }

       $parent->mobil_number = trim($request->mobil_number);
       $parent->status = trim($request->status);
       $parent->email = trim($request->email);
       $parent->password = Hash::make($request->password);
       $parent->user_type = 4;
       $parent->save();

       return redirect('admin/parent/list')->with('success', 'Representante registrado satisfactoriamente.');

   }


   public function edit($id)
   {       
     $data['getRecord'] = User::getSingle($id);
     if (!empty($data['getRecord'])) {
         $data['header_title'] = 'Editar Representante';
         return view('admin.parent.edit', $data);
     } else {
         abort(404);
     } 
   }


   public function update($id, Request $request)
   { 


       request()->validate([
          'email' => 'required|email|unique:users,email,'.$id,
          'mobil_number' => 'max:15|min:8',
          'address' => 'max:255',
          'occupation' => 'max:255',
       ]);

       $parent = User::getSingle($id);
       $parent->name = trim($request->name);
       $parent->last_name = trim($request->last_name);
       $parent->gender = trim($request->gender);
       $parent->occupation = trim($request->occupation);
       $parent->address = trim($request->address);

      
       if (!empty($request->file('profile_pic'))) {
        if (!empty($parent->getProfile())) {
            unlink('upload/profile/'.$parent->profile_pic);
        }
        $ext = $request->file('profile_pic')->getClientOriginalExtension();
        $file = $request->file('profile_pic');
        $randomStr = date('Ymdhis').Str::random(20);
        $filename = strtolower($randomStr).".".$ext;
        $file->move('upload/profile/',$filename);
        $parent->profile_pic = $filename;
       }

       
       $parent->mobil_number = trim($request->mobil_number);
       $parent->status = trim($request->status);
       $parent->email = trim($request->email);
       if (!empty($request->$request->password)) {
       $parent->password = Hash::make($request->password);              
       }
       $parent->save();

       return redirect('admin/parent/list')->with('success', 'Representante actualizado satisfactoriamente.');

   }


   public function delete($id)
   {
      
       $getRecord = User::getSingle($id);
       if (!empty($getRecord)) {
           $getRecord->is_delete = 1;
           $getRecord->save();

           return redirect()->back()->with('success', 'Representante eliminado satisfactoriamente.');
       } else {
           abort(404);
       } 

    
   }


   public function myStudent($id)
   {
       $data['getParent'] = User::getSingle($id);
       $data['parent_id'] = $id;
       $data['getSearchStudent'] = User::getSearchStudent();
       $data['getRecord'] = User::getMyStudent($id);
       $data['header_title'] = 'Lista de Estudiante Representado';
       return view('admin.parent.my_student', $data);
   }


   public function AssingStudentParent($student_id, $parent_id)
   {
       $student = User::getSingle($student_id);
       $student->parent_id = $parent_id;
       $student->save();

       return redirect()->back()->with('success', 'Estudiante asignado satisfactoriamente.');
   }


    public function AssingStudentParentDelete($student_id)
   {
      
       $student = User::getSingle($student_id);
       if (!empty($student)) {
           $student->parent_id = null;
           $student->save();

           return redirect()->back()->with('success', 'Asignacion eliminada satisfactoriamente.');
       } else {
           abort(404);
       } 

    
   }

   //parent side

   public function myStudentParent()
   {
       $id = Auth::user()->id;
      
       $data['getRecord'] = User::getMyStudent($id);
       $data['header_title'] = 'Mi Estudiante';
       return view('parent.my_student', $data);
   }



}
