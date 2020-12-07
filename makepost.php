<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="widht=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!-- Custom styles for this template -->
  <link href="style.css" rel="stylesheet">
  <title>My Sign Up</title>
  <!-- Insert Navbar -->
  <?php require "header.php"; ?>
  <?php
  $fid = $_GET['fid'];
  $_SESSION['fId'] = $fid;
  ?>
</head>

<body>
  <div class="container-fluid">
    <div class="row justify-content-center mt-3 mb-5">
      <h2>Create Post</h2>

    </div>
    <?php if (isset($_GET['errormsg'])) {
      echo "<h1 class='row justify-content-center mt-3 mb-5'>" . $_GET['errormsg'] . "</h1>";
    } ?>
    <div class="row justify-content-center">
      <div class="col-8">

        <form class="form-makepost" action="includes/makepost.inc.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="makepostTitle">Title</label>
            </br>
            <input type="text" class="form-control form-control-lg w-100" placeholder="Title" name="makepostTitle" required="">
          </div>
          <div class="form-group">
            <label for="makepostSubject">Subject</label>
            </br>
            <input type="text" class="form-control form-control-lg w-100" placeholder="Subject" name="makepostSubject" required="">
          </div>
          <div class="form-group">
            <label for="makepostPrice">Subject</label>
            </br>
            <input type="number" class="form-control form-control-lg w-100" placeholder="Price" name="makepostPrice" required="">
          </div>
          <div class="form-group">
            <label for="makepostBody">Description</label>
            </br>
            <textarea class="form-control form-control-lg w-100" name="makepostBody" rows="8" placeholder="Body" required=""></textarea>
          </div>
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="makepostImage">
            <label class="custom-file-label" for="customFile">Upload Image</label>
            </br>
          </div>
          <button type="submit" name="makepost_submit" class="btn btn-dark">SUBMIT</button>
        </form>

      </div>
    </div>
  </div>
  <script>
    //display upload image name
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>