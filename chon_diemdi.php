<?php
$activate = "index";
@include('header.php');
?>

  <?php 
    if ( isset($_POST['tx_ma']) ) {
      $form_action = "xulydatxe.php";
      $matx =$_POST['tx_ma'] ;
    } 
    else {
      $form_action = "chon_taixe.php";
      $matx = '';
    }
  ?>  
    <div class="showmap"> 
        <div id="map" class=" map leaflet-container leaflet-touch leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom" tabindex="0">
            <div class="leaflet-pane leaflet-map-pane" style="transform: translate3d(0px, 0px, 0px);"></div>					
        </div>
        <div class="leaflet-control-container">
            <div class="leaflet-top leaflet-right"></div>
            <div class="leaflet-bottom leaflet-left"></div>
            <div class="leaflet-bottom leaflet-right"></div>
        </div>
        <script src="js/map_index.js"></script>
    </div>
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5"></div>  


<style> 
    .showmap{
        padding: 10px;
        width: 80%;
        height: 80%;
        z-index: 999;
        background-color: white;
        position: fixed;
        left: 50%;
        top: 60%;
        transform: translate(-50%, -50%);
    }
</style>
