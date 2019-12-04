<?php defined('BASEPATH') OR exit('No direct script access allowed');

function font_family_list($index,$get){
    $order_others = array('Georgia', 'Palatino Linotype', 'Times New Roman', 'Arial', '"Helvetica Neue",Helvetica,Arial,sans-serif', 'Comic Sans MS','Impact','Lucida Sans Unicode','Tahoma','Trebuchet MS','Verdana',
        '"Courier New", Courier, monospace','"Lucida Console", Monaco, monospace','"Trebuchet MS", Helvetica, sans-serif');
    if($get){
        return count($order_others);
    }else{
        return $order_others[$index];
    }
}

function font_size_list($index,$get){
    $order_others = array('10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30');
    if($get){
        return count($order_others);
    }else{
        return $order_others[$index];
    }
}

function select_option($index,$get){
    $order_others = array('Yes','No');
    if($get){
        return count($order_others);
    }else{
        return $order_others[$index];
    }
}