<?
$field=$_POST['CONTENTTITLE'];
$key = $_POST['key'];
 
if(!$key){
 echo("<script>
 window.alert('Enter the key words');
 history.go(-1);
 </script>");
 exit;
}

$con = mysql_connect("localhost", "root", "root");
mysql_select_db("MEDIALYNX",$con);
mysql_query("set names 'euckr'");
$result=mysql_query("select * from CONTENT where $field like '%$key%'", $con);
$total = mysql_num_rows($result);
echo("
<table border=0 width=700>
<tr><td align=center colspan2><h1>Media files</h1></td></tr>
<tr><td>검색어: $key</td>
<td align=right><a herf=searchform.php>[전체목록]</a></td></tr>");
echo("
   <table border=1 width=700>
   <tr><td align=center  width=50><b>File name</b><td>
   <td align=center  width=50><b>Type</b><td>
   <td align=center  width=50><b>Size</b><td>
   <td align=center  width=50><b>Synopsis</b><td>
   </tr>
  ");
  if (!$total){
   echo("<tr><td colspan=5 align=center>No search result.</td></tr>");
  } else {
   $counter=0;
   while($counter<$total):
    $Code=mysql_result($result,$counter,"CONTENTTITLE");
    $ProductName=mysql_result($result,$counter,"CONTENTTYPE");
    $Sex=mysql_result($result,$counter,"SIZE");
    $Type=mysql_result($result,$counter,"SYNOPSIS");
  
   
    $counter = $counter + 1;
    endwhile;
    echo("</table>");
  }
  mysql_close($con);
  ?>