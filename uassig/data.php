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

<section class="page-section btn-primary" id="about">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-info panel-dashboard">
        <div class="col-lg-12 text-center">
          <h2 class="text-black mt-0">Your Diving Partner </h2>
          <hr class="divider light my-4">
        </div>
        <div class="panel-body">
          <table class="table table-bordered table-striped table-admin">
          <thead>
            <tr>
              <th width="10%">No.</th>
              <th width="30%">Nama Jasa Diving</th>
              <th width="10%">alamat</th>
              <th width="13%">Garis Bujur</th>
              <th width="20%">Garis Lintang</th>
              <th width="27%">Kode Pos</th>
              <th width="20%">Nomor Telepon</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $data = file_get_contents('http://localhost/SIG/ambildata.php');
            $no=1;
            if(json_decode($data,true)){
              $obj = json_decode($data);
              foreach($obj->results as $item){
          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $item->nama_tempat; ?></td>
            <td><?php echo $item->alamat; ?></td>
            <td><?php echo $item->longitude; ?></td>
            <td><?php echo $item->latitude; ?></td>
            <td><?php echo $item->kodepos; ?></td>
            <td><?php echo $item->tlp; ?></td>
            <td class="ctr">
              <div class="btn-group">
                <a target="_blank" href="detail.php?id=<?php echo $item->id_diving; ?>" rel="tooltip" data-original-title="Lihat File" data-placement="top" class="btn bg-dark">
                <i class="fa fa-map-marker"> </i> Detail dan Lokasi</a>&nbsp;
              </div>
            </td>
          </tr>
          <?php $no++; }}

          else{
            echo "data tidak ada.";
            } ?>

          </tbody>
        </table>
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
  </div>
  </div>
</section>
