<!DOCTYPE html>
<html>
<head>
<base href="{{asset('public/layout/backend')}}/">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Register</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<div class="row">
			<div class="clearfix"></div>
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				@if(Session::has('thanhcong'))
						<div class="alert alert-success">{{Session::get('thanhcong')}}</div>
				@endif
				<div class="panel-heading">Đăng ký</div>
				<div class="panel-body">
					<form role="form" method="post" action="{{route('signin')}}">
						<fieldset>
							@include('errors.note')
							<div class="form-group">
								<label for="email">Email*</label>
								<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="" value="{{old('email')}}" required>
							</div>
							<div class="form-group">
								<label for="username">Username*</label>
								<input class="form-control" placeholder="Username" name="username" type="text" value="" required>
							</div>
							<div class="form-group">
								<label for="password">Password*</label>
								<input class="form-control" placeholder="Password" name="password" type="password" value="" required>
							</div>
							<div class="form-group">
								<label for="fullname">Fullname*</label>
								<input class="form-control" placeholder="Fullname" name="fullname" type="text" value="" required>
							</div>
							<div class="form-group">
                				<label>Level*</label>
                    			<select name="level" class="form-control">
                        		<option value="" selected="selected">2</option>
                    			</select>
                			</div>
                			<div class="form-group">
								<label for="address">Address*</label>
								<input class="form-control" placeholder="Address" name="address" type="text" value="" required>
							</div>
							<div class="form-group">
								<label for="phone">Phone*</label>
								<input class="form-control" placeholder="Phone" name="phone" type="text" value="" required>
							</div>
							<input type="submit" name="submit" value="Đăng ký" class="btn btn-primary">
							<a href="{{asset('/dang-nhap')}}" class="btn btn-danger">Hủy bỏ</a>
						</fieldset>
						{{csrf_field()}}
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
		

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
