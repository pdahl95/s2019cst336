<?php 

    session_start();
    include 'dbConnection.php';
    $conn = getDatabaseConnection("media_dump");
    
    $email = $_POST['email'];
    $caption = $_POST['caption'];
        
    if(count($_FILES)> 0){
        if(is_uploaded_file($_FILES['fileName']['tmp_name'])){
            $imgData = addslashes(file_get_contents($_FILES['fileName']['tmp_name']));
            $imageProperties = getimagesize($_FILES['fileName']['tmp_name']);
            
            $sql = "INSERT INTO media_dump (email, caption, media, timestamp) VALUES ('$email', '$caption', '{$imgData}', '');";
            
            $stmt = $conn->prepare($sql);
            $response = $stmt->execute();
        
            echo json_encode($response);

        }
    }
        
?>
<!DOCTYPE HTML>
<html>

<head>
	<title> Project 5 - Media Event Dump </title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="assets/css/main.css" />
	
	<style type="text/css">
	    img {
          border-radius: 4px;  
          padding: 5px; 
          width: 150px; 
          height: 106px;
        }
        img:hover {
          box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
        }
        #test{
            margin-left: 43.5%;
        }
        #results{
            margin: auto 0;
        }
	</style>
	
</head>

<body>

	<!-- Wrapper -->
	<div id="wrapper">

		<!-- Header -->
		<header id="header">
			<!--<span class="avatar"><img src="images/avatar.jpg" alt="" /></span>-->
			<h1>Thank you for sharing these special moments with us! </h1>
			<h3> Have a great day! </h3>
		
		</header>

		<!-- Main -->
		<section id="main">
			<button id="test"> Click here to see the images </button>
			<div id="results"> </div>

				<!-- Thumbnails -->
				<section class="thumbnails">

				</section>

		</section>

		<!-- Footer -->
		<footer id="footer">
			<p>&copy; Pernille Dahl. CST 336 Internet Programming Course </p>
		</footer>

	</div>

	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.poptrox.min.js"></script>
	<script src="assets/js/skel.min.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="functions.js"></script>


</body>

</html>


