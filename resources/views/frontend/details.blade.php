@extends('frontend.master')
@section('title','Chi tiết sản phẩm')
@section('main')
<link rel="stylesheet" href="css/details.css">	
<!-- main -->
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
						<div id="product-info">
							<div class="clearfix"></div>
							<h3>{{$item->name}}</h3>
							<div class="row">
								<div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
									<img width="200px" src="{{asset('./storage/app/avatar/'.$item->img)}}">
								</div>
								<div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
									<p>Giá: <span class="price">{{number_format($item->price,0,',','.')}} VND</span></p>
									<p>Bảo hành: {{$item->warranty}}</p> 
									<p>Phụ kiện: {{$item->accessories}}</p>
									<p>Tình trạng: {{$item->condition}}</p>
									<p>Khuyến mại: {{$item->promotion}}</p>
									<p>Còn hàng: @if($item->status==1) Còn hàng @else Hết hàng @endif</p>
									<p class="add-cart text-center"><a href="{{asset('cart/add/'.$item->prod_id)}}">Đặt hàng online</a></p>
								</div>
							</div>							
						</div>
						<div id="product-detail">
							<h3>Chi tiết sản phẩm</h3>
							<p class="text-justify">{!!$item->description!!}
								</p>
						
						</div>
						<div id="comment">
							<h3>Bình luận</h3>
							<div class="col-md-9 comment">
								<form method="post">
									<div class="form-group">
										<label for="email">Email:</label>
										<input required type="email" class="form-control" id="email" name="email">
									</div>
									<div class="form-group">
										<label for="name">Tên:</label>
										<input required type="text" class="form-control" id="name" name="name">
									</div>
									<div class="form-group">
										<label for="cm">Bình luận:</label>
										<textarea required rows="10" id="cm" class="form-control" name="content"></textarea>
									</div>
									<div class="form-group text-right">
										<button type="submit" class="btn btn-default">Gửi</button>
									</div>
									{{csrf_field()}}
								</form>
							</div>
						</div>
						<div id="comment-list">
						@foreach($comments as $comment)
							<ul>
								<li class="com-title">
									{{$comment->com_name}}
									<br>
									<span>{{date('d/m/y H:i',strtotime($comment->created_at))}}</span>	
								</li>
								<li class="com-details">
									{{$comment->com_content}}
								</li>
							</ul>
						@endforeach	
						</div>
					</div>					
					<!-- end main -->
				</div>
			</div>
		</div>
</section>
<!-- endmain -->
@stop