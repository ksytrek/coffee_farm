<?php
include('../../../config/connectdb.php');
$id_farmers = $_POST['id_farmers'];
$id_products = null;
$status = null;

$sql_select_transale = "SELECT * FROM `transale` AS trn 
                        INNER JOIN transalede AS trnde ON trnde.id_transale = trn.id_transale 
                        WHERE trn.id_farmers = '$id_farmers' AND trn.status_transale = '1';";

$sql_transale = "SELECT *, DATE_FORMAT(trn.date_transale, '%H:%i:%s น. %e %M  %Y') AS date_time FROM `transale` as trn INNER JOIN farmers AS far ON far.id_farmers = trn.id_farmers WHERE trn.id_farmers = '$id_farmers'  AND trn.status_transale = '1' ORDER BY trn.date_transale ASC; ";

?>

<style type="text/css" media="all">
    .title {
        font-size: 16px;
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
                            ชื่อฟาร์มที่ขาย : <span class="datasheet-features-type title"> <?php echo $row['name_farmers']; ?></span> &nbsp;&nbsp;&nbsp;
                            <button class="btn btn-primary btn-sm" onclick="cancel_transel('<?php echo $id_transale ?>')" style="background-color: red;">ยกเลิกการซื้อขาย</button>
                            <button class="btn btn-primary btn-sm" onclick="window.location.assign('./directions-map-farm.php?lat=<?php echo $row['lat_farm'] ?>&lng=<?php echo $row['lng_farm'] ?>')">ค้นหาเส้นทางตั้งฟาร์ม </button>
                            <br> วันที่สั่งซื้อ : <?php echo $row['date_time']; ?>

                            <hr>
                        </div>
                        <?php
                        foreach (Database::query($sql_select_transale_de, PDO::FETCH_ASSOC) as $row_de) :
                        ?>
                            <div class="row product-item">
                                <div class="col-sm-3 text-center">
                                    <img width="70%" height="100px" src="../../pictures/product/<?php echo $row_de['image_pro'] ?>">
                                </div>
                                <div class="col-sm-3 text-left margin-top-10">
                                    ชื่อสินค้า : <?php echo $row_de['name_products'] ?>
                                </div>
                                <div class="col-sm-2 text-left margin-top-10">
                                    ราคาต่อชิ้น : <?php echo $row_de['price_tran'] ?> บาท
                                </div>
                                <div class="col-sm-2 text-left margin-top-10">
                                    จำนวน : <?php echo $row_de['num_item'] ?> ชิ้น
                                </div>
                                <div class="col-sm-2 text-center margin-top-10 ">

                                    ราคารวม : <span class="datasheet-features-type "><?php echo $row_de['price_tran'] * $row_de['num_item'] ?></span> บาท
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