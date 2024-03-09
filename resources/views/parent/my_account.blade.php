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
										<label>Ocupacion <span style="color: red;"></span></label>
										<input type="text" class="form-control" value="{{ old('occupation', $getRecord->occupation) }}" name="occupation" placeholder="Ingrese Ocupacion">
										<div style="color: red;">{{ $errors->first('occupation') }}</div>
									</div>

									<div class="form-group col-md-6">
										<label>Telefono <span style="color: red;">*</span></label>
										<input type="text" class="form-control" required value="{{ old('mobil_number', $getRecord->mobil_number) }}" name="mobil_number" placeholder="Ingrese Telefono">
										<div style="color: red;">{{ $errors->first('mobil_number') }}</div>
									</div>

									<div class="form-group col-md-6">
										<label>Direccion <span style="color: red;">*</span></label>
										<input type="text" class="form-control" required value="{{ old('address', $getRecord->address) }}" name="address" placeholder="Ingrese Direccion">
										<div style="color: red;">{{ $errors->first('address') }}</div>
									</div>

									

									<div class="form-group col-md-6">
										<label>Foto <span style="color: red;"></span></label>
										<input type="file" class="form-control" name="profile_pic">
										<div style="color: red;">{{ $errors->first('profile_pic') }}</div>
										@if(!empty($getRecord->getProfile()))
                       <img src="{{ $getRecord->getProfile() }}" alt="" style="width: auto;height: 50px;">
										@endif
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