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
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Data Blog</h4>
                        
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('petugas.update', $user->id_user) }}" method='POST' enctype="multipart/form-data" class="form" data-parsley-validate>
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label">Name</label>
                                            <input
                                                type="text"
                                                id="name"
                                                class="form-control"
                                                placeholder="First Name"
                                                name="name"
                                                data-parsley-required="true"
                                                value="{{ old('name', $user->name) }}"
                                            />
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-12 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label">username</label>
                                            <input
                                                type="text"
                                                id="username"
                                                class="form-control"
                                                placeholder="First Name"
                                                name="username"
                                                data-parsley-required="true"
                                                value="{{ old('username', $user->username) }}"
                                            />
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 col-12">
                                        <div class="form-group mandatory">
                                            <label for="first-name-column" class="form-label">Tahun terbit</label>
                                            <input
                                                type="text"
                                                id="telfon"
                                                class="form-control"
                                                placeholder="First Name"
                                                name="telfon"
                                                data-parsley-required="true"
                                                value="{{ old('telfon', $user->telfon) }}"
                                            />
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 col-12">
                                        
                                        <label for="picture" class="form-label">Alamat</label>
                                        
                                        <div class="form-group with-title mb-3">
                                            <textarea class="form-control" id="alamat" name="alamat"  rows="3">{{ old('alamat', $user->alamat) }}</textarea>
                                            <label>Your Content</label>
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    <div class="col-md-12 col-12">
                                        <h6>Input group append</h6>
                                        <div class="input-group mb-3">
                                            <select class="form-select" id="role" name="role">
                                                <option selected>Open this select menu</option>
                                                    
                                                    <option value="admin" {{ ($user->role=="admin")? "selected" : "" }}>
                                                        Admin
                                                    </option>
                                                    <option value="staff" {{ ($user->role=="staff")? "selected" : "" }}>
                                                        Staff
                                                    </option>
                                                
                                            </select>
                                            <label class="input-group-text" for="role">Kategori</label>
                                        </div>
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