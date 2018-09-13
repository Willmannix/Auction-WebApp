<?php 

$login =    $data['login'];  // A string intended of the Left Hand Side of the page
$register =    $data['register'];

$htmlform = $data['htmlform'];

?>
<html lang="en">
<head>
  <title>Auction Site</title>
  <meta charset="utf-8">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="Stylesheets/loginStyleSheet.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="StyleSheets/loginJavascript.js"></script>
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 30px;
      border-radius: 0;
      
   
    }
    </style>
<!------ Include the above in your HEAD tag ---------->

</head>
<body>



<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      
     
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      
     
    </div>
  </div>
</nav>

    
   <?php if($htmlform ==0) : ?>
<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
                                                    <div class="col-xs-6">
							<a href="#" class="active"  id="login-form-link">Login</a>	
                                                        
							</div>
							<div class="col-xs-6">
							 <a href="#"  id="register-form-link">Register</a>	
							</div>
							
						</div>
                                            
						<hr>
                                                
                                               
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<!--enter form --->
                                                                <?php 

                                                             
                                                            
                                                             echo $login;
                                                             echo $register;
                                                            

                                                                ?>
								<!--enter form --->
                                                                
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
 
<?php elseif($htmlform ==1) :  ?>
    <<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
                                                    <div class="col-xs-6">
							<a href="#"   id="login-form-link">Login</a>	
                                                        
							</div>
							<div class="col-xs-6">
							 <a href="#" class="active"  id="register-form-link">Register</a>	
							</div>
							
						</div>
                                            
						<hr>
                                                
                                               
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<!--enter form --->
                                                                <?php 

                                                             
                                                            
                                                             echo $register;
                                                             echo $login;
                                                             
                                                            

                                                                ?>
								<!--enter form --->
                                                                
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
 

  
 
    

    
<?php endif; ?> 
 </body>
</html>