@extends('layouts.app')

@section('style')

@endsection
@section('content')

<div class="content-wrapper">

	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-12">
					<h1>Agregar Nuevo Estudiante</h1>
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
								</div>

								<div class="form-group col-md-6">
									<label>Apellido <span style="color: red;">*</span></label>
									<input type="text" class="form-control" value="{{ old('last_name') }}" name="last_name" required  placeholder="Ingrese Apellido">
								</div>

								<div class="form-group col-md-6">
									<label>Nro Admision <span style="color: red;">*</span></label>
									<input type="text" class="form-control" value="{{ old('admission_number') }}" name="admission_number" required  placeholder="Ingrese Nro de admision">
								</div>

								<div class="form-group col-md-6">
									<label>Nro Roll <span style="color: red;">*</span></label>
									<input type="text" class="form-control" value="{{ old('roll_number') }}" name="roll_number"  placeholder="Ingrese Nro de rol">
								</div>

								<div class="form-group col-md-6">
									<label>Clase <span style="color: red;">*</span></label>
										<select class="form-control" name="class_id" required>
											<option value="">Seleccione Clase</option>
											@foreach($getClass as $value)
                       <option value="{{ $value->id }}">{{ $value->name }}</option>
											@endforeach
									  </select>
								</div>

								<div class="form-group col-md-6">
									<label>Sexo <span style="color: red;">*</span></label>
										<select name="gender" class="form-control" required>
											<option value="">Seleccione Sexo</option>
											<option value="Masculino">Masculino</option>
											<option value="Femenino">Femenino</option>
									  </select>
								</div>

								<div class="form-group col-md-6">
									<label>Fecha de Nacimiento <span style="color: red;">*</span></label>
									<input type="date" class="form-control" value="{{ old('date_of_birth') }}" name="date_of_birth" required>
								</div>

								<div class="form-group col-md-6">
									<label>Caste <span style="color: red;"></span></label>
									<input type="text" class="form-control" value="{{ old('caste') }}" name="caste" placeholder="Ingrese Caste">
								</div>

								<div class="form-group col-md-6">
									<label>Religion <span style="color: red;"></span></label>
									<input type="text" class="form-control" value="{{ old('religion') }}" name="religion" placeholder="Ingrese Religion">
								</div>

								<div class="form-group col-md-6">
									<label>Telefono <span style="color: red;"></span></label>
									<input type="text" class="form-control" value="{{ old('mobil_number') }}" name="mobil_number" placeholder="Ingrese Telefono">
								</div>

								<div class="form-group col-md-6">
									<label>Fecha de Admision <span style="color: red;">*</span></label>
									<input type="date" class="form-control" value="{{ old('admission_date') }}" name="admission_date" required>
								</div>

								<div class="form-group col-md-6">
									<label>Foto <span style="color: red;"></span></label>
									<input type="file" class="form-control" name="profile_pic">
								</div>

								<div class="form-group col-md-6">
									<label>Grupo Sanguineo <span style="color: red;"></span></label>
									<input type="text" class="form-control" value="{{ old('blood_group') }}"  name="blood_group" placeholder="Ingrese Grupo Sanguineo">
								</div>

								<div class="form-group col-md-6">
									<label>Estatura <span style="color: red;"></span></label>
									<input type="text" class="form-control" value="{{ old('height') }}" name="height" placeholder="Ingrese Estatura">
								</div>

								<div class="form-group col-md-6">
									<label>Peso <span style="color: red;"></span></label>
									<input type="text" class="form-control" value="{{ old('weight') }}" name="weight" placeholder="Ingrese Peso">
								</div>

								<div class="form-group col-md-6">
									<label>Status <span style="color: red;">*</span></label>
										<select name="status" class="form-control" required>
											<option value="">Seleccione Status</option>
											<option value="0">Activo</option>
											<option value="1">Inactivo</option>
									  </select>
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