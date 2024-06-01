<?php include'controllerheader.php';
   $cid=$_SESSION['cid'];

if(isset($_POST['sub'])){
    extract($_POST);

    $dir = "uploads/";
	$file = basename($_FILES['photo']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target = $dir.uniqid("uploads_").".".$file_type;
	if(move_uploaded_file($_FILES['photo']['tmp_name'], $target))
	{
        $q="insert into login values(null,'$uname','$pass','actor')";
    $lid=insert($q);

    $q="insert into actors values(null,'$mid','$lid','$fname','$lname','$target','$phn','$email')";
    insert($q);

    return redirect("controllermanageactors.php");
    }
    else
    {
        echo "file uploading error occured";
    }


   
  
}

if(isset($_GET['did'])){
    $q="delete from actors where actor_id='$did'";
    delete($q);
    return redirect("controllermanageactors.php");
}


if(isset($_POST['update'])){
    extract($_POST);

    $dir = "uploads/";
	$file = basename($_FILES['photo']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target = $dir.uniqid("uploads_").".".$file_type;
	if(move_uploaded_file($_FILES['photo']['tmp_name'], $target))
	{
     $q="update actors set firstname='$fname', lastname='$lname', phone='$phn', photo='$target', email='$email' where actor_id='$uid'";
    update($q);

    return redirect("controllermanageactors.php");
    }
    else
    {
        echo "file uploading error occured";
    }

   
}

?>

<style>
    div table{
        color: white;
    }
    h1,h2{
        color: white;
    }
</style>

<div style="width: 100%;height: 100vh;background: url('images/tc.jpg');background-size: cover;" >


<div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center" style="display: flex;align-items: center;justify-content:center;width:100% ;">
          <div data-aos="zoom-out" style="width: 400px;box-sizing: content-box;padding: 50px; border: 2px solid grey; box-shadow: 2px 4px 16px grey;" >
          <center>
          <form  method="post" enctype="multipart/form-data">

          <?php if(isset($_GET['uid'])){?>


            <h2 style="font-size: 30px;" class="text-white" id="hstyle">Update Actors</h2>

            <?php 
            $q="SELECT * FROM `actors` INNER JOIN `production_controller` USING (movie_id) INNER JOIN movie USING (movie_id) WHERE controller_id='$cid' and actor_id='$uid'";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
<table class="table " >
    <tr>
        <th>Firstname </th>
        <td><input type="text" value="<?php echo $row['firstname']?>" required class="form-control" name="fname" id=""></td>
    </tr>
    <tr>
        <th>Last Name </th>
        <td><input type="text" value="<?php echo $row['lastname']?>" required class="form-control" name="lname" id=""></td>
    </tr> 
    <tr>
        <th>Photo </th>
        <td><img src="<?php echo $row['photo']?>" width="100" height="100" alt=""></td>
    </tr> 
 
    <tr>
        <th></th>
        <td><input type="file" required class="form-control" name="photo" id=""></td>
    </tr> 
    <tr>
        <th>Phone </th>
        <td><input type="number" value="<?php echo $row['phone']?>" required class="form-control" name="phn" id=""></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><input type="email" value="<?php echo $row['email']?>" required class="form-control" name="email" id=""></td>
    </tr>
      
    <tr>
        <td colspan="2" align="center">
            <input type="submit" class="btn btn-success" value="update" name="update" id="">
        </td>
    </tr>
</table>
<?php }?>


            <?php }else{?>

    <h2 style="font-size: 30px;" class="text-white" id="hstyle">Manage Actors</h2>
<table class="table " >
    <tr>
        <th>Firstname </th>
        <td><input type="text" required class="form-control" name="fname" id=""></td>
    </tr>
    <tr>
        <th>Last Name </th>
        <td><input type="text" required class="form-control" name="lname" id=""></td>
    </tr> 
    <tr>
        <th>Photo </th>
        <td><input type="file" required class="form-control" name="photo" id=""></td>
    </tr> 
    <tr>
        <th>Filim  </th>
        <td><select class="form-select" style="color: black;" name="mid" id="">
        <?php 
            $q="SELECT * FROM `movie` INNER JOIN `production_controller` USING (movie_id) where controller_id='$cid' ";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <option value="<?php echo $row['movie_id']?>"><?php echo $row['movie_title']?></option>
            <?php }?>
        </select></td>
    </tr>
    <tr>
        <th>Phone </th>
        <td><input type="number" required class="form-control" name="phn" id=""></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><input type="email" required class="form-control" name="email" id=""></td>
    </tr>
   
   
      <tr>
        <th>Username</th>
        <td><input type="text" required class="form-control" name="uname" id=""></td>
    </tr>
    <tr>
        <th>Password</th>
        <td><input type="password" required class="form-control" name="pass" id=""></td>
    </tr>
      
    <tr>
        <td colspan="2" align="center">
            <input type="submit" class="btn btn-success" name="sub" id="">
        </td>
    </tr>
</table>

            <?php }?>
</form>
          </center>
            </div>
          </div>
</div>


<center>
          <table class="table" style="width: 1000px;">
            <tr align="center">
                <th></th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>phone</th>
                <th>Emil</th>
            </tr>
            <?php 
            $q="SELECT * FROM `actors` INNER JOIN `production_controller` USING (movie_id) INNER JOIN movie USING (movie_id) WHERE controller_id='$cid' ";
            // $q="SELECT * FROM `actors` INNER JOIN `production_controller` USING (movie_id)";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <tr align="center">
                <td><img src="<?php echo $row['photo'] ?>" width="100" height="100" alt=""></td>
                <td><?php echo $row['firstname']?></td>
                <td><?php echo $row['lastname']?></td>
                <td><?php echo $row['phone']?></td>
                <td><?php echo $row['email']?></td>
                <td><a class="btn btn-success" href="?uid=<?php echo $row['actor_id']?>">Update</a></td>
                <td><a class="btn btn-danger" href="?did=<?php echo $row['actor_id']?>">Delete</a></td>
            </tr>
            <?php }?>
          </table>
      

<?php include 'footer.php'?>