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

<?php
require_once 'database.php';
$mysqli = new Database();
$title = "Pemetaan Lokasi Diving di Denpasar";
?>

<body id="page-top">
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
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

      <section class="page-section bg-primary" id="about">
      <div class="row">

        <div class="col-md-12" "container">
          <div class="panel panel-info panel-dashboard centered">
            <div class="panel-heading">
              <div class="row justify-content-center">
              <h2 class="text-white mt-0">  DIVING SERVICES MAP <br></h2>
            </div>
              </div>
            <div class="panel-body">
              <div id="map" style="width:100%;height:500px;"></div>

              <!-- ScriptGoogleMapAPI -->
              <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAd3dSy2ivrW8j-Pmz12_bs2rwSaCapCx8&callback=initMap"></script>
              <script type="text/javascript">
                function initMap() {
                  var location = new Array();
                        <?php
                          $koor = $mysqli->koordinat();
                          ?>
                          location = [
                          <?php
                          while($row = $koor->fetch_assoc()){
                            ?>
                            [<?php echo $row['latitude']; ?>,
                            <?php echo $row['longitude']; ?>,
                            '<?php echo $row['id_diving']; ?>',
                            '<?php echo $row['nama_tempat']; ?>',
                            '<?php echo $row['alamat']; ?>',
                            '<?php echo $row['kodepos']; ?>',
                            '<?php echo $row['tlp']; ?>'],
                            <?php
                          }
                         ?>
                      ];
                      var opt = {
                          mapTypeId: google.maps.MapTypeId.ROADMAP
                      }
                      var map = new google.maps.Map(document.getElementById('map'),opt);
                      var infowindow = new google.maps.InfoWindow(),marker,i;
                      var bounds = new google.maps.LatLngBounds();
                      for (i = 0; i < location.length; i++) {
                        /*
                        load semua marker dari database
                        */
                        pos = new google.maps.LatLng(location[i][0],location[i][1]);
                        bounds.extend(pos);
                        marker = new google.maps.Marker({
                          position: pos,
                          map: map
                        });
                        /*
                        menambahkan event click untuk menampilkan infowindow sesuai dengan marker yang di pilih
                        */
                        google.maps.event.addListener(marker,'click',(function(marker,i){
                          return function(){
                            infowindow.setContent('<h3>'+location[i][3]+'<h3>'+
                                                  '<h6><small>Alamat</small>: <p>'+location[i][4]+'</p></h6>'+
                                                  '<h6><small>Kodepos</small>: <p>'+location[i][5]+'</p></h6>'+
                                                  '<h6><small>Nomor Telepon</small>: <p>'+location[i][6]+'</p></h6>'
                                                  );
                            infowindow.open(map,marker);
                          }
                        })(marker,i));
                      }
                      map.fitBounds(bounds);
                    }
              </script>
              <div class="row justify-content-center">
              <div class="col-lg-8 text-center">
                <h2 class="text-white mt-0"><br>PLINGLI</h2>
                <hr class="divider light my-4">
                <p class="text-white-50 mb-4">Places Diving In Denpasar</p>
              </div>
            </div>
            </div>
          </div>
        </div>
        </div>
    </section>
</body>
