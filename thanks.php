<?php
include_once("api/wellness.php");
$obj = new wellness();
if(!isset($_POST['submit']))
{
    header('location:404.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">    
  <title>Wellness | Thanks</title>

  <?php
  include_once("template/css.php");
  ?>

</head>
<body> 
  <?php
  include_once("template/header.php");
  ?>
  <!-- Page breadcrumb -->
  <?php
  if(isset($_POST['submit']))
  {
    $data = $_POST;
    unset($data['submit']);
    $status = $obj->insert('subscriber',$data);
?>
  <section id="mu-page-breadcrumb">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-page-breadcrumb-area">
           <h2>Thanks</h2>
           <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>            
            
          </ol>
         </div>
       </div>
     </div>
   </div>
 </section>
  <!-- Start error section  -->
  <section id="mu-error">
    <div class="container">
      <div class="row">
       <div class="col-md-12">
        <div class="mu-error-area">
          <p>Thanks, <?php echo $_POST['name']; ?></p>
          <span>Your subscription has been added successfully.</span>
          <h2>Thank you</h2>
          <a class="mu-post-btn" href="index.php">GO TO HOME</a>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
}

?>
<!-- End error section  -->

<?php
include_once("template/footer.php");
?>

<?php
include_once("template/script.php");
?>
</body>
</html>