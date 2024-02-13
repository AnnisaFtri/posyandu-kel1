
{{-- @section('title', 'Landingpage')
@section('content') --}}
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <style>

#landingpage{
   background: linear-gradient(#1ADAF1, #A7EEF6);
   background-size: 100%;
   margin: 0;
   padding: 0;
   width: 100%;
   background-color: aquamarine;
}
    


#landingpage .wrapper{
    margin: 0;
    padding: 0;
    width: 100%;
    height: 100%;
    /* background-image: url ('background.png'); */
    /* background-size: 100%; */
}
#landingpage .logo{
    float: left;
    margin-left: 46px;
    padding: 0px 38px;
    font-family: 'Raleway', sans-serif;
    font-weight: bold;
    font-size: 25px;
}
#landingpage .logo a{
    text-decoration: none;
    color: whitesmoke;
    margin-bottom: 5%;
}
#landingpage .header{
    text-align: center;
    position: absolute;
    top: 40%;
    left: 72%;
    transform: translate(-50%, -50%);
}
#landingpage .header h1{
    color: white;
    text-align: left;
    font-family: 'Noto Serif JP', sans-serif;
    font-size: 35px;
}
#landingpage .header span{
    color: #35230e;
}
#landingpage .content-header{
    position: absolute;
    transform: translate(-50%, -50%);
    text-align: center;
    top: 65%;
    left: 73%;
}
#landingpage .content-header p{
    color: black;
    font-family: 'Raleway', sans-serif;
    font-size: 16px;
    text-align: left;
}
#landingpage .content-header .btn btn-danger{
    width: 100%;
    height: 42px;
    border-radius: 0px 10px 10px 0px;
    border: none;
    color: aquamarine;
}
#landingpage .col-img{
    
    position: absolute;
    top: 50%;
    left: 22%;
    transform: translate(-50%, -50%);
    width: 57%;
    text-align: right;
}

            </style>
        <section id="landingpage">
    <div class="wrapper">
        <div class="nav">
            <div class="logo">
                <a href="#">
                    <p>Posterpadu</p>
                </a>
            </div>
            
        </div>
        <div class="header">
            <h1>AYO DATANG KE <span>POSYANDU</span> SETIAP MINGGU</h1>
        </div>
        <div class="content-header">
            <p>Punya balita? ditimbang di Posyandu ya.. <br>
            Anak sehat, tambah umur, tambah berat dan tambah pandai.
            Mari bersama-sama mencegah stunting pada anak.</p>
            <br>
            
                <a style="margin-left:-100px" class="btn btn-primary" type="submit" href="{{route('login')}}">Login</a>
            
                <a class="btn btn-danger" type="submit" href="{{route('register')}}">Register</a>
            

        </div>
        <div class="col-img">
            <img src="{{asset('landingpage.png')}}">
        </div>
    </div>
    </section>


    </body>
    </html>
