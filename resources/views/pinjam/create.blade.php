@extends('layout.template_ad')
@section('content')
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Create Data Blog</h3>
            
            
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                Form Validation
                </li>
                <li class="breadcrumb-item active" aria-current="page">Parsley</li>
            </ol>
            </nav>
        </div>
        </div>
    </div>

    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create Data Buku</h4>
                        <a href='{{ url('pinjam') }}' class="btn btn-secondary">Back</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ url('pinjam') }}" method='post' enctype="multipart/form-data" class="form" data-parsley-validate>
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <h6>Peminjam</h6>
                                        
                                        <fieldset class="form-group">
                                            <select class="form-select" id="username" name="username">
                                                <option selected>Open this select</option>
                                                @foreach ($users as $user)
                                                    
                                                <option value="{{ $user->id_user }}">{{ $user->username }}</option>
                                                @endforeach

                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <h6>Buku</h6>
                                        
                                        <fieldset class="form-group">
                                            <select class="form-select" id="judul" name="judul">
                                                <option selected>Open this select</option>
                                                @foreach ($books as $book)
                                                    
                                                <option value="{{ $book->id_buku }}">{{ $book->judul }}</option>
                                                @endforeach

                                            </select>
                                        </fieldset>
                                    </div>
    
                                    <div class="col-md-12 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label">jumlah pinjam</label>
                                            <input
                                                type="number"
                                                id="jumlah"
                                                class="form-control"
                                                placeholder="Masukkan tanggal pinjam"
                                                name="jumlah"
                                                data-parsley-required="true"
                                                
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label">Tanggal pinjam</label>
                                            <input
                                                type="date"
                                                id="tanggal_pinjam"
                                                class="form-control"
                                                placeholder="Masukkan tanggal pinjam"
                                                name="tanggal_pinjam"
                                                data-parsley-required="true"
                                                
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label">Tanggal kembali</label>
                                            <input
                                                type="date"
                                                id="tanggal_kembali"
                                                class="form-control"
                                                placeholder="Masukkan tanggal kembali"
                                                name="tanggal_kembali"
                                                data-parsley-required="true"
                                                
                                            />
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-12 col-12">
                                        
                                        <ul class="list-unstyled mb-0">
                                            <li class="d-inline-block me-2 mb-1">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status" id="status" value="pinjam" >
                                                    <label class="form-check-label" for="status">
                                                        Dipinjam
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="d-inline-block me-2 mb-1">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status" id="status" value="kembali" >
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Dikembalikan
                                                    </label>
                                                </div>
                                            </li>
                                            
                                        </ul>
                                        
                                        
                                    </div>  
                                    
                                                             
                                </div>  
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">
                                        Submit
                                        </button>
                                        <button
                                        type="reset"
                                        class="btn btn-light-secondary me-1 mb-1"
                                        >
                                        Reset
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
</div>
@endsection