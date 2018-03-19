<?php 

session_start();



if(isset($_POST['submit']))
{
	

if(isset($_SESSION['id']))
{
    $id=$_SESSION['id'];
	$host="localhost";
	$username="root";
	$password="";
	$dbname="user";
	
	$conn=mysqli_connect($host,$username,$password,$dbname);
	
	$sql="select * from registration where id='$id'";
	
	$result=mysqli_query($conn,$sql);
	
	$row=mysqli_fetch_assoc($result);
	
	$cpass=$row["password"];
	
	if($_POST['cpass']=="" || $_POST['npass']=="" || $_POST['rpass']=="" )
	{
		echo "FILLUP ALL THYE FIELD";
	}
	else if($cpass != $_POST['cpass'])
	{
	   echo "CURRENT PASSWORD DOESNT MATCH";
	   
	}
	else if( $_POST['npass'] != $_POST['rpass'])
	{
	
	   echo "RETYPE THE PASSWORD CORRECTLY";
	}
	else
	{  
	   $nid=$_POST['rpass'];
	   $sql2="UPDATE registration SET password='$nid'  WHERE id='$id'";
	   mysqli_query($conn,$sql2);
	   echo "PASSWORD UPDATED";
	}

	
	
}
}


?>




<center>
	<form action="#" method="post">
		<table border="0" cellspacing="0" cellpadding="5">
			<tr>
				<td>
					<fieldset>
						<legend>CHANGE PASSWORD</legend>
						Current Password<br />
						<input name="cpass" type="password" /><br />
						New Password<br />
						<input name="npass" type="password" /><br />
						Retype New Password<br />
						<input name="rpass" type="password"/>								
						<hr />
						<input type="submit" name="submit" value="Change" />     
						<a href="<?php if($_SESSION['type']=="user"){ echo "user_home.php";} else {echo "admin_home.php";} ?>">Home</a>						
					</fieldset>
				</td>
			</tr>
		</table>
	</form>
</center>