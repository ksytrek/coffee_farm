<?php

$id_roasters = $_POST['id_roasters'];
$id_products = null;
$status = null;

$sql_select_transale = "SELECT * FROM `transale` AS trn 
                        INNER JOIN transalede AS trnde ON trnde.id_transale = trn.id_transale 
                        WHERE trn.id_roasters = '$id_roasters' AND trn.status_transale = '1';";

?>

<style type="text/css" media="all">
.title{
    font-size: 16px;
}
</style>

<div class="goods-page">
    <div id="div-product" class="goods-data ">
        <div id="div-product" class="goods-data clearfix">
            <div class="row" style="margin-left: 0px;">
                <span class="datasheet-features-type title">ชื่อฟาร์มที่ขาย</span>
                <button class="btn btn-primary btn-sm">ดูร้านค้า</button>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <img width="100%" height="70px" src="../../pictures/farmers/2021_12_23_09_34_27.png">
                </div>
                <div class="col-sm-4">
                    <img width="70px" height="70px" src="../../pictures/farmers/2021_12_23_09_34_27.png">
                </div>
                <div class="col-sm-4">
                    <img width="70px" height="70px" src="../../pictures/farmers/2021_12_23_09_34_27.png">
                </div>

            </div>


            <hr>
            ยอดคำสั่งซื้อทั้งหมด :
        </div>
    </div>
</div>