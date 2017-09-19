<?php

include'func.php';

$title='Mesin Pencarian Video '.$year.'';
$desk='Stafaband HG Portal Download Video - Selamat datang di Stafaband HG, disini Anda dapat mencari video tanpa batas. Dengan tampilan yang simpel dan nyaman, Anda dapat menjelajah dengan cepat. Coba sekarang!';
$keyword='download  mp3, download lagu, gratis, mp3 gratis, 3gp, download full album, lirik lagu, download video, lyrics, song';
include 'head.php';
echo '<div style="max-width:1000px;margin:auto;background:#199bd6;font-size:14px;padding:10px;color:#fff;font-weight:bold;text-align:center">
<span class="glyphicon glyphicon-play" aria-hidden="true"></span> TRENDING VIDEOS
</div><div style="max-width:1000px;margin:auto;background:#fff"><div class="container" style="max-width:1000px;padding-top:20px;background:#fff">';
?>

<?php


$content = get_contents('https://www.youtube.com/feed/trending?gl=ID');
$cut = extstr3($content, '" class="item-section">', '<div class="feed-item-dismissal-notices">');
$itemcount = count(explode('<li class="expanded-shelf-content-item-wrapper">', $cut)) - 1;
if($itemcount > 0){

if($itemcount > 20){ $count = '20'; } else { $count = $itemcount; }

$item = explode('<li class="expanded-shelf-content-item-wrapper">', $cut);

for($i = 1; $i <= $count; $i++){

$vid = extstr3($item[$i], 'data-context-item-id="', '"');
$img = 'https://i.ytimg.com/vi/'.$vid.'/mqdefault.jpg';
$name1 = extstr3($item[$i], '<h3 class="yt-lockup-title ">', '<span class="accessible-description"');
$name = extstr3($name1, 'dir="ltr">', '</a>');
$duration = extstr3($item[$i], '<span class="video-time" aria-hidden="true">', '</span>');
$viewCount1 = extstr3($item[$i], '<ul class="yt-lockup-meta-info">', '</ul>');
$viewCount = extstr3($viewCount1, '</li><li>', ' views</li>');
$date = extstr3($viewCount1, '<li>', '</li>');
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
$chtitle1 = extstr3($item[$i], 'data-ytid="', '<span class="yt-uix-tooltip');
$chtitle = extstr3($chtitle1, '>', '</a>');
$chtitle = str_replace('">', '', $chtitle);
$chtitle = str_replace('</a', '', $chtitle);

$permalink = ''.$vid.'/'.trim(substr(strtourl($name), 0, 40), '-').'';

echo '
<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
    <div class="thumbnail" style="padding:0px;border:1px solid #dcdcdc;border-radius:5px;"><img src="'.$img.'" style="width:100%;border-top-left-radius:5px;border-top-right-radius:5px" />
      <div class="caption" style="text-align:left;border-bottom-left-radius:5px;border-bottom-right-radius:5px">
<span style="font-size:14px;font-weight:bold"><a href="/video/'.$permalink.'.html">'.substr($name, 0, 20).'</a></span><br/>
<span style="font-size:12px;">'.$date.' - '.$duration.'</span><br/>
      </div>
    </div>
  </div>
';
}
}

echo '</div></div>';

include 'foot1.php';

?>