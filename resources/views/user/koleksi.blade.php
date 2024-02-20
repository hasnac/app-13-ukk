@extends('layout.template_user')
@section('content')
    <!-- Hero Start -->
    <div class="container-fluid py-5 red hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-4 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class=" text-white mb-4 animated slideInRight">My Collection</h1>
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
          <!--================Cart Area =================-->
          <div class="container">

              <div class="card">
    
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Picture</th>
                        <th scope="col">Title</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i= $data->firstItem();?>
                      @foreach ($data as $item)
                          
                      <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>
                          <img src="{{ Storage::url('public/books/' . $item->buku->gambar) }}" style="width: 100px" alt="" srcset="">
                        </td>
                        <td>{{ $item->buku->judul }}</td>
                        <td>{{ $item->buku->kategori }}</td>
                        <td>
                          <form action="{{ route('koleksi.destroy', $item->id_buku) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id_user" value="{{ auth()->user()->id_user }}">
                            <input type="hidden" name="id_buku" value="{{ $item->id_buku }}">
                            <button type="submit" class="btn btn-danger">Remove from Collection</button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                      <?php $i++ ?>
                    </tbody>
                  </table>
              </div>
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
{{-- Template 2 --}}
<script src="{{ asset('assetsus/vendors/jquery/jquery-3.2.1.min.js') }}"></script>
		<script src="{{ asset('assetsus/vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ asset('assetsus/vendors/skrollr.min.js')  }}"></script>
		<script src="{{ asset('assetsus/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
		<script src="{{ asset('assetsus/vendors/nice-select/jquery.nice-select.min.js') }}"></script>
		<script src="{{ asset('assetsus/vendors/jquery.ajaxchimp.min.js') }}"></script>
		<script src="{{ asset('assetsus/vendors/mail-script.js') }}"></script>
		
@endsection

    


