@extends('layouts.app')

@section('content')

<div class="clearfix"></div>
			
<!-- Title Header Start -->
<section class="login-plane-sec">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="login-panel panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">دخول ( شركة )</h3>
					</div>
					<div class="panel-body">
						<form action="{{ route('company.login') }}" role="form" class="login-form" method="POST">
                            @csrf <!-- Add CSRF token for security -->
							<fieldset>
								<div class="form-group">
									<input class="form-control" placeholder="البريد الإلكتروني" name="email" type="email" autofocus>
								</div>
								@error('email')
									<div class="alert alert-danger" role="alert">
										<strong>{{ $message ?? 'البريد الإلكتروني غير صحيح' }}</strong>
									</div>
								@enderror
								<div class="form-group">
									<input class="form-control" placeholder="كلمة المرور" name="password" type="password" value="">
								</div>
								@error('password')
									<div class="alert alert-danger" role="alert">
										<strong>{{ $message ?? 'كلمة المرور غير صحيحة' }}</strong>
									</div>
								@enderror
								
                                <input type="submit" name="submit" value="دخول" class="btn btn-login">
                                <br>
                                <p>ليس لديك حساب <a href="{{ route('get-company.register') }}" class="cl-success">اضغط هنا </a></p>
							</fieldset>
						</form>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection
