<?php include'directorheader.php';
$fid=$_SESSION['mid'];

if(isset($_POST['sub'])){
    extract($_POST);

    $q="insert into filim_schedule values(null,'$fid','$place','$date')";
    $lid=insert($q);
  
}

if(isset($_GET['did'])){
    $q="delete from filim_schedule where filim_schedule_id='$did'";
    delete($q);
    return redirect("directorsetfilimschedule.php?fid=$fid");
}


if(isset($_POST['update'])){
    extract($_POST);

    $q="update filim_schedule set filim_schedule_place='$place', filim_schedule_date='$date' where filim_schedule_id='$uid'";
    update($q);
    return redirect("directorsetfilimschedule.php?fid=$fid");
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
          <div data-aos="zoom-out" style="width: 400px;box-sizing: content-box;padding: 50px; border: 2px solid grey; box-shadow: 2px 4px 16px grey;padding-top: 100px;" >
          <center>
          <form  method="post" enctype="multipart/form-data">

          <?php if(isset($_GET['uid'])){?>


            <h2 style="font-size: 30px;" class="text-white" id="hstyle">Update Schedule</h2>

            <?php 
            $q="select * from filim_schedule where filim_schedule_id='$uid'";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
<table class="table " >
<tr>
        <th>Filim Schedule Place </th>
        <td><input type="text" value="<?php echo $row['filim_schedule_place']?>" required class="form-control" name="place" id=""></td>
    </tr>
    <tr>
        <th>Filim Schedule Date </th>
        <td><input type="date" value="<?php echo $row['filim_schedule_date']?>" required class="form-control" name="date" id=""></td>
    </tr> 
      
    <tr>
        <td colspan="2" align="center">
            <input type="submit" class="btn btn-success" value="update" name="update" id="">
        </td>
    </tr>
</table>
<?php }?>


            <?php }else{?>

    <h2 style="font-size: 30px;" class="text-white" id="hstyle">Filim Schedule</h2>
<table class="table " >
    <tr>
        <th>Filim Schedule Place </th>
        <td><input type="text" required class="form-control" name="place" id=""></td>
    </tr>
    <tr>
        <th>Filim Schedule Date </th>
        <td><input type="date" required class="form-control" name="date" id=""></td>
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
          <table class="table" style="width: 600px;">
            <tr align="">
              
                <th>Schedule Place</th>
                <th>Schedule Date</th>
           
            </tr>
            <?php 
            $q="select * from filim_schedule where filim_id='$fid' ";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <tr align="">
       
                <td><?php echo $row['filim_schedule_place']?></td>
                <td><?php echo $row['filim_schedule_date']?></td>
                <td><a class="btn btn-success" href="?uid=<?php echo $row['filim_schedule_id']?>">Update</a></td>
                <td><a class="btn btn-danger" href="?did=<?php echo $row['filim_schedule_id']?>">Delete</a></td>
            </tr>
            <?php }?>
          </table>
      

<?php include 'footer.php'?>