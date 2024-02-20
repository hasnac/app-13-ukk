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
            <h3>Edit Data Blog</h3>
            
            
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
    <section id="multiple-column-form">b
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Data Blog</h4>
                        
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('buku.update', $books->id_buku) }}" method='POST' enctype="multipart/form-data" class="form" data-parsley-validate>
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label">Judul</label>
                                            <input
                                                type="text"
                                                id="judul"
                                                class="form-control"
                                                placeholder="First Name"
                                                name="judul"
                                                data-parsley-required="true"
                                                value="{{ old('judul', $books->judul) }}"
                                            />
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-12 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label">Penulis</label>
                                            <input
                                                type="text"
                                                id="penulis"
                                                class="form-control"
                                                placeholder="First Name"
                                                name="penulis"
                                                data-parsley-required="true"
                                                value="{{ old('penulis', $books->penulis) }}"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label">Penerbit</label>
                                            <input
                                                type="text"
                                                id="penerbit"
                                                class="form-control"
                                                placeholder="First Name"
                                                name="penerbit"
                                                data-parsley-required="true"
                                                value="{{ old('penerbit', $books->penerbit) }}"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label">Tahun terbit</label>
                                            <input
                                                type="text"
                                                id="tahunterbit"
                                                class="form-control"
                                                placeholder="First Name"
                                                name="tahunterbit"
                                                data-parsley-required="true"
                                                value="{{ old('tahunterbit', $books->tahunterbit) }}"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="picture" class="form-label">Picture</label>
                                                {{-- <img src="" alt=""
                                                    class="img-preview img-fluid mb-3 col-sm-10 d-block"
                                                    style="width: 450px; height: 280px;">
                                                <input type="hidden" name="oldImage" multiple value="1" {{ ($site->select_values=="1")? "selected" : "" }}> --}}
                                           
                                                <img class="img-preview img-fluid mb-3 col-sm-10 d-block" src="{{ asset('storage/books/'.$books->gambar) }}"
                                                    style="width: 100px;">
                                           
                                            <input class="form-control" type="file" id="gambar" name="gambar" 
                                            onchange="previewImage()">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        
                                        <label for="picture" class="form-label">Deskripsi</label>
                                        
                                        <div class="form-group with-title mb-3">
                                            <textarea class="form-control" id="deskripsi" name="deskripsi"  rows="3">{{ old('deskripsi', $books->deskripsi) }}</textarea>
                                            <label>Your Content</label>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label">Stok</label>
                                            <input
                                                type="number"
                                                id="stok"
                                                class="form-control"
                                                placeholder="First Name"
                                                name="stok"
                                                data-parsley-required="true"
                                                value="{{ old('stok', $books->stok) }}"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <h6>Input group append</h6>
                                        <div class="input-group mb-3">
                                            <select class="form-select" id="kategori" name="kategori">
                                                <option selected>Open this select menu</option>
                                                    
                                                    <option value="fiksi" {{ ($books->kategori=="fiksi")? "selected" : "" }}>
                                                        Fiksi
                                                    </option>
                                                    <option value="non" {{ ($books->kategori=="non")? "selected" : "" }}>
                                                        Non Fiksi
                                                    </option>
                                                
                                            </select>
                                            <label class="input-group-text" for="kategori">Kategori</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        
                                        <ul class="list-unstyled mb-0">
                                            <li class="d-inline-block me-2 mb-1">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status" id="status" value="draft"  {{ ($books->status=="draft")? "checked" : "" }}  >
                                                    <label class="form-check-label" for="status">
                                                        Draft
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="d-inline-block me-2 mb-1">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status" id="status" value="publish"  {{ ($books->status=="publish")? "checked" : "" }} >
                                                    <label class="form-check-label" for="status">
                                                        Publish
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
                                        <a href='' class="btn btn-secondary">Back</a>
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