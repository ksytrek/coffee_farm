<?php
$page = null;
$start = 0; // ค่าของ record โดย page1 $startต้อง=0, page2 $startต้อง=3,page3 $startต้อง=6

$pagesize = isset($_GET['limit']) ? $_GET['limit'] : 10;   //จำนวน record ที่ต้องการแสดงในหนึ่งหน้า
$sort =  isset($_GET['sort']) ? $_GET['sort'] : 'id_products';
$order = isset($_GET['order']) ? $_GET['order'] : 'ASC';
$type = isset($_GET['type']) ? $_GET['type'] : '%%';

$between_min = isset($_GET['between_min']) ? $_GET['between_min'] : "0";
$between_max = isset($_GET['between_max']) ? $_GET['between_max'] : "(SELECT MAX(price_unit) as 'max' FROM products )";
$between = "price_unit BETWEEN $between_min AND $between_max ";
$newtype = "  id_typepro LIKE '%%' ";

$sql_count = "SELECT * FROM `products` WHERE  $newtype AND $between AND id_farmers = '$id_farmers' AND status_products != '3' ";
$sql_data = "SELECT *, DATE_FORMAT(pro.harvest_date, '%e %M  %Y') AS date_time_harvest_date FROM products as pro 
                    INNER JOIN typepro as ty ON pro.id_typepro = ty.id_typepro  
                    WHERE pro.id_typepro LIKE '%$type%' 
                    AND pro.$between 
                    AND pro.id_farmers = '$id_farmers'  
                    AND pro.status_products != '3'  
                    ORDER BY $sort $order LIMIT $start,$pagesize"; //คำสั่งแสดง record ต่อหนึ่งหน้า $pagesize = ต้องการกี่ record ต่อ

$result_count = Database::query($sql_count, PDO::FETCH_ASSOC);                      //เก็บข้อมูลไว้ใน $result
$num_rowsx = $result_count->rowCount();   //ใช้คำสั่ง mysql_num_rows เพื่อหาจำนวน record ทั้งหมด
$totalpage =  ceil($num_rowsx / $pagesize);


if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $start = ($page - 1) * $pagesize; //นี้เป็นสูตรการคำนวนครับ
    // 2 -1 * 50
    if ($num_rowsx < $start) {
        $start = 0;
    }
} else {
    $page = 0;
    $start = 0;
}

// echo $_GET['page'];



//หาค่า page ทั้งหมดว่ามีกี่ page โดยการนำ record ทั้งหมดมาหารกับจำนวน record ที่แสดงต่อหนึ่งหน้า //แต่อาจได้ค่าทศนิยม เราจึงใช้คำสั่ง ceil เพื่อปัดค่าขึ้นเป็นจำนวนเต็มครับ
//หนึ่งหน้า  $start= เริ่มจาก record ที่เท่าไหร่
$result_data = null;
$num_rows = null;

try {
    // $sql_data = "SELECT * FROM products WHERE id_typepro LIKE '%$type%' ORDER BY id_products $order LIMIT $start,$pagesize";
    $result_data =  Database::query($sql_data, PDO::FETCH_ASSOC);
    $popup = Database::query($sql_data, PDO::FETCH_ASSOC);
    $num_rows = $result_data->rowCount();
} catch (Exception $e) {
}


?>
<div class="product_all">
    <div class="row list-view-sorting clearfix">
        <div class="col-md-4 col-sm-4 ">
            <!-- class=" list-view " ซ่อนการแสดง-->
            <!-- <h2 class="pull-left">สินค้าของคุณที่กำลังประกาศขาย </h2> -->
        </div>
        <div class="col-md-8 col-sm-8">
            <div class="pull-right">
                <button id="btn_reset" type="button" class="btn btn-default btn-sm ">คืนค่าเริ่มต้น</button>
                <script>
                    $("#btn_reset").click(function() {
                        location.assign("<?php echo $_SERVER['PHP_SELF'] ?>");
                    });
                </script>
            </div>
            <div class="pull-right">
                <label class="control-label">แสดง:</label>
                <select id="select_limit" name="select_limit" class="form-control input-sm" onChange="select_sort_by(this);">
                    <option value="&amp;limit=10" <?php echo isset($_GET["limit"]) && $_GET["limit"] == 10 ?   'selected="selected "' : " " ?>>10</option>
                    <option value="&amp;limit=25" <?php echo isset($_GET["limit"]) && $_GET["limit"] == 25 ?   'selected="selected "' : " " ?>>25</option>
                    <option value="&amp;limit=50" <?php echo isset($_GET["limit"]) && $_GET["limit"] == 50 ?   'selected="selected "' : " " ?>>50</option>
                    <option value="&amp;limit=75" <?php echo isset($_GET["limit"]) && $_GET["limit"] == 75 ?   'selected="selected "' : " " ?>>75</option>
                    <option value="&amp;limit=100" <?php echo isset($_GET["limit"]) && $_GET["limit"] == 100 ?   'selected="selected "' : " " ?>>100</option>
                </select>
            </div>

            <div class="pull-right">
                <label class="control-label">จัดเรียง&nbsp;โดย:</label>
                <select id='sort_by' class="form-control input-sm" onChange="select_sort_by(this);">
                    <option value="&amp;sort=id_products&amp;order=ASC" <?php echo isset($_GET["sort"]) && $_GET["sort"] == 'id_products' && isset($_GET['order']) && $_GET['order'] == 'ASC' ?   'selected="selected "' : " " ?>>Default</option>
                    <option value="&amp;sort=name_products&amp;order=ASC" <?php echo isset($_GET["sort"]) && $_GET["sort"] == 'name_products' && isset($_GET['order']) && $_GET['order'] == 'ASC' ?   'selected="selected "' : " " ?>>ชื่อ (A - Z)</option>
                    <option value="&amp;sort=name_products&amp;order=DESC" <?php echo isset($_GET["sort"]) && $_GET["sort"] == 'name_products' && isset($_GET['order']) && $_GET['order'] == 'DESC' ?   'selected="selected "' : " " ?>>ชื่อ (Z - A)</option>
                    <option value="&amp;sort=price_unit&amp;order=ASC" <?php echo isset($_GET["sort"]) && $_GET["sort"] == 'price_unit' && isset($_GET['order']) && $_GET['order'] == 'ASC' ?   'selected="selected "' : " " ?>>ราคา (ต่ำ &gt; สูง)</option>
                    <option value="&amp;sort=price_unit&amp;order=DESC" <?php echo isset($_GET["sort"]) && $_GET["sort"] == 'price_unit' && isset($_GET['order']) && $_GET['order'] == 'DESC' ?   'selected="selected "' : " " ?>>ราคา (สูง &gt; ต่ำ)</option>
                </select>

                <script>
                    function select_sort_by(object) {
                        var count = 0;
                        // 
                        if (queryString.includes("?")) {
                            location.assign(window.location.href + object.value);
                        } else {
                            location.assign(window.location.href + "?" + object.value);
                        }
                    }

                    function select_limit(object) {
                        if (queryString.includes("?")) {
                            location.assign(window.location.href + object.value);
                        } else {
                            location.assign(window.location.href + "?" + object.value);
                        }
                    }
                </script>
            </div>
        </div>
    </div>
    <div class="row product-list">

        <?php
        foreach ($result_data as $row) :
            // print_r($row);
        ?>

            <div class="col-md-3 col-sm-6 col-xs-12 ">
                <div class="product-item">
                    <div class="pi-img-wrapper">
                        <img src="../../pictures/product/<?php echo $row['image_pro']; ?>" class="img-responsive" alt="">
                        <div>
                            <a href="../../pictures/product/<?php echo $row['image_pro']; ?>" class="btn btn-default fancybox-button">Zoom</a>
                            <a href="#product-pop-up-<?php echo $row['id_products']; ?>" class="btn btn-default fancybox-fast-view">View</a>
                        </div>
                    </div>
                    <h3><a href="#"><?php echo $row['name_products'] ?></a></h3>
                    <div class="description" style="margin: 5px ; margin-left: 0px;">
                        คงเหลือ <strong><?php echo $row['num_stock']; ?></strong> Kg.
                    </div>
                    <div class="description" style="margin: 5px ; margin-left: 0px;">
                        เก็บเกี่ยว <strong><?php echo $row['date_time_harvest_date']; ?></strong>
                    </div>
                    <div class="pi-price">฿<?php echo $row['price_unit'] ?> / Kg.</div>
                    <a href="#product-pop-up-edit-<?php echo $row['id_products']; ?>" class="btn btn-default fancybox-fast-view add2cart">แก้ไขสินค้า</a>

                    <div class="sticker sticker-<?php echo $row['status_products'] == '1' ? 'sale' : "unsale" ?>"></div>
                </div>
            </div>

            <div id="product-pop-up-<?php echo $row['id_products']; ?>" style="display: none; width: 700px;">
                <div class="product-page product-pop-up">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-3">
                            <div class="product-main-image">
                                <img src="../../pictures/product/<?php echo $row['image_pro']; ?>" alt="Cool green dress with red bell" class="img-responsive">
                            </div>

                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-9">
                            <h1><?php echo $row['name_products'] ?></h1>
                            <div class="price-availability-block clearfix">
                                <div class="price">
                                    <strong><span>&#3647;</span><?php echo $row['price_unit']; ?> / Kg.</strong>
                                </div>

                            </div>
                            <div class="description" style="margin: 10px ; margin-left: 0px;">
                                จำนวนคงเหลือ <strong><?php echo $row['num_stock']; ?></strong> Kg.
                            </div>
                            <div class="description" style="margin: 10px ; margin-left: 0px;">
                                ประเภทกาแฟ <strong><?php echo $row['name_typepro']; ?></strong>
                            </div>

                            <div class="product-page-cart">
                                <a href="#product-pop-up-edit-<?php echo $row['id_products']; ?>" class="btn btn-default fancybox-fast-view add2cart">แก้ไขสินค้า</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="product-pop-up-edit-<?php echo $row['id_products']; ?>" style="display: none; width: 700px;">
                <div class="product-page product-pop-up">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-9">
                            <h1>แก้ไขข้อมูลสินค้า</h1>
                            <form id="form_edit_Product-<?php echo $row['id_products']; ?>" role="form" action="javascript:void(0)">
                                <input type="hidden" name="id_products" value="<?php echo $row['id_products']; ?>">
                                <div class="form-group">
                                    <label for=""> ชื่อสินค้ากาแฟ <span class="require">*</span></label>
                                    <input type="text" name="name_products" class="form-control" value="<?php echo $row['name_products']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for=""> ประเภทกาแฟ <span class="require">*</span></label>
                                    <select class="form-control" name="id_typepro" required>
                                        <option value="<?php echo $row['id_typepro'] ?>" selected><?php echo $row['name_typepro']; ?></option>
                                        <?php
                                        $result = Database::query("SELECT * FROM `typepro`", PDO::FETCH_ASSOC);
                                        foreach ($result as $row_type) {
                                        ?>
                                            <option value="<?php echo $row_type['id_typepro'] ?>"><?php echo $row_type['name_typepro'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">วันที่เก็บเกี่ยว<span class="require">*</span></label>
                                    <input type="date" name="harvest_date" class="form-control" value="<?php echo $row['harvest_date']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">จำนวนคงเหลือ(kg) <span class="require">*</span></label>
                                    <input type="text" name="num_stock" class="form-control" value="<?php echo $row['num_stock']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for=""> ราคาต่อหน่วย (บาท/kg) <span class="require">*</span></label>
                                    <input type="text" name="price_unit" class="form-control" value="<?php echo $row['price_unit']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for=""> รูปสินค้า <span class="require"></span></label>
                                    <input id="image_pro-<?php echo $row['id_products']; ?>" type="file" name="image_pro" class="form-control" value="<?php echo $row['name_products']; ?>" >
                                </div>
                                <div class="product-page-cart" style="text-align: right;">
                                    <a href="javascript:update_Status_pro('<?php echo $row['id_products']; ?>','<?php echo $row['status_products'] ?>');" class="btn btn-default"><?php echo $row['status_products'] == '1' ? 'ปิดการแสดง' : 'เปิดการแสดง' ?></a>
                                    <button class="btn btn-primary" type="submit">บันทึกแก้ไขสินค้า</button>
                                    <a class="btn btn-danger" href="javascript:update_Status_pro('<?php echo $row['id_products']; ?>','3');" class="btn btn-default">ลบสินค้า</a>
                                </div>
                                <div class="form-group">
                                    <img id="img_product-<?php echo $row['id_products']; ?>" src="../../pictures/product/<?php echo $row['image_pro']; ?>" width="100%" height="100%">
                                </div>

                                <script>
                                    // get a reference to the file input
                                    const imageElement_edit_<?php echo $row['id_products']; ?> = document.querySelector("img[id=img_product-<?php echo $row['id_products']; ?>]");
                                    var base64StringImg_product_edit_<?php echo $row['id_products']; ?> = null;
                                    // get a reference to the file input
                                    const fileInput_edit_<?php echo $row['id_products']; ?> = document.querySelector("input[id=image_pro-<?php echo $row['id_products']; ?>]");

                                    var canvas;
                                    // listen for the change event so we can capture the file
                                    fileInput_edit_<?php echo $row['id_products']; ?>.addEventListener("change", (e) => {
                                        const file = e.target.files[0];
                                        const reader = new FileReader();
                                        reader.onloadend = (e) => {
                                            var img = document.createElement("img");
                                            img.onload = function(event) {
                                                // Dynamically create a canvas element
                                                var canvas = document.createElement("canvas");
                                                canvas.width = 960;
                                                canvas.height = 720;
                                                // var canvas = document.getElementById("canvas");
                                                var ctx = canvas.getContext("2d");
                                                // Actual resizing
                                                ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

                                                // Show resized image in preview element
                                                var dataurl = canvas.toDataURL(file.type);
                                                // document.getElementById("preview").src = dataurl;
                                                imageElement_edit_<?php echo $row['id_products']; ?>.src = dataurl;

                                                // console.log(dataurl.replace(/^data:image\/(png|jpg);base64,/, ""));
                                                const base64String_edit_<?php echo $row['id_products']; ?> = dataurl
                                                    .replace("data:", "")
                                                    .replace(/^.+,/, "");
                                                base64StringImg_product_edit_<?php echo $row['id_products']; ?> = base64String_edit_<?php echo $row['id_products']; ?>;

                                                // console.log(base64String);
                                            }
                                            img.src = e.target.result;
                                        };
                                        reader.readAsDataURL(file);
                                    });
                                </script>


                            </form>
                            <script>
                                $("#form_edit_Product-<?php echo $row['id_products']; ?>").submit(function() {
                                    // alert("Add Product");
                                    var $inputs = $("#form_edit_Product-<?php echo $row['id_products']; ?> :input");
                                    var values = {};
                                    $inputs.each(function() {
                                        values[this.name] = $(this).val();
                                    });

                                    if (values['image_pro'] == '') {
                                        values['image_pro'] = "<?php echo $row['image_pro']; ?>";

                                    } else {
                                        values['image_pro'] = base64StringImg_product_edit_<?php echo $row['id_products']; ?>;

                                    }
                                    console.log(JSON.stringify(values));
                                    $.ajax({
                                        url: "./controllers/edit_product.php",
                                        type: "POST",
                                        // dataType: 'text',
                                        data: {
                                            key: "form_edit_Product",
                                            data: values,
                                            id_farmers: ID_FARMERS,
                                            // form_data: form_data
                                        },
                                        success: function(result, textStatus, jqXHR) {
                                            console.log(result);
                                            // alert(result);

                                            if (result == "success") {
                                                alert("แก้ไขสินค้าสำเร็จ");
                                                $("#form_edit_Product-<?php echo $row['id_products']; ?>").trigger("reset");
                                                location.reload();

                                            } else {
                                                alert("เกิดข้อผิดพลาดบางอย่าง");
                                                // location.reload();
                                            }
                                            // console.log(JSON.stringify(values));
                                        },
                                        error: function(jqXHR, textStatus, errorThrown) {

                                        }
                                    });

                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>

        <?php //endfor; 
        endforeach;
        ?>

        <script>
            function update_product(object_id) {
                alert("update");
            }

            function update_Status_pro(id_pro, status) {
                var message = null;
                var Sta = null;
                var click = null;
                if (status == '1') {
                    Sta = 0;
                    message = "ปิดการมองเห็นสำเร็จ"
                    if (confirm('ต้องการปิดการมองเห็นรายการสินค้านี้')) {
                        click = true;
                    } else {
                        click = false;
                    }


                }
                if (status == '0') {
                    Sta = 1
                    message = "เปิดการมองเห็นสำเร็จ"
                    if (confirm('ต้องการเปิดการมองเห็นรายการสินค้านี้')) {
                        click = true;
                    }
                }
                if (status == '3') {
                    Sta = 3
                    message = "ลบสินค้าสำเร็จและไม่สามารถกู้คืนได้"
                    if (confirm('ต้องการลบรายการสินค้านี้ไม่สามารถกู้คืนได้')) {
                        click = true;
                    }
                }

                if (click) {
                    $.ajax({
                        url: "./controllers/edit_product.php",
                        type: "POST",
                        data: {
                            key: 'update_Status_pro',
                            id_farmers: ID_FARMERS,
                            id_products: id_pro,
                            status: Sta
                        },
                        success: function(result, textStatus, jqXHR) {
                            // alert(result);
                            if (result == "success") {
                                alert(message);

                                location.reload();

                            } else {
                                alert("เกิดข้อผิดพลาดบางอย่าง");
                                location.reload();
                            }
                        },
                        error: function(result, textStatus, jqXHR) {

                        }
                    });
                }


                // alert(Sta);

            }
        </script>
    </div>


    <div class="row">
        <div class="col-md-4 col-sm-4 items-info"> รายการที่ <?php echo $num_rowsx == 0 ? 0 : $start + 1; ?> ถึง <?php echo $start + $pagesize > $num_rowsx ? $num_rowsx : $start + $pagesize; ?> of <?php echo $num_rowsx ?> รายการ</div>
        <div class="col-md-8 col-sm-8">
            <ul class="pagination pull-right" id="ul_page">
                <?php
                if ($page > 1) //ถ้า ค่า page มากกว่า 1 แสดงปุ่ม ย้อนกลับ Previuos
                {
                    $pg = $page - 1;

                    echo "<li><a href='javascript:new_page($pg);'>Previuos &laquo;</a></li>";
                }
                ?>

                <?php

                for ($i = 1; $i <= $totalpage; $i++) :

                    if (isset($_GET['page']) && $_GET['page'] == $i) {
                        echo "<li><span>$i</span></li>";
                    } else if (!isset($_GET['page']) && $i == 1) {
                        echo "<li><span>1</span></li>";
                    } else {
                        echo "<li><a href='javascript:new_page($i);'>$i</a></li>";
                    }
                // $page++;
                endfor;
                ?>





                <?php
                //next
                if ($page < $totalpage && $page != 0) //ถ้า ค่า page น้อยกว่า page ทั้งหมด(page ท้ายสุด) แสดงปุ่ม  Next
                {
                    $pg = $page + 1;
                    //echo "<a href='news.php?page=$pg'>Previuos</a>"; //ส่งค่า page ที่ลดลง 1 เมื่อกดปุ่ม next
                    echo "<li><a href='javascript:new_page($pg);'>Next &raquo;</a></li>";
                }

                ?>
            </ul>

            <script>
                function new_page(object) {
                    if (queryString.includes("?")) {
                        location.assign(window.location.href + "&page=" + object);
                    } else {
                        location.assign(window.location.href + "?page=" + object);
                    }
                }
            </script>
        </div>
    </div>
</div>