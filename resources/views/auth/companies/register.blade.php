@extends('layouts.app')

@section('content')

<!-- Title Header Start -->
			<section class="login-plane-sec" style="background: #eee">
				<div class="container">
					<div class="row">
						
						<!-- Register -->
						<div class="col-md-6 col-sm-6 col-md-offset-3">
							<div class="sidebar-wrapper">
							
							<div class="sidebar-box-header bb-1">
								<h4>تسجيل حساب جديد (شركة)</h4>
							</div>
							
							<div class="reg-form">
                                <div class="row">
									<div class="col-xs-6">
										<label> اسم المستخدم   </label>
										<input type="text" class="form-control" />
									</div>
                                     <div class="col-xs-6">
										<label> كلمة المرور    </label>
										<input type="password" class="form-control" />
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<label>اسم الشركة</label>
										<input type="text" class="form-control" />
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6">
										<label>المحافظة </label>
										<select class="form-control" name="state">
                                            <option value="">--- اختر ---</option>
                                            <option value="1">الغربية</option>
                                            <option value="2">المنوفية</option>
                                            <option value="3">القاهرة</option>
                                            <option value="4">الاسكندرية</option>
                                            <option value="5">الدقهلية</option>
                                            <option value="6">الشرقية</option>
                                            <option value="7">الاسماعيلية	</option>
                                        </select>
									</div>
									<div class="col-xs-6">
										<label>المدينة </label>
										<input type="text" class="form-control" />
									</div>
								</div>
                                <div class="row">
									<div class="col-xs-12">
										<label> العنوان  </label>
										<input type="email" class="form-control" />
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6">
										<label> البريد الالكتروني </label>
										<input type="email" class="form-control" />
									</div>
									<div class="col-xs-6">
										<label> التليفون </label>
										<input type="text" class="form-control" />
									</div>
								</div>
                                <div class="row">
									<div class="col-xs-12">
										<label> مجال العمل  </label>
										
                                        <select class="form-control select2" multiple="multiple" data-placeholder=" مجال العمل "
                                                style="width: 100%;">
										<option value="1">Information Technology</option>
										<option value="2">Mechanical</option>
										<option value="3">Hardware</option>
										<option value="4">Hospitality & Tourism</option>
										<option value="5">Education & Training</option>
										<option value="6">Government & Public</option>
										<option value="7">Architecture</option>
                                        </select>
									</div>
								</div>
                                <div class="row">
									<div class="col-xs-12">
										<label> السجل التجاري  </label>
										<input type="text" class="form-control" />
									</div>
								</div>
                                <div class="row">
									<div class="col-xs-12">
										<label> البطاقة الضريبية  </label>
                                        <input type="file" name="TaxCard" class="form-control">
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<label> لوجو الشركة </label>
                                        <input type="file" name="CoLogo" class="form-control">
									</div>
								</div>
                                
								<div class="row mrg-top-30">
									<div class="col-md-12 text-center">
										<a href="#" class="btn btn-success">تسجيل</a>
									</div>
								</div>
                                
								<div class="row">
									<div class="col-xs-12 mrg-top-5 text-right">
										 لديك حساب بالفعل <a href="login-company.html" class="cl-success"> دخول </a>
									</div>
								</div>
							</div>
							
							</div>
						</div>
						
					</div>
					
				</div>
			</section>
            
@endsection
