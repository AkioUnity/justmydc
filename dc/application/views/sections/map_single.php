<?php
/**
 * Created by PhpStorm.
 * User: akio
 * Date: 2019.09.18
 * Time: 3:01 上午
 */
?>


<div class="map-section" id="map">   </div>
<!-- map placeholder END -->

<script>
    window.addEventListener('load', function () {
        mapInitialize();
    });

    function mapInitialize() {
        var location = {lat: <?php echo $lat ?>, lng: <?php echo $lng ?>};
        var map = new google.maps.Map(document.getElementById('map'), {
            center: location,
            zoom: 14,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        });
        var marker = new google.maps.Marker({
            position: location,
            map: map,
        });
    }
</script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEGkIWfnUDIgNJvnxFyn1CP_c0tNWN63g"></script>

