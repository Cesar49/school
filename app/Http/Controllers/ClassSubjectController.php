<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\ClassSubjectModel;
use App\Models\ClassModel;
use App\Models\SubjectModel;

class ClassSubjectController extends Controller
{

  public function list()
  {
    $data['getRecord'] = ClassSubjectModel::getRecord();
   $data['header_title'] = 'Lista de Asignacion de Materias';
   return view('admin.assign_subject.list', $data);
 }


 public function add()
 {       
  $data['getClass'] = ClassModel::getClass();
  $data['getSubject'] = SubjectModel::getSubject();
  $data['header_title'] = 'Agregar Asignacion de Materia';
  return view('admin.assign_subject.add', $data);
}


  public function insert(Request $request)
  {
         //dd($request->all());

    if (!empty($request->subject_id)) {

      foreach ($request->subject_id as $subject_id) {

        $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($request->class_id, $subject_id);

        if (!empty($getAlreadyFirst)) {

          $getAlreadyFirst->status = $request->status;
          $getAlreadyFirst->save();
        } else {
          
          $save = new ClassSubjectModel;
          $save->class_id = $request->class_id;
          $save->subject_id = $subject_id;
          $save->status = $request->status;
          $save->created_by = Auth::user()->id;
          $save->save();
        }
        
       

      }

      return redirect('admin/assign_subject/list')->with('success', 'Materia asignada satisfactoriamente.');

    } else {

       return redirect('admin/subject/list')->with('success', 'Materia creada satisfactoriamente.');
    }
  }


  public function edit($id)
   {      
      $getRecord = ClassSubjectModel::getSingle($id);
      if (!empty($getRecord)) {

        $data['getRecord'] = $getRecord;
        $data['getAssignSubjectId'] = ClassSubjectModel::getAssignSubjectId($getRecord->class_id);
        $data['getClass'] = ClassModel::getClass();
        $data['getSubject'] = SubjectModel::getSubject();
        $data['header_title'] = 'Editar Asignacion de Materia';
        return view('admin.assign_subject.edit', $data);
      } else {
        abort(404);
      }        
   }


   public function update(Request $request)
   {
      ClassSubjectModel::deleteSubject($request->class_id);

      if (!empty($request->subject_id)) {
        foreach ($request->subject_id as $subject_id) {
          $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($request->class_id, $subject_id);
          if (!empty($getAlreadyFirst)) {
            $getAlreadyFirst->status = $request->status;
            $getAlreadyFirst->save();
          } else {          
            $save = new ClassSubjectModel;
            $save->class_id = $request->class_id;
            $save->subject_id = $subject_id;
            $save->status = $request->status;
            $save->created_by = Auth::user()->id;
            $save->save();
          } 
        }
        
      }
      return redirect('admin/assign_subject/list')->with('success', 'Asignacion de materia actualizada satisfactoriamente.');   
    }


   public function delete($id)
   {
      $save = ClassSubjectModel::getSingle($id);
      $save->is_delete = 1;
      $save->save();

     return redirect()->back()->with('success', 'Asignacion de materia eliminada satisfactoriamente.');
   }


   public function edit_single($id)
   {      
      $getRecord = ClassSubjectModel::getSingle($id);
      if (!empty($getRecord)) {

        $data['getRecord'] = $getRecord;
        $data['getClass'] = ClassModel::getClass();
        $data['getSubject'] = SubjectModel::getSubject();
        $data['header_title'] = 'Editar Asignacion de Materia';
        return view('admin.assign_subject.edit_single', $data);
      } else {
        abort(404);
      }        
   }


   public function update_single($id, Request $request)
   {
      
      $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($request->class_id, $request->subject_id);
      if (!empty($getAlreadyFirst)) {
        $getAlreadyFirst->status = $request->status;
        $getAlreadyFirst->save();
        return redirect('admin/assign_subject/list')->with('success', 'Status actualizado satisfactoriamente.'); 
      } else {          
        $save = ClassSubjectModel::getSingle($id);
        $save->class_id = $request->class_id;
        $save->subject_id = $request->subject_id;
        $save->status = $request->status;
        $save->save();

        return redirect('admin/assign_subject/list')->with('success', 'Asignacion de materia actualizada satisfactoriamente.');
      } 

         
    }



}
