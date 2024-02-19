@extends('layouts.app')

@section('style')

@endsection
@section('content')

<div class="content-wrapper">

	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-12">
					<h1>Cambio de Clave</h1>
				</div>
			</div>
		</div>
	</section>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">					
				@include('_message')
					<div class="card card-primary">
					<form action="" method="post">
						{{ csrf_field() }}
						<div class="card-body">
							<div class="form-group">
								<label>Clave Actual</label>
								<input type="password" class="form-control" name="old_password" required  placeholder="Ingrese Clave Actual">
							</div>
							<div class="form-group">
								<label>Nueva Clave</label>
								<input type="password" class="form-control" name="new_password" required  placeholder="Ingrese Nueva Clave">
							</div>
														
						</div>
						<!-- /.card-body -->

						<div class="card-footer">
							<button type="submit" class="btn btn-primary">Actualizar</button>
						</div>
					</form>
				</div>
				</div>
			</div>
		</div>
	</section>

</div>

@endsection

@section('script')

@endsection