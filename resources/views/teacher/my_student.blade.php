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
          <h1>Listado de mis estudiantes</h1>
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
              <h3 class="card-title">Mis Estudiantes</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0" style="overflow: auto;">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Imagen</th>
                    <th>Nombre Estudiante</th>
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
                    <th>F.Creacion</th>
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
                  <td>{{ date('d-m-Y h:i A', strtotime($value->created_at)) }}</td>
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

