<!-- <script>
    // window.location.assign('./view/roasters/shop-product-list.php');
</script> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>map</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0jquery.min.js"></script>
 -->

    <script src="js.js"></script>


    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD54JsxlZ79EsLprTywJdM8zs1CvMp3I08&libraries=places&language=en" async defer></script> -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAw0nLxD9NsQiJKwFKM38AODUypI8f5FdI&v=weekly&language=th"></script>

</head>

<body>
    <form id="form1" runat="server">
        <div id="dvMap" style="width: 500px; height: 500px">
        </div>
    </form>
</body>


<script type="text/javascript">

var bangkok = new google.maps.LatLng(13.730995466424108, 100.51986257812496);

    var markers = [{
            "title": 'มหาวิทยาลัยสงขลานครินทร์',
            "lat": '7.006941',
            "lng": '100.498412',
            "description": '<b>มหาวิทยาลัยสงขลานครินทร์:</b> (อังกฤษ: Prince of Songkla University; อักษรย่อ: ม.อ.) เป็นมหาวิทยาลัยแห่งแรกในภาคใต้ของประเทศไทย ตาม พระราชบัญญัติมหาวิทยาลัยสงขลานครินทร์ พ.ศ. ๒๕๑๑ ก่อตั้งในปี พ.ศ. 2510 ต่อมา พระบาทสมเด็จพระปรมินทรมหาภูมิพลอดุลยเดชได้พระราชทานชื่อเมื่อวันที่ 22 กันยายน พ.ศ. 2510 จึงถือว่าวันที่ 22 กันยายนของทุกปี เป็นวันสงขลานครินทร์'
        },
        {
            "title": 'สวนสาธารณะหาดใหญ่',
            "lat": '13.730995466424108',
            "lng": '100.51986257812496',
            "description": '<b>สวนสาธารณะเทศบาลนครหาดใหญ่:</b> เป็นแหล่งพักผ่อนหย่อนใจของคนเมืองแห่งนี้ มีทัศนียภาพที่สวยงาม เต็มไปด้วยด้วยแมกไม้เขียวขจี มีอ่างเก็บน้ำขนาดใหญ่ สัตว์น้ำนานาชนิดมากมาย สมบูรณ์ด้วยธรรมชาติอันบริสุทธิ์ ที่รอคอยต้อนรับนักท่องเที่ยวให้ได้สัมผัสกับความร่มรื่นของพรรณไม้นานาชนิด'
        }

    ];
    ///////เป็นการกำหนดค่าต่างๆตอนที่ฟอร์มมีการโหลด

    window.onload = function() {

        //////กำหนดค่ากึ่งกลางการแสดงผลแผนที่ ระยะใกล้ และชนิดการแสดงผลของแผนที่
        var mapOptions = {
            center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
            zoom: 10,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        //////ประกาศ Element ที่จะใช้ในการแสดงผล
        var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
        var infoWindow = new google.maps.InfoWindow();

        var lat_lng = new Array(); ///สร้างตัวแปรอาร์เรย์เพื่อเก็บค่าละติจูด-ลองจิจูด
        var latlngbounds = new google.maps.LatLngBounds();

        /// วนพื่อเก็บค่าละติจูด-ลองจิจูดในตัวแปรอาร์เรย์ และเก็บค่าในการพิกัดจุดของแต่ละจุดที่มี
        for (i = 0; i < markers.length; i++) {
            var data = markers[i]
            var myLatlng = new google.maps.LatLng(data.lat, data.lng);
            lat_lng.push(myLatlng);


            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: data.title
            });

            latlngbounds.extend(marker.position);

            //////กำหนดเมื่อมีอีเวนต์คลิก ให้แสดงผลรายละเอียดที่กำหนดไว้ในตัวแปรของ marker ที่กำหนดไว้ในแต่ละตำแหน่ง
            (function(marker, data) {
                google.maps.event.addListener(marker, "click", function(e) {
                    infoWindow.setContent(data.description);
                    infoWindow.open(map, marker);
                });
            })(marker, data);
        }
        map.setCenter(latlngbounds.getCenter());
        map.fitBounds(latlngbounds);

        //***********ส่วนของการแสดงเส้นทาง****************//

        //ประกาศ Path Array
        var path = new google.maps.MVCArray();

        //ประกาศการใช้งาน Direction Service
        var service = new google.maps.DirectionsService();

        //กำหนดสีของเส้นทางที่ต้องการ
        var poly = new google.maps.Polyline({
            map: map,
            strokeColor: '#4986E7'
        });

        //วนลูปเพื่อวาดเส้นทางระหว่างจุดที่มีในแผนที่
        for (var i = 0; i < lat_lng.length; i++) {
            if ((i + 1) < lat_lng.length) {
                var src = lat_lng[i];
                var des = lat_lng[i + 1];
                path.push(src);
                poly.setPath(path);
                service.route({
                    origin: src,
                    destination: des,
                    travelMode: google.maps.DirectionsTravelMode.DRIVING
                    /////กำหนด Mode ในการแสดงผลเส้นทาง(จะกล่าวเพิ่มเติมในภายหลัง)
                }, function(result, status) {
                    if (status == google.maps.DirectionsStatus.OK) {
                        for (var i = 0, len = result.routes[0].overview_path.length; i < len; i++) {
                            path.push(result.routes[0].overview_path[i]);
                        }
                    }
                });
            }
        }
    }
</script>

</html>