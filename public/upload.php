<?php
/*******************************************************
 * Only these origins will be allowed to upload images *
 ******************************************************/
//$accepted_origins = array(URLROOT, "http://classreports", "http://localhost");
/*********************************************
 * Change this line to set the upload folder *
 *********************************************/
define('URLROOT', 'http://fluencyonlife');
$imageFolder = 'images/';
if (!file_exists($imageFolder)) {
    mkdir($imageFolder, 0777, true);
}
reset ($_FILES);
$temp = current($_FILES);

if (is_uploaded_file($temp['tmp_name'])){

 /*   if (isset($_SERVER['HTTP_ORIGIN'])) {
        // same-origin requests won't set an origin. If the origin is set, it must be valid.
        if (in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)) {
            header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
        } else {
            header("HTTP/1.0 403 Origin Denied");
            return;
        }
    }
*/

    // Sanitize input
    if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])) {
        header("HTTP/1.0 500 Invalid file name.");
        return;
    }

    // Verify extension
    if (!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png"))) {
        header("HTTP/1.0 500 Invalid extension.");
        return;
    }
    // Accept upload if there was no origin, or if it is an accepted origin
    $filetowrite = $imageFolder . $temp['name'];
    move_uploaded_file($temp['tmp_name'], $filetowrite);

    echo json_encode(array('location' => URLROOT . '/images/'.$temp['name'] ));
    //echo $d;

} else {
    // Notify editor that the upload failed
    header("HTTP/1.0 500 Server Error");


}
