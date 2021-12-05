<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Google Map Latitude Longitude</title>
    <script src=" https://maps.googleapis.com/maps/api/js?key=AIzaSyD1f4vUGxabEU5Ayz4D6fiHLyV_iC2f0-E&v=weekly&sensor=false&language=th"></script>

    <script>
        var bangkok = new google.maps.LatLng(13.730995466424108, 100.51986257812496);
        var marker;
        var map;

        function initialize() {
            var mapOptions = {
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                center: bangkok
            };

            map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

            marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                position: bangkok
            });
            google.maps.event.addListener(marker, 'click', toggleBounce);
            google.maps.event.addListener(marker, 'drag', function(event) {
                document.getElementById("lat").value = marker.getPosition().lat();
                document.getElementById("lng").value = marker.getPosition().lng();
            });

            google.maps.event.addListener(marker, 'dragend', function(event) {
                var point = marker.getPoint();
                map.panTo(point);
            });
        }

        function toggleBounce() {
            if (marker.getAnimation() != null) {
                marker.setAnimation(null);
            } else {
                marker.setAnimation(google.maps.Animation.BOUNCE);
            }
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <style type="text/css" media="all">
        body {
            background-color: #fff;
        }

        #map-canvas {
            display: block;
            margin: 40px auto;
            height: 400px;
            width: 800px;
            background-color: #ccc;
        }
    </style>
</head>

<body>
    <div align="center">
        <strong>Latitude</strong> <input type="text" name="lat" id="lat" />-
        <strong>Longitude</strong> <input type="text" name="lng" id="lng" />
    </div>
    <div id="map-canvas"></div>

    <br /><br />
    <div align="center">>>>&nbsp;แจก code free ที่ <a href="https://www.siamfocus.com/freecode.php" target="_blank" title="แจกโค๊ดฟรี">http://www.siamfocus.com/freecode.php</a>
        <<<< /div>
</body>

</html>