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
          <h1>Listado de Representantes ( Total: {{ $getRecord->total() }} )</h1>
        </div>
        <div class="col-sm-6" style="text-align: right;">
          <a href="{{ url('admin/parent/add') }}" class="btn btn-primary">Agregar Nuevo Representante</a>
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
              <h3 class="card-title">Buscar Representante</h3>
            </div>
            <form action="" method="get">
              <div class="card-body">
                <div class="row">
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
                    <label>Sexo</label>
                    <select name="gender" class="form-control">
                      <option value="">Seleccione Sexo</option>
                      <option {{ (Request::get('gender') == 'Masculino') ? 'selected' : '' }} value="Masculino">Masculino</option>
                      <option {{ (Request::get('gender') == 'Femenino') ? 'selected' : '' }} value="Femenino">Femenino</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <label>Ocupacion</label>
                    <input type="text" class="form-control" value="{{ Request::get('occupation') }}" name="occupation" placeholder="Ingrese Ocupation">
                    <div style="color: red;">{{ $errors->first('occupation') }}</div>
                  </div>
                  <div class="form-group col-md-2">
                    <label>Direccion</label>
                    <input type="text" class="form-control" value="{{ Request::get('address') }}" name="address" placeholder="Ingrese Direccion">
                    <div style="color: red;">{{ $errors->first('address') }}</div>
                  </div>
                  <div class="form-group col-md-2">
                    <label>Telefono</label>
                    <input type="text" class="form-control" value="{{ Request::get('mobil_number') }}" name="mobil_number" placeholder="Ingrese Telefono">
                    <div style="color: red;">{{ $errors->first('mobil_number') }}</div>
                  </div>
                  <div class="form-group col-md-2">
                    <label>Status</label>
                    <select name="status" class="form-control">
                      <option value="">Seleccione Status</option>
                      <option {{ (Request::get('status') == 0) ? 'selected' : '' }} value="0">Activo</option>
                      <option {{ (Request::get('status') == 1) ? 'selected' : '' }} value="1">Inactivo</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <label>Fecha Creacion</label>
                    <input type="date" class="form-control" value="{{ Request::get('date_created') }}" name="date_created">
                    <div style="color: red;">{{ $errors->first('date') }}</div>
                  </div>
                  <div class="form-group col-md-2">
                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;"> Buscar</button>
                    <a href="{{ url('admin/parent/list') }}" class="btn btn-success" style="margin-top: 30px;"> Limpiar</a>
                  </div>
                </div>

              </div>
              <!-- /.card-body -->
            </form>
          </div>

          @include('_message')
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
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Sexo</th>
                    <th>Telefono</th>
                    <th>Ocupacion</th>
                    <th>Direccion</th>
                    <th>Status</th>
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
                    <td>{{ $value->gender}}</td>
                    <td>{{ $value->mobil_number}}</td>
                    <td>{{ $value->occupation}}</td>
                    <td>{{ $value->address}}</td>
                    <td>{{ ($value->status == 0) ? 'Activo' : 'Inactivo'}}</td>
                    <td>{{ date('d-m-Y h:i A', strtotime($value->created_at)) }}</td>
                    <td>
                      <a href="{{ url('admin/parent/edit/'.$value->id)}}" class="btn btn-primary btn-sm">Editar</a>
                      <a href="{{ url('admin/parent/delete/'.$value->id)}}" class="btn btn-danger btn-sm">Borrar</a>
                      <a href="{{ url('admin/parent/my-student/'.$value->id)}}" class="btn btn-danger btn-sm">Estudiante</a>
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

