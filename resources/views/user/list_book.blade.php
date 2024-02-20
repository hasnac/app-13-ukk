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
            {{-- Search  --}}
            <div class="coba position-relative  mt-3 mb-2">
                <form action="{{ route('listbook') }}" method="get">
                    <input name="search" class="form-control  rounded-pill w-100 ps-4 pe-5" type="text"
                        placeholder="Search your book..." style="height: 48px;">
                    <button type="submit" class="btn shadow-none position-absolute top-0 end-0  me-2"><i
                            class="bi bi-search text-primary fs-4"></i></button>
                </form>
            </div>
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" >
                <div class="product_description_area">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('listbook') ? 'active' : '' }} " id="home-tab" data-toggle="tab" href="{{ url('listbook') }}" role="tab" aria-controls="home" aria-selected="true">All</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('listbook/fiksi') ? 'active' : '' }} " id="review-tab" data-toggle="tab" href="{{ url('listbook/fiksi') }}" role="tab" aria-controls="review" aria-selected="false">Fiksi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('listbook/non-fiksi') ? 'active' : '' }} " id="review-tab" data-toggle="tab" href="{{ url('listbook/non-fiksi') }}" role="tab" aria-controls="review" aria-selected="false">Non Fiksi</a>
                        </li>
                    </ul>
                </div>
                <h1>Explore Your Fav Books</h1>
            </div>
            <div class="row g-4">
                    <div class="col-md-12">
                        <div class="text-center">
                            @if ($books->isEmpty())
                                
                            <h1>Product is not found</h1>
                            <a class="btn btn-red" href="{{ url('/') }}">Back</a>
                            @endif
                        </div>
                    </div>
                
                    @foreach ($books as $item)
                        <div class="col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                            <div class="case-item position-relative overflow-hidden rounded mb-2">
                                <img class="img-fluid" src="{{ Storage::url('public/books/' . $item->gambar) }}" alt="">
                                <a class="case-overlay text-decoration-none" href="{{ url('listbook/detail' . $item->id_buku) }}">
                                    <small>{{ $item->judul }}</small>
                                    <h5 class="lh-base text-white mb-3">{{ Str::limit($item->deskripsi, 50)}}
                                    </h5>
                                    <span class="btn btn-square btn-red"><i class="fa fa-arrow-right"></i></span>
                                </a>
                            </div>
                        </div>
                    @endforeach
            </div>
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
@endsection

    


