<?php
include('../../config/connectdb.php');
$id_roasters = $_POST['id_roasters'];
$id_products = null;
$status = null;
$date_get = $_GET['date'] == 'null'? '' : "AND date_transale BETWEEN 'GETDATE()' AND '{$_GET['date']} 23:59:59' " ;

$sql_select_transale = "SELECT * FROM `transale` AS trn 
                        INNER JOIN transalede AS trnde ON trnde.id_transale = trn.id_transale 
                        WHERE trn.id_roasters = '$id_roasters' AND trn.status_transale = '3';";

$sql_transale = "SELECT *, DATE_FORMAT(trn.date_transale, '%H:%i:%s น. %e %M  %Y') AS date_time 
                    FROM `transale` as trn INNER JOIN farmers AS far ON far.id_farmers = trn.id_farmers 
                WHERE trn.id_roasters = '$id_roasters'  
                    AND trn.status_transale = '3'  
                    $date_get
                ORDER BY trn.date_transale ASC; ";

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
            <div class="row margin-bottom-10 margin-right-10">
                <div class="col-md-12 col-sm-12">
                    <div class="pull-right">
                        <input type="date" value="<?php echo $_GET['date'] == 'null'? '':$_GET['date'] ?>" name="" max="<?php echo date('Y-m-d'); ?>" class="form-control input-sm" onChange="select_date(this.value)">
                        <!-- <select id="" name="" class="form-control input-sm">
                            <option value="">1 วัน</option>
                            <option value="">7 วัน</option>
                            <option value="">14 วัน</option>
                            <option value="">30 วัน</option>
                            <option value="">90 วัน</option>
                            <option value="">180 วัน</option>
                            <option value="">360 วัน</option>
                        </select> -->

                        <script>
                            function select_date(value) {
                                // alert(value)
                                var searchParams = new URLSearchParams(window.location.search);
                                searchParams.set("date", value);
                                window.location.search = searchParams.toString();

                                // window.history.pushState('', '', window.location.search+"?date="+value);
                            }
                        </script>

                    </div>
                    <div class="pull-right">
                        <label class="control-label" style="padding-top: 5px; margin-right: 5px;">ดูประวัติย้อนหลัง :</label>
                    </div>

                </div>
            </div>

            <?php
            $result = Database::query($sql_transale, PDO::FETCH_ASSOC);
            if ($result->rowCount() != 0) :
                foreach ($result as $row) :
                    $id_transale = $row['id_transale'];
                    $sql_select_transale_de = "SELECT *, DATE_FORMAT(pro.harvest_date, '%e %M  %Y') AS date_time_harvest_date 
                                                FROM `transalede` AS trade 
                                                    INNER JOIN products AS pro ON pro.id_products = trade.id_products 
                                                WHERE trade.id_transale = '$id_transale' ";
            ?>
                    <div class="col-md-12" style="margin-left: 0px; border: 1px solid red; margin-bottom: 10px;">
                        <div class="row" style="padding:5px">
                            <button onclick="do_farm('<?php echo $row['id_farmers'] ?>')" class="btn btn-primary btn-sm">ดูร้านค้า</button>
                            <button id="show_tran_de-<?php echo $row['id_transale']; ?>" class="btn btn-primary btn-sm" style="background-color: #CD5C5C;">แสดงรายละเอียด</button>
                            <button style="display: none" id="hide_tran_de-<?php echo $row['id_transale']; ?>" class="btn btn-primary btn-sm" style="background-color: #A52A2A;">ย่อรายละเอียด</button>

                            รหัสรายการสินค้า : <span class="datasheet-features-type title"><?php echo $row['id_transale']; ?></span>
                            <br>
                            ชื่อฟาร์มที่ขาย : <span class="datasheet-features-type title"><a href="./information-farm.php?infr=<?php echo $row['id_farmers']; ?>"></a> <?php echo $row['name_farmers']; ?></span> &nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp; วันที่สั่งซื้อ : <span class="datasheet-features-type title"><?php echo $row['date_time']; ?></span>
                            <br>จำนวน : <span class="datasheet-features-type title num_item_transale-<?php echo $row['id_transale']; ?>">2580 Kg.</span>
                            &nbsp;&nbsp;
                            ราคารวม : <span class="datasheet-features-type title"><?php echo $row['sum_price'] ?> บาท</span>


                            <hr id="hr_id-<?php echo $row['id_transale']; ?>" style="display: none;margin:6px">
                            <script>
                                var num_item_transale = 0;

                                $("#show_tran_de-<?php echo $row['id_transale']; ?>").on("click", function() {
                                    $("#tran_de_pro-<?php echo $row['id_transale']; ?>").show();
                                    $("#hide_tran_de-<?php echo $row['id_transale']; ?>").show();
                                    $("#show_tran_de-<?php echo $row['id_transale']; ?>").hide();
                                    $("#hr_id-<?php echo $row['id_transale']; ?>").show();
                                });
                                $("#hide_tran_de-<?php echo $row['id_transale']; ?>").on("click", function() {
                                    $("#tran_de_pro-<?php echo $row['id_transale']; ?>").hide();
                                    $("#hide_tran_de-<?php echo $row['id_transale']; ?>").hide();
                                    $("#show_tran_de-<?php echo $row['id_transale']; ?>").show();
                                    $("#hr_id-<?php echo $row['id_transale']; ?>").hide();

                                });
                            </script>
                        </div>
                        <div id="tran_de_pro-<?php echo $row['id_transale']; ?>" style="display: none;">
                            <?php
                            foreach (Database::query($sql_select_transale_de, PDO::FETCH_ASSOC) as $row_de) :
                            ?>
                                <div class="row product-item" style="margin-bottom: 6px;">
                                    <div class="col-sm-3 text-left ">
                                        ชื่อสินค้า : <?php echo $row_de['name_products'] ?>
                                    </div>
                                    <div class="col-sm-3 text-left ">
                                        เก็บเกี่ยว : <?php echo $row_de['date_time_harvest_date'] ?>
                                    </div>
                                    <div class="col-sm-2 text-left ">
                                        ราคา : <?php echo $row_de['price_tran'] ?> บาท/Kg.
                                    </div>
                                    <div class="col-sm-2 text-left ">
                                        จำนวน : <?php echo $row_de['num_item'] ?> Kg.
                                    </div>
                                    <div class="col-sm-2 text-center  ">
                                        ราคารวม : <span class="datasheet-features-type "><?php echo $row_de['price_tran'] * $row_de['num_item'] ?></span> บาท
                                    </div>
                                </div>
                                <script>
                                    num_item_transale += <?php echo $row_de['num_item'] ?>;
                                </script>
                            <?php
                            endforeach;
                            ?>
                            <div class="col-md-12 text-right  margin-bottom-35 ">
                                <div class="underline">
                                    ยอดคำสั่งซื้อทั้งหมด : <span class="datasheet-features-type title"><?php echo $row['sum_price'] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $(".num_item_transale-<?php echo $row['id_transale']; ?>").html(num_item_transale + " " + "Kg.");
                    </script>
                <?php
                endforeach;
            else :
                ?>
                <div>
                    ไม่พบรายการสั่งซื้อขายเสร็จสิ้น</a>
                </div>
            <?php
            endif;
            ?>
        </div>
    </div>
</div>