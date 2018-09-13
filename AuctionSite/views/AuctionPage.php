<?php
                 
                 
                  $description = $data['description'];
                   $startingprice = $data['startingprice'];
                    $username = $data['username']; 
                     $title =  $data['title']; 
                      $auctionID = $data['auctionid'];
                     $imageext =   $imgext;
                       $htmlauction = $html ;
                       $one = 1;
                       $zero = 0;
                       $menuNav = $data['menuNav'];
                      $menuNavTwo = $data['menuNavTwo'];
                     $userID = $data['userID'];
                     $userid = $data['userid'];
                     $duration = $data['duration'];
                     $timestamp =  $data['timestamp'] ;
                     
                     
                     


?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <link rel="stylesheet" type="text/css" href="Stylesheets/auction.css">
      <link rel="stylesheet" type="text/css" href="Stylesheets/chat.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">	
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="Stylesheets/loginStyleSheet.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<script src="StyleSheets/loginJavascript.js"></script>
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Auction Site</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

    <script>
$(document).ready(function(){
    	$(".left-first-section").click(function(){
            $('.main-section').toggleClass("open-more");
        });
    });
    $(document).ready(function(){
    	$(".fa-minus").click(function(){
            $('.main-section').toggleClass("open-more");
        });
    });


    </script>
      
      
      
</script>
  </head>

  <body>
      
      
      <div id="show"></div>


         
              <script>
   $(document).ready(function() {
  
       $("input[name='auctionid']").val("<?php echo $auctionID; ?>");
          $("input[name='userid']").val("<?php echo $userID; ?>");



			setInterval(function () {
                             var aucid = "<?php echo $auctionID; ?>";

  $.ajax({
    url: "JqueryPHP/Price.php",
    method: "POST",
    data: {'auctionid': aucid },
    success: function (result) {
        $('#price').html(result);
       var minval = document.getElementById('newbid');
       minval.min = result;
    }
});

                            
				//$('#price').load('JqueryPHP/Price.php')
			}, 333);
		


  $('form').bind('submit', function (event) {

 
event.preventDefault();// using this page stop being refreshing 

        

          $.ajax({
               
           type: 'POST',
            url: 'JqueryPHP/HighestBid.php',
            data: $('form').serialize(),
            success: function () {
              alert('bid was submitted');
            }
          });

        });
  });






    
    </script>
	
    

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
   
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <?php foreach($menuNav as $menuItem){echo "<li>$menuItem</li>";}?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php foreach($menuNavTwo as $menuItemone){echo "<li>$menuItemone</li>";}?>
      </ul>
    </div>
  </div>
</nav>
	<?php if ($userid === $userID)
        {
            
        ?>
	<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
                                                
						  <?php
                                                   if(sizeof($imageext) >=1)
                                                  {
                                                       ?>
                                                    <div class="tab-pane active" id="pic-<?php echo $one ?>"><img src="Uploads/<?php echo $auctionID.$zero.".".$imageext[0] ?>" style="width:500px;height:600px;" /></div>
                                                  
                                                      <?php
                                                       
                                                      if(sizeof($imageext) > 1)
                                                      {
                                                      for($i = 2; $i <= sizeof($imageext); $i++)
                                                      {
                                                        
                                                          $y = $i-1; 
                                                          
                                                         ?>
                                                    <div class="tab-pane" id="pic-<?php echo $i ?>"><img src="Uploads/<?php echo $auctionID.$y.".".$imageext[$y] ?>" style="width:500px;height:600px;" /></div>
                                                                                                  
                                                      <?php    
                                                          
                                                      }
                                                      }
                                                      
                                                  }
                                                      ?>
						
                                                </div>
						<ul class="preview-thumbnail nav nav-tabs">
						  <?php
                                                   if(sizeof($imageext) >= 1)
                                                  {
                                                       ?>
                                                     <li class="active"><a data-target="#pic-<?php echo $one ?>" data-toggle="tab"><img src="Uploads/<?php echo $auctionID.$zero.".".$imageext[0] ?>" style="width:500px;height:100px;" /></a></li>
                                                       
                                                      <?php
                                                      if(sizeof($imageext) > 1)
                                                      {
                                                      for($i = 2; $i <= sizeof($imageext); $i++)
                                                      {
                                                          $y = $i-1;
                                                        
                                                          $string = $auctionID.$y.".".$imageext[$y];
                                                                 
                                                          ?>
                                                       <li><a data-target="#pic-<?php echo $i ?>" data-toggle="tab"><img src="Uploads/<?php echo $string ?>"  style="width:500px;height:100px;" /></a></li>
                                                       
                                                       
                                                         <?php 
                                                      }
                                                      }
                                                      
                                                  }
                                                      ?>
						</ul>
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title">Title: <?php echo $title ?></h3>
                                                   <?php
                                                date_default_timezone_set('Europe/London');
                  $date2 = new DateTime($timestamp);
                  
                  $date3 = $date2;
                  $durationhhmmss1 = explode(":",$duration);
                $date3->add(new DateInterval("PT$durationhhmmss1[0]H$durationhhmmss1[1]M")); 
              
               
$date1 = new DateTime(date('Y-m-d H:i:s'));




    
   
    $durationyymmdd = explode("-",$date3->format('Y-m-d'));
    $durationhhmmss = explode(":",$date3->format('H:i:s'));
     
    $countdown = $durationyymmdd[1]." ".$durationyymmdd[2].", ".$durationyymmdd[0]." ". $durationhhmmss[0].":".$durationhhmmss[1].
            ":".$durationhhmmss[2];
    
    
    
     
     
    
     
     
  

       ?>
                                                <p id="demo_<?php echo $auctionID ?>"></p>
                                                  
                                                       <script>
// Set the date we're counting down to



// Update the count down every 1 second
 
var x = setInterval(function() {

    var countDownDate = new Date("<?php echo $countdown;?>").getTime();
    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
  
  
    
    // If the count down is over, write some text 
    if (distance < 0) {
         clearInterval(x);
        document.getElementById("demo_<?php echo $auctionID;?>").innerHTML = "EXPIRED";
        var aucid = "<?php echo $auctionID; ?>";
          $.ajax({
    url: "JqueryPHP/AuctionStatus.php",
    method: "POST",
    data: {'auctionid': aucid }
  
});
    }
    else
    {
        document.getElementById("demo_<?php echo $auctionID;?>").innerHTML =  hours + "h "
    + minutes + "m " + seconds + "s ";
                               


    
    }
    
    // If the count down is over, write some text 
   
}, 333);

</script>  

						<div class="rating">
							
							<span class="review-no">Seller: <?php echo $username ?> </span>
						</div>
						<p class="product-description">Description: <?php echo $description; ?></p>
						<h4 class="price">Highest bid : <span id="price"></span></h4>
                                                
						
						
					</div>
				</div>
			</div>
		</div>
            
            	</div>
    
        <?php }
        
        else
        {
            
        ?>
    
       <div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
                                                
						  <?php
                                                   if(sizeof($imageext) >=1)
                                                  {
                                                       ?>
                                                    <div class="tab-pane active" id="pic-<?php echo $one ?>"><img src="Uploads/<?php echo $auctionID.$zero.".".$imageext[0] ?>" style="width:500px;height:600px;" /></div>
                                                  
                                                      <?php
                                                       
                                                      if(sizeof($imageext) > 1)
                                                      {
                                                      for($i = 2; $i <= sizeof($imageext); $i++)
                                                      {
                                                        
                                                          $y = $i-1; 
                                                          
                                                         ?>
                                                    <div class="tab-pane" id="pic-<?php echo $i ?>"><img src="Uploads/<?php echo $auctionID.$y.".".$imageext[$y] ?>" style="width:500px;height:600px;" /></div>
                                                                                                  
                                                      <?php    
                                                          
                                                      }
                                                      }
                                                      
                                                  }
                                                      ?>
						
                                                </div>
						<ul class="preview-thumbnail nav nav-tabs">
						  <?php
                                                   if(sizeof($imageext) >= 1)
                                                  {
                                                       ?>
                                                     <li class="active"><a data-target="#pic-<?php echo $one ?>" data-toggle="tab"><img src="Uploads/<?php echo $auctionID.$zero.".".$imageext[0] ?>" style="width:500px;height:100px;" /></a></li>
                                                       
                                                      <?php
                                                      if(sizeof($imageext) > 1)
                                                      {
                                                      for($i = 2; $i <= sizeof($imageext); $i++)
                                                      {
                                                          $y = $i-1;
                                                        
                                                          $string = $auctionID.$y.".".$imageext[$y];
                                                                 
                                                          ?>
                                                       <li><a data-target="#pic-<?php echo $i ?>" data-toggle="tab"><img src="Uploads/<?php echo $string ?>"  style="width:500px;height:100px;" /></a></li>
                                                       
                                                       
                                                         <?php 
                                                      }
                                                      }
                                                      
                                                  }
                                                      ?>
						</ul>
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title">Title: <?php echo $title ?></h3>
                                                   <?php
                                                date_default_timezone_set('Europe/London');
                  $date2 = new DateTime($timestamp);
                  
                  $date3 = $date2;
                  $durationhhmmss1 = explode(":",$duration);
                $date3->add(new DateInterval("PT$durationhhmmss1[0]H$durationhhmmss1[1]M")); 
              
               
$date1 = new DateTime(date('Y-m-d H:i:s'));




    
   
    $durationyymmdd = explode("-",$date3->format('Y-m-d'));
    $durationhhmmss = explode(":",$date3->format('H:i:s'));
     
    $countdown = $durationyymmdd[1]." ".$durationyymmdd[2].", ".$durationyymmdd[0]." ". $durationhhmmss[0].":".$durationhhmmss[1].
            ":".$durationhhmmss[2];
    
    
    
     
     
    
     
     
  

       ?>
                                                <p id="demo_<?php echo $auctionID ?>"></p>
                                                  
                                                       <script>
// Set the date we're counting down to



// Update the count down every 1 second
 
var x = setInterval(function() {

    var countDownDate = new Date("<?php echo $countdown;?>").getTime();
    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
  
  
    
    // If the count down is over, write some text 
    if (distance < 0) {
         clearInterval(x);
        document.getElementById("demo_<?php echo $auctionID;?>").innerHTML = "EXPIRED";
        var aucid = "<?php echo $auctionID; ?>";
          $.ajax({
    url: "JqueryPHP/AuctionStatus.php",
    method: "POST",
    data: {'auctionid': aucid }
  
});
    }
    else
    {
        document.getElementById("demo_<?php echo $auctionID;?>").innerHTML =  hours + "h "
    + minutes + "m " + seconds + "s ";
                               


    
    }
    
    // If the count down is over, write some text 
   
}, 333);

</script>  

						<div class="rating">
							
							<span class="review-no">Seller: <?php echo $username ?> </span>
						</div>
						<p class="product-description">Description: <?php echo $description; ?></p>
						<h4 class="price">Highest bid : <span id="price"></span></h4>
                                                
						
						<div class="action">
                                                      <form> 
                                                          <input type="number" step=".01"  style="width: 10em;" size="35" name="newbid" id="newbid" tabindex="1" class="form-control"  placeholder="New Bid €" value="" required>
                                                    <br>
                                                   
							<div class="form-group">
										<div class="row">
											
                                                                                    <input type="submit" name="submit" id="submit" tabindex="2" class="form-control btn btn-login" style="width: 14em" value="submit">
											
										</div>
									</div>
                                                        <input name='auctionid' style="display:none"/>  
                                                       <input name='userid' style="display:none"/> 
                                                       
                                                     
                                                      </form>
						</div>
					</div>
				</div>
			</div>
		</div>
            
            	</div>
    
    
        <?php } ?>
        
     
      
      
      <div class="main-section">
	<div class="row border-chat">
		<div class="col-md-12 col-sm-12 col-xs-12 first-section">
			<div class="row">
				<div class="col-md-8 col-sm-6 col-xs-6 left-first-section">
					<p>Chat</p>
				</div>
				<div class="col-md-4 col-sm-6 col-xs-6 right-first-section">
					<a href="#"><i class="fa fa-minus" aria-hidden="true"></i></a>
					
					
				</div>
			</div>
		</div>
	</div>
	<div class="row border-chat">
		<div class="col-md-12 col-sm-12 col-xs-12 second-section">
			<div class="chat-section">
				<ul>
                                   	
				</ul>
			</div>
		</div>
	</div>
	<div class="row border-chat">
		<div class="col-md-12 col-sm-12 col-xs-12 third-section">
			<div class="text-bar">
                            <textarea class="entry"  style="resize:none" rows="1" cols="30" placeholder="Write messege"></textarea>
			</div>
		</div>
	</div>
  </body>
</html>