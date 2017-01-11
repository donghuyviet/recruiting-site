<?php
/**
 * Created by PhpStorm.
 * User: buicongdang
 * Date: 12/17/16
 * Time: 10:25 PM
 */

function getCurrentTime($format){

    return date($format);

}

function formatDataTime($dateTimeStr = '', $format = 'Y-m-d H:i:s'){
    $date = new DateTime($dateTimeStr);
    return $date->format($format);
}

function uploadFile($files){
    $target_dir = "uploads/";

    $uploaddir = '/uploads/project/';
    $uploadfile = $uploaddir . basename($files['file']['name']);

    if (move_uploaded_file($files['file']['tmp_name'], $uploadfile)) {

        return 'ok';

    } else {
        return 'error';
    }

}