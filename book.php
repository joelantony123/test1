<?php    
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style1.css" />
</head>

<body>
  <div class="bg">
    <div class="container" id="container">
    <div style="margin-top:50px">
        <form action="" method="POST">
     
          <!-- <div class="social-container">
                     <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a> 
                </div> -->
    <h3> use your email for registration</h3>
          <input type="text" placeholder="Name" name="fname" id="fname" />
          <label id="text1">Enter a valid name</label>
          <input  type="email" placeholder="Email" name="email" id="femail" />
          <label id="email2">Enter a valid email</label>
          <input type="text" placeholder="phone" id="phone1" name="phone" maxlength="10" minlength="10" />
          <label id="text6">Enter a valid phone num</label>
          <select class="bam" name="hostel">
            
          <option value="">Enter your choice</option></option>
          <?php
          $con=mysqli_connect("localhost","root","","db1");
          $query = "select *from `tbl_hospital_reg`";
      $job = mysqli_query($con, $query);
      while($row=mysqli_fetch_array($job))
      {
      ?>
         
            <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
            <?php
      }
            ?>

          </select>
       
          <input type="text" placeholder="Blood group" name="blood" id="blood" />
          <label id="text8">Enter a valid blood group</label>
          <input type="submit" value="submit" name="sub" />
        </form>
      </div>
     
    </div>
  </div>

 
</body>


</html>
<?php
    if (isset($_POST["sub"]))
    {
        
        $fname=$_POST["fname"];
        $phone=$_POST["phone"];
        $hostel=$_POST["hostel"];
        $username=$_POST["email"];
            $blood=$_POST["blood"];
        
     
        $con=mysqli_connect("localhost","root","","db1");
        $query="INSERT INTO `paitents`( `name`, `email`, `phone`, `blood`, `hospital`) VALUES ('$fname','$username','$phone','$blood','$hostel')";
		$job = mysqli_query($con, $query);

		?>
			<script>
                alert("successfully booked the appoinment")
				window.location.href = 'userhome.php';
			</script>
	<?php
	}
?>