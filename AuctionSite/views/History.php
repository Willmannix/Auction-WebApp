<?php
   $name = $data['firstname'];
  
   $descriptionarray = $description;
$titlearray = $title;
$pricearray = $price;
 $menuNav = $data['menuNav'];
 $menuNavTwo = $data['menuNavTwo'];

?>
<html lang="en">
<head>
  <title>Auction Site</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
   
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

  </style>
</head>
<body>



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
    
    <?php 
    if(sizeof($descriptionarray) > 0)
    {
    ?>
     <h2>Successful bids</h2>
   <footer class="container-fluid text-center">
    
  <table>
  <tr>
    <th>Title</th>
    <th>Description</th>
    <th>Price</th>
  </tr>
  <?php for($i = 1; $i <= sizeof($descriptionarray); $i++)
  {
  ?>
  <tr>
    <td><?php echo $titlearray[$i-1];?></td>
    <td><?php echo $descriptionarray[$i-1];?></td>
    <td><?php echo $pricearray[$i-1];?></td>
  </tr>
  <?php } ?>
</table>
</footer>
    <?php  
    }
    
    else
    {
    ?>
 <h2>No successful bids</h2>
<footer class="container-fluid text-center">
 
</footer>

    <?php } ?>

</body>
</html>


