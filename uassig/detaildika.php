<?php
$id = $_GET['id'];
include_once "ambildata_id.php";
$obj = json_decode($data);
$Kode="";
$Jns="";
$Prm="";
$Store="";
$Kab="";
$alamat="";
$lat="";//lintang
$long="";//bujur
foreach($obj->results as $item){
  $Kode.=$item->id_Store;
  $Jns.=$item->id_JnsStore;
  $Prm.=$item->id_Promo;
  $Store.=$item->nama_Toko;
  $Kab.=$item->kabupaten;
  $alamat.=$item->alamat;
  $lat.=$item->koor_lintang;
  $long.=$item->koor_bujur;
}

$Store = "Detail dan Lokasi : ".$Store;
include_once "header.php"; ?>

<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyD58OFFAg9nynVbIHDrDd0c6nHB-D9d4ko"></script>

<script>

function initialize() {
  var myLatlng = new google.maps.LatLng(<?php echo $lat ?>,<?php echo $long ?>);
  var mapOptions = {
    zoom: 10,
    center: myLatlng
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading"><?php echo $Store ?></h1>'+
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
      <div class="row">
      <div class="col-md-5">
          <div class="panel panel-info panel-dashboard">
            <div class="panel-heading centered">
              <h2 class="panel-title"><strong> - Lokasi - </strong></h4>
            </div>
            <div class="panel-body">
              <div id="map-canvas" style="width:100%;height:380px;"></div>
            </div>
          </div>
        </div>
        <div class="col-md-7">
          <div class="panel panel-info panel-dashboard">
            <div class="panel-heading centered">
              <h2 class="panel-title"><strong> - Detail - </strong></h4>
            </div>
            <div class="panel-body">
             <table class="table">
               <tr>
                 <th>Item</th>
                 <th>Detail</th>
               </tr>
               <tr>
                 <td>Nama Toko</td>
                 <td><h4><?php echo $Store ?></h4></td>
               </tr>
               <tr>
                 <td>Kabupaten</td>
                 <td><h4><?php echo $Kab ?></h4></td>
               </tr>
               <tr>
                 <td>Alamat</td>
                 <td><h4><?php echo $alamat ?></h4></td>
               </tr>
               <tr>
                 <td>Latitude</td>
                 <td><h4><?php echo $lat ?></h4></td>
               </tr>
               <tr>
                 <td>Longitude</td>
                 <td><h4><?php echo $long ?></h4></td>
               </tr>
             </table>
            </div>
            </div>
          </div>


        </div>
      </div>
    </div>
    <?php include_once "footer.php"; ?>
