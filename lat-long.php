<?php
session_start();
 $cidade = $_SESSION['cidade'];
?>

<html>
<head>
<script>
$(document).ready(function(){
  // Call Geo Complete
  $("#address").geocomplete({details:"form#property"});
});
</script>
<style>
@import "compass/css3";

body{
  background-color:#5c4084;
  margin:50px;
}
.container{
  background-color:#fff;
  padding:40px 80px;
  border-radius:8px;
}
h1{
  color: #fff;
  font-size:4rem;
  font-weight:100;
  margin:0 0 35px 0;
  background:-webkit-linear-gradient(#fff, #999);
  -webkit-background-clip:text;
  -webkit-text-fill-color:transparent;
  text-align:center;
}
h4{
  color:#999;
}

</style>
</head>

<body>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h4>A BETTER WAY to get the latitude and longitude of an address using jQuery, and the <a href="https://github.com/ubilabs/geocomplete" target="_blank">geocomplete</a> plugin.</h4>
      <hr />
      <form id="property">
        <div class="form-group">
          <input type="text" name="name" class="form-control" id="address" placeholder="Address">
        </div>
        <div class="form-group">
          <input type="text" name="lat" class="form-control" placeholder="Latitude" readonly>
        </div>
        <div class="form-group">
          <input type="text" name="lng" class="form-control" placeholder="Longitude" readonly>
        </div>
      </form>
    </div>
  </div>
</div>
</body>


</html>