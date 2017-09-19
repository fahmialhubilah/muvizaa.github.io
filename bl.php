<?php
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

$url = 'http://'.$_SERVER['HTTP_HOST'].'';
$title = $title;

$ghoib=array('http://cherokeecounty-nc.gov/redirect.aspx?URL=','http://www.biometrics.gov/LeavingSite.aspx?url=','http://democrats.assembly.ca.gov/members/scripts/redirect.asp?url=','http://nationalcityca.gov/redirect.aspx?url=','http://wireless.fcc.gov/cgi-bin/wtbbye.pl?','http://transtats.bts.gov/exit.asp?url=','http://www.biometrics.gov/LeavingSite.aspx?url=','http://cherokeecounty-nc.gov/redirect.aspx?URL=','http://www.biometrics.gov/LeavingSite.aspx?url=
http://democrats.assembly.ca.gov/members/scripts/redirect.asp?url=','http://nationalcityca.gov/redirect.aspx?url=','http://www.corvallisoregon.gov/redirect.aspx?url=','http://www.ric.edu/assets/pages/link_out.php?target=','http://wireless.fcc.gov/cgi-bin/wtbbye.pl?','http://transtats.bts.gov/exit.asp?url=','http://evansville.in.gov/redirect.aspx?URL=','http://www.biometrics.gov/LeavingSite.aspx?url=','http://onlinemanuals.txdot.gov/help/urlstatusgo.html?url=','http://www.broadbandmap.gov/external-redirect/','http://www.olelo.hawaii.edu/redirect.php?url=','http://doleta.gov/regions/reg05/Pages/exit.cfm?vexit=','http://nixonlibrary.gov/exit.php?link=','http://fcc.gov/fcc-bin/bye?','http://nces.ed.gov/forum/datamodel/Information/Transfer.aspx?loc=','http://spaceflight.nasa.gov/cgi-bin/leaving.cgi?newsite=','http://www.fws.gov/pacific/script/exit.cfm?link=','http://www.jsc.nasa.gov/cgi-bin/ap_pao/ap/pao/exitpage/leaving.cgi?newsite=','http://www.pcb.its.dot.gov/pageredirect.asp?redirectedurl=','http://www.senate.gov/cgi-bin/exitmsg?url=','http://www.tc.faa.gov/content/leaving.asp?extlink=','http://www.treasury.gov/cgi-bin/redirect.cgi?','http://water.weather.gov/ahps2/nwsexit.php?url=','http://weather.gov/cgi-bin/nwsexit.pl?url=','http://www.nhc.noaa.gov/nhcexit.shtml?','http://www.prh.noaa.gov/cphc/jump.php?site=','https://transition.fcc.gov/fcc-bin/bye?','http://democrats.assembly.ca.gov/members/scripts/redirect.asp?url=',);
function kopyok1($ghoib){ return $ghoib[rand(0,count($ghoib) - 1)]; }
$bl = kopyok1($ghoib);

echo'<a href="'.$bl.''.$url.'" title="'.$title.'"><b>'.$title.'</b></a>';

?>