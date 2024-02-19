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
                        <a href='' class="btn btn-secondary">Back</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ url('buku') }}" method='POST' enctype="multipart/form-data" class="form" data-parsley-validate>
                                @csrf
                                
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
                                                value="{{ old('judul') }}"
                                            />
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="col-md-12 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label">penulis</label>
                                            <input
                                                type="text"
                                                id="penulis"
                                                class="form-control"
                                                placeholder="First Name"
                                                name="penulis"
                                                data-parsley-required="true"
                                                
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label">penerbit</label>
                                            <input
                                                type="text"
                                                id="penerbit"
                                                class="form-control"
                                                placeholder="First Name"
                                                name="penerbit"
                                                data-parsley-required="true"
                                                
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label">tahunterbit</label>
                                            <input
                                                type="text"
                                                id="tahunterbit"
                                                class="form-control"
                                                placeholder="First Name"
                                                name="tahunterbit"
                                                data-parsley-required="true"
                                                
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="gambar" class="form-label">gambar</label>
                                            <input class="form-control" type="file" id="gambar" name="gambar" multiple>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                            
                                        <div class="form-group with-title mb-3">
                                            <textarea class="form-control" id="deskripsi" name="deskripsi"  rows="3"></textarea>
                                            <label>Your Deskripsi</label>
                                        </div>
                                            
                                        
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label">stok</label>
                                            <input
                                                type="number"
                                                id="stok"
                                                class="form-control"
                                                placeholder="First Name"
                                                name="stok"
                                                data-parsley-required="true"
                                                
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <h6>Basic Select</h6>
                                        
                                        <fieldset class="form-group">
                                            <select class="form-select" id="kategori" name="kategori">
                                                <option value="fiksi" >Fiksi</option>
                                                <option value="non">Non Fiksi</option>
                                                
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        
                                        <ul class="list-unstyled mb-0">
                                            <li class="d-inline-block me-2 mb-1">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status" id="status" value="draft" >
                                                    <label class="form-check-label" for="status">
                                                        Draft
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="d-inline-block me-2 mb-1">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status" id="status" value="publish" >
                                                    <label class="form-check-label" for="flexRadioDefault1">
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