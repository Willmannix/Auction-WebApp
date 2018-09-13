<?php $form =    $data['form']; 
$menuNav = $data['menuNav'];
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
       h3{
        color: orange;
        text-align: center
    }
    h2
    {
        color: orange;
         
         
         text-align: center;
    }
    </style>
<!------ Include the above in your HEAD tag ---------->

</head>
<body>
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    
    <div class="collapse navbar-collapse" id="myNavbar">
       <ul class="nav navbar-nav">
       <?php foreach($menuNav as $menuItem){echo "<li>$menuItem</li>";}?>
      </ul>
     
    </div>
  </div>
</nav>

<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
                                                    <div class="col-xs-6">
                                                        <div id="formTitle"><h3>Enter auction details</h3></div>	
                                                        
							</div>
							
							
						</div>
                                            
						<hr>
                                                
                                               
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<!--enter form --->
                                                                <?php 

                                                             
                                                            
                                                             echo $form;
                                                            
                                                            

                                                                ?>
								<!--enter form --->
                                                                
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
 </body>
</html>