<?php
/**
 * Created by PhpStorm.
 * User: akio
 * Date: 2019.09.18
 * Time: 3:01 上午
 */
?>

<!-- map placeholder START -->
<div class="container">
    <div class="row">
        <div class="col-sm-12"><p id="content-header">Map & Directions</p></div>
    </div>
</div>
<div class="row" style="margin:20px 0 0 0;">
    <div id="map" style="height: 450px;width: 100%;"></div>
<!--    <div class="col-sm-6" id="pano" style="height: 450px;"></div>-->
</div>
<!-- map placeholder END -->

<script>
    window.addEventListener('load', function () {
        mapInitialize();
    });

    function mapInitialize() {
        var location = {lat: <?php echo $lat ?>, lng: <?php echo $lng ?>};
        var map = new google.maps.Map(document.getElementById('map'), {
            center: location,
            zoom: 14
        });

        var marker = new google.maps.Marker({
            position: location,
            map: map,
        });

        var svService = new google.maps.StreetViewService();
        // var panoRequest = {
        //     location: location,
        //     preference: google.maps.StreetViewPreference.NEAREST,
        //     radius: 50,
        //     source: google.maps.StreetViewSource.OUTDOOR
        // };

        var findPanorama = function(radius) {
            panoRequest.radius = radius;
            svService.getPanorama(panoRequest, function(panoData, status){
                if (status === google.maps.StreetViewStatus.OK) {
                    var panorama = new google.maps.StreetViewPanorama(
                        document.getElementById('pano'),
                        {
                            pano: panoData.location.pano,
                        });
                    map.setStreetView(panorama);
                } else {
                    //Handle other statuses here
                    if (radius > 200) {
                        alert("Street View is not available");
                    } else {
                        findPanorama(radius + 5);
                    }
                }
            });
        };

        // findPanorama(50);

        // var panorama = new google.maps.StreetViewPanorama(
        //     document.getElementById('pano'), {
        //         position: location,
        //         pov: {
        //             heading: 34,
        //             pitch: 10
        //         }
        //     });
        // map.setStreetView(panorama);
    }
</script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEGkIWfnUDIgNJvnxFyn1CP_c0tNWN63g"></script>

