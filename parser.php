<?php
/**
 * Created by PhpStorm.
 * User: —ладенький
 * Date: 08.10.2015
 * Time: 15:13
 */

function getPage( $url )
{
    $init = curl_init();
    curl_setopt($init, CURLOPT_URL, $url);
    curl_setopt($init, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");
    curl_setopt($init, CURLOPT_TIMEOUT, 15);
    curl_setopt($init, CURLOPT_FOLLOWLOCATION, 0);
    curl_setopt($init, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($init);
    curl_close($init);
    return $result;

}

$url = 'http://bookbattery.com.ua';
$result = getPage($url);

if (! preg_match_all("/<a href=(.*?)<\/a>/", $result, $url_list)){
    $resultTXT = "Category find error";
} else {
    $link = array();
    foreach ($url_list[1] as $key => $value) {
        $tmp = trim($value);
        $nameCategory = preg_replace("/^(.*?)'>/is", "", $tmp);
        $urlCategory = preg_replace("/'>(.*?)$/is", "", $tmp );
        $urlCategory = $url.$urlCategory;
        echo '—сылка - '.$urlCategory.' ------- название: <b>'. $nameCategory.'</b>';
    }
}