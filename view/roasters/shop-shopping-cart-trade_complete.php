<?php

$id_roasters = $_POST['id_roasters'];
$id_products = null;
$status = null;

$sql_select_transale = "SELECT * FROM `transale` AS trn 
                        INNER JOIN transalede AS trnde ON trnde.id_transale = trn.id_transale 
                        WHERE trn.id_roasters = '$id_roasters' AND trn.status_transale = '1';";

?>

<style type="text/css" media="all">
    .title {
        font-size: 16px;
    }

    .content {
        font-size: 10px;

    }
</style>

<div class="goods-page">
    <div id="div-product" class="goods-data ">
        <div id="div-product" class="goods-data clearfix">
            <div class="col-md-12" style="margin-left: 0px;">
                <div class="row">
                    <!-- <span class="datasheet-features-type title">ชื่อฟาร์มที่ขาย</span> -->
                    <span class="datasheet-features-type title">ชื่อฟาร์มที่ขาย</span> <span style="color:#009900"> *ซื้อขายสำเร็จ</span>

                    <!-- <button class="btn btn-primary btn-sm" style="background-color: red;">ยกเลิกการซื้อขาย</button> -->
                    <button class="btn btn-primary btn-sm">ดูร้านค้า</button>
                    <hr>
                </div>
                <div class="row product-item">
                    <div class="col-sm-3 text-center">
                        <img width="70%" height="100px" src="../../pictures/farmers/2021_12_23_09_34_27.png">
                    </div>
                    <div class="col-sm-3 margin-top-10">
                        ชื่อสินค้า
                    </div>
                    <div class="col-sm-2 text-center margin-top-10">
                        ราคาต่อชิ้น

                    </div>
                    <div class="col-sm-2 text-center margin-top-10">
                        จำนวน
                    </div>
                    <div class="col-sm-2 text-center margin-top-10">
                        ราคารวม
                    </div>
                </div>
                <div class="row product-item">
                    <div class="col-sm-3 text-center">
                        <img width="70%" height="100px" src="../../pictures/farmers/2021_12_23_09_34_27.png">
                    </div>
                    <div class="col-sm-3 margin-top-10">
                        ชื่อสินค้า
                    </div>
                    <div class="col-sm-2 text-center margin-top-10">
                        ราคาต่อชิ้น

                    </div>
                    <div class="col-sm-2 text-center margin-top-10">
                        จำนวน
                    </div>
                    <div class="col-sm-2 text-center margin-top-10">
                        ราคารวม
                    </div>
                </div>
                <!-- </div> -->


                <div class="col-md-12 text-right  margin-bottom-35">

                    ยอดคำสั่งซื้อทั้งหมด : 125,548

                </div>
            </div>

        </div>
    </div>
</div>