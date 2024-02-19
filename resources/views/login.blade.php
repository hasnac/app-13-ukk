@extends('layout.template')
@section('content')
<div class="container red">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                    
                    
                    <!-- End Logo -->

                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="pt-4 pb-2">
                                
                                <h5 class="card-title text-center pb-0 fs-4">Login</h5>
                                <p class="text-center small">Enter your username & password to login</p>
                            </div>

                            <form class="row g-3 needs-validation" action="{{ route('login.action') }}" method="POST">
                                @csrf
                                
                                <div class="col-12">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" id="username" value="{{ old('username') }}" />
                                    
                                </div>

                                <div class="col-12">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" required />
                                    
                                </div>
                                <div class="col-12">
                                    <button class="btn button-red w-100 text-white" type="submit">Login</button>
                                </div>
                                <div class="col-12">
                                    <p class="small mb-0">Don't have account? <a href="{{ url('register') }}">Create an account</a></p>
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
