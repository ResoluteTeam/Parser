<?php
/**
 * Created by PhpStorm.
 * User: Сладенький
 * Date: 08.10.2015
 * Time: 15:32
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

 //   $result = iconv("Windows-1251", "UTF-8", $result); // в случае если кодировка отличается то перекодируем результат.
 //   $result = convTegs( $result );
    return $result;

}