<?php

if(!empty($_GET['q'])){
$a = strip_tags($_GET['q']);
$mx1 = preg_replace('/[^A-Za-z0-9\-()]/', ' ', $a);
$mx1 = str_replace('&','',$mx1);
$mx2 = strtolower(str_replace(' ','-',$mx1));
$mx = preg_replace('/-+/', '-',$mx2);
$url='/vsearch/'.$mx.'.html';
header('location:'.$url.'');
}

?>