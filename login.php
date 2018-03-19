<?php

if(isset($_COOKIE['user']))
{
	
	header("Location:user_home.php");
	
}
else if(isset($_COOKIE['admin']))
{
	
	header("Location:admin_home.php");
	
}

else if(isset($_POST['submit']))
{
	session_start();                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
	$id=trim($_POST['id']);
	$pass=trim($_POST['pass']);
	
	if($id=="" || $pass=="")
	{
		echo "Fillup ID and Password!!";
	}
	
	else
	{
		$servername="localhost";
		$user="root";
		$password="";
		$dbname="user";
		
		$conn = mysqli_connect($servername,$user,$password,$dbname);
		
		if(!$conn)
		{
			die("Connection Error :".mysqli_connect_error());
		}
		else
		{
			echo "connected";
		}
		
		$sql="select * from registration where id='$id' and password ='$pass'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0)
		{
			$_SESSION['id']=$id;
			$name=mysqli_fetch_assoc($result);
			$_SESSION['name']=$name["name"];
			$_SESSION['type']=$name["type"];
			$type=$name["type"];
			if($type=="user")
			{
				header("Location:user_home.php");
			}
			else
			{
				header("Location:admin_home.php");
			}
		}
		else
		{
			echo "Invalid ID or Password";
		}
		
	}
	
}




?>




<center>
<form action="#" method="POST">
	<table border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td>
				<fieldset>
					<legend><h3>LOGIN</h3></legend>
					User Id<br/>
					<input type="text" name="id"><br/>                               
					Password<br/>
					<input type="password" name="pass">
					<br /><hr/>
					<input type="submit" name="submit" value="Login">
					<a href="registration.php">Register</a>
				</fieldset>
			</td>
		</tr>                                
	</table>
</form>
</center>