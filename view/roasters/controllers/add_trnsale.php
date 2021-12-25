<?php 

if(isset($_POST['key']) && $_POST['key'] == 'add_trnsale'){
    $json = $_POST['data'];
    $array = json_decode( $json);
    $value = json_decode(json_encode($array), true);
    // print_r($array['5']);
    print_r($value[5][1]['id_products']);
    print_r($value[5][1]['id_farmers']);
    print_r($value[5][1]['num_item']);
    print_r($value[5][1]['price_unit']);
    print_r($value[5][1]['sum_price']);
}


?>