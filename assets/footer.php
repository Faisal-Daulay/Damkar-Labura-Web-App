<!-- END PAGE CONTAINER -->

<!-- MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
            <div class="mb-content">
                <p>Are you sure you want to log out?</p>
                <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <a href="logout.php" class="btn btn-success btn-lg">Yes</a>
                    <button class="btn btn-default btn-lg mb-control-close">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MESSAGE BOX-->

<!-- START PRELOADS -->
<audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
<audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
<!-- END PRELOADS -->

<!-- START SCRIPTS -->
<!-- START PLUGINS -->
<script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>
<!-- END PLUGINS -->

<!-- START THIS PAGE PLUGINS-->
<script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
<script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
<script type="text/javascript" src="js/plugins/scrolltotop/scrolltopcontrol.js"></script>

<script type="text/javascript" src="js/plugins/morris/raphael-min.js"></script>
<script type="text/javascript" src="js/plugins/rickshaw/d3.v3.js"></script>
<script type="text/javascript" src="js/plugins/rickshaw/rickshaw.min.js"></script>
<script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
<script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>
<script type='text/javascript' src='js/plugins/bootstrap/bootstrap-datepicker.js'></script>
<script type="text/javascript" src="js/plugins/owl/owl.carousel.min.js"></script>

<script type="text/javascript" src="js/plugins/moment.min.js"></script>
<script type="text/javascript" src="js/plugins/daterangepicker/daterangepicker.js"></script>
<!-- END THIS PAGE PLUGINS-->

<!-- START TEMPLATE -->
<script type="text/javascript" src="js/settings.js"></script>

<script type="text/javascript" src="js/plugins.js"></script>
<script type="text/javascript" src="js/actions.js"></script>

<script type="text/javascript" src="js/all.js"></script>
<!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea'});</script> -->

<!-- NOTIFIKASI ALARM -->
<script>
    function load_unseen_notification(view = '') {
        $.ajax({

            url: 'assets/notif.php',
            method: 'POST',
            data: {
                view: view
            },
            dataType: "json",
            success: function(data) {

                $('.list-group').html(data.notification);
                if (data.unseen_notification > 0) {
                  $('.count').html(data.unseen_notification);
                  var audio = new Audio('audio/alarm.mp3');
                  audio.play();
                } else {
                  $('.count').html('0');
                  var audio = new Audio('audio/alarm.mp3'); 
                }
            }
        });
    }

    load_unseen_notification();

    setInterval(function() {
        load_unseen_notification();
    }, 5000);
</script>

<!-- MAPPING WITH GOOGLE APIS JAVASCRIPT -->
<?php 
  include 'include/config.php';
  $id = $_REQUEST['id'];
  $sql = "SELECT * FROM daftar_lapor WHERE id_lapor=$id";
  $query = mysqli_query($db, $sql);
  while ($ambil = mysqli_fetch_array($query)) {
    $lokasi = $ambil['lokasi'];
    $foto = $ambil['url_img'];
    $x = $ambil['x'];
    $y = $ambil['y'];
  }
?>

<script>
  function initMap(){
    // Map options
    var options = {
      zoom:20,
      mapTypeId: 'satellite',
      center:{lat:<?= $x; ?>,lng:<?= $y; ?>}
    }

    // New map
    var map = new google.maps.Map(document.getElementById('petaku'), options);

    // Listen for click on map
    // google.maps.event.addListener(map, 'click', function(event){
    //   // Add marker
    //   addMarker({coords:event.latLng});
    // });

    
    var icon = {
      // url: "img/icons/fire.png", // url
      scaledSize: new google.maps.Size(50, 50), // size
    };

    // Add marker
    var marker = new google.maps.Marker({
      position:{lat:<?= $x; ?>,lng:<?= $y; ?>},
      map:map,
      icon: icon,
      content:'<h1><?= $lokasi; ?></h1>'
    });

    // var infoWindow = new google.maps.InfoWindow({
    //   content:'<h1>Lynn MA</h1>'
    // });

    // marker.addListener('click', function(){
    //   infoWindow.open(map, marker);
    // });
    

    // Array of markers
    var markers = [
      {
        coords:{lat:<?= $x; ?>,lng:<?= $y; ?>},
        content:'<h1><?= $lokasi; ?></h1>'
      }
    ];

    // Loop through markers
    for(var i = 0;i < markers.length;i++){
      // Add marker
      addMarker(markers[i]);
    }

    // Add Marker Function
    function addMarker(props){
      var marker = new google.maps.Marker({
        position:props.coords,
        map:map,
        //icon:props.iconImage
      });

      // Check for customicon
      if(props.iconImage){
        // Set icon image
        marker.setIcon(props.iconImage);
      }

      // Check content
      if(props.content){
        var infoWindow = new google.maps.InfoWindow({
          content:props.content
        });

        marker.addListener('click', function(){
          infoWindow.open(map, marker);
        });
      }
    }
  }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBf1xjBDuInIis7gVvkvd4s4HSfjaW7W90&callback=initMap">
</script>
<!-- AIzaSyBQWsTdZ7Wus1XazQ7pi-Tpfyd6lJ2fO6A -->
<!-- END TEMPLATE -->
<!-- END SCRIPTS -->
