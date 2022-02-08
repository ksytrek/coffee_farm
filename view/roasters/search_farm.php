<!DOCTYPE html>
<!--
Template: Metronic Frontend Freebie - Responsive HTML Template Based On Twitter Bootstrap 3.3.4
Version: 1.0.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase Premium Metronic Admin Theme: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<?php
include_once('./navbar.php');
?>
<!-- Head BEGIN -->

<head>
    <meta charset="utf-8">
    <title>ที่ตั้งฟาร์มทั้งหมด</title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta content="Metronic Shop UI description" name="description">
    <meta content="Metronic Shop UI keywords" name="keywords">
    <meta content="keenthemes" name="author">

    <meta property="og:site_name" content="-CUSTOMER VALUE-">
    <meta property="og:title" content="-CUSTOMER VALUE-">
    <meta property="og:description" content="-CUSTOMER VALUE-">
    <meta property="og:type" content="website">
    <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
    <meta property="og:url" content="-CUSTOMER VALUE-">

    <?php


    $resultArray = array();
    $jsoo = null;
    try {
        $sql_location_search = "SELECT * FROM `farmers`";
        if ($show_tebelig = Database::query($sql_location_search, PDO::FETCH_ASSOC)) {
            foreach ($show_tebelig  as $row) {
                array_push($resultArray, $row);
            }
            $jsoo = json_encode($resultArray);
        } else {
            $jsoo = json_encode($resultArray);
        }
    } catch (Exception $e) {
        $resultArray = [
            "error" => $e->getMessage()
        ];
        $jsoo =  json_encode($resultArray);
    }
    ?>


</head>


<body class="ecommerce">

    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="./index.html">หน้าหลัก</a></li>
                <li class="active">เเสดงรายชื่อฟาร์มตามรายการจังหวัด</li>
            </ul>
            <div class="row  product-page" style="margin:0px;padding:0px;">
                <div class="col-md-12 col-sm-12">
                    <!-- <div class="product-page"> -->
                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select id="select_proTOp" name="pro" class="form-control">
                                    <option disabled selected value="">ค้นหาจากจังหวัด</option>
                                    <?php
                                    foreach (Database::query("SELECT DISTINCT pro.name_provinces ,pro.id_provinces FROM `provinces` as pro INNER JOIN farmers as far ON far.id_provinces = pro.id_provinces GROUP BY pro.id_provinces;", PDO::FETCH_ASSOC) as $row_provinces) :
                                    ?>
                                        <option value="#handle_<?php echo $row_provinces['id_provinces']; ?>"><?php echo $row_provinces['name_provinces']; ?></option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                                <!-- <a href="#handle_75" style="font-size: 12px;">จังหวัด</a> -->
                                <script>
                                    $("#select_proTOp").on("change", function() {
                                        document.location.href = $(this).val();
                                    });
                                </script>
                            </div>
                            <button type="button" onclick="location.assign('./map-farm.php')" class="btn btn-primary btn-sm">แผนที่ฟาร์ม</button>

                        </div>
                    </div>

                    <?php
                    foreach (Database::query("SELECT DISTINCT pro.name_provinces ,pro.id_provinces FROM `provinces` as pro INNER JOIN farmers as far ON far.id_provinces = pro.id_provinces GROUP BY pro.id_provinces;", PDO::FETCH_ASSOC) as $row_provinces) :
                    ?>
                        <div class="product-page-content" style="padding: 0px ; margin:0px;">
                            <ul id="" class="nav nav-tabs">
                                <li class="active"><a href="" data-toggle="tab" style="font-size: 12px;">จังหวัด<?php echo $row_provinces['name_provinces']; ?></a></li>
                            </ul>
                            <div id="" class="tab-content" style="padding-bottom: 5px;">
                                <div class="tab-pane fade in active" id="handle_<?php echo $row_provinces['id_provinces']; ?>">
                                    <div class="goods-page">
                                        <div id="" class="goods-data clearfix" style="padding: 0px; margin:0px">
                                            <div class="table-wrapper-responsive">

                                                <table summary="Shopping cart" id="">
                                                    <thead>
                                                        <th style="font-size:12px" class="">ภาพ</th>
                                                        <th style="font-size:12px" class="">ชื่อ</th>
                                                        <th style="font-size:12px" class="">เบอร์</th>
                                                        <th style="font-size:12px" class="">อีเมล</th>
                                                        <!-- <th class="goods-page-total" colspan="2">รวม</th> -->
                                                    </thead>
                                                    <tbody id="">
                                                        <style>
                                                            .hh_I :hover{
                                                                background-color: #F0FFFF;
                                                            }
                                                        </style>
                                                        <?php
                                                        foreach (Database::query("SELECT * FROM `farmers` WHERE  `id_provinces` = '{$row_provinces['id_provinces']}';", PDO::FETCH_ASSOC) as $row_farmers) :
                                                        ?>
                                                            <tr class="hh_I" style="cursor: pointer;" onclick="location.assign('./information-farm.php?infr=<?php echo $row_farmers['id_farmers'] ?>')">
                                                                <th class="goods-page-image"><img src="../../pictures/farmers/<?php echo $row_farmers['image_farmers'] ?>" alt="" </td>
                                                                <th style="font-size:12px"><?php echo $row_farmers['name_farmers'] ?></th>
                                                                <th style="font-size:12px"><?php echo $row_farmers['tel_farmers'] ?></th>
                                                                <th style="font-size:12px"><?php echo $row_farmers['email_farmers'] ?></th>
                                                                <!-- <th class="goods-page-total" colspan="2">รวม</th> -->
                                                            </tr>

                                                    </tbody>
                                                <?php
                                                        endforeach;
                                                ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>
        </div>

    </div>



    <?php
    include_once("./footer.php");
    ?>
</body>

</html>