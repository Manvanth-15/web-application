<?php
    session_start();
    include ("connect_server.php");
    include ("function.php");

    $user_data = check_login( $connection );
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="http://cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="http://cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
    <link rel="stylesheet" href="reviews.css" />
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> -->
    <title>Review System</title>
  </head>
  <body>
  <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0"> -->
        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#" style="font-size:20px;">Home</a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link"  style="font-size:20px;" href="https://sriramrknp.github.io/DBMS-GROUP-18-PHASE-1/" target="_blank">About us</a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link"  style="font-size:20px;" href="#">Link</a>
        </li> -->
      <!-- </ul> -->
      <!-- <form class="d-flex ml-auto"> -->
        <!-- <a href="./logout.php" class="ml-auto"> <button>Logout</button>  </a> -->
      <!-- </form> -->
    <!-- </div>
  </div>
</nav> -->

    <div id="container">
      <div class="d-flex flex-row justify-content-start">
      <a href="https://sriramrknp.github.io/DBMS-GROUP-18-PHASE-1/" target="_blank" class="aboutUs"> <button>About us</button>  </a>
        <a href="./logout.php" class="btnLogout"> <button>Logout</button>  </a>
        <h1 id="welcome"> welcome , <?php  echo $user_data['username']; ?>  </h1>
      </div>
       <h1 id="welcome">Give your reviews on tourism </h1>
      <form action="insert_review.php" method="post">
          <label for="cat">Questions</label>
          <select name="cat" id="cat">
              <option value="0">Which place do you visit so far?</option>
              <option value="1">Whats your favorite place so far?</option>
              <option value="2">Decribe about one holy place?</option>
              <option value="3">What is the best and worst peace of advice?</option>
              <option value="4">Whats your top travel tip?</option>
              <option value="5">which one do you prefer either solo or group for travelling?</option>
              <option value="6">What are the best Hill Stations to visit?</option>
              <option value="7">Which food do you prefer while travelling?</option>
              <option value="8">What was the most enjoying or realxing part of your journey?</option>
              <option value="9">What are the famous cuisines of hometown?</option>
          </select> <br>
          <label for="text">Comment</label>
          <textarea name="text" id="text" rows = "5"></textarea> <br>
          <label for="date">Date</label> 
          <input type="date" id="date" name="date" />
          <!-- <span><h3> Direct Commit</h3></span> -->
          <input type="checkbox" id="complete" name="complete" value="1" /><br/>
          <label for="complete"> Direct Commit</label><br><br><br>

          
          <button class="btnSubmit" type="submit">Submit Review</button>
      </form>
      <?php
      require_once 'connect_server.php';
      $sql = "SELECT * FROM review_table";
      $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
      print("<h2>Partial Commit</h2>");

      //Partial commit
      while($row = mysqli_fetch_array($result)){
        if($row['complete'] == 0){
            if($row['review_category'] == 0)
            {
              $cat = "Which place do you visit so far?";
            } 
            elseif ($row['review_category'] == 1) 
            {
              $cat = "What is your favorite place so far?";
            } 
            elseif ($row['review_category'] == 2) 
            {
              $cat = "Decribe about one holy place?";
            } 
            elseif ($row['review_category'] == 3) 
            {
              $cat = "What is the best and worst peace of advice?";
            } 
            elseif ($row['review_category'] == 4) 
            {
              $cat = "Whats your top travel tip?";
            } 
            elseif ($row['review_category'] == 5) 
            {
              $cat = "which one do you prefer either solo or group for travelling?";
            } 
            elseif ($row['review_category'] == 6) 
            {
              $cat = "What are the best Hill Stations to visit?";
            } 
            elseif ($row['review_category'] == 7) 
            {
              $cat = "Which food do you prefer while travelling?";
            } 
            elseif ($row['review_category'] == 8) 
            {
              $cat = "What was the most enjoying or realxing part of your journey?";
            } 
            elseif ($row['review_category'] == 9) 
            {
              $cat = "What are the famous cuisines of hometown?";
            } 
            else 
            {
              $cat = "Other";
            }
            echo "<div class='review'>";
            echo "<a href='complete.php?id=" . $row['review_id'] . "'><button class='btnComplete'>Commit</button></a><strong>";
            echo  $cat . "</strong><p>" . $row['review_text'] . "</p>Commit Date: " . $row['date'];
            echo "</div>";
          }
      }
      //Complete reviews
    ?>
    <br><br><br><br>
    <?php  
      print("<h2>Committed</h2>");
      $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
      while($row = mysqli_fetch_array($result)){
        if($row['complete'] != 0){
            if($row['review_category'] == 0)
            {
              $cat = "Which place do you visit so far?";
            } 
            elseif ($row['review_category'] == 1) 
            {
              $cat = "What is your favorite place so far?";
            } 
            elseif ($row['review_category'] == 2) 
            {
              $cat = "Decribe about one holy place?";
            } 
            elseif ($row['review_category'] == 3) 
            {
              $cat = "What is the best and worst peace of advice?";
            } 
            elseif ($row['review_category'] == 4) 
            {
              $cat = "Whats your top travel tip?";
            } 
            elseif ($row['review_category'] == 5) 
            {
              $cat = "which one do you prefer either solo or group for travelling?";
            } 
            elseif ($row['review_category'] == 6) 
            {
              $cat = "What are the best Hill Stations to visit?";
            } 
            elseif ($row['review_category'] == 7) 
            {
              $cat = "Which food do you prefer while travelling?";
            } 
            elseif ($row['review_category'] == 8) 
            {
              $cat = "What was the most enjoying or realxing part of your journey?";
            } 
            elseif ($row['review_category'] == 9) 
            {
              $cat = "What are the famous cuisines of hometown?";
            } 
            else 
            {
              $cat = "Other";
            }
            echo "<div class='review'>";
            echo "<a href='delete.php?id=" . $row['review_id'] . "'><button class='btnDelete'>Delete</button></a><strong>";
            echo  $cat . "</strong><p>" . $row['review_text'] . "</p>Commit Date: " . $row['date'];
            echo "</div>";
          }
      }
     ?>
    </div>
  </body>
</html>