@extends('layouts.app')

@section('style')

@endsection
@section('content')

<div class="content-wrapper">

	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-12">
					<h1>Mi Cuenta</h1>
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
						<form action="" method="post" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="card-body">
								<div class="row">

									<div class="form-group col-md-6">
										<label>Nombre <span style="color: red;">*</span></label>
										<input type="text" class="form-control" value="{{ old('name', $getRecord->name) }}" name="name" required  placeholder="Ingrese Nombre">
										<div style="color: red;">{{ $errors->first('name') }}</div>
									</div>

									<div class="form-group col-md-6">
										<label>Apellido <span style="color: red;">*</span></label>
										<input type="text" class="form-control" value="{{ old('last_name', $getRecord->last_name) }}" name="last_name" required  placeholder="Ingrese Apellido">
										<div style="color: red;">{{ $errors->first('last_name') }}</div>
									</div>

									<div class="form-group col-md-6">
										<label>Sexo <span style="color: red;">*</span></label>
										<select name="gender" class="form-control" required>
											<option value="">Seleccione Sexo</option>
											<option {{ (old('gender', $getRecord->gender) == 'Masculino') ? 'selected' : '' }} value="Masculino">Masculino</option>
											<option {{ (old('gender', $getRecord->gender) == 'Femenino') ? 'selected' : '' }} value="Femenino">Femenino</option>
										</select>
										<div style="color: red;">{{ $errors->first('gender') }}</div>
									</div>

									<div class="form-group col-md-6">
										<label>Fecha de Nacimiento <span style="color: red;">*</span></label>
										<input type="date" class="form-control" value="{{ old('date_of_birth', $getRecord->date_of_birth) }}" name="date_of_birth" required>
										<div style="color: red;">{{ $errors->first('date_of_birth') }}</div>
									</div>

									<div class="form-group col-md-6">
										<label>Caste <span style="color: red;"></span></label>
										<input type="text" class="form-control" value="{{ old('caste', $getRecord->caste) }}" name="caste" placeholder="Ingrese Caste">
										<div style="color: red;">{{ $errors->first('caste') }}</div>
									</div>

									<div class="form-group col-md-6">
										<label>Religion <span style="color: red;"></span></label>
										<input type="text" class="form-control" value="{{ old('religion', $getRecord->religion) }}" name="religion" placeholder="Ingrese Religion">
										<div style="color: red;">{{ $errors->first('religion') }}</div>
									</div>

									<div class="form-group col-md-6">
										<label>Telefono <span style="color: red;"></span></label>
										<input type="text" class="form-control" value="{{ old('mobil_number', $getRecord->mobil_number) }}" name="mobil_number" placeholder="Ingrese Telefono">
										<div style="color: red;">{{ $errors->first('mobil_number') }}</div>
									</div>

									<div class="form-group col-md-6">
										<label>Foto <span style="color: red;"></span></label>
										<input type="file" class="form-control" name="profile_pic">
										<div style="color: red;">{{ $errors->first('profile_pic') }}</div>
										@if(!empty($getRecord->getProfile()))
                       <img src="{{ $getRecord->getProfile() }}" alt="" style="width: auto;height: 50px;">
										@endif
									</div>

									<div class="form-group col-md-6">
										<label>Grupo Sanguineo <span style="color: red;"></span></label>
										<input type="text" class="form-control" value="{{ old('blood_group', $getRecord->blood_group) }}"  name="blood_group" placeholder="Ingrese Grupo Sanguineo">
										<div style="color: red;">{{ $errors->first('blood_group') }}</div>
									</div>

									<div class="form-group col-md-6">
										<label>Estatura <span style="color: red;"></span></label>
										<input type="text" class="form-control" value="{{ old('height', $getRecord->height) }}" name="height" placeholder="Ingrese Estatura">
										<div style="color: red;">{{ $errors->first('height') }}</div>
									</div>

									<div class="form-group col-md-6">
										<label>Peso <span style="color: red;"></span></label>
										<input type="text" class="form-control" value="{{ old('weight', $getRecord->weight) }}" name="weight" placeholder="Ingrese Peso">
										<div style="color: red;">{{ $errors->first('weight') }}</div>
									</div>

								</div>

								<hr />


								<div class="form-group">
									<label>Email <span style="color: red;">*</span></label>
									<input type="email" class="form-control" value="{{ old('email', $getRecord->email) }}" name="email" required placeholder="Ingrese email">
									<div style="color: red;">{{ $errors->first('email') }}</div>
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