<?php
include('../../../config/connectdb.php');
$id_farmers = $_POST['id_farmers'];
$id_products = null;
$status = null;

$sql_select_transale = "SELECT * FROM `transale` AS trn 
                        INNER JOIN transalede AS trnde ON trnde.id_transale = trn.id_transale 
                        WHERE trn.id_farmers = '$id_farmers' AND trn.status_transale = '2';";

// $sql_transale = "SELECT *, DATE_FORMAT(trn.date_transale, '%H:%i:%s น. %e %M  %Y') AS date_time FROM `transale` as trn INNER JOIN farmers AS far ON far.id_farmers = trn.id_farmers WHERE trn.id_farmers = '$id_farmers'  AND trn.status_transale = '2' ORDER BY trn.date_transale ASC; ";
$sql_transale = "SELECT *, DATE_FORMAT(trn.date_transale, '%H:%i:%s น. %e %M  %Y') AS date_time 
                    FROM `transale` as trn 
                        INNER JOIN roasters AS roa ON roa.id_roasters = trn.id_roasters 
                    WHERE trn.id_farmers = '$id_farmers'  AND trn.status_transale = '2' ORDER BY trn.date_transale ASC; ";

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
                            ชื่อโรงคั่วกาแฟที่สั่งซื้อ : <span class="datasheet-features-type title"> <?php echo $row['name_roasters']; ?></span> &nbsp;&nbsp;&nbsp;
                            <button onclick="do_roa('<?php echo $row['id_roasters'] ?>')" class="btn btn-primary btn-sm">ดูข้อมูลโรงคั่วกาแฟ</button>
                            <button class="btn btn-primary btn-sm" onclick="update_staus_transale('<?php echo $id_transale ?>','4')" style="background-color: red;">ยกเลิกการซื้อขาย</button>
                            <button class="btn btn-primary btn-sm" onclick="update_staus_transale('<?php echo $id_transale ?>','3')" style="background-color: green;">ยืนยันซื้อขายเสร็จสิ้น</button>
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
                    ไม่มีคำสั่งซื้อที่กำลังดำเนินการอยู่
                </div>
            <?php
            endif;
            ?>
        </div>
    </div>
</div>