@extends('layouts.app')

@section('style')

@endsection
@section('content')

<div class="content-wrapper">

	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-12">
					<h1>Editar Administrador</h1>
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
								<input type="text" class="form-control" value="{{ $getRecord->name }}" name="name" required placeholder="Ingrese Nombre">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="email" class="form-control" value="{{ $getRecord->email }}" name="email" required placeholder="Ingrese email">
								<div style="color: red;">{{ $errors->first('email') }}</div>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" name="password" placeholder="Ingrese Clave">
								<p>Si desea cambiar la contraseña, agregue una nueva</p>
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