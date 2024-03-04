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
          <h1>Representante ( {{ $getParent->name }} {{ $getParent->last_name }} )</h1>
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
              <h3 class="card-title">Buscar Estudiante</h3>
            </div>
            <form action="" method="get">
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-2">
                    <label>Id Estudiante</label>
                    <input type="text" class="form-control" value="{{ Request::get('id') }}" name="id" placeholder="Ingrese Id Estudiante">
                    <div style="color: red;">{{ $errors->first('id') }}</div>
                  </div>
                  <div class="form-group col-md-2">
                    <label>Nombre</label>
                    <input type="text" class="form-control" value="{{ Request::get('name') }}" name="name" placeholder="Ingrese Nombre">
                    <div style="color: red;">{{ $errors->first('name') }}</div>
                  </div>
                  <div class="form-group col-md-2">
                    <label>Apellido</label>
                    <input type="text" class="form-control" value="{{ Request::get('last_name') }}" name="last_name" placeholder="Ingrese Apellido">
                    <div style="color: red;">{{ $errors->first('last_name') }}</div>
                  </div>
                  <div class="form-group col-md-2">
                    <label>Email</label>
                    <input type="email" class="form-control" value="{{ Request::get('email') }}" name="email" placeholder="Ingrese email">
                    <div style="color: red;">{{ $errors->first('email') }}</div>
                  </div>
                  
                  <div class="form-group col-md-2">
                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;"> Buscar</button>
                    <a href="{{ url('admin/parent/my-student/'.$parent_id) }}" class="btn btn-success" style="margin-top: 30px;"> Limpiar</a>
                  </div>
                </div>

              </div>
              <!-- /.card-body -->
            </form>
          </div>

          @include('_message')

          @if(!empty($getSearchStudent))
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Estudiantes Representados</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Imagen</th>
                    <th>Estudiante</th>
                    <th>Email</th>
                    <th>Representante</th>
                    <th>F.Creacion</th>
                    <th>Accion</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($getSearchStudent as $value)
                  <tr>
                    <td>{{ $value->id}}</td>
                    <td>
                     @if(!empty($value->getProfile()))
                     <img src="{{ $value->getProfile() }}" alt="" style="width: 50px;height: 50px; border-radius: 50px;">
                     @endif
                   </td>
                   <td>{{ $value->name}} {{ $value->last_name}}</td>
                   <td>{{ $value->email}}</td>
                   <td>{{ $value->parent_name}}</td>
                   <td>{{ date('d-m-Y h:i A', strtotime($value->created_at)) }}</td>
                   <td style="min-width: 150px;">
                    <a href="{{ url('admin/parent/assign_student_parent/'.$value->id.'/'.$parent_id)}}" class="btn btn-primary btn-sm">Asignar Representante</a>
                   </td>
                </tr>
                @endforeach
                </tbody>
              </table>
              <div style="padding: 10px; float: right;">
                
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        @endif

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Listado de Representante</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Imagen</th>
                    <th>Estudiante</th>
                    <th>Email</th>
                    <th>Representante</th>
                    <th>F.Creacion</th>
                    <th>Accion</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($getRecord as $value)
                  <tr>
                    <td>{{ $value->id}}</td>
                    <td>
                     @if(!empty($value->getProfile()))
                     <img src="{{ $value->getProfile() }}" alt="" style="width: 50px;height: 50px; border-radius: 50px;">
                     @endif
                   </td>
                   <td>{{ $value->name}} {{ $value->last_name}}</td>
                   <td>{{ $value->email}}</td>
                   <td>{{ $value->parent_name}}</td>
                   <td>{{ date('d-m-Y h:i A', strtotime($value->created_at)) }}</td>
                   <td style="min-width: 150px;">
                    <a href="{{ url('admin/parent/assign_student_parent_delete/'.$value->id)}}" class="btn btn-danger btn-sm">Borrar</a>
                   </td>
                </tr>
                @endforeach
                </tbody>
              </table>
              <div style="padding: 10px; float: right;">
                
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

