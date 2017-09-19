<?php
header('Content-type: text/xml; charset=utf-8');
echo '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.google.com/schemas/sitemap/0.84">';
$div = "|#|";
$dat='last.txt';

$fp=fopen($dat, 'r');
$count=fgets($fp);
fclose($fp);
$cari = $search;
$cari = str_replace(' ', '-', $cari);
$data = explode($div, $count);
if (in_array($cari, $data)) {
$tulis = implode($div, $data);
$hit=$tulis;
}
else {
$data = explode($div, $count);
$tulis = $data[1].''.$div.''.$data[2].''.$div.''.$data[3].''.$div.''.$data[4].''.$div.''.$data[5].''.$div.''.$data[6].''.$div.''.$data[7].''.$div.''.$data[8].''.$div.''.$data[9].''.$div.''.$data[10].''.$div.''.$data[11].''.$div.''.$data[12].''.$div.''.$data[13].''.$div.''.$data[14].''.$div.''.$data[15].''.$div.''.$data[16].''.$div.''.$data[17].''.$div.''.$data[18].''.$div.''.$data[19].''.$div.''.$data[20].''.$div.''.$data[21].''.$div.''.$data[22].''.$div.''.$data[23].''.$div.''.$data[24].''.$div.''.$data[25].''.$div.''.$data[26].''.$div.''.$data[27].''.$div.''.$data[28].''.$div.''.$data[29].''.$div.''.$data[30].''.$div.''.$data[31].''.$div.''.$data[32].''.$div.''.$data[33].''.$div.''.$data[34].''.$div.''.$data[35].''.$div.''.$data[36].''.$div.''.$data[37].''.$div.''.$data[38].''.$div.''.$data[39].''.$div.''.$data[40].''.$div.''.$data[41].''.$div.''.$data[42].''.$div.''.$data[43].''.$div.''.$data[44].''.$div.''.$data[45].''.$div.''.$data[46].''.$div.''.$data[47].''.$div.''.$data[48].''.$div.''.$data[49].''.$div.''.$data[50].''.$div.''.$data[51].''.$div.''.$data[52].''.$div.''.$data[53].''.$div.''.$data[54].''.$div.''.$data[55].''.$div.''.$data[56].''.$div.''.$data[57].''.$div.''.$data[58].''.$div.''.$data[59].''.$div.''.$data[60].''.$div.''.$data[61].''.$div.''.$data[62].''.$div.''.$data[63].''.$div.''.$data[64].''.$div.''.$data[65].''.$div.''.$data[66].''.$div.''.$data[67].''.$div.''.$data[68].''.$div.''.$data[69].''.$div.''.$data[70].''.$div.''.$data[71].''.$div.''.$data[72].''.$div.''.$data[73].''.$div.''.$data[74].''.$div.''.$data[75].''.$div.''.$data[76].''.$div.''.$data[77].''.$div.''.$data[78].''.$div.''.$data[79].''.$div.''.$data[80].''.$div.''.$data[81].''.$div.''.$data[82].''.$div.''.$data[83].''.$div.''.$data[84].''.$div.''.$data[85].''.$div.''.$data[86].''.$div.''.$data[87].''.$div.''.$data[88].''.$div.''.$data[89].''.$div.''.$data[90].''.$div.''.$data[91].''.$div.''.$data[92].''.$div.''.$data[93].''.$div.''.$data[94].''.$div.''.$data[95].''.$div.''.$data[96].''.$div.''.$data[97].''.$div.''.$data[98].''.$div.''.$data[99].''.$div.''.$data[100].''.$div;
$tulis = $cari;
$hit=$tulis;}
$sitemap=fopen($dat, 'w');
fwrite($sitemap,$tulis);
fclose($sitemap);
$fa=fopen($dat, 'r');
$b=fgets($fa);
fclose($fa);
$c = explode($div, $b);
for ($x = 100; $x >= 1; $x--){
$linklast1 = trim($c[$x]);
$linklast1 = strtolower($c[$x]);
$link = preg_replace('/-+/', '-',preg_replace('/[^A-Za-z0-9\-()]/', '-', $linklast1));
echo '
<url>
<loc>http://yt.hitsgrab.com/vsearch/'.$link.'.html</loc>
<lastmod>'.date("Y").'-'.date("m-d").'</lastmod>
<changefreq>weekly</changefreq>
<priority>0.8</priority>
</url>
';
}
echo'</urlset>';
?>