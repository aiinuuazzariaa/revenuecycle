@extends('layouts.app')

@section('content')
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
            style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">Welcome!</h1>
                        <p class="text-lead text-white">Use these awesome forms to login or create new account in your
                            project for free.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-header text-center pt-4">
                            <h5>Sign In</h5>
                        </div>
                        <div class="card-body">
                            <form role="form" action="{{ route('processLogin') }}" method="POST">
                                @csrf
                                @method("POST")
                                <div class="mb-3">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" aria-label="Email">
                                </div>
                                <div class="mb-3">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password"
                                        aria-label="Password">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign in</button>
                                </div>
                                {{-- <p class="text-sm mt-3 mb-0">Already have an account? <a href="javascript:;"
                                        class="text-dark font-weight-bolder">Sign in</a></p> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('layouts.footers.auth.footer')
@endsection
