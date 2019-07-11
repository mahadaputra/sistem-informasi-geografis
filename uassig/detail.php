<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Projek UAS SIG</title>

<!-- Font Awesome Icons -->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

<!-- Plugin CSS -->
<link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

<!-- Theme CSS - Includes Bootstrap -->
<link href="css/creative.min.css" rel="stylesheet">

<nav class="navbar navbar-expand-lg navbar-light fixed py-3" id="navbarResponsive">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="index.html">DIVING BALI</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto my-2 my-lg-0">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="index.html">Map Diving In Denpasar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="index.html">Places Diving</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="index.html">Photos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="index.html">About</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<?php
include 'koneksi.php';
$id = $_GET['id'];
require_once 'database.php';
$mysqli = new Database();

$results = mysqli_query($koneksi, "SELECT * FROM tb_diving WHERE id_diving = $id");
while ($row = mysqli_fetch_array($results)) {
  $nama = $row['nama_tempat'];
  $alamat = $row['alamat'];
  $longitude = $row['longitude'];
  $latitude = $row['latitude'];
  $kodepost = $row['kodepos'];
  $telepon = $row['tlp'];
}

?>

<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAd3dSy2ivrW8j-Pmz12_bs2rwSaCapCx8"></script>

<script>

function initialize() {
  var myLatlng = new google.maps.LatLng(<?php echo $latitude ?>,<?php echo $longitude ?>);
  var mapOptions = {
    zoom: 10,
    center: myLatlng
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading"><?php echo $nama ?></h1>'+
      '<div id="bodyContent">'+
      '<p><?php echo $alamat ?></p>'+
      '</div>'+
      '</div>';

  var infowindow = new google.maps.InfoWindow({
      content: contentString
  });

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Maps Info',
      icon:'img/marker.png'
  });
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });
}

google.maps.event.addDomListener(window, 'load', initialize);
    </script>

    <section class="page-section bg-primary" id="about">
      <div class="container">
        <div class="row justify-content-center">
      <div class="col-md-5">
          <div class="panel panel-info panel-dashboard">
            <div class="panel-heading centered  justify-content-center">
              <h2 class="panel-title">Lokasi</h4>
            </div>
            <div class="panel-body">
              <div id="map-canvas" style="width:100%;height:380px;"></div>
            </div>
          </div>
        </div>
        <div class="col-md-7">
          <div class="panel panel-info panel-dashboard">
            <div class="panel-heading centered">
              <h2 class="panel-title"> Detail </strong></h4>
            </div>
            <div class="panel-body">
             <table class="table">
               <tr>
                 <th>Item</th>
                 <th>Detail</th>
               </tr>
               <tr>
                 <td>Nama Jasa Diving</td>
                 <td><h4><?php echo $nama ?></h4></td>
               </tr>
               <tr>
                 <td>Alamat</td>
                 <td><h4><?php echo $alamat ?></h4></td>
               </tr>
               <tr>
                 <td>Garis Bujur</td>
                 <td><h4><?php echo $longitude ?></h4></td>
               </tr>
               <tr>
                 <td>Garis Lintang</td>
                 <td><h4><?php echo $latitude ?></h4></td>
               </tr>
               <tr>
                 <td>Kode Pos</td>
                 <td><h4><?php echo $kodepost ?></h4></td>
               </tr>
               <tr>
                 <td>Nomor Telepon</td>
                 <td><h4><?php echo $telepon ?></h4></td>
               </tr>
             </table>
             </div>
            </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
      <div class="col-lg-12 text-center">
        <h2 class="text-white mt-0"><br>PLINGLI</h2>
        <hr class="divider light my-4">
        <p class="text-white-50 mb-4">Places Diving In Denpasar</p>
</section>
