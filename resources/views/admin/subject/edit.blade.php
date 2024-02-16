@extends('layouts.app')

@section('style')

@endsection
@section('content')

<div class="content-wrapper">

	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-12">
					<h1>Editar Materia</h1>
				</div>
			</div>
		</div>
	</section>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-primary">
					<form action="" method="post">
						{{ csrf_field() }}
						<div class="card-body">
							<div class="form-group">
								<label>Nombre</label>
								<input type="text" class="form-control" value="{{ $getRecord->name }}" name="name" required placeholder="Ingrese Materia">
							</div>
							<div class="form-group">
								<label>Tipo de Materia</label>
								<select class="form-control" name="type">
									<option {{ ($getRecord->status == "Teoria") ? 'selected' : '' }} value="Teoria">Teoria</option>
									<option {{ ($getRecord->status == "Practica") ? 'selected' : '' }} value="Practica">Practica</option>									
								</select>
							</div>
							<div class="form-group">
								<label>Status</label>
								<select class="form-control" name="status" required>
									<option {{ ($getRecord->status == 0) ? 'selected' : '' }} value="0">Activo</option>
									<option {{ ($getRecord->status == 1) ? 'selected' : '' }} value="1">Inactivo</option>									
								</select>
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