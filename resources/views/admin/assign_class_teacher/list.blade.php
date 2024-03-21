 @extends('layouts.app')

 @section('style')

 @endsection
 @section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Asignacion de Clases ({{ $getRecord->total() }})</h1>
        </div>
        <div class="col-sm-6" style="text-align: right;">
          <a href="{{ url('admin/assign_class_teacher/add') }}" class="btn btn-primary">Asignar Clase Docente</a>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          @include('_message')

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Buscar Asignacion de Clases</h3>
            </div>
            <form action="" method="get">
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-3">
                    <label>Nombre de clase</label>
                    <input type="text" class="form-control" value="{{ Request::get('class_name') }}" name="class_name" placeholder="Ingrese Nombre de Clase">
                  </div>
                  <div class="form-group col-md-3">
                    <label>Nombre de Docente</label>
                    <input type="text" class="form-control" value="{{ Request::get('teacher_name') }}" name="teacher_name" placeholder="Ingrese Nombre de Docente">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Status</label>
                    <select name="status" class="form-control">
                    <option value="">Seleccione</option>
                    <option {{ (Request::get('status') == 100) ? 'selected' : '' }} value="100">Activa</option>
                    <option {{ (Request::get('status') == 1) ? 'selected' : '' }} value="1">Inactiva</option>
                  </select>
                  </div>
                  <div class="form-group col-md-2">
                    <label>Fecha</label>
                    <input type="date" class="form-control" value="{{ Request::get('date') }}" name="date">
                    <div style="color: red;">{{ $errors->first('email') }}</div>
                  </div>
                  <div class="form-group col-md-2">
                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;"> Buscar</button>
                    <a href="{{ url('admin/assign_class_teacher/list') }}" class="btn btn-success" style="margin-top: 30px;"> Limpiar</a>
                  </div>
                </div>
                
              </div>
              <!-- /.card-body -->
            </form>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Listado de Materias</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre de clase</th>
                    <th>Nombre de Docente</th>
                    <th>Status</th>
                    <th>Creado por</th>
                    <th>F.Creacion</th>
                    <th>Accion</th>
                  </tr>
                </thead>
                <tbody>
                   @foreach($getRecord as $value)
                 <tr>
                  <td>{{ $value->id}}</td>
                  <td>{{ $value->class_name}}</td>
                  <td>{{ $value->teacher_name}}</td>
                  <td>
                    @if($value->status == 0)
                    Activa
                    @else
                    Inactiva
                    @endif
                  </td>
                  <td>{{ $value->created_by_name}}</td>
                  <td>{{ date('d-m-Y h:i A', strtotime($value->created_at)) }}</td>
                  <td>
                    <a href="{{ url('admin/assign_class_teacher/edit/'.$value->id)}}" class="btn btn-primary">Editar</a>
                     <a href="{{ url('admin/assign_class_teacher/edit_single/'.$value->id)}}" class="btn btn-primary">Editar single</a>
                     <a href="{{ url('admin/assign_class_teacher/delete/'.$value->id)}}" class="btn btn-danger">Borrar</a>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
              <div style="padding: 10px; float: right;">
                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('script')

@endsection

