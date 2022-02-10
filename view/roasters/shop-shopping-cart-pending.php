<?php
include('../../config/connectdb.php');
$id_roasters = $_POST['id_roasters'];
$id_products = null;
$status = null;

$sql_select_transale = "SELECT * FROM `transale` AS trn 
                        INNER JOIN transalede AS trnde ON trnde.id_transale = trn.id_transale 
                        WHERE trn.id_roasters = '$id_roasters' AND trn.status_transale = '2';";

$sql_transale = "SELECT *, DATE_FORMAT(trn.date_transale, '%H:%i:%s น. %e %M  %Y') AS date_time FROM `transale` as trn INNER JOIN farmers AS far ON far.id_farmers = trn.id_farmers WHERE trn.id_roasters = '$id_roasters'  AND trn.status_transale = '2' ORDER BY trn.date_transale ASC; ";

?>

<style type="text/css" media="all">
    .title {
        font-size: 12px;
    }

    .content {
        font-size: 10px;

    }

    .underline {
        /* border-bottom: double 5px #FFC778; */
        text-decoration: underline;
    }
</style>

<div class="goods-page">
    <div id="div-product" class="goods-data ">
        <div id="div-product" class="goods-data clearfix">
            <?php
            $result = Database::query($sql_transale, PDO::FETCH_ASSOC);
            if ($result->rowCount() != 0) :
                foreach ($result as $row) :
                    $id_transale = $row['id_transale'];
                    $sql_select_transale_de = "SELECT * FROM `transalede` AS trade INNER JOIN products AS pro ON pro.id_products = trade.id_products WHERE trade.id_transale = '$id_transale' ";
            ?>
                    <div class="col-md-12" style="margin-left: 0px; border: 1px solid red; margin-bottom: 10px;">
                        <div class="row" style="padding:10px">
                            รหัสรายการสินค้า : <span class="datasheet-features-type title"><?php echo $row['id_transale']; ?></span>
                            <br>
                            ชื่อฟาร์มที่ขาย : <span class="datasheet-features-type title"><a href="./information-farm.php?infr=<?php echo $row['id_farmers']; ?>"><?php echo $row['name_farmers']; ?></a> </span> &nbsp;&nbsp;&nbsp;
                            <button onclick="do_farm('<?php echo $row['id_farmers'] ?>')" class="btn btn-primary btn-sm">ดูร้านค้า</button>
                            <button class="btn btn-primary btn-sm" onclick="cancel_transel('<?php echo $id_transale ?>')" style="background-color: red;">ยกเลิกการซื้อขาย</button>
                            <button class="btn btn-primary btn-sm" onclick="window.location.assign('./directions-map-farm.php?lat=<?php echo $row['lat_farm'] ?>&lng=<?php echo $row['lng_farm'] ?>')">ค้นหาเส้นทางตั้งฟาร์ม </button>
                            <br> วันที่สั่งซื้อ : <span class="datasheet-features-type title"><?php echo $row['date_time']; ?></span>

                            <hr>
                        </div>
                        <?php
                        foreach (Database::query($sql_select_transale_de, PDO::FETCH_ASSOC) as $row_de) :
                        ?>
                            <div class="row product-item" style="cursor: pointer;" onclick="location.assign('./shop-item.php?product=<?php echo $row_de['id_products'] ?>')">
                                <div class="col-sm-3 text-center">
                                    <a href="shop-item.php?product=<?php echo $row_de['id_products'] ?>"><img width="70%" height="100px" src="../../pictures/product/<?php echo $row_de['image_pro'] ?>" </a>
                                </div>
                                <div class="col-sm-3 text-left margin-top-10">
                                    <label class="" style="color:black;">ชื่อสินค้า :</label>
                                    <a href="shop-item.php?product=<?php echo $row_de['id_products'] ?>">
                                        <?php echo $row_de['name_products'] ?>
                                    </a>
                                </div>
                                <div class="col-sm-2 text-left margin-top-10">
                                    <label class="">ราคาต่อ :</label> <?php echo $row_de['price_tran'] ?> บาท/Kg.
                                </div>
                                <div class="col-sm-2 text-left margin-top-10">
                                    <label class="">จำนวน : </label><?php echo $row_de['num_item'] ?> Kg.
                                </div>
                                <div class="col-sm-2 text-center margin-top-10 ">

                                    <label class="">รวม :</label> <span class="datasheet-features-type "><?php echo $row_de['price_tran'] * $row_de['num_item'] ?></span> บาท
                                </div>
                            </div>
                        <?php
                        endforeach;
                        ?>
                        <div class="col-md-12 text-right  margin-bottom-35 ">

                            <div class="underline">
                                ยอดคำสั่งซื้อทั้งหมด : <span class="datasheet-features-type title"><?php echo $row['sum_price'] ?></span>
                            </div>

                        </div>
                    </div>
                <?php
                endforeach;
            else :
                ?>
                <div>
                    ตะกร้าสินค้าของคุณ ไม่มีคำสั่งซื้อ <a href="./shop-product-list.php">คลิ๊กเพื่อไปยังหน้ารายการสินค้า</a>
                </div>
            <?php
            endif;
            ?>
        </div>
    </div>
</div>