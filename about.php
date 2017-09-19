<?php
include'func.php';
$title='Tentang Kami';
include'head2.php';
echo '
<h3 class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#" style="padding-top:13px">
<span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="http://'.$_SERVER['HTTP_HOST'].'" itemprop="url"><span itemprop="title">Beranda</span></a></span> / <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="http://'.$_SERVER['HTTP_HOST'].'/about.html" itemprop="url"><span itemprop="title">Tentang Kami</span></a></span>
</h3>
<div style="padding:10px">
Stafaband HG adalah mesin pencarian musik, video, dan lirik yang memuat jutaan file. File tersebut TIDAK disimpan di server kami, melainkan disediakan oleh Youtube, SoundCloud, Smule, dll.
</div>
';
include'foot2.php';
?>