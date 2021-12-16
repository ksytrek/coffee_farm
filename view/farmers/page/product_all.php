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
                    <option value="&amp;sort=id_productsr&amp;order=ASC" <?php echo isset($_GET["sort"]) && $_GET["sort"] == 'id_productsr' && isset($_GET['order']) && $_GET['order'] == 'ASC' ?   'selected="selected "' : " " ?>>Default</option>
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
        ?>

            <div class="col-md-3 col-sm-6 col-xs-12 ">
                <div class="product-item">
                    <div class="pi-img-wrapper">
                        <img src="../../pictures/product/<?php echo $row['image_pro']; ?>" class="img-responsive" alt="Berry Lace Dress">
                        <div>
                            <a href="../../pictures/product/<?php echo $row['image_pro']; ?>" class="btn btn-default fancybox-button">Zoom</a>
                            <a href="#product-pop-up-<?php echo $row['id_products']; ?>" class="btn btn-default fancybox-fast-view">View</a>
                        </div>
                    </div>
                    <h3><a href="shop-item.php"><?php echo $row['name_products'] ?></a></h3>
                    <div class="pi-price">฿<?php echo $row['price_unit'] ?></div>
                    <a href="javascript:;" class="btn btn-default add2cart">แก้ไขสินค้า</a>

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
                            <h1>ชื่อรายการสินค้า</h1>
                            <div class="price-availability-block clearfix">
                                <div class="price">
                                    <strong><span>&#3647;</span><?php echo $row['price_unit']; ?></strong>
                                </div>

                            </div>
                            <div class="description" style="margin: 10px ; margin-left: 0px;">
                                ประเภทกาแฟ <strong><?php echo $row['name_typepro']; ?></strong>
                            </div>

                            <div class="product-page-cart">
                                <!-- <div class="product-quantity"> -->
                                <!-- <input id="product-quantity" type="text" value="1" readonly name="product-quantity" class="form-control input-sm"> -->
                                <!-- <button class="btn btn-primary" type="submit">เพิ่มสินค้า</button> -->
                                <!-- </div> -->
                                <a href="javascript:;" class="btn btn-default">ปิดการแสดง</a>
                                <button class="btn btn-primary" type="submit">เพิ่มสินค้า</button>
                                <a href="javascript:;" class="btn btn-default">รายละเอียด</a>
                            </div>
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