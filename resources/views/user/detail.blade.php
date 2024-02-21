@extends('layout.template_user')
@section('content')
    <!-- Hero Start -->
    <div class="container-fluid py-5 red hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-4 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight">Book's List</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                            <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="{{ url('/listbook') }}">Book</a></li>
                            @if (auth()->user()->role == 'user')
                                
                            <li class="breadcrumb-item"><a class="text-white" href="{{ url('/koleksi') }}">Collection</a></li>
                            @endif
                        </ol>
                    </nav>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- Case Start -->
    <div class="container-fluid bg-light py-5">
        <div class="container ">
            
            <!--================Single Product Area =================-->
		<div class="product_image_area">
			<div class="container">
				<div class="row ">
					<div class="col-lg-6">
						<div class="text center">
							
							<img src="{{ Storage::url('public/books/' . $books->gambar) }}" style="width: 70%" alt="" srcset="">
							
							<!-- <div class="single-prd-item">
							<img class="img-fluid" src="img/category/s-p1.jpg" alt="">
						</div>
						<div class="single-prd-item">
							<img class="img-fluid" src="img/category/s-p1.jpg" alt="">
						</div> -->
						</div>
					</div>
					<div class="col-lg-5 offset-lg-1">
						<div class="s_product_text">
							<h3>{{ $books->judul }}</h3>
							
							<ul class="list mb-4">
								<li>
									<a class="active" href="#"><span>Category</span> : {{ $books->kategori }}</a>
								</li>
								<li>
									<a href="#"><span>Availibility</span> : {{ $books->stok }}</a>
								</li>
								<li>
									<a href="#"><span>Penulis</span> : {{ $books->penulis }}</a>
								</li>
								<li>
									<a href="#"><span>Penerbit</span> : {{ $books->penerbit }}</a>
								</li>
								<li>
									<a href="#"><span>Tahun Terbit</span> : {{ $books->tahunterbit }}</a>
								</li>
							</ul>
							@if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
							
							@if ($koleksi)
								<form action="{{ route('koleksi.destroy', $books->id_buku) }}" method="post">
									@csrf
									@method('DELETE')
									<input type="hidden" name="id_user" value="{{ auth()->user()->id_user }}">
									<input type="hidden" name="id_buku" value="{{ $books->id_buku }}">
									<button type="submit" class="btn btn-danger">Remove from Collection</button>
								</form>
							@else
								
								<form action="{{ route('koleksi.store') }}" method="post">
									@csrf
									<input type="hidden" name="id_user" value="{{ auth()->user()->id_user }}">
									<input type="hidden" name="id_buku" value="{{ $books->id_buku }}">
									<button type="submit" class="btn btn-primary"> Add to Collection</button>
								</form>
							@endif
								
							
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--================End Single Product Area =================-->

		<!--================Product Description Area =================-->
		<section class="product_description_area">
			<div class="container">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Sinopsis</a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
						<p>
							{{ $books->deskripsi }}
						</p>
						
					</div>
					
					<div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
						<div class="row">
							<div class="col-lg-6">
								<div class="row total_rate">
									<div class="col-6-12">
										<div class="box_total">
											<h5>Overall</h5>
											<h4>{{ number_format($books->rating_avg_rating) }}</h4>
											<h6>({{ $books->rating_count }} Reviews)</h6>
										</div>
									</div>
									
								</div>
								@foreach ($books->rating as $rating)
									
									<div class="review_list">
										<div class="review_item">
											<div class="media">
												<div class="d-flex">
													<img src="img/product/review-1.png" alt="" />
												</div>
												<div class="media-body">
													<h4 class="">{{ $rating->user->name }}</h4>
													<i class="fa fa-star"></i> <span>{{ $rating->rating }}</span>
													
												</div>
											</div>
											<p class="mb-4">
												{{ $rating->ulasan }}
											</p>
										</div>
									</div>
								@endforeach
									
							</div>
							<div class="col-lg-6">
								<div class="review_box">
									@if (session('user'))
										<div class="alert alert-danger" role="alert">
											{{ session('user') }}
										</div>
									@endif
									<h4>Add a Review</h4>
									
									
									<form action="{{ route('rating.store') }}" method="POST" class="form-contact form-review mt-3">
										@csrf
										@if ($message = Session::get('eror'))
										<div class="alert alert-danger">
											<p>{{ $message }}</p>
										</div>
										@endif
										
                                        <div class="form-group">
											<input type="hidden" name="id_user" value="{{ auth()->user()->id_user }}">
											<input type="hidden" name="id_buku" value="{{ $books->id_buku }}">
                                            <div class="rating-css">
                                                <div class="star-icon">
                                                    <input type="radio" value="1" name="rating" checked id="rating1">
                                                    <label for="rating1" class="fa fa-star"></label>
                                                    <input type="radio" value="2" name="rating" id="rating2">
                                                    <label for="rating2" class="fa fa-star"></label>
                                                    <input type="radio" value="3" name="rating" id="rating3">
                                                    <label for="rating3" class="fa fa-star"></label>
                                                    <input type="radio" value="4" name="rating" id="rating4">
                                                    <label for="rating4" class="fa fa-star"></label>
                                                    <input type="radio" value="5" name="rating" id="rating5">
                                                    <label for="rating5" class="fa fa-star"></label>
                                                </div>
                                            </div>
                                        </div>
										<div class="form-group">
											<input class="form-control" name="ulasan" id="ulasan" type="text" placeholder="Enter your name" required />
										</div>
										
										<div class="form-group text-center text-md-right mt-3">
											<button type="submit" class="button button--active button-review">Submit Now</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--================End Product Description Area =================-->
        </div>
    </div>
    <!-- Case End -->
    
    




    


    
@endsection
@section('script')
    
<!-- JavaScript Libraries -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assetsus/lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('assetsus/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('assetsus/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('assetsus/lib/counterup/counterup.min.js') }}"></script>
<script src="{{ asset('assetsus/lib/owlcarousel/owl.carousel.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('assetsus/js/main.js') }}"></script>
{{-- Template 2 --}}
<script src="{{ asset('assetsus/vendors/jquery/jquery-3.2.1.min.js') }}"></script>
		<script src="{{ asset('assetsus/vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ asset('assetsus/vendors/skrollr.min.js')  }}"></script>
		<script src="{{ asset('assetsus/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
		<script src="{{ asset('assetsus/vendors/nice-select/jquery.nice-select.min.js') }}"></script>
		<script src="{{ asset('assetsus/vendors/jquery.ajaxchimp.min.js') }}"></script>
		<script src="{{ asset('assetsus/vendors/mail-script.js') }}"></script>
		
@endsection

    


