@extends('layout.template')
@section('content')
<div class="container red">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                    
                    <div class="d-flex justify-content-center py-4">
                        <a href="index.html" class="logo d-flex align-items-center w-auto">
                            <img src="assets/img/logo.png" alt="" />
                           
                        </a>
                    </div>
                    <!-- End Logo -->

                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Login</h5>
                                <p class="text-center small">Enter your username & password to login</p>
                            </div>

                            <form class="row g-3 needs-validation" action="" method="">
                                @csrf
                                
                                <div class="col-12">
                                    <label for="name" class="form-label">Your Name</label>
                                    <input type="text" name="" class="form-control"
                                        value="{">
                                </div>
                                <div class="col-12">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" name="" class="form-control"
                                        value="">
                                </div>

                                <div class="col-12">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="" class="form-control"
                                        value="">
                                </div>

                                <div class="col-12">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="" class="form-control">
                                </div>
                                <div class="col-12">
                                    <label for="password" class="form-label">Password Confirmation</label>
                                    <input type="password" class="form-control" name="">
                                </div>

                                <div class="col-12">
                                    <button class="btn button-red w-100" type="submit">Create
                                        Account</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
