<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="home.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <title>My Sample Post</title>
  <!-- Insert Navbar -->
  <?php require "header.php"; ?>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Create Space on page -->
      </br>
    </div>
    <div class="row justify-content-center">
      <?php
      //get data passed from URL
      if (isset($_GET['pid'])) {
        $pid = $_GET['pid'];
        $fname = $_GET['fname'];
        $fid = $_GET['fid'];
        $heart='<svg class="bi bi-heart-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" clip-rule="evenodd"/></svg>';
        $heart2='<svg class="bi bi-heart" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 01.176-.17C12.72-3.042 23.333 4.867 8 15z" clip-rule="evenodd"/></svg>';
      ?>
      <?php
        //access database to get posts
        require 'includes/dbh.inc.php';

        $query = "SELECT * FROM posts WHERE p_id=$pid";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
          //get data for each post
          while ($row = mysqli_fetch_assoc($result)) {
            $sampleId = $row['u_id'];
            $query2 = "SELECT u_name FROM users WHERE u_id=$sampleId";
            $result2 = $conn->query($query2);
            if ($result2->num_rows > 0) {
              while ($row2 = mysqli_fetch_assoc($result2)) {
                $sampleName = $row2['u_name'];
              }
            }
            $pid=$row['p_id'];
            //display posts from database
            if ($row['p_image'] != null) {
              echo "<div class='card text-white bg-dark mb-3 w-75'>
                          <h3 class='card-header'>" . $row['p_title'] . "</h3>
                          
                            <div class='card-body'>
                            <h6 class='card-subtitle'>".  $row['p_subject'] . "</h6>
                            <h6 class='card-subtitle'>$ ". $row['p_price']  . "</h6>
                              <p class='card-body'>" . $row['p_body'] . "</p>
                              <p class='card-body'><img src=images/" . $row['p_image'] . " ></p>
                            </div>
                            <div class='card-footer text-muted'>Posted By: " . $sampleName . " Post time: " . $row['p_time'] . "<div class='pull-right'><h5 class='text-right'>Like this post  
                            <button id='like-button" .$pid. "' class='like-button' value='$pid' onclick='addLike($pid)'>$heart2</button> </h5>
                          
                            </div> </div>
                    </div>";
            } else {
              echo "<div class='card text-white bg-dark mb-3 w-75'>
                <h3 class='card-header'>" . $row['p_title'] . "</h3>
                
                  <div class='card-body'>
                  <h6 class='card-subtitle'>".  $row['p_subject'] . "</h6>
                  <h6 class='card-subtitle'>$ ". $row['p_price']  . "</h6>
                    <p class='card-body'>" . $row['p_body'] . "</p>
                    
                  </div>
                  <div class='card-footer text-muted'>Posted By: " . $sampleName . " Post time: " . $row['p_time'] . "<div class='pull-right'>
             
                  <h5 class='text-right'>Like this post 
                   <button id='like-button" .$pid. "' class='like-button' value='$pid' onclick='addLike($pid)'>$heart2</button>  </h5></div></div>
                </div>";
            }
          }
        } else {
          echo "<h6>Nothing here yet</h6>";
        }
        //$conn->close();
      }
      ?>
    </div>

    <div class="row justify-content-center">
      <form class="mb-5 w-75" action="includes/addcart.inc.php?pid=<?php echo $pid; ?>" method="post">
        <button type="submit" name="addcart" class="btn btn-primary">Add to cart</button>
      </form>
    </div>

    <div class="row justify-content-center">

      <form class="mb-5 w-75" action="includes/makecomment.inc.php?pid=<?php echo $pid; ?>" method="post">
        <div class="form-group">
          <label for="commentBody">Comment</label>
          <textarea class="form-control" name="commentBody" rows="3"></textarea>
        </div>
        <button type="submit" name="post_comment" class="btn btn-primary">Submit</button>
      </form>

    </div>

    <div class="row justify-content-center">

      <?php
      $query3 = "SELECT * FROM comments WHERE p_id=$pid";
      $result3 = $conn->query($query3);

      if ($result3->num_rows > 0) {
        //get data for each post
        while ($row3 = mysqli_fetch_assoc($result3)) {
          $sampleId2 = $row3['u_id'];
          $query4 = "SELECT u_name, u_avatar FROM users WHERE u_id=$sampleId2";
          $result4 = $conn->query($query4);
          if ($result4->num_rows > 0) {
            while ($row4 = mysqli_fetch_assoc($result4)) {
              $sampleName2 = $row4['u_name'];
              $cPic = $row4['u_avatar'];
            }
          }
          //display posts from database
          /*echo "<div class='card text-white bg-dark mb-3 w-75'>
                    <h3 class='card-header'>".$sampleName2."</h3>
                        <div class='card-body'>
                          <p class='card-body'>".$row3['c_body']."</p>
                        </div>
                      </div>";*/
          echo "<div class='media w-75 mb-4'>
                    <img src=images/" . $cPic . " class='align-self-start mr-3 rounded' alt='logo' width=50 height=50>
                    <div class='media-body'>
                      <h6 class='mt-0'>" . $sampleName2 . " by " . $row3['c_date'] . "</h6>
                      " . $row3['c_body'] . "
                    </div>
                  </div>";
        }
      } else {
        echo "<h6>Nothing here yet</h6>";
      }
      $conn->close();
      ?>
    </div>

    <div class="row mb-3">
      </br>
    </div>

    <div class="row justify-content-center">
      <?php
      echo "<a type='button' class='btn btn-secondary btn-sm btn-block w-75' href='forum.php?fname=" . $fname . "&fid=" . $fid . "' id='a'> GO BACK </a>";
      ?>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $("button").click(function() {
        var pid = $(this).val();
        console.log(pid);
        $.post("likes.php", {
            pid: pid
        },function(data,status){
      alert("Data: " + data + "\nStatus: " + status);
    }
        );
      });
    });

    
  </script>
  <script>
    function addLike(pid) {

     var heart='<svg class="bi bi-heart-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" clip-rule="evenodd"></path></svg>';
     var heart2='<svg class="bi bi-heart" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 01.176-.17C12.72-3.042 23.333 4.867 8 15z" clip-rule="evenodd"></path></svg>';
      var x = document.getElementById("like-button" + pid);
      console.log(x.innerHTML);
      console.log(heart2);
      if (x.innerHTML == heart2) {
        x.innerHTML = heart;

      } else {
        x.innerHTML = heart2;

      }
    }
  </script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>