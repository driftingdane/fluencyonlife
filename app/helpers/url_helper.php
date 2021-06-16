<?php
// Simple page redirect

function redirect($page){
    header('Location: ' . URLROOT . '/' . $page );
}
/*
// Append a nice looking title to the URL
function prettyUrl($data) {
    $urlTitle = $data;
    $pretty = str_replace(" ", "-", strtolower($urlTitle));
    return $pretty;

}
*/
// Append a nice looking title to the URL
function prettyUrl($data) {
    $urlTitle = $data;
    $pretty = str_replace(" ", "-", preg_replace('/\s+/', ' ', str_replace(",", " ", strtolower($urlTitle))));
    return $pretty;

}

function clean_string($data) {
    $s = trim($data);
    $s = iconv("UTF-8", "UTF-8//IGNORE", $s); // drop all non utf-8 characters

    // this is some bad utf-8 byte sequence that makes mysql complain - control and formatting i think
    $s = preg_replace('/(?>[\x00-\x1F]|\xC2[\x80-\x9F]|\xE2[\x80-\x8F]{2}|\xE2\x80[\xA4-\xA8]|\xE2\x81[\x9F-\xAF])/', ' ', $s);

    $s = preg_replace('/\s+/', ' ', $s); // reduce all multiple whitespace to a single space
    $s = str_replace(' ', '-', $s);
    $s = str_replace(',', '', $s);
    return $s;
}

function menuLinks($data) {
    $links = $data;
    $menu = str_replace(" ", "-", ucwords($links));
    return $menu;

}

function checkHome() {
    if($_SERVER['SERVER_NAME']) {
        $addClass = "page-content_minus";
    }
    return $addClass;
}
