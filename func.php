<?php

function ngegrab($url){$ch = curl_init(); curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($ch,CURLOPT_ENCODING,'gzip');
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$header[] = "Accept-Language: en";
$header[] = "User-Agent: Mozilla/5.0 (Windows; U; Windows NT 6.0; de; rv:1.9.2.3) Gecko/20100401 Firefox/3.6.3
";
$header[] = "Pragma: no-cache";
$header[] = "Cache-Control: no-cache";
$header[] = "Accept-Encoding: gzip,deflate";
$header[] = "Content-Encoding: gzip";
$header[] = "Content-Encoding: deflate";
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
$load = curl_exec($ch);
curl_close($ch);
return $load;}

error_reporting(0);

function extstr3($content,$start,$end){
if($content && $start && $end) {
$r = explode($start, $content);
if (isset($r[1])){
$r = explode($end, $r[1]);
return $r[0];
}
return '';
}
}

function get_contents($url) {  
    $ch = curl_init();  
    curl_setopt ($ch, CURLOPT_COOKIE, $cookie); 
    curl_setopt ($ch, CURLOPT_COOKIEJAR, $cookie); 
    curl_setopt ($ch, CURLOPT_COOKIEFILE, $cookie); 
    curl_setopt ($ch, CURLOPT_HEADER, true); 
    // curl_setopt ($ch, CURLOPT_HTTPHEADER, array("Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8")); 
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4); 
    curl_setopt ($ch, CURLOPT_URL, $url);  
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);  
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);  
    $result = curl_exec ($ch);  
    curl_close($ch);  
    return $result;  
}

function format_time($t,$f=':') {
if($t < 3600){
return sprintf("%02d%s%02d", floor($t/60)%60, $f, $t%60);
} else {
return sprintf("%02d%s%02d%s%02d", floor($t/3600), $f, ($t/60)%60, $f, $t%60);
}
}

function write_to_file($q){
$filename = 'sitemap.dat';
$fh = fopen($filename, "a");
if(flock($fh, LOCK_EX)){
fwrite($fh, $q);
flock($fh, LOCK_UN);
}
fclose($fh);
}

function dateyt($date){
$date=substr($date,0,10); $date=explode('-',$date);
$mn=date('F',mktime(0,0,0,$date[1])); $dates=''.$date[2].' '.$mn.' '.$date[0].''; return $dates;
}

function hapus($txt){
$txt = preg_replace("/[^a-zA-Z0-9_\-]/", "-", trim($txt));
return $txt;
}

function strtourl($string){
$string = preg_replace('/[^a-zA-Z0-9]/i', ' ', $string);
$string = str_replace('&', '', $string);
$string = trim(strip_tags($string));
$string = strtolower($string);
$string = preg_replace('/\s\s+/', ' ', $string);
$string = str_replace(' ', '-', $string);
$string = trim($string, '-');
return $string;
}

$cmonth = date("m");
$year = date("Y");
if($cmonth == '01'){
$month = 'Januari';
} elseif($cmonth == '02'){
$month = 'Februari';
} elseif($cmonth == '03'){
$month = 'Maret';
} elseif($cmonth == '04'){
$month = 'April';
} elseif($cmonth == '05'){
$month = 'Mei';
} elseif($cmonth == '06'){
$month = 'Juni';
} elseif($cmonth == '07'){
$month = 'Juli';
} elseif($cmonth == '08'){
$month = 'Agustus';
} elseif($cmonth == '09'){
$month = 'September';
} elseif($cmonth == '10'){
$month = 'Oktober';
} elseif($cmonth == '11'){
$month = 'November';
} elseif($cmonth == '12'){
$month = 'Desember';
}

function queryencode($q){
$q = preg_replace('/[^A-Za-z0-9\-()]/', '-', $q);
$q = str_replace('&', '', $q);
$q = preg_replace('/-+/', '-', $q);
$q = str_replace("-"," ",$q);
$q = trim(strip_tags($q));
$q = ucwords($q);
return $q;
}


function isBlocked($string){
return preg_match('/(ngintip.*celana dalam|ngintip.*mandi|bigo.*18|bigo.*pascol|pijat plus plus|adegan ranjang|bigo.*ml|nono live.*ml|buka baju|ngintip abg|toge|remas payudara|mastrubasi|seks|bokep|sange|coli|khmer.*kikilu|goyang.*hot|jilmek|toket|colmek|doggy style|adult|cipok|mesum|memek|kontol|ngentot|bugil|telanjang|tetek|nyepong|masturbasi|porno|porn|sex|ngocok|ngaceng|pussy|blowjob|oral|anal|masturbation|adegan.*hot|dangdut.*hot|ciuman di|pamer susu|pamer payudara|bigo live.*hot|nenen|ngentod|xxx|cumshot)/i', $string);
}

$yt_key_array = array('-','-','-');

function acak_key($yt_key_array){ return $yt_key_array[rand(0,count($yt_key_array) - 1)]; }
$yt_key = acak_key($yt_key_array);

?>
