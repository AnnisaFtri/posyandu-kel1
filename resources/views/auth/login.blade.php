@extends('layout.layout')
@section('title', 'login')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body >
    
</body>
</html>
    <style>
        
    </style>
    <section class="vh-80">
        <div class="container py-2 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6 ml-2">
                    <img src="{{asset('logo_terpadu.png')}}"
                         class="img-fluid" alt="Phone image">
                </div>
                <div style="background-color: white; width: 400px; height:450px; border-radius: 10%;" class="col col-md-8 col-lg-6 col-xl-4 offset-xl-1 border ml-4
                
                @csrf
                <div class="divider d-flex align-items-center my-4">
                  <p class="text-center fw-bold mx-3 mb-0" style="font-size: 200%; font-style: Trocchi; text-align: center;">Login</p>
                </div>
            <form method="post" action="/login">
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="username">Username</label>
                            <input type="text" id="username" class="form-control form-control-lg" name="username"
                                   required autocomplete="username"/>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" id="password" class="form-control form-control-lg" name="password"
                                   required/>
                        </div>

                        <div class="text-danger errors">
                            <p class="err-message"></p>
                        </div>
                        @csrf

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-lg btn-block"><a href="{{url('/login ')}}"></a>Login</button>

                        <br>belum memiliki akun?<br>
                        <a class="btn btn-danger" type="submit" href="{{route('register')}}">Register</a>
                        
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer')
@endsection
