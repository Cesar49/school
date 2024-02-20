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
          <h1>Listado de Estudiantes ( Total: {{ $getRecord->total() }} )</h1>
        </div>
        <div class="col-sm-6" style="text-align: right;">
          <a href="{{ url('admin/student/add') }}" class="btn btn-primary">Agregar Nuevo Administrador</a>
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
                    <label>Nro Admision</label>
                    <input type="text" class="form-control" value="{{ Request::get('admission_number') }}" name="admission_number" placeholder="Ingrese Nro de admision">
                    <div style="color: red;">{{ $errors->first('admission_number') }}</div>
                  </div>
                  <div class="form-group col-md-2">
                    <label>Nro Rol</label>
                    <input type="text" class="form-control" value="{{ Request::get('roll_number') }}" name="roll_number" placeholder="Ingrese Rol">
                    <div style="color: red;">{{ $errors->first('roll_number') }}</div>
                  </div>
                  <div class="form-group col-md-2">
                    <label>Clase</label>
                    <input type="text" class="form-control" value="{{ Request::get('class') }}" name="class" placeholder="Ingrese Clase">
                    <div style="color: red;">{{ $errors->first('class') }}</div>
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
                    <label>Caste</label>
                    <input type="text" class="form-control" value="{{ Request::get('caste') }}" name="caste" placeholder="Ingrese Caste">
                    <div style="color: red;">{{ $errors->first('caste') }}</div>
                  </div>
                  <div class="form-group col-md-2">
                    <label>Religion</label>
                    <input type="text" class="form-control" value="{{ Request::get('religion') }}" name="religion" placeholder="Ingrese Religion">
                    <div style="color: red;">{{ $errors->first('religion') }}</div>
                  </div>
                  <div class="form-group col-md-2">
                    <label>Telefono</label>
                    <input type="text" class="form-control" value="{{ Request::get('mobil_number') }}" name="mobil_number" placeholder="Ingrese Telefono">
                    <div style="color: red;">{{ $errors->first('mobil_number') }}</div>
                  </div>
                   <div class="form-group col-md-2">
                    <label>Sangre</label>
                    <input type="text" class="form-control" value="{{ Request::get('blood_group') }}" name="blood_group" placeholder="Ingrese Tipo sangre">
                    <div style="color: red;">{{ $errors->first('blood_group') }}</div>
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
                    <label>Fecha Admision</label>
                    <input type="date" class="form-control" value="{{ Request::get('admission_date') }}" name="admission_date">
                    <div style="color: red;">{{ $errors->first('admission_date') }}</div>
                  </div>
                  <div class="form-group col-md-2">
                    <label>Fecha Creacion</label>
                    <input type="date" class="form-control" value="{{ Request::get('date_created') }}" name="date_created">
                    <div style="color: red;">{{ $errors->first('date') }}</div>
                  </div>
                  <div class="form-group col-md-2">
                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;"> Buscar</button>
                    <a href="{{ url('admin/student/list') }}" class="btn btn-success" style="margin-top: 30px;"> Limpiar</a>
                  </div>
                </div>

              </div>
              <!-- /.card-body -->
            </form>
          </div>
          @include('_message')
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Listado de Estudiantes</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0" style="overflow: auto;">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>N.Admision</th>
                    <th>Rol</th>
                    <th>Clase</th>
                    <th>Sexo</th>
                    <th>F.Nac</th>
                    <th>Casta</th>
                    <th>Religion</th>
                    <th>Telefono</th>
                    <th>F.Admision</th>
                    <th>Sangre</th>
                    <th>Estatura</th>
                    <th>Peso</th>
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
                   <td>{{ $value->admission_number}}</td>
                   <td>{{ $value->roll_number}}</td>
                   <td>{{ $value->class_name}}</td>
                   <td>{{ $value->gender}}</td>
                   <td>
                    @if(!empty($value->date_of_birth))
                    {{ date('d-m-Y', strtotime($value->date_of_birth)) }}
                    @endif
                  </td>
                  <td>{{ $value->caste}}</td>
                  <td>{{ $value->religion}}</td>
                  <td>{{ $value->mobil_number}}</td>
                  <td>
                    @if(!empty($value->admission_date))
                    {{ date('d-m-Y', strtotime($value->admission_date)) }}
                    @endif
                  </td>
                  <td>{{ $value->blood_group}}</td>
                  <td>{{ $value->height}}</td>
                  <td>{{ $value->wight}}</td>
                  <td>{{ ($value->status == 0) ? 'Activo' : 'Inactivo'}}</td>
                  <td>{{ date('d-m-Y h:i A', strtotime($value->created_at)) }}</td>
                  <td style="min-width: 150px;">
                    <a href="{{ url('admin/student/edit/'.$value->id)}}" class="btn btn-primary btn-sm">Editar</a>
                    <a href="{{ url('admin/student/delete/'.$value->id)}}" class="btn btn-danger btn-sm">Borrar</a>
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

