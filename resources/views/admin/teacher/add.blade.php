@extends('layouts.app')

@section('style')

@endsection
@section('content')

<div class="content-wrapper">

	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-12">
					<h1>Agregar Nuevo Docente</h1>
				</div>
			</div>
		</div>
	</section>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-primary">
						<form action="" method="post" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="card-body">
								<div class="row">

									<div class="form-group col-md-6">
										<label>Nombre <span style="color: red;">*</span></label>
										<input type="text" class="form-control" value="{{ old('name') }}" name="name" required  placeholder="Ingrese Nombre">
										<div style="color: red;">{{ $errors->first('name') }}</div>
									</div>

									<div class="form-group col-md-6">
										<label>Apellido <span style="color: red;">*</span></label>
										<input type="text" class="form-control" value="{{ old('last_name') }}" name="last_name" required  placeholder="Ingrese Apellido">
										<div style="color: red;">{{ $errors->first('last_name') }}</div>
									</div>

									<div class="form-group col-md-6">
										<label>Sexo <span style="color: red;">*</span></label>
										<select name="gender" class="form-control" required>
											<option value="">Seleccione Sexo</option>
											<option {{ (old('gender') == 'Masculino') ? 'selected' : '' }} value="Masculino">Masculino</option>
											<option {{ (old('gender') == 'Femenino') ? 'selected' : '' }} value="Femenino">Femenino</option>
										</select>
										<div style="color: red;">{{ $errors->first('gender') }}</div>
									</div>

									<div class="form-group col-md-6">
										<label>Fecha de Nacimiento <span style="color: red;">*</span></label>
										<input type="date" class="form-control" value="{{ old('date_of_birth') }}" name="date_of_birth" required>
										<div style="color: red;">{{ $errors->first('date_of_birth') }}</div>
									</div>

									<div class="form-group col-md-6">
										<label>Fecha de Admision <span style="color: red;">*</span></label>
										<input type="date" class="form-control" value="{{ old('admission_date') }}" name="admission_date" required>
										<div style="color: red;">{{ $errors->first('admission_date') }}</div>
									</div>

									<div class="form-group col-md-6">
										<label>Telefono <span style="color: red;"></span></label>
										<input type="text" class="form-control" value="{{ old('mobil_number') }}" name="mobil_number" placeholder="Ingrese Telefono">
										<div style="color: red;">{{ $errors->first('mobil_number') }}</div>
									</div>

									<div class="form-group col-md-6">
										<label>Edo Civil <span style="color: red;"></span></label>
										<input type="text" class="form-control" value="{{ old('marital_status') }}" name="marital_status" placeholder="Ingrese Estado Civl">
										<div style="color: red;">{{ $errors->first('marital_status') }}</div>
									</div>

									<div class="form-group col-md-6">
										<label>Foto <span style="color: red;"></span></label>
										<input type="file" class="form-control" name="profile_pic">
										<div style="color: red;">{{ $errors->first('profile_pic') }}</div>
									</div>

									<div class="form-group col-md-6">
										<label>Direccion actual <span style="color: red;"></span></label>
										<input type="text" class="form-control" value="{{ old('current_address') }}"  name="current_address" placeholder="Ingrese Grupo Sanguineo">
										<div style="color: red;">{{ $errors->first('current_address') }}</div>
									</div>

									<div class="form-group col-md-6">
										<label>Direccion permanente <span style="color: red;"></span></label>
										<input type="text" class="form-control" value="{{ old('permanent_address') }}"  name="permanent_address" placeholder="Ingrese Grupo Sanguineo">
										<div style="color: red;">{{ $errors->first('permanent_address') }}</div>
									</div>

									<div class="form-group col-md-6">
										<label>Calificacion <span style="color: red;"></span></label>
										<input type="text" class="form-control" value="{{ old('height') }}" name="height" placeholder="Ingrese Estatura">
										<div style="color: red;">{{ $errors->first('height') }}</div>
									</div>

									<div class="form-group col-md-6">
										<label>Experiencia <span style="color: red;"></span></label>
										<input type="text" class="form-control" value="{{ old('work_experience') }}" name="work_experience" placeholder="Ingrese Experiencia">
										<div style="color: red;">{{ $errors->first('work_experience') }}</div>
									</div>

									<div class="form-group col-md-6">
										<label>Nota <span style="color: red;"></span></label>
										<input type="text" class="form-control" value="{{ old('note') }}" name="note" placeholder="Ingrese Nota">
										<div style="color: red;">{{ $errors->first('note') }}</div>
									</div>

									<div class="form-group col-md-6">
										<label>Status <span style="color: red;">*</span></label>
										<select name="status" class="form-control" required>
											<option value="">Seleccione Status</option>
											<option {{ (old('status') == 0) ? 'selected' : '' }} value="0"> Activo</option>
											<option {{ (old('status') == 1) ? 'selected' : '' }} value="1"> Inactivo</option>
										</select>
										<div style="color: red;">{{ $errors->first('status') }}</div>
									</div>

								</div>

								<hr />


								<div class="form-group">
									<label>Email <span style="color: red;">*</span></label>
									<input type="email" class="form-control" value="{{ old('email') }}" name="email" required placeholder="Ingrese email">
									<div style="color: red;">{{ $errors->first('email') }}</div>
								</div>
								<div class="form-group">
									<label>Password <span style="color: red;">*</span></label>
									<input type="password" class="form-control" name="password" required placeholder="Ingrese Clave">
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