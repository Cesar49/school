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
          <h1>Listado de Asignacion de Materias</h1>
        </div>
        <div class="col-sm-6" style="text-align: right;">
          <a href="{{ url('admin/assign_subject/add') }}" class="btn btn-primary">Asignar Materia</a>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section> 
  


  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Buscar Materia</h3>
            </div>
            <form action="" method="get">
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-3">
                    <label>Nombre de clase</label>
                    <input type="text" class="form-control" value="{{ Request::get('class_name') }}" name="class_name" placeholder="Ingrese Nombre de Clase">
                  </div>
                  <div class="form-group col-md-3">
                    <label>Nombre de Materia</label>
                    <input type="text" class="form-control" value="{{ Request::get('subject_name') }}" name="subject_name" placeholder="Ingrese Nombre de Materia">
                  </div>
                  <div class="form-group col-md-3">
                    <label>Fecha</label>
                    <input type="date" class="form-control" value="{{ Request::get('date') }}" name="date" placeholder="Ingrese email">
                    <div style="color: red;">{{ $errors->first('email') }}</div>
                  </div>
                  <div class="form-group col-md-3">
                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;"> Buscar</button>
                    <a href="{{ url('admin/assign_subject/list') }}" class="btn btn-success" style="margin-top: 30px;"> Limpiar</a>
                  </div>
                </div>
                
              </div>
              <!-- /.card-body -->
            </form>
          </div>
          @include('_message')
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
                    <th>Nombre de Materia</th>
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
                  <td>{{ $value->subject_name}}</td>
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
                    <a href="{{ url('admin/assign_subject/edit/'.$value->id)}}" class="btn btn-primary">Editar</a>
                    <a href="{{ url('admin/assign_subject/edit_single/'.$value->id)}}" class="btn btn-primary">Editar Materia</a>
                    <a href="{{ url('admin/assign_subject/delete/'.$value->id)}}" class="btn btn-danger">Borrar</a>
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

