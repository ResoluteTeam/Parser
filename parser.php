<?php
/**
 * Created by PhpStorm.
 * User: Сладенький
 * Date: 08.10.2015
 * Time: 15:13
 */

include "getPage.php";

$url = 'http://bookbattery.com.ua';
$result = getPage($url);


//<a href="/sony.html" title="Батарея для ноутбуков Sony">Sony</a>
//[5-tyuning.html'>тюнинг]
// $nameCat = preg_replace("/^(.*?)'>/is", "", $tmp);
// $urlCat = preg_replace("/'>(.*?)$/is", "", $tmp );
// preg_replace('/\..+$/','',$str);
// substr('qwauireaau!hhed!sdvg',0,strrpos('qwauireaau!hhed!sdvg', '!'))
if (! preg_match_all("/<a href=(.*?)<\/a>/", $result, $url_list)){
    $resultTXT = "Category find error";
} else {
    $link = array();
    foreach ($url_list[1] as $key => $value) {
        $tmp = trim($value);
//        $tmp = iconv('windows-1251','utf-8', $tmp);
        $nameCategory = preg_replace("/^(.*?)\">/is", "", $tmp );
        $urlCategory = preg_replace("/<a href=\"\/(.*?)$/is", "", $tmp);
        $urlCategory = substr($urlCategory, 0, strrpos($urlCategory, '" title='));
        $urlCategory = substr($urlCategory, 1);
        $urlCategory = $url.$urlCategory;
        if ($urlCategory != $url) {

            $file = 'test.csv';
            $tofile = "'$urlCategory';'$nameCategory';\n";
            $bom = "\xEF\xBB\xBF";
            @file_put_contents($file, $bom . $tofile . file_get_contents($file));
            echo '<br> Link - ' . $urlCategory . ' ------- name: <b>' . $nameCategory . '</b> </br>';
        } else {

        }

    }
}