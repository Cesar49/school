<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\User;
use App\Models\AssignClassTeacherModel;
Use Auth;

class AssignClassTeacherController extends Controller
{
  
  public function list()
  {   
    $data['getRecord'] = AssignClassTeacherModel::getRecord();
    $data['header_title'] = 'Asignacion clases docente';
    return view('admin.assign_class_teacher.list', $data);
  }


  public function add()
  {       
    $data['getClass'] = ClassModel::getClass();
    $data['getTeacher'] = User::getTeacherClass();
    $data['header_title'] = 'Asignacion de Clase Docente';
    return view('admin.assign_class_teacher.add', $data);
  }


  public function insert(Request $request)
  {

    if (!empty($request->teacher_id)) {

      foreach ($request->teacher_id as $teacher_id) {

        $getAlreadyFirst = AssignClassTeacherModel::getAlreadyFirst($request->class_id, $teacher_id);

        if (!empty($getAlreadyFirst)) {

          $getAlreadyFirst->status = $request->status;
          $getAlreadyFirst->save();
        } else {          
          $save = new AssignClassTeacherModel;
          $save->class_id = $request->class_id;
          $save->teacher_id = $teacher_id;
          $save->status = $request->status;
          $save->created_by = Auth::user()->id;
          $save->save();
        }

      }
      return redirect('admin/assign_class_teacher/list')->with('success', 'Clase asignada satisfactoriamente.');

    } else {
       return redirect('admin/subject/list')->with('success', 'Materia creada satisfactoriamente.');
    } 

  }


  public function edit($id)
  {      
    $getRecord = AssignClassTeacherModel::getSingle($id);
    if (!empty($getRecord)) {

      $data['getRecord'] = $getRecord;
      $data['getAssignTeacherId'] = AssignClassTeacherModel::getAssignTeacherId($getRecord->class_id);
      $data['getClass'] = ClassModel::getClass();
      $data['getTeacher'] = User::getTeacherClass();
      $data['header_title'] = 'Editar Asignacion de Clase';
      return view('admin.assign_class_teacher.edit', $data);
    } else {
      abort(404);
    }        
  }


  public function update(Request $request)
  {
    AssignClassTeacherModel::deleteTeacher($request->class_id);

    if (!empty($request->teacher_id)) {
      foreach ($request->teacher_id as $teacher_id) {

        $getAlreadyFirst = AssignClassTeacherModel::getAlreadyFirst($request->class_id, $teacher_id);

        if (!empty($getAlreadyFirst)) {

            $getAlreadyFirst->status = $request->status;
            $getAlreadyFirst->save();
        } else {          
            $save = new AssignClassTeacherModel;
            $save->class_id = $request->class_id;
            $save->teacher_id = $teacher_id;
            $save->status = $request->status;
            $save->created_by = Auth::user()->id;
            $save->save();
        }
      }
    }
      return redirect('admin/assign_class_teacher/list')->with('success', 'Asignacion de clase actualizada satisfactoriamente.');   
    }


  public function edit_single($id)
  {      
    $getRecord = AssignClassTeacherModel::getSingle($id);
    if (!empty($getRecord)) {

      $data['getRecord'] = $getRecord;
      $data['getClass'] = ClassModel::getClass();
      $data['getTeacher'] = User::getTeacherClass();
      $data['header_title'] = 'Editar Asignacion de Clase';
      return view('admin.assign_class_teacher.edit_single', $data);
    } else {
      abort(404);
    }        
  }


  public function update_single($id, Request $request)
  {
    
    $getAlreadyFirst = AssignClassTeacherModel::getAlreadyFirst($request->class_id, $request->teacher_id);
    if (!empty($getAlreadyFirst)) {
      $getAlreadyFirst->status = $request->status;
      $getAlreadyFirst->save();
      return redirect('admin/assign_class_teacher/list')->with('success', 'Status actualizado satisfactoriamente.'); 
    } else {          
      $save = AssignClassTeacherModel::getSingle($id);
      $save->class_id = $request->class_id;
      $save->teacher_id = $request->teacher_id;
      $save->status = $request->status;
      $save->save();

      return redirect('admin/assign_class_teacher/list')->with('success', 'Asignacion de clase actualizada satisfactoriamente.');
    }
         
  }


  public function delete($id)
  {
    $save = AssignClassTeacherModel::getSingle($id);
    $save->delete();

    return redirect()->back()->with('success', 'Asignacion de clase eliminada satisfactoriamente.');
  }

}
