<?php ob_start();

include 'func.php';

if(!empty($_GET['vid'])){
$vid = $_GET['vid'];


$content = get_contents('https://www.youtube.com/watch?v='.$vid.'');
$cut = extstr3($content, '<div id="watch-queue-loading-template">', '<div id="watch7-sidebar" class="watch-sidebar">');
$name = extstr3($cut, '<meta itemprop="name" content="', '"');
$des = extstr3($cut, '<p id="eow-description" class="" >', '</p>');
$channelid = extstr3($cut, '<meta itemprop="channelId" content="', '"');
$channel1 = extstr3($cut, '<span class="yt-thumb-clip">', '<span');
$channel = extstr3($channel1, 'alt="', '"');
$embed = extstr3($cut, '<link itemprop="embedURL" href="', '"');
$viewCount = extstr3($cut, '<div class="watch-view-count">', ' views</div>');
$durasi = extstr3($cut, '<meta itemprop="duration" content="', '"');
$duration = str_replace('PT', '', $durasi);
$duration = str_replace('H', ' jam ', $duration);
$duration = str_replace('M', ' mnt ', $duration);
$duration = str_replace('S', ' dtk', $duration);
$tgl = extstr3($cut, '<meta itemprop="datePublished" content="', '"');
$date = dateyt($tgl);
$date = str_replace('January', 'Januari', $date);
$date = str_replace('February', 'Februari', $date);
$date = str_replace('March', 'Maret', $date);
$date = str_replace('May', 'Mei', $date);
$date = str_replace('June', 'Juni', $date);
$date = str_replace('July', 'Juli', $date);
$date = str_replace('August', 'Agustus',$date);
$date = str_replace('October', 'Oktober', $date);
$date = str_replace('Nopember', 'November', $date);
$date = str_replace('December', 'Desember', $date);

$permalink = $vid.'/'.trim(substr(strtourl($name), 0, 40), '-');

if($_SERVER['REQUEST_URI'] !== '/video/'.$permalink.'.html'){
header('location: /video/'.$permalink.'.html');
}


?>

<?php
$title = 'Video '.$name.' 3GP MP4 HD';
$desk='Download '.$title.' - Download Video '.$name.'. &amp; tonton gratis video '.$name.'. Download video format MP3, 3GP, MP4, WEBM, AVI, FLV ...';
$keyword='download mp3 dan video '.$month.' '.$year.', download lagu '.$name.' '.$month.' '.$year.', gratis, mp3 gratis, 3gp '.$name.' '.$month.' '.$year.', download full album '.$month.' '.$year.'';
include 'head2.php';
echo '
<h3 class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
<span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="http://'.$_SERVER['HTTP_HOST'].'" itemprop="url"><span itemprop="title">Beranda</span></a></span> / <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="http://'.$_SERVER['HTTP_HOST'].'/" itemprop="url"><span itemprop="title">Video</span></a></span> / ';
if(strlen($name) > 60){
echo ''.substr($name,0,57).'..';
} else {
echo ''.$name.'';
}
echo'
</h3>
<div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'.$vid.'" allowfullscreen></iframe>
</div>
<div style="background:#fff;padding:10px;overflow:hidden">
';
echo'
<table width="100%">
<tr style="border-bottom:1px solid #dcdcdc"><td style="padding:7px 0px">Nama</td><td style="padding:7px 7px 7px 0px">:</td><td style="padding:7px 0px"><strong>'.$name.'</strong></td></tr>
<tr style="border-bottom:1px solid #dcdcdc"><td style="padding:7px 0px">Durasi</td><td style="padding:7px 7px 7px 0px">:</td><td style="padding:7px 0px">'.$duration.'</td></tr>
<tr style="border-bottom:1px solid #dcdcdc"><td style="padding:7px 0px">Dilihat</td><td style="padding:7px 7px 7px 0px">:</td><td style="padding:7px 0px">'.$viewCount.'x</td></tr>
<tr style="border-bottom:1px solid #dcdcdc"><td style="padding:7px 0px">Dipublikasikan</td><td style="padding:7px 7px 7px 0px">:</td><td style="padding:7px 0px">'.$date.'</td></tr>
<tr style="border-bottom:1px solid #dcdcdc"><td style="padding:7px 0px">Sumber</td><td style="padding:7px 7px 7px 0px">:</td><td style="padding:7px 0px">Youtube</td></tr>
<tr style="border-bottom:1px solid #dcdcdc"><td style="padding:7px 0px;vertical-align:top">Suka ini ?</td><td style="padding:7px 7px 7px 0px;vertical-align:top">:</td><td style="padding:7px 0px;vertical-align:top"><iframe src="http://www.facebook.com/plugins/like.php?href=http://facebook.com/Citizen6&amp;layout=button_count&amp;show_faces=false&amp;width=100&amp;action=like&amp;font&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe></td></tr>
</table>
<br/>
';

?>


<?php

if(!empty($_GET['vid'])){
$vid = $_GET['vid'];
}

Class Validator
{
    private $errors = array();
    public function validate()
    {
        if(!function_exists("curl_init")){
            $this->errors = "curl not found";
            return false;
        }
        return true;
    }
    public function getErrors()
    {
        return $this->errors;
    }
}
Class Fetcher
{
    private $data = array();
    private $title;
    public function setId($vid)
    {
        $url = "http://www.youtube.com/get_video_info?video_id=$vid&el=embedded&ps=default&eurl=&gl=US&hl=en";
        $html = $this->_getData($url);
        $this->formatUrl($html);
    }
    private function _getData($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        //curl_setopt($ch, CURLOPT_HEADER, 0);
        //curl_setopt($ch, CURLOPT_TIMEOUT, 25);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
    public function formatUrl($data)
    {
        //split the url
        $splits = explode("&", $data);
        foreach ($splits as $split) {
            $c = explode("=", $split);
            $key = $c[0];
            $values = $c[1];
            $parsed[$key] = $values;
        }
        $this->title = $parsed['title'];
        $streams = explode(',', urldecode($parsed['url_encoded_fmt_stream_map']));
        foreach ($streams as $value) {
            $splits = explode("&", $value);
            foreach ($splits as $split) {
                $c = explode("=", $split);
                $key = $c[0];
                $values = $c[1];

                $format[$key] = urldecode($values);
            }
            $formatted[] = $format;
        }
        foreach ($formatted as $val) {
            $newArr[$val['type']] = $val;
        }
        $array = array_values($newArr);
        Filesize::setUrls($array);
        $this->data = $array;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getData()
    {
        return $this->data;
    }
}
class curlHandler
{
    private $fileSize = array();
    public function Data($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_NOPROGRESS, 0);
        curl_setopt($ch, CURLOPT_PROGRESSFUNCTION, "progress");
        curl_setopt($ch, CURLOPT_SSLVERSION,3);
        $data = curl_exec ($ch);
        //$error = curl_error($ch);
        curl_close ($ch);
        return $data;
    }
    public function progress($resource, $download_size, $downloaded, $upload_size, $uploaded)
    {
        foreach ($download_size as $size){
            $this->fileSize = $size;
        }
    }
    public function getSize()
    {
        foreach ($this->fileSize as $size){
            echo $size."<br/>";
        }
    }

}
class Filesize
{
    public static $fileSizes = array();
    public static function remotefileSize($url)
    {
       $ch = curl_init($url);
	curl_setopt($ch, CURLOPT_NOBODY, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
	curl_exec($ch);
	$filesize = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
	curl_close($ch);
        if ($filesize) {
            self::$fileSizes[] = $filesize;
        }
    }
    public static function setUrls($data)
    {
        foreach ($data as $item => $value) {
            $urls[] = $data[$item]['url'];
        }
        foreach ($urls as $url) {
            self::remotefileSize($url);
        }
    }
    public static function getFilesize()
    {
        return self::$fileSizes;
    }
}
class Converter
{
    public static function megaByte($data)
    {
        $convert = round(($data/1024)/1024, 2);
        return $convert;
    }
}
if( isset($vid) )
    {$validator = new Validator();
    if ($validator->validate() == true) {
    $fetcher = new Fetcher();
    $fetcher->setId($vid);
    $array = $fetcher->getData();
    $get_title = $fetcher->getTitle();
    $file_size = Filesize::getFilesize();

    foreach ($array as $item => $value) {
    $format = explode(";", $value['type']);
echo '<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4"><a rel="nofollow" href="' . $array[$item]['url'] . '&title=' . $get_title . ' "><button class="hg-btn">' . str_replace('video/', '', $format[0]) . " - " . Converter::megaByte($file_size[$item]) . " Mb" . '</button></a></div>';
}
} else {
echo $validator->getErrors();
}
}

echo '<br/><br/><br/>
<div class="btn-group btn-group-justified" role="group" aria-label="">
  <div class="btn-group" role="group">
    <a target="_blank" href="http://www.facebook.com/sharer.php?app_id=638346246326742&redirect_uri=http://'.$_SERVER['HTTP_HOST'].''.$_SERVER['REQUEST_URI'].'&name=Video%20'.$name.'%20MP3,3GP,MP4,WEBM,AVI,FLV&caption=Stafaband HG - '.$duration.'&u=http://'.$_SERVER['HTTP_HOST'].''.$_SERVER['REQUEST_URI'].'&picture=http://img.youtube.com/vi/'.$id.'/hqdefault.jpg&description=Download%20gratis%20Video%20'.$name.'%20dalam%20format%20MP3,%203GP,%20MP4,%20AVI,%20WEBM,%20FLV."><button type="button" class="btn btn-default btn-sm" style="background:#3b5998;color:#ffffff;font-weight:bold">Facebook</button></a>
  </div>
  <div class="btn-group" role="group">
    <a target="_blank" href="https://twitter.com/intent/tweet?text=Video '.$name.' MP3, 3GP, MP4, AVI, WEBM, FLV&url=http://'.$_SERVER['HTTP_HOST'].''.$_SERVER['REQUEST_URI'].'&via=KasMus_Music&original_referer=http://'.$_SERVER['HTTP_HOST'].'"><button type="button" class="btn btn-default btn-sm" style="background:#55acee;color:#ffffff;font-weight:bold">Twitter</button></a>
  </div>
  <div class="btn-group" role="group">
    <a target="_blank" href="//plus.google.com/share?url=http://'.$_SERVER['HTTP_HOST'].''.$_SERVER['REQUEST_URI'].'"><button type="button" class="btn btn-default btn-sm" style="background:#dd4b39;color:#ffffff;font-weight:bold">Google+</button></a>
  </div>
</div>
';

echo '</div>';

include'foot3.php';

}

?>