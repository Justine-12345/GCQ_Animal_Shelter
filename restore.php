<?php
$connection = mysqli_connect('localhost','root','','mydb');
$filename = 'backup.sql';
$handle = fopen($filename,"r+");
$contents = fread($handle,filesize($filename));
$sql = explode(';',$contents);
foreach($sql as $query){
  $result = mysqli_query($connection,$query);
  if($result){
  }
}
fclose($handle);
echo 'Successfully imported';