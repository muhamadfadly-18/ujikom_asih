@extends('layout.auth.app',[
'title' => 'Register'
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
                    <div class="col-lg mx-auto">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Register</h1>
                            </div>
                            <form class="user" action="{{ route('register.post') }}" method="POST">
                                @csrf <!-- Tambahkan ini untuk melindungi dari CSRF -->
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="pw">Password</label>
                                    <input type="password" class="form-control" id="pw" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="cp">Confirm Password</label>
                                    <input type="password" class="form-control" id="cp" name="password_confirmation" placeholder="Confirm Password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">
                                    Register
                                </button>
                            </form>                            
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@stop