@extends('layouts.app')

@section('style')

@endsection
@section('content')

<div class="content-wrapper">

	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-12">
					<h1>Agregar Nueva Materia</h1>
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
								<label>Nombre de Materia</label>
								<input type="text" class="form-control" name="name" required  placeholder="Ingrese Nombre de Clase">
							</div>
							<div class="form-group">
								<label>Tipo de Materia</label>
								<select name="type" class="form-control" required>
									<option value="">Seleccione</option>
									<option value="Teoria">Teoria</option>
									<option value="Practica">Practica</option>
								</select>
							</div>
							<div class="form-group">
								<label>Status</label>
								<select name="status" class="form-control">
									<option value="0">Activa</option>
									<option value="1">Inactiva</option>
								</select>
							</div>
														
						</div>
						<!-- /.card-body -->

						<div class="card-footer">
							<button type="submit" class="btn btn-primary">Registrar</button>
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