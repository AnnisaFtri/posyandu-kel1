<html>
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Handlee&family=Protest+Riot&display=swap" rel="stylesheet">
  <style>
    * {
    text-decoration: none;
    margin: 0px;
    padding: 0px;
}

body {
    margin: 0px;
    padding: 0px;
    font-family: 'Open Sans',sans-serif;
    background-color: #A7EEF6;
}
/newbabies start/
.wrapper {
    width: 90%;
    margin: auto;
    position: relative;
}
.logo a{
font-size: 15px;
font-weight: 80%;
float: left;
font-family: courier;
color: black;
}

.logo img {
    width: 40%;
    height: 30%;
    float: left;
    margin-right: 100px;
}

.menu {
    float: right;  
}

nav {
    background-color: #1ADAF1;
    color:#fff;
}

nav .wrapper {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 10px;
}

nav .logo img {
    width: 100px; /* Sesuaikan lebar logo dengan kebutuhan Anda */
    height: 50px;
    margin-top: 5px;
}

nav .menu ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

nav .menu ul li {
    display: inline-block;
    margin-right: 20px;
}

nav .menu ul li:last-child {
    margin-right: 0;
}

nav .menu ul li a {
    color: black;
    text-decoration: none;
}

nav .menu ul li a:hover {
    text-decoration: underline;
}

.logout {
    display: flex;
    align-items: center;
    color: #fff;
    text-decoration: none;
}

.logout .nav-item {
    margin-left: 5px;
}

section {
    margin: auto;
    display: flex;
    margin-bottom: 30px;
    width: 70%;   
}

.kolom {
    font-family: "Handlee", cursive;
    font-weight: 100%;
    font-style: normal;
    margin-top: 30px;
    margin-bottom: 20px;
    font-size: 20px;
    border: 1px solid #f5f1f1; 
    padding: 10px;
    border-radius: 5%;
    background-color: #cccccc;
}

.kolom .deskripsi {
    font-size: 15px;
    font-weight: bold;
    font-family: 'comic sans ms';
    color: black;

}

h2 {
    font-family: 'comic sans ms';
    font-weight: 700;
    font-size: 22px;
    margin-bottom: 20px;
    color: black;
    width: 90%;
    line-height: 50px;
}
img {
    margin-top: 20px;
}
.jadwal {
    width: 300px;
    margin: 50px auto;
    padding: 20px;
    background-color: #f0f0f0;
    border-radius: 8px;
    border: 2px solid black;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    font-size: 15px;
    text-align: center;
}

.jadwal h2 {
    text-align: center;
    font-size: 20px;
}

.hari {
    list-style: none;
    padding: 0;
}

.hari li {
    margin-bottom: 10px;
}

.nama-hari {
    font-weight: bold;
}

.jam {
    margin-left: 10px;
}
.footer {
    position: fixed;
    bottom: 0;
    width: 100%;
    background-color: #1ADAF1;
    color: #fff;
    text-align: center;
    padding: 15px 0;
}
.logout-button {
    padding: 5px 10px;
    background-color: #f44336;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
    font-size: 16px;
    display: flex;
    align-items: center;
  }

  .logout-button:hover {
    background-color: #d32f2f;
  }

  .logout-button i {
    margin-right: 2px;
  }
</style>
        <body>

        <nav>
    <div class="wrapper">
        <div class="logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('logo2.png') }}" alt="Logo">
            </a>
        </div>
        <div class="menu">
            <ul>
                <li><a href="#jadwal">Jadwal</a></li>
                <li><a href="{{ url('/profile') }}">Profile</a></li>
                <li><a href="{{ url('/riwayat-pemeriksaan') }}">Riwayat Pemeriksaan</a></li>
                <li><a href="http://127.0.0.1:8000/login " class="logout-button">
                                <i class="fas fa-sign-out-alt"></i>
                                <span class="nav-item">Log out</span>
                              </a></li>
                            
                        </ul>
        </div>
    </div>
</nav>

            <div class="wrapper">
                <section id="baby">
                    <img src="{{asset('babies1.png')}}" width="40%">
                    <div class="kolom">
                        <p class="deskripsi">Seputar Bayi</p>
                        <h2>Ayah dan bunda sudah tau belum?</h2>
                        <p>Ternyata Bayi baru lahir bisa ingat 
                            suara bunda saat di dalam kandungan loh, suara ibu juga yang paling disukai bayi. 
                            Karena itu bayi sangat senang mendengar bunda berbicara atau bernyanyi.
                            <br>Bunda tau tidak nih, ternyata bayi juga sudah belajar bicara semenjak di dalam kandungan loh, hebatkan!!
                            </p>
                    </div>
                </section>

                <section id="Parenting">
                    <div class="kolom">
                        <p class="deskripsi">Parenting anak<p>
                        <h2>Apa itu parenting?</h2>
                        <p>Ayah dan bunda, Parenting adalah cara pola asuh mendidik anak bagaimana orang tua memberikan perlindungan, 
                           perawatan dan mengamati perkembangan yang sehat juga kegiatan hingga tumbuh dewasa.<br>
                           Ayah dan Bunda biasa memulai dengan mengarahkan perilaku positif kepada anak, memberi sejumlah
                           penghargaan, tugas dan perintah secara bertahap, mencoba meminta pendapat anak ketika sudah berusia 4 tahun dan 
                           ajarkan anak ayah dan bunda dala mengontrol emosi. <p>
                    </div>
                    <img src="{{asset('babies2.png')}}" width="40%">
                </section>

                <section id="stunting">
                    <img src="{{asset('stunting1.png')}}" style="width: 40%;">
                    <div class="kolom">
                        <p class="deskripsi">Seputar Bayi</p>
                        <h2>Ayah dan bunda sudah tau belum tentang stunting?</h2>
                        <p>Stunting itu ketika anak tidak tumbuh tinggi badannya seperti seharusnya.
                            Ini bisa karena kurang gizi, lingkungan kotor, atau sulit akses ke layanan kesehatan. 
                            Stunting bisa bikin anak lebih mudah sakit dan sulit belajar di sekolah. Untuk hindari stunting, 
                            <br> penting bagi kita kasih makanan bergizi, jaga kebersihan lingkungan, dan pastikan anak-anak mendapatkan perawatan kesehatan yang baik.
                    </div>
                </section>
            </div>
            <div class="jadwal" id="jadwal">
                <h2>Jadwal Posyandu Bulan Ini</h2>
                <ul class="hari">
                    <li>
                        <span class="nama-hari">Sabtu 10 Februari</span>
                        <span class="jam">08:00 - 10:00</span>
                    </li>
                    <li>
                        <span class="nama-hari">Sabtu 17 Februari</span>
                        <span class="jam">08:00 - 10:00</span>
                    </li>
                    <li>
                        <span class="nama-hari">Sabtu 24 Februari</span>
                        <span class="jam">08:00 - 10:00</span>
                    </li>
                </ul>
            </div>
            <!-- {{-- @foreach($newsBabies as $news) --}}
                {{-- <div class="berita-anak">
                    <h2>{{ $news->judul }}</h2>
                    <p>{{ $news->deskripsi }}</p>
                    <p>Waktu Terbit: {{ $news->waktu_terbit }}</p> Menampilkan waktu terbit berita -->

            <!-- @if($news->jam)  Memeriksa apakah berita anak memiliki jam terkait -->
                    <!-- <p>Jam: {{ $news->jam->jam }}</p> Menampilkan jam terkait -->
            <!-- @endif
                </div> -->
            <!-- @endforeach --}} --> 

            <footer class="footer">
                <p>&copy; 2024 Posyandu Terpadu Bintara 14</p>
            </footer>
        </body>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
    var links = document.querySelectorAll('a[href^="#"]');
    links.forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();

            var targetId = this.getAttribute('href').substring(1);
            var targetElement = document.getElementById(targetId);
            if (targetElement) {
                var topOffset = targetElement.getBoundingClientRect().top + window.pageYOffset;
                window.scrollTo({
                    top: topOffset,
                    behavior: 'smooth'
                });
            }
        });
    });
});
        </script>
    </head>
</html>