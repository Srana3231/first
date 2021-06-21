<?php
  require ("top.inc.php");
  $catagories='';
  $id='';
  $msg="";
  //for Edit;
      if (isset($_GET['id']) && $_GET['id']!='') {
        $id=get_safe_value($conn,$_GET['id']);
        $res=mysqli_query($conn,"SELECT * FROM `pcj_catagories` WHERE `pcj_catagories`.`pcj_catagories_id` = '$id'");
        $check=mysqli_num_rows($res);
        if ($check>0) {
          $row=mysqli_fetch_assoc($res);
          $catagories=$row['pcj_catagorie'];
        }else {
          header('location:catagories.php');
          die();
        }
        
      }
  //INSERT the new value;
  if (isset($_POST['submit'])) {
    $catagories=get_safe_value($conn,$_POST['catagories']);

    $res=mysqli_query($conn,"SELECT * FROM `pcj_catagories` WHERE `pcj_catagories`.`pcj_catagorie` = '$catagories'");
    $check=mysqli_num_rows($res);
    if ($check>0) {
      if (isset($_GET['id']) && $_GET['id']!='') {
        $getData=mysqli_fetch_assoc($res);
        if ($id==$getData['id']) {
          
        }else {
          $msg="catagorie alrady exist";
        }
      }else {
        $msg="catagorie alrady exist";
      }
    }else {
      if (isset($_GET['id']) && $_GET['id']!='') {
      mysqli_query($conn,"UPDATE `pcj_catagories` SET `pcj_catagorie` = '$catagories' WHERE `pcj_catagories`.`pcj_catagories_id` = '$id'");
    }else {
      mysqli_query($conn,"INSERT INTO `pcj_catagories` (`pcj_catagorie`, `pcj_catagorie_status`) VALUES ('$catagories', '0')");
    }
    header('location:catagories.php');
    die();
    }

    
  }
  
  $sql="SELECT * FROM `pcj_catagories` ORDER BY pcj_catagorie DESC";
  $res=mysqli_query($conn,$sql);
?>
<div class="container-fluid">
  <div class="row">
    <?php
        require "nav.inc.php";
    ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Catagories</h1>
      </div>

        <div class="col-md-7 col-lg-8">
          <h4 class="mb-3">Add new Catagorie Here...</h4>
            <form class="needs-validation" method="POST" action="edit_cat.php?id=<?php echo $id; ?>" novalidate>
              <div class="row g-3">
                <div class="col-sm-6">
                  <label for="Catagorie" class="form-label">Catagorie name</label>
                  <input type="text" class="form-control" id="firstName" placeholder="Catagorie name" name="catagories" required value="<?php echo $catagories; ?>">
                </div>
                <hr class="my-4">
                <button class="w-100 btn btn-primary btn-lg" type="submit" name="submit">Submit</button>
                <p class="mt-5 mb-3 text-muted"><?php echo $msg; ?></p>
              </div>
            </form>
        </div>
    </main>
  </div>
</div>
<?php
require ("footer.inc.php");
?>