<?php include 'producerheader.php';


if(isset($_POST['update'])){
    extract($_POST);

    $q="update filim_schedule set filim_schedule_place='$place', filim_schedule_date='$date' where filim_schedule_id='$fs_id'";
    update($q);
    return redirect("producerviewfilimschedule.php");
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

    


            <h2 style="font-size: 30px;" class="text-white" id="hstyle">Update Schedule</h2>

            <?php 
            $q="select * from filim_schedule where filim_schedule_id='$fs_id'";
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

          </center>
            </div>
          </div>
</div>
<?php include 'footer.php'?>