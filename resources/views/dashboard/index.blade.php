@extends('layout.app')
@section('title', 'dashboard')
@section('content')
  <!-- <link rel="stylesheet" href="style.css" /> -->
  <!-- Font Awesome Cdn Link -->
   

    <section class="main" style="margin-left: 80px;">
      <div class="main-top">
      </div>
      <div class="main-skills">
        <div class="card" style="width: 250px;">
          <h3>Pelayanan</h3>
          <!-- <p><Pelayanan/p>-->
          <button>3</button>
        </div>
        <div class="card" style="width: 250px;">
          <h3>Pemeriksaan</h3>
          <button>3</button>
        </div>
        <div class="card" style="width: 250px;">
          <h3>User</h3>
          <button>2</button>
        </div>
        <div class="card" style="width: 250px;">
          <h3>Log</h3>
          <button>5</button>
        </div>
      </div>
      <div class="form-group">
             <label for="tanggal">Tanggal:</label>
              <input type="date" id="tanggal" name="tanggal" class="form-control">
              <label for="jam">Jam:</label>
              <input type="time" id="jam" name="jam" class="form-control">
          </div>
      
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      
      <!-- <section class="main-course">
        <h1>My courses</h1>
        <div class="course-box">
          <ul>
            <li class="active">In progress</li>
            <li>explore</li>
            <li>incoming</li>
            <li>finished</li>
          </ul>
          <div class="course">
            <div class="box">
              <h3>HTML</h3>
              <p>80% - progress</p>
              <button>continue</button>
              <i class="fab fa-html5 html"></i>
            </div>
            <div class="box">
              <h3>CSS</h3>
              <p>50% - progress</p>
              <button>continue</button>
              <i class="fab fa-css3-alt css"></i>
            </div>
            <div class="box">
              <h3>JavaScript</h3>
              <p>30% - progress</p>
              <button>continue</button>
              <i class="fab fa-js-square js"></i>
            </div>
          </div>
        </div>
      </section> -->
    </section>
  </div>

  @endsection