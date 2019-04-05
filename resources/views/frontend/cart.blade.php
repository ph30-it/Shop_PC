@extends('frontend.master')
@section('title','Giỏ hàng')
@section('main')
<link rel="stylesheet" href="css/cart.css">
<script type="text/javascript">
	function updateCart(qty,rowId){
		$.get(
			'{{asset('cart/update')}}',
			{qty:qty,rowId:rowId},
			function(){
				location.reload();
			}
			);
		
	}
</script>
	<section id="body">
		<div class="container">
			<div class="row">
				<div id="sidebar" class="col-md-3">
					<nav id="menu">
						<ul>
							<li class="menu-item">danh mục sản phẩm</li>
							@foreach($categories as $cate)
							<li class="menu-item"><a href="{{asset('category/'.$cate->cate_id.'/'.$cate->cate_slug.'.html')}}" title="">{{$cate->cate_name}}</a></li>
							@endforeach						
						</ul>
						<!-- <a href="#" id="pull">Danh mục</a> -->
					</nav>

					<div id="banner-l" class="text-center">
						<div class="banner-l-item">
							<a href="#"><img src="img/home/ban1.png" width="260px"height="150px" alt="" ></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="img/home/ban2.png" width="260px"height="150px" alt="" ></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="img/home/ban3.png" width="260px"height="150px" alt="" ></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="img/home/ban4.png" width="260px"height="150px" alt="" ></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="img/home/ban5.png" width="260px"height="150px" alt="" ></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="img/home/ban6.png" width="260px"height="150px" alt="" ></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="img/home/ban7.png" width="260px"height="150px" alt="" ></a>
						</div>
					</div>
				</div>

				<div id="main" class="col-md-9">
					<!-- main -->
					<!-- phan slide la cac hieu ung chuyen dong su dung jquey -->
					<div id="slider">
						<div id="demo" class="carousel slide" data-ride="carousel">

							<!-- Indicators -->
							<ul class="carousel-indicators">
								<li data-target="#demo" data-slide-to="0" class="active"></li>
								<li data-target="#demo" data-slide-to="1"></li>
								<li data-target="#demo" data-slide-to="2"></li>
								<li data-target="#demo" data-slide-to="3"></li>
								<li data-target="#demo" data-slide-to="4"></li>
								<li data-target="#demo" data-slide-to="5"></li>
								<li data-target="#demo" data-slide-to="6"></li>
							</ul>

							<!-- The slideshow -->
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="img/home/slide1.png" alt="" >
								</div>
								<div class="carousel-item">
									<img src="img/home/slide2.png" alt="">
								</div>
								<div class="carousel-item">
									<img src="img/home/slide3.png" alt="" >
								</div>
								<div class="carousel-item">
									<img src="img/home/slide4.png" alt="" >
								</div>
								<div class="carousel-item">
									<img src="img/home/slide5.png" alt="" >
								</div>
								<div class="carousel-item">
									<img src="img/home/slide6.png" alt="" >
								</div>
								<div class="carousel-item">
									<img src="img/home/slide7.png" alt="" >
								</div>
							</div>

							<!-- Left and right controls -->
							<a class="carousel-control-prev" href="#demo" data-slide="prev">
								<span class="carousel-control-prev-icon"></span>
							</a>
							<a class="carousel-control-next" href="#demo" data-slide="next">
								<span class="carousel-control-next-icon"></span>
							</a>
						</div>
					</div>

					<div id="banner-t" class="text-center">
						<div class="row">
							<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
								<a href="#"><img src="img/home/banner1.png" alt="" class="img-thumbnail"></a>
							</div>
							<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
								<a href="#"><img src="img/home/banner2.png" alt="" class="img-thumbnail"></a>
							</div>
						</div>					
					</div>

					<div id="wrap-inner">
						<div id="list-cart">
							<div class="col-md-12">
								<div class="clearfix"></div>
							<h3>Giỏ hàng</h3>
							@if(Cart::count()==1)
							<form>
								<table class="table table-bordered .table-responsive text-center">
									<tr class="active">
										<td width="11.111%">Ảnh mô tả</td>
										<td width="22.222%">Tên sản phẩm</td>
										<td width="22.222%">Số lượng</td>
										<td width="16.6665%">Đơn giá</td>
										<td width="16.6665%">Thành tiền</td>
										<td width="11.112%">Xóa</td>
									</tr>
									@foreach($items as $item)
									<tr>
										<td><img width="200px" class="img-responsive" src="{{asset('./storage/app/avatar/'.$item->options->img)}}"></td>
										<td>{{$item->name}}</td>
										<td>
											<div class="form-group">
												<input class="form-control" type="number" value="{{$item->qty}}" onchange="updateCart(this.value,'{{$item->rowId}}')">
											</div>
										</td>
										<td><span class="price">{{number_format($item->price,0,',','.')}} đ</span></td>
										<td><span class="price">{{number_format($item->price*$item->qty,0,',','.')}} đ</span></td>
										<td><a href="{{asset('cart/delete/'.$item->rowId)}}"><span class="glyphicon glyphicon-remove">Xóa</span></a></td>
									</tr>
									@endforeach
								</table>
								<div class="row" id="total-price">
									<div class="col-md-6 col-sm-12 col-xs-12">										
											Tổng thanh toán: <span class="total-price">{{$total}} đ</span>
																													
									</div>
									<div class="col-md-6 col-sm-12 col-xs-12">
										<a href="" class="my-btn btn">Mua tiếp</a>
										<a href="" class="my-btn btn">Cập nhật</a>
										<a href="{{asset('cart/delete/all')}}" class="my-btn btn">Xóa giỏ hàng</a>
									</div>
								</div>
							</form>             	                	
						</div>
						<div id="xac-nhan" class="col-md-12">
							<h3>Xác nhận mua hàng</h3>
							<form method="post">
								<div class="form-group">
									<label for="email">Email address:</label>
									<input required type="email" class="form-control" id="email" name="email">
								</div>
								<div class="form-group">
									<label for="name">Họ và tên:</label>
									<input required type="text" class="form-control" id="name" name="name">
								</div>
								<div class="form-group">
									<label for="phone">Số điện thoại:</label>
									<input required type="number" class="form-control" id="phone" name="phone">
								</div>
								<div class="form-group">
									<label for="add">Địa chỉ:</label>
									<input required type="text" class="form-control" id="add" name="add">
								</div>
								<div class="form-group text-right">
									<button type="submit" class="btn btn-default">Thực hiện đơn hàng</button>
								</div>
								{{csrf_field()}}
							</form>
						</div>
						@else
							<h2>Giỏ hàng rỗng!</h2>
						@endif
					</div>
					</div>

					
					<!-- end main -->
				</div>
			</div>
		</div>
	</section>
	<!-- endmain -->
@stop
