<?php
  require ("top.inc.php");
  $msg="";
  if (isset($_GET['type']) && $_GET['type']!='') {
      $type=get_safe_value($conn,$_GET['type']);

      //for Active/deactive;

      if ($type=='status') {
        $opratation=get_safe_value($conn,$_GET['opratation']);
        $id=get_safe_value($conn,$_GET['id']);
        if ($opratation=='active') {
          $status=0;
        }
        else {
          $status=1;
        }
        $update_status_sql="UPDATE `pcj_catagories` SET `pcj_catagorie_status` = '$status' WHERE `pcj_catagories`.`pcj_catagories_id` = '$id'";
        mysqli_query($conn,$update_status_sql);
      }

      //for Delete;

      if ($type=='delete') {
        $id=get_safe_value($conn,$_GET['id']);
        $delete_sql="DELETE FROM `pcj_catagories` WHERE `pcj_catagories`.`pcj_catagories_id` = '$id'";
        mysqli_query($conn,$delete_sql);
      } 
  }

  $sql="SELECT * FROM `pcj_catagories` ORDER BY pcj_catagorie DESC";
  $res=mysqli_query($conn,$sql);
?>
<div class="container-fluid">
<div></div>
  <div class="row">
    <?php
        require "nav.inc.php";
    ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Catagories</h1>
      </div>

        <div class="col-md-7 col-lg-8">
              <div class="row g-3">
                <a class="w-50 btn btn-primary btn-lg link" href="edit_cat.php">Add new Catagorie</a>
              </div>
        </div>
        <hr>
      
      <h2>Section title</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>S no.</th>
              <th>Cat. ID</th>
              <th>Catagorie</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
                $i=0;
                while ($row=mysqli_fetch_assoc($res)) {
                $i++;
            ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $row['pcj_catagories_id']; ?></td>
              <td><?php echo $row['pcj_catagorie']; ?></td>
              <td style="float: right;">
                <?php
                    $st=$row['pcj_catagorie_status'];
                    if ($st=='1') {
                        echo '<a class="btn btn-primary btn-lg link act" href="?type=status&opratation=active&id='.$row["pcj_catagories_id"].'">active</a>';
                    }
                    else {
                        echo '<a class="btn btn-primary btn-lg link deactive" href="?type=status&opratation=deactive&id='.$row["pcj_catagories_id"].'">Deactive</a>';
                    }
                    echo '<a class="btn btn-primary btn-lg link " href="edit_cat.php?id='.$row["pcj_catagories_id"].'">Edit</a>';
                    echo '<a class="btn btn-primary btn-lg link delete" href="?type=delete&id='.$row["pcj_catagories_id"].'">Delete</a>';
                    
                ?></td>
            </tr>
            <?php
                }
            ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
<?php
require ("footer.inc.php");
?>