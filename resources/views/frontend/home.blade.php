@extends('frontend.master')
@section('title','Trang chủ')
@section('main')
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
						<div class="products">
							<h3>sản phẩm nổi bật</h3>
							<div class="product-list row">
							@foreach($featured as $item)
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img src="{{asset('./storage/app/avatar/'.$item->img)}}" class="img-thumbnail"></a>
									<p><a href="#">{{$item->name}}</a></p>
									<p class="price">{{number_format($item->price,0,',','.')}} VND</p>	  
									<div class="marsk">
										<a href="{{asset('detail/'.$item->prod_id.'/'.$item->slug.'.html')}}">Xem chi tiết</a>
									</div>                                    
								</div>
							@endforeach
						</div>
						<div id="pagination" class="pagination pagination-lg justify-content-center">{{$featured->links()}}</div>	

						<div class="products">
							<h3>sản phẩm mới</h3>
							<div class="product-list row">
							@foreach($new as $item)
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img src="{{asset('./storage/app/avatar/'.$item->img)}}" class="img-thumbnail"></a>
									<p><a href="#">{{$item->name}}</a></p>
									<p class="price">{{number_format($item->price,0,',','.')}} VND</p>	  
									<div class="marsk">
										<a href="{{asset('detail/'.$item->prod_id.'/'.$item->slug.'.html')}}">Xem chi tiết</a>
									</div>                      	                        
								</div>
							@endforeach
							</div>    
							<div id="pagination" class="pagination pagination-lg justify-content-center">{{$new->links()}}</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@stop
	