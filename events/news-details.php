<?php 

session_start();

include('includes/config.php');

//Genrating CSRF Token

if (empty($_SESSION['token'])) {

 $_SESSION['token'] = bin2hex(random_bytes(32));

}



if(isset($_POST['submit']))

{

  //Verifying CSRF Token

if (!empty($_POST['csrftoken'])) {

    if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {

$name=$_POST['name'];

$email=$_POST['email'];

$comment=$_POST['comment'];

$postid=intval($_GET['nid']);

$st1='0';

$query=mysqli_query($con,"insert into tblcomments(postId,name,email,comment,status) values('$postid','$name','$email','$comment','$st1')");

if($query):

  echo "<script>alert('comment successfully submit. Comment will be display after admin review ');</script>";

  unset($_SESSION['token']);

else :

 echo "<script>alert('Something went wrong. Please try again.');</script>";  



endif;



}

}

}

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
    <title>Manuraj | Events</title>
		<!-- Loading third party fonts -->
		<script src="js/jquery-1.11.1.min.js"></script>	
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">

<link href="https://fonts.googleapis.com/css?family=Nunito:400,700&display=swap" rel="stylesheet">



    <!-- Template CSS -->

    <link rel="stylesheet" href="assets/css/style-starter.css">

    <!-------news---------->
	
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700&display=swap" rel="stylesheet">



    <!-- Template CSS -->

    <link rel="stylesheet" href="assets/css/style-starter.css">

    <!----------------->

    <link rel="stylesheet" href="./calstyle.css">

    <style>

    @media screen and (min-width: 640px) {

  div.mobi {

    display: none;

  }

}

    </style>





    



    <!-- Bootstrap core CSS -->

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!------/news---->

    <link rel="stylesheet" href="./calstyle.css">

    <style>

    @media screen and (min-width: 640px) {

  div.mobi {

    display: none;

  }

}

    </style>





    



    <!-- Bootstrap core CSS -->

 



    <!-- Custom styles for this template -->



		



<!-- Social media Icons-->	
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.fa {
  padding: 20px;
  font-size: 20px;
  width: 55px;
  text-align: center;
  text-decoration: none;
  margin: 0px 2px;
  border-radius: 50%;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}


.fa-youtube {
  background: #bb0000;
  color: white;
}

.fa-instagram {
  background: #125688;
  color: white;
}




</style>
<!-- Social media Icons-->	















</head>

	<body>
		
		

		<div id="site-content">
			<header class="site-header">
				<div class="container">
					<a href="../index.html" id="branding">
						<img src="../dummy/l1.png" alt="Site Title">
						<small class="site-description">Freelance Flautist</small>
					</a> <!-- #branding -->
					
					<nav class="main-navigation">
						<button type="button" class="toggle-menu"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item "><a href="../index.html">Home</a></li>
              <li class="menu-item "><a href="../about.html">About</a></li>
              <li class="menu-item current-menu-item"><a href="index.php">Events</a></li>
							<li class="menu-item"><a href="../gallery.html">Gallery</a></li>
							<li class="menu-item"><a href="../download.html">Media</a></li>
							<li class="menu-item "><a href="../musicplayer/index.html">Music</a></li>
							<li class="menu-item"><a href="../blog.html">Blog</a></li>
							<li class="menu-item"><a href="../register/index.html">Learn Flute</a></li>
							<li class="menu-item"><a href="../contact.html">Contact</a></li>
						</ul> <!-- .menu -->
					</nav> <!-- .main-navigation -->
					<div class="mobile-menu"></div>
				</div>
			</header> <!-- .site-header -->
			
			<main class="main-content">


    <!-- Page Content -->

    <div class="container">





     

      <div class="row" style="margin-top: 10%">



        <!-- Blog Entries Column -->

        <div class="col-md-8">



          <!-- Blog Post -->

<?php

$pid=intval($_GET['nid']);

 $query=mysqli_query($con,"select tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.id='$pid'");

while ($row=mysqli_fetch_array($query)) {

?>



          <div class="card mb-4">

      

            <div class="card-body">

              <h2 class="card-title"><?php echo htmlentities($row['posttitle']);?></h2>

              <p><b>Category : </b><?php echo htmlentities($row['category']);?> |

                <b>Sub Category : </b><?php echo htmlentities($row['subcategory']);?> <b> Posted on </b><?php echo htmlentities($row['postingdate']);?></p>

                <hr />



 <img class="img-fluid rounded" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">

  

              <p class="card-text"><?php 

$pt=$row['postdetails'];

              echo  (substr($pt,0));?></p>

             

            </div>

            <div class="card-footer text-muted">

             

           

            </div>

          </div>

<?php } ?>

       



      



     



        </div>



        

      </div>

      <!-- /.row -->






        </div>

      </div>

    </div>



  
    <footer class="site-footer">
				<div class="container">
					<img src="../dummy/l1.png" alt="Site Name">
					
					<address>
						<p>Manuraj Singh Rajput<br><!--<a href="tel:354543543">Mobile number</a>--> <br> <a href="mailto:flutist.manuraj@gmail.com">flutist.manuraj@gmail.com</a></p> 
					</address> 
					<center><form action="http://eepurl.com/gXXF05" class="newsletter-form" >
						
						<input type="submit" class="button cut-corner" value=" Get Newsletter" width="700px">
	</form></center>
					
					<a href="https://www.facebook.com/Manurajsinghrajputofficial/" target="_blank" class="fa fa-facebook"></a>
					<a href="https://twitter.com/manurajflute" class="fa fa-twitter" target="_blank"></a>
					<a href="https://www.youtube.com/channel/UCJZnmhFet1nOA0CQ1-5CfMg" target="_blank" class="fa fa-youtube"></a>
					<a href="https://www.instagram.com/manurajsinghrajput_flute/""  target="_blank" class="fa fa-instagram"></a>
					<p class="copy">Copyright &copy; 2020 Manuraj Singh Rajput | All right reserved</p>
					<p style="font-size: xx-small;"> Made by <a href="http://www.harshulgupta.in" target="_blank" style="color: azure;"> Harshul
						Gupta</a></p>
				</div>
			</footer> <!-- .site-footer -->

		</div> <!-- #site-content -->
		


    <!-- Bootstrap core JavaScript -->

    <script src="vendor/jquery/jquery.min.js"></script>

    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


		
</body>

</html>





  </body>



</html>

