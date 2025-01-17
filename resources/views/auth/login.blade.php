@extends('layout.auth.app',[
    'title' => 'Login'
])
@section('content')
<style>
    body {
        background-image: url('{{ asset("images/Smkn_04_bogor.jpg") }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100vh; /* Pastikan halaman penuh */
        margin: 0;
    }
    .card {
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
    }
</style>

<div class="row justify-content-center">

    <div class="col-xl-5 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                @include('layout.component.alert-dismissible')
                            </div>
                            <form class="user" method="POST" action="{{ route('login.post') }}">
                                @csrf
                                <div class="form-group">
                                    <input name="email" required="" type="email" class="form-control form-control-user"
                                        id="exampleInputEmail" aria-describedby="emailHelp"
                                        placeholder="Enter Email Address...">
                                </div>
                                <div class="form-group">
                                    <input name="password" required="" type="password" class="form-control form-control-user"
                                        id="exampleInputPassword" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Remember
                                            Me</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                            </form>
                            <hr>
                            
                            <div class="text-center">
                                <a class="small" href="{{ route('register') }}">Create an Account!</a>
                            </div>
                            <div class="text-center mt-3">
                                <a href="{{ route('welcome') }}" class="btn btn-secondary btn-user btn-block">Back to dahboard</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@stop
