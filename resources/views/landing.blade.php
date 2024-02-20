@extends('layout.template_user')
@section('content')
    <!-- Hero Start -->
    <div class="container-fluid pt-5 red hero-header ">
        <div class="container pt-5">
            <div class="row g-5 py-5">
                <div class="col-lg-8 align-self-center text-center text-lg-start ">
                    <h1 class="display-4 text-white mb-4 animated slideInRight">WELCOME TO E-PERPUS</h1>
                    <p class="text-white mb-4 animated slideInRight">Tempor rebum no at dolore lorem clita rebum rebum ipsum
                        rebum stet dolor sed justo kasd. Ut dolor sed magna dolor sea diam. Sit diam sit</p>
                    <a href="{{ url('login') }}" class="btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInRight">See more Books</a>
                    
                </div>
                <div class="col-lg-4 align-self-end text-center text-lg-end">
                    <img class="img-fluid" src="{{ asset('assetsus/img/title.svg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->



    <!-- Case Start -->
    <div class="container-fluid bg-light py-5">
        <div class="container ">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                
                <h1 class="mb-4">Explore Your Fav Books</h1>
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
                            <img class="img-fluid" src="{{ Storage::url('public/books/' . $item->gambar) }}" style="" alt="">
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
    <!-- Feature Start -->
    <div class="container-fluid reds feature py-5">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-lg-6 align-self-center mb-md-5 pb-md-5 wow fadeIn" data-wow-delay="0.3s">
                    <div class="btn btn-sm border rounded-pill text-white px-3 mb-3">Why Choose Us</div>
                    <h1 class="text-white mb-4">We're Best in AI Industry with 10 Years of Experience</h1>
                    <p class="text-light mb-4">Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem et sit, sed
                        stet no labore lorem sit. Sanctus clita duo justo et tempor</p>
                    <div class="d-flex align-items-center text-white mb-3">
                        <div class="btn-sm-square bg-white text-primary rounded-circle me-3">
                            <i class="fa fa-check"></i>
                        </div>
                        <span>Diam dolor diam ipsum et tempor sit</span>
                    </div>
                    <div class="d-flex align-items-center text-white mb-3">
                        <div class="btn-sm-square bg-white text-primary rounded-circle me-3">
                            <i class="fa fa-check"></i>
                        </div>
                        <span>Diam dolor diam ipsum et tempor sit</span>
                    </div>
                    <div class="d-flex align-items-center text-white mb-3">
                        <div class="btn-sm-square bg-white text-primary rounded-circle me-3">
                            <i class="fa fa-check"></i>
                        </div>
                        <span>Diam dolor diam ipsum et tempor sit</span>
                    </div>
                    <div class="row g-4 pt-3">
                        <div class="col-sm-6">
                            <div class="d-flex rounded p-3" style="background: rgba(256, 256, 256, 0.1);">
                                <i class="fa fa-users fa-3x text-white"></i>
                                <div class="ms-3">
                                    <h2 class="text-white mb-0" data-toggle="counter-up">9999</h2>
                                    <p class="text-white mb-0">Happy Clients</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex rounded p-3" style="background: rgba(256, 256, 256, 0.1);">
                                <i class="fa fa-check fa-3x text-white"></i>
                                <div class="ms-3">
                                    <h2 class="text-white mb-0" data-toggle="counter-up">9999</h2>
                                    <p class="text-white mb-0">Project Complete</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6  text-center  wow fadeIn" data-wow-delay="0.5s">
                    <img class="group" src="{{ asset('assetsus/img/grup-buku.svg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->
    <h4 class="pt-3 text-center ">Our Location</h4>
    <div class="container">
        <div class="row mb-4" style="margin-top: 15vh;">
            <div class="col-12 mx-auto">

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983.2884462813438!2d106.63584556412043!3d-6.187333400000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f929162547c7%3A0xbbf35137362e584d!2sVocational%20School%20District%204%20Tangerang!5e0!3m2!1sen!2sid!4v1680737276635!5m2!1sen!2sid" style="border: 0;width: 100%; height:60vh" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    <div class="py-5 location d-flex justify-content-center ">
        <div class="mx-auto">
        </div>
    </div>




    


    
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

    


