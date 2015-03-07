<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>LEADER BOARD-TRAIL OF BREAD CRUMBS</title>
</head>

<body>
<p id="head">LEADER BOARD</p>
<?php

$host="localhost";
$username=""; 
$password=""; 
$db_name="trail"; 
$tbl_name="user"; 

 $db=mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
mysqli_select_db($db,"$db_name")or die("cannot select DB");
$sql="SELECT * FROM $tbl_name ORDER BY id DESC";
$res=mysqli_query($db,$sql);
?>
<div id="view">
<?php
while($rows=mysqli_fetch_array($res)){
	?>
    <div id="single">
    <div id="name"><?php echo $rows['username'];?></div>
 <div id="req">level<?php echo $rows['id'];?></div>
</div>
<?php
}
?>
</div>
</body>
</html>
<style>
#single
{
	margin-top:2%;
}
body
{
	background-image:url(hi.jpg);
	background-size:cover;
	background-color:rgba(102,153,255,.6);
}
#head
{
	font-family:DeconStruct-Black, DeconStruct-BlackOblique, David, DaunPenh;
	font-size:250%;
	color:rgba(255,153,51,1);
	text-align:center;
	
	height:40%;
	width:100%;
	position:absolute;
	display:block;
}
#view
{
	left:35%;
	top:20%;
	display:block;
	position:absolute;
	background-color:rgba(204,204,0,.9);
	width:30%;
	border-radius:6px;
	box-shadow:5px 5px 10px 0px #000000;
}
#name
{
	display:block;
     float:left;
	font-family:"Tekton Pro", Tahoma, "Segoe WP";
	padding-left:10%;
	
	}
#req
{
	display:block;
	font-family:"Eras Demi ITC";
	padding-left:50%;
	
}
</style>