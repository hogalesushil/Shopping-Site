<?php
include '../partials/_dbconnect.php';
if(isset($_POST['submit_Brand'])){
  $brand_title = $_POST['brand_title'];
  // Check Duplicates
  $SelectQuery = "SELECT * FROM `brand` WHERE  brand_name =  '$brand_title'";
  $resultSelect = mysqli_query($conn, $SelectQuery);
  $num = mysqli_num_rows($resultSelect);

  if ($num > 0){
    echo '<div class="alert alert-warning  alert-dismissible fade show" role="alert">
    <strong>Already Present Brand</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>';
  }
  else{
    $insertQuery = "INSERT INTO `brand` (`brand_name`) VALUES ( '$brand_title');";
    $result = mysqli_query($conn, $insertQuery);
    if ($result) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Added Brand.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>';
      }
  }
}
?>
<form class="form-inline m-3" method="post" action="">

  <label class="sr-only" for="inlineFormInputGroupUsername2">Brand</label>
  <div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text"><i class="fa-solid fa-list"></i></div>
    </div>
    <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Add Brand" name="brand_title">
  </div>

  <button type="submit" class="btn btn-outline-dark mb-2" name="submit_Brand">Add Brand</button>
</form>