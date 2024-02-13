<html>
    <head>
        @vite(['resources/sass/app.scss','resources/js/app.js'])
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
        <style>
           .container{
            display: flex;
            margin-top: 350px;
            padding-left: 20px;
           }

           .content{
            margin: 0;
            font-family: Poppins;
            
           }

           h1, b{
            font-size: 50px;
            width: 900px;
            line-height: 40px;
           }

           p{
            display: inline-block;
           }

           .text{
            font-size: 20px;
            width: 750px;
            margin-top: 15px;
           }
           
           
        </style>
    </head>
    <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
        <div class="container-fluid ">
        <div class="logo">
        <img src="logo.svg" alt="logo">
            <a class="navbar-brand" href="#">TERPADU</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="btn">
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link text-light" type="submit" aria-current="page" href="{{route('login.formlogin')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-danger" type="submit" href="{{route('register.formregister')}}">Register</a>
                    </li>
                </ul>
        </div>  
            </div>
        </div>
    </nav>

    <div class="container vh-100 vw-100">
    <div class="content m-0">
        <h1><b>BERKENDARA DENGAN <p class="text-primary">KEPERCAYAAN</p> HARGA YANG TERJANGKAU</b></h1>
        <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
        labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>
    </div>
    <div class="img">
        <img src="mobil.png" alt="mobil">
    </div>
    </div>
    </body>
</html>
