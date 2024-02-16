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
          <h1>Listado de Materias</h1>
        </div>
        <div class="col-sm-6" style="text-align: right;">
          <a href="{{ url('admin/subject/add') }}" class="btn btn-primary">Agregar Nueva Materia</a>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Buscar Materia</h3>
    </div>
    <form action="" method="get">
      <div class="card-body">
        <div class="row">
          <div class="form-group col-md-3">
            <label>Nombre</label>
            <input type="text" class="form-control" value="{{ Request::get('name') }}" name="name" placeholder="Ingrese Nombre">
          </div>
          <div class="form-group col-md-3">
            <label>Tipo de Materia</label>
            <select name="type" class="form-control">
              <option value="">Seleccione</option>
              <option {{ (Request::get("type")  == "Teoria") ? 'selected' : '' }} value="Teoria">Teoria</option>
              <option {{ (Request::get("type") == "Practica") ? 'selected' : '' }} value="Practica">Practica</option>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label>Fecha</label>
            <input type="date" class="form-control" value="{{ Request::get('date') }}" name="date" placeholder="Ingrese email">
            <div style="color: red;">{{ $errors->first('email') }}</div>
          </div>
          <div class="form-group col-md-3">
            <button class="btn btn-primary" type="submit" style="margin-top: 30px;"> Buscar</button>
            <a href="{{ url('admin/subject/list') }}" class="btn btn-success" style="margin-top: 30px;"> Limpiar</a>
          </div>
        </div>
        
      </div>
      <!-- /.card-body -->
    </form>
  </div>


  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
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
                    <th>Nombre</th>
                    <th>Tipo</th>
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
                    <td>{{ $value->name}}</td>
                    <td>{{ $value->type}}</td>
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
                      <a href="{{ url('admin/subject/edit/'.$value->id)}}" class="btn btn-primary">Editar</a>
                      <a href="{{ url('admin/subject/delete/'.$value->id)}}" class="btn btn-danger">Borrar</a>
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

