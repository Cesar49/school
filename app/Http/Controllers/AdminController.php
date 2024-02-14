<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class AdminController extends Controller
{
   public function list()
   {
       $data['getRecord'] = User::getAdmin();
       $data['header_title'] = 'Administradores';
       return view('admin.admin.list', $data);
   }

   public function add()
   {
       $data['header_title'] = 'Agregar Administrador';
       return view('admin.admin.add', $data);
   }

   public function insert(Request $request)
   {
       //dd($request->all());

    $user = new User;
    $user->name = trim($request->name);
    $user->email = trim($request->email);
    $user->password = Hash::make($request->password);
    $user->user_type = 1;
    $user->save();

    return redirect('admin/admin/list')->with('success', 'Administrador creado satisfactoriamente.');
   }


   public function edit($id)
   {       
       $data['getRecord'] = User::getSingle($id);
       if (!empty($data['getRecord'])) {
           $data['header_title'] = 'Editar Administrador';
           return view('admin.admin.edit', $data);
       } else {
           abort(404);
       } 
   }


   public function update($id, Request $request)
   {
      $user = User::getSingle($id);
      $user->name = trim($request->name);
      $user->email = trim($request->email);
      if (!empty($request->password)) {
      $user->password = Hash::make($request->password);
      }      
      $user->save();

      return redirect('admin/admin/list')->with('success', 'Administrador actualizado satisfactoriamente.');
   }


   public function delete($id)
   {
     $user = User::getSingle($id);
     $user->is_delete = 1;
     $user->save();
     return redirect('admin/admin/list')->with('success', 'Administrador Borrado satisfactoriamente.');
   }
}
