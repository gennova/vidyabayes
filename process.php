<?php
include "koneksi.php";
echo'
<!DOCTYPE html>
<html lang="en">
<head>
  <title>NAIVE BAYES</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbars default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 768px;
      text-align: left;
      text-indent: 20px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to auto for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <img src="tenten.png" height=50px><a class="navbar-brand" href="#"></a></img>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.html">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <left>
      <p><a href="#">Preprocessing</a></p>
      <p><a href="#">Pembentukan Pola</a></p>
      <p><a href="#">Testing</a></p>
    </left>
    </div>
    <div class="col-sm-8 text-left"> 
      <h1>PREPROCESSING</h1>
      <p>Klarifikasi Buku ';
echo '<br />';
$csv = array();
$file = fopen('test.csv', 'r');
$pieces;
$arraydokumenword; // kata -kata semua dokumen
$arraydokumenkategori;
$arraydokumenbuku;
echo '<table border=1>';
$datacounter=0;
while (($result = fgetcsv($file)) !== false)
{
  $arrayofword;
  $arraykategori;
  $arraybuku;
  echo '<tr>';
    $csv[] = $result;
    echo '<td>'.$result[0].'</td><td>'.$result[1].'</td>'.'<td>P'.$datacounter.'</td>';
    mysql_query("insert into dokumen (judul,kategori,dokumen) values ('".$result[0]."','".$result[1]."','P".       $datacounter."')")or die (mysql_error());
    $pizza  = $result[0];
    $pieces = explode(" ", $pizza);
    for($i=0;$i<count($pieces);$i++){
        $arrayofword[$i] = $pieces[$i];  
        //echo       $arrayofword[$i];
        //echo '<br />';
        $arraykategori[$i] = $result[1];
        $arraybuku[$i]=$datacounter;
        mysql_query("insert into dokumen_detail(detail_kata,kategori,dokumen) values ('".$arrayofword[$i]."','".$arraykategori[$i]."','P".$arraybuku[$i]."')") or die (mysql_error());
    }
    //echo '<br />';
    echo '</tr>';
    $arraydokumenword[$datacounter]=$arrayofword;
    $arraydokumenkategori[$datacounter]=$arraykategori;
    $arraydokumenbuku[$datacounter]=$arraybuku;
    unset($arrayofword); 
    unset($arraykategori);
    unset($arraybuku);
    $datacounter++;
}
$dokumen = $datacounter-1; // kurangi satu karena bagian terakhir counter mengalami penambahan ++
echo '</table>';
fclose($file);
echo "totaaaaaaaaal kataaaaa ".count($arraydokumenword);
echo "<br />";
$bubar = $arraydokumenword[1];
for ($i=0; $i < count($bubar); $i++) { 
  echo $bubar[$i];
  echo "<br />";
}
/*
echo '<br />';
echo 'END OF ROW - Total Dokumen : '.$dokumen;
echo '<br />';
echo "Data Size : ".count($pieces);
echo '<br />';
echo $pieces[0];
echo '<br />';
echo $pieces[1];
echo '<br />';
echo $pieces[2];
echo '<br />';
echo $pieces[3];
echo '<br />';
*/

echo '
    </div>
</div>
</body>
</html>';
?>