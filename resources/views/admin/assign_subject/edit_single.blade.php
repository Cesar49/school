@extends('layouts.app')

@section('style')

@endsection
@section('content')

<div class="content-wrapper">

	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-12">
					<h1>Editar Asignacion Materia</h1>
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
									<label>Nombre de la Clase</label>
									<select name="class_id" class="form-control" required>
										<option value="">Seleccione Clase</option>
										@foreach($getClass as $class)
										<option {{ ($getRecord->class_id == $class->id) ? 'selected' : ''}} value="{{ $class->id }}">{{ $class->name }}</option>
										@endforeach
									</select>
								</div>

								<div class="form-group">
									<label>Nombre de la Materia</label>
									<select name="subject_id" class="form-control" required>
										<option value="">Seleccione Materia</option>
										@foreach($getSubject as $subject)
										<option {{ ($getRecord->subject_id == $subject->id) ? 'selected' : ''}} value="{{ $subject->id }}">{{ $subject->name }}</option>
										@endforeach
									</select>
								</div>

								

								<div class="form-group">
									<label>Status</label>
									<select name="status" class="form-control">
										<option {{ ($getRecord->status == 0) ? 'selected' : ''}} value="0">Activa</option>
										<option {{ ($getRecord->status == 1) ? 'selected' : ''}} value="1">Inactiva</option>
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