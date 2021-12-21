<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAw0nLxD9NsQiJKwFKM38AODUypI8f5FdI&v=weekly&language=th"></script>

</head>
<style>
    /* html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    } */

    #map-canvas {
        height: 50%;
        width: 50%;
    }
    #panel{
        height: 50%;
        width: 50%;
    }

    
</style>

<script>
    function initMap() {

        var bangkok = new google.maps.LatLng(13.730995466424108, 100.51986257812496);

        var pointA = new google.maps.LatLng(13.730995466424108, 100.51986257812496),
            pointB = new google.maps.LatLng(13.730995466424108, 100.41986257812496),

            myOptions = {
                zoom: 7,
                center: pointA
            },


            map = new google.maps.Map(document.getElementById('map-canvas'), myOptions),
            // Instantiate a directions service.
            directionsService = new google.maps.DirectionsService,
            directionsDisplay = new google.maps.DirectionsRenderer({
                map: map
            }),


            markerA = new google.maps.Marker({
                position: pointA,
                title: "point A",
                label: "A",
                map: map
            }),
            markerB = new google.maps.Marker({
                position: pointB,
                title: "point B",
                label: "B",
                map: map
            });
        
        // get route from A to B
        calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB);

    }



    function calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB) {
        directionsService.route({
            origin: pointA,
            destination: pointB,
            avoidTolls: true,
            avoidHighways: false,
            travelMode: google.maps.TravelMode.DRIVING
        }, function(response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
                directionsDisplay.setPanel(document.getElementById('panel'));
            } else {
                window.alert('Directions request failed due to ' + status);
            }
        });
    }


    google.maps.event.addDomListener(window, 'load', initMap);
</script>

<body>
    <div id="map-canvas"></div>
    <div id="panel"></div>
</body>

</html>