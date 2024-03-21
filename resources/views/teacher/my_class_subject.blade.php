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
          <h1>Mi Clase & Materia</h1>
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
              <h3 class="card-title">Mi Clase & Materia</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Nombre de clase</th>
                    <th>Nombre de Materia</th>
                    <th>Tipo de Materia</th>
                    <th>F.Creacion</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($getRecord as $value)
                 <tr>
                  <td>{{ $value->class_name}}</td>                  
                  <td>{{ $value->subject_name}}</td>                  
                  <td>{{ $value->subject_type}}</td> 
                  <td>{{ date('d-m-Y h:i A', strtotime($value->created_at)) }}</td>
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

