<?php include'producerheader.php';


if(isset($_POST['sub'])){
    extract($_POST);

    $q="insert into login values(null,'$uname','$pass','director')";
    $lid=insert($q);

    $q="insert into director values(null,'$mid','$lid','$fname','$lname','$phn','$email')";
    insert($q);

    return redirect("adminmanagedirector.php?mid=$mid");
  
}

if(isset($_GET['did'])){
    $q="delete from director where director_id='$did'";
    delete($q);
    return redirect("adminmanagedirector.php?mid=$mid");
}


if(isset($_POST['update'])){
    extract($_POST);

    $q="update director set firstname='$fname', lastname='$lname', phone='$phn', email='$email' where director_id='$uid'";
    update($q);
    return redirect("adminmanagedirector.php?mid=$mid");
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
<div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center" style="display: flex;align-items: center;justify-content:center;width: 100%;">
          <div data-aos="zoom-out" style="width: 400px;box-sizing: content-box;padding: 50px; border: 2px solid grey; box-shadow: 2px 4px 16px grey;" >
          <center>
          <form  method="post" enctype="multipart/form-data">

          <?php if(isset($_GET['uid'])){?>


            <h2 style="font-size: 30px;" class="text-white" id="hstyle">Update Director</h2>

            <?php 
            $q="select * from director where movie_id='$mid'";
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

    <h2 style="font-size: 30px;" class="text-white" id="hstyle">Manage Director</h2>
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
              
                <th>Firstname</th>
                <th>Lastname</th>
                <th>phone</th>
                <th>Emil</th>
            </tr>
            <?php 
            $q="select * from director where movie_id='$mid'";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <tr align="center">
       
                <td><?php echo $row['firstname']?></td>
                <td><?php echo $row['lastname']?></td>
                <td><?php echo $row['phone']?></td>
                <td><?php echo $row['email']?></td>
                <td><a class="btn btn-success"  href="?uid=<?php echo $row['director_id']?>&mid=<?php echo $mid ?>">Update</a></td>
                <td><a class="btn btn-danger" href="?did=<?php echo $row['director_id']?>&mid=<?php echo $mid ?>">Delete</a></td>
            </tr>
            <?php }?>
          </table>
      

<?php include 'footer.php'?>