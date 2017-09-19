<?php

$content_rel = get_contents('https://www.youtube.com/watch?v='.$vid.'');
$cut_rel = extstr3($content_rel, '<hr class="watch-sidebar-separation-line">', '<div id="watch-more-related" class="hid">');
$relcount = count(explode('<li class="video-list-item related-list-item', $cut_rel)) - 1;
if($relcount > 0){
$related = explode('<li class="video-list-item related-list-item', $cut_rel);
for($rel = 2; $rel <= $relcount; $rel++){
$vid_rel = extstr3($related[$rel], '<a href="/watch?v=', '" ');
$name1_rel = extstr3($related[$rel], '<a href="/watch?v=', '">');
$name_rel = extstr3($name1_rel, 'title="', '"');
$duration_rel = extstr3($related[$rel], 'Duration: ', '.');
$chid_rel = extstr3($related[$rel], '<span class="g-hovercard" data-name="autonav" data-ytid="', '"');
$chtitle_rel = extstr3($related[$rel], 'data-name="related">', '</span>');
$viewCount_rel = extstr3($related[$rel], '<span class="stat view-count">', ' ');

$permalink_rel = $vid_rel.'/'.trim(substr(strtourl($name_rel), 0, 40), '-');

echo '
<table style="width:100%;margin-bottom:7px;overflow:hidden"><tr><td style="vertical-align:top;text-align:center;width:150px"><img src="http://img.youtube.com/vi/'.$vid_rel.'/mqdefault.jpg" title="Video '.$name_rel.' MP3, 3GP, MP4, WEBM, AVI, FLV '.$month.' '.$year.'" alt="Video '.$name_rel.' MP3, 3GP, MP4, WEBM, AVI, FLV '.$month.' '.$year.'" style="width:135px" /></td>
<td style="vertical-align:top;text-align:left"><span style="font-size:13px;color:#333;text-transform:capitalize"><a href="/video/'.$permalink_rel.'.html">'.substr($name_rel, 0, 30).'</a><br/>'.$duration_rel.' - '.$viewCount_rel.'x</span>
</td>
</tr></table>
';

}
}

?>