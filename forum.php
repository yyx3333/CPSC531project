<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="widht=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>My Sample Forum</title>
  <!-- Insert Navbar -->
  <?php require "header.php"; ?>
</head>

<body>
  <?php
  //Page Title
  $testme = "<div class='row justify-content-center'><h6>Nothing here yet</h6></div>";
  $hasFailed = false;
  $heart='<svg class="bi bi-heart-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" clip-rule="evenodd"/>
</svg>';
  //get data passed from URL
  if (isset($_GET['fname'])) {
    $fname = $_GET['fname'];
    $fid = $_GET['fid'];
  }
  ?>
  <div class="container-fluid">
    <div class="row justify-content-center mt-3 mb-5">
      <h2><?php echo $fname; ?></h2>
    </div>
    <div class="row">
      <div class="col-9">
        <?php
        //access database to get posts
        require 'includes/dbh.inc.php';

        $query = "SELECT * FROM posts WHERE f_id=$fid";
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
            //display posts from database
            echo "<a class='card text-white bg-dark mb-3 w-100' href='post.php?pid=" . $row['p_id'] . "&fname=" . $fname . "&fid=" . $fid . "'>
                        <div class='card-body'>
                          <h5 class='card-title'>" . $row['p_title'] . "</h5>
                          <p class='card-text'>$ "   . $row['p_price'] . "</p>
                        </div>
                        <div class='card-footer text-muted'>
                        <div class='pull-left'> Posted By: " . $sampleName . "  Post date: " . $row['p_time'] . " </div>
                        <div class='pull-right'><h5 class='text-right'> $heart " . $row['p_likes'] . " </h5></div>
                        <div class='clearfix'></div>
                        </div>
                      </a>";
          }
        } else {
          //do something
          $hasFailed = true;
          //echo $testme;
        }
        $conn->close();
        ?>
        <?php
        echo "<a type='button' class='btn btn-secondary btn-sm btn-block w-100' href='home.php'> GO BACK </a>"
        ?>
        <div class="row">
          </br>
        </div>
      </div>
      <div class="col">
        <div class="row justify-content-center">
          <?php
          echo "<a type='button' class='btn btn-primary' href='makepost.php?fid=" . $fid . "'>Create Post</a>";
          ?>
        </div>
      </div>
    </div>
    <?php if ($hasFailed) {
      echo $testme;
    } ?>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>