<?php ob_start();

include 'func.php';

if(!empty($_GET['q'])){

$q = trim(strip_tags($_GET['q']));
$q = strtolower(preg_replace('/[^a-zA-Z0-9]/i','+',$q));
$q = str_replace('/-+/', '-', $q);
$qu = ucwords(str_replace('+', ' ', $q));
$qx = strtourl($q);


if(empty($_GET['page'])){
if($_SERVER['REQUEST_URI'] !== '/vsearch/'.$qx.'.html'){
header('location: /vsearch/'.$qx.'.html');
}
} else {
if($_SERVER['REQUEST_URI'] !== '/vsearch-page/'.$qx.'/'.$_GET['page'].'.html'){
header('location: /vsearch-page/'.$qx.'/'.$_GET['page'].'.html');
}
}


?>

<?php

$title ='Download Video '.ucwords(queryencode($q)).' 3GP MP4 HD';
$desk='Download '.$title.' - Tonton atau download video '.ucwords(queryencode($q)).' '.$month.' '.$year.' di Hitsgrab.com 100% gratis dan mudah, Download gratis video format MP3, Format 3gp, flv, webm';
$keyword='download '.queryencode($q).' '.$month.' '.$year.' mp3, download lagu dan video '.$month.' '.$year.', gratis, mp3 gratis '.$month.' '.$year.', 3gp '.queryencode($q).' '.$month.' '.$year.', download full album '.queryencode($q).' '.$month.' '.$year.', lirik lagu '.queryencode($q).', lirik lagu '.queryencode($q).'';

include 'head2.php';
echo'
<h3 class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
<span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="http://'.$_SERVER['HTTP_HOST'].'" itemprop="url"><span itemprop="title">Beranda</span></a></span> / <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="#" itemprop="url"><span itemprop="title">Cari</span></a></span> / <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="http://'.$_SERVER['HTTP_HOST'].'/vsearch.html" itemprop="url"><span itemprop="title">Video</span></a></span> / ';
if(strlen(queryencode($q)) > 50){
echo ''.substr(ucwords(queryencode($q)),0,47).'..';
} else {
echo ''.ucwords(queryencode($q)).'';
}
echo '
</h3>
<div style="background:#fff;padding:10px;overflow:hidden">
';
?>


<?php

if(!empty($_GET['page'])){
$page = 'sp='.$_GET['page'].'&';
} else {
$page = 'sp=EgIQAQ%253D%253D&';
}

?>

<?php

//BEGIN:RESULT LIST
$content = get_contents('https://www.youtube.com/results?'.$page.'q='.$q.'');
$itemcount = count(explode('<li><div class="yt-lockup', $content)) - 1;
if($itemcount > 0){
$item = explode('<li><div class="yt-lockup', $content);
for($i = 1; $i <= $itemcount; $i++){

$vid = extstr3($item[$i], '="https://i.ytimg.com/vi/', '/hqdefault.jpg');
$img = 'https://i.ytimg.com/vi/'.$vid.'/mqdefault.jpg';
$title1 = extstr3($item[$i], '<h3 class="yt-lockup-title ">', '<span class="accessible-description"');
$title = extstr3($title1, 'dir="ltr">', '</a>');
$duration = extstr3($item[$i], '<span class="video-time" aria-hidden="true">', '</span>');
$views1 = extstr3($item[$i], '<ul class="yt-lockup-meta-info">', '</ul>');
$views = extstr3($views1, '</li><li>', ' views</li>');
$date = extstr3($views1, '<li>', '</li>');
$date = str_replace('minute ago', 'menit lalu', $date);
$date = str_replace('minutes ago', 'menit lalu', $date);
$date = str_replace('hour ago', 'jam lalu', $date);
$date = str_replace('hours ago', 'jam lalu', $date);
$date = str_replace('day ago', 'hari lalu', $date);
$date = str_replace('days ago', 'hari lalu', $date);
$date = str_replace('week ago', 'minggu lalu', $date);
$date = str_replace('weeks ago', 'minggu lalu', $date);
$date = str_replace('month ago', 'bulan lalu', $date);
$date = str_replace('months ago', 'bulan lalu', $date);
$date = str_replace('year ago', 'tahun lalu', $date);
$date = str_replace('years ago', 'tahun lalu', $date);
$permalink = ''.$vid.'/'.trim(substr(strtourl($title), 0, 40), '-').'';

echo '
<div style="margin-bottom:10px;overflow:hidden">
<div class="col-xs-6 col-md-4 col-sm-3 col-lg-3" style="text-align:center;padding:0px;margin:0px"><img src="'.$img.'" alt="Video '.$title.' download MP3, 3GP, MP4, WEBM, AVI, FLV '.$month.' '.$year.'" title="Video '.$title.' download MP3, 3GP, MP4, WEBM, AVI, FLV '.$month.' '.$year.'" style="width:100%" /></div>
<div class="col-xs-6 col-md-4 col-sm-6 col-lg-6"><font style="font-size:14px;color:#333;text-transform:capitalize"><a href="/video/'.$permalink.'.html">'.$title.'</a></font><br/>
<font style="font-size:12px;text-transform:capitalize"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> '.$views.' | <span class="glyphicon glyphicon-time" aria-hidden="true"></span> '.$duration.' | <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> '.$date.'</font></div>
<div class="col-xs-6 col-md-4 col-sm-3 col-lg-3 hidden-xs" style="text-align:center;padding:0px;margin:0px"><a href="/video/'.$permalink.'.html"><button class="hg-btn"><span class="glyphicon glyphicon-play"></span></button></a><a href="/video/'.$permalink.'.html"><button class="hg-btn"><span class="glyphicon glyphicon-download-alt"></span></button></a><a href="/video/'.$permalink.'.html"><button class="hg-btn"><span class="glyphicon glyphicon-share-alt"></span></button></a></div>
</div>
';

}
}

?>

<?php

//BEGIN:PAGINATION
$content = get_contents('https://www.youtube.com/results?'.$page.'q='.$q.'');
$cut = extstr3($content, '<div class="branded-page-box search-pager  spf-link ">', '</div>');
$pagecount = count(explode('/results?sp=', $cut)) - 1;
if($pagecount > 0){
$pagei = explode('/results?', $cut);
for($x = 1; $x <= $pagecount; $x++){
$sp = extstr3($pagei[$x], 'sp=', '&');
$pagenumb = extstr3($pagei[$x], '<span class="yt-uix-button-content">', '</span>');

echo '<a href="/vsearch-page/'.strtourl($q).'/'.$sp.'.html" class="page"><button class="hg-btn">'.$pagenumb.'</button></a>';

}
}
//END:PAGINATION

?>

<?php
echo'</div>';

include 'foot2.php';

}

?>