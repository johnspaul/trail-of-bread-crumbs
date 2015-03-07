
<!doctype html>
<html>
<head>
<script src="jquery-2.1.1.js"></script>
<script src="jquery.min.js"></script>
<script src="jquery.scrolly.min.js"></script>
<script src="jquery.dropotron.min.js"></script>
<meta charset="utf-8">
<title>trail of breadcrumbs</title>
<link rel="stylesheet" href="trail.css" />
</head>
<body>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1025271780819612',

      xfbml      : true,
      version    : 'v2.2'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<header><img height="90px" width="220px" src="../jymace/Untitled-1.png"/>
<p><a href="loginfb.php" id="sign">sign in</a></p>
</header>
<a href="" id="one"><div class="over one"></div></a>
<a href="score.php" id="two"><div class="over two"></div></a>
<a href="" id="three"><div class="over three"></div></a>



<div id="back">
</div>
<div id="question">
<?php

$host="localhost";
$username=""; 
$password=""; 
$db_name="trail"; 
$tbl_name="user"; 

 $db=mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
mysqli_select_db($db,"$db_name")or die("cannot select DB");
$myusername="johns"; 
$mypassword="jp";
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysqli_real_escape_string($db,$myusername);
$mypassword = mysqli_real_escape_string($db,$mypassword);
$sql="SELECT id FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$res=mysqli_query($db,$sql)or die("sorry");
$rows=mysqli_fetch_array($res);
$id=$rows['id'];
$sql1="SELECT * FROM level_question WHERE level_id='$id'";
$res1=mysqli_query($db,$sql1);
$rows1=mysqli_fetch_array($res1);
$rows1['answer']=htmlspecialchars($rows1['answer']);
$image=$rows1['image'];
echo ('<img id="im" src="'.$image.'" />');
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
<label for="answer">ANSWER</label><input type="text" name="answer" id="answer" />
<input id="submit" type="submit" name="submit"/>
</form>
<?php
$host="localhost";
$username=""; 
$password=""; 
$db_name="trail"; 
$tbl_name="level_question"; 

 $db=mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
mysqli_select_db($db,"$db_name")or die("cannot select DB");
$myanswer=$_POST['answer']; 
$myanswer = stripslashes($myanswer);
$myanswer = mysqli_real_escape_string($db,$myanswer);
$sql2="SELECT answer FROM $tbl_name WHERE level_id=$id";
$res2=mysqli_query($db,$sql2);
$rows2=mysqli_fetch_array($res2);
if($rows2['answer']==$myanswer)
{

	$id=$id+1;
	echo "correct answer";
	echo "$myusername";
	$sql3="UPDATE user SET id='$id' WHERE username='$myusername'"; 
	$res3=mysqli_query($db,$sql3) or die("error");

}
?>


</div>

<div class="fb-login-button" data-max-rows="3" data-size="large" data-show-faces="true" data-auto-logout-link="true"></div>
</body>
</html>
<script>
$("#one").mouseenter(function(){
	$(".one").show();});
	$("#one").mouseleave(function(){
		$(".one").hide();});
		
		$("#two").mouseenter(function(){
	$(".two").show();});
	$("#two").mouseleave(function(){
		$(".two").hide();});
		
		
		$("#three").mouseenter(function(){
	$(".three").show();});
	$("#three").mouseleave(function(){
		$(".three").hide();});
</script>