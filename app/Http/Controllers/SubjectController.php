<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\SubjectModel;
use App\Models\ClassSubjectModel;
use App\Models\User;

class SubjectController extends Controller
{
   public function list()
   {
    $data['getRecord'] = SubjectModel::getRecord();
     $data['header_title'] = 'Lista de Materias';
     return view('admin.subject.list', $data);
   }


    public function add()
   {       
      $data['header_title'] = 'Agregar Materia';
      return view('admin.subject.add', $data);
   }


    public function insert(Request $request)
   {
       //dd($request->all());
  
    $save = new SubjectModel;
    $save->name = trim($request->name);
    $save->type = trim($request->type);
    $save->status = trim($request->status);
    $save->created_by = Auth::user()->id;
    $save->save();

    return redirect('admin/subject/list')->with('success', 'Materia creada satisfactoriamente.');
   }


   public function edit($id)
   {       
      $data['getRecord'] = SubjectModel::getSingle($id);
      if (!empty($data['getRecord'])) {
        $data['header_title'] = 'Editar Materia';
        return view('admin.subject.edit', $data);
      } else {
        abort(404);
      } 
       
   }


     public function update($id, Request $request)
   {
    
    $save = SubjectModel::getSingle($id);
    $save->name = trim($request->name);
    $save->type = trim($request->type);
    $save->status = trim($request->status);
    $save->save();

    return redirect('admin/subject/list')->with('success', 'Materia actualizada satisfactoriamente.');
   }

   public function delete($id)
   {
      $save = SubjectModel::getSingle($id);
      $save->is_delete = 1;
      $save->save();

     return redirect('admin/subject/list')->with('success', 'Materia eliminada satisfactoriamente.');
   }

   //student side
   public function MySubject()
   {

      $data['getRecord'] = ClassSubjectModel::MySubject(Auth::user()->class_id);
      $data['header_title'] = 'Mis Materias';
      return view('student.my_subject', $data);
   }

   //parent side
   public function ParentStudentSubject($student_id)
   {
      
      $user = User::getSingle($student_id);
      $data['getUser'] = $user;
      $data['getRecord'] = ClassSubjectModel::MySubject($user->class_id);
      $data['header_title'] = 'Materia de Estudiante';
      return view('parent.my_student_subject', $data);
   }
}
