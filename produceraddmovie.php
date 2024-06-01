<?php include'producerheader.php';


if(isset($_POST['sub'])){
    extract($_POST);

    $dir = "uploads/";
	$file = basename($_FILES['poster']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target = $dir.uniqid("uploads_").".".$file_type;
	if(move_uploaded_file($_FILES['poster']['tmp_name'], $target))
	{
         $q="insert into movie values(null,'$title', '$desc', '$cast', '$target', '$date')";
        insert($q);
        return redirect("produceraddmovie.php");
    }
    else
    {
        echo "file uploading error occured";
    }

  
}


?>
<div style="width: 100%;height: 100vh;background: url('images/tc.jpg');background-size: cover;" >
<div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center" style="display: flex;align-items: center;justify-content:center;width: 100%;">
          <div data-aos="zoom-out" style="width: 400px;box-sizing: content-box;padding: 50px; border: 2px solid #000; box-shadow: 2px 4px 16px grey ;width: 600px;" >
          <center>
          <form  method="post" enctype="multipart/form-data">

    <h2 style="font-size: 30px;color: white;" class="text-white" id="hstyle">Manage Movies</h2>
<table class="table " style="color: white;" >
    <tr>
        <th>Movie Title </th>
        <td><input type="text" required class="form-control" name="title" id=""></td>
    </tr>
    <tr>
        <th>Movie Description </th>
        <td><input type="text" required class="form-control" name="desc" id=""></td>
    </tr> 
    <tr>
        <th>Cast and crew </th>
        <td><textarea style="color: #000;"  id="" name="cast" cols="30" rows="10"></textarea></td>
    </tr>
    <tr>
        <th>Poster</th>
        <td><input type="file" required class="form-control" name="poster" id=""></td>
    </tr>
   
   
      <tr>
        <th>Release Date</th>
        <td><input type="text" required class="form-control" name="date" id=""></td>
    </tr>
      
    <tr>
        <td colspan="2" align="center">
            <input type="submit" class="btn btn-success" name="sub" id="">
        </td>
    </tr>
</table>
</form>
</div>




          </center>
            </div>
          </div>
<center>
          <table class="table" style="box-shadow: 0px 0px 16px 1px darkred;width: 100%;margin-top: 20px;" >
            <tr align="">
                <th></th>
                <th>Title</th>
                <th>description</th>
                <th>cast and crew</th>
                <th>release Date</th>
            </tr>
            <?php 
            $q="select * from movie";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <tr align="">
                <td><img width="100" height="120" src="<?php echo $row['poster'] ?>" alt=""></td>
                <td><?php echo $row['movie_title']?></td>
                <td><?php echo $row['movie_desc']?></td>
                <td><?php echo $row['cast_and_crew']?></td>
                <td><?php echo $row['release_date']?></td>
                <td><a class="btn btn-success"  href="adminmanagedirector.php?mid=<?php echo $row['movie_id']?>">Manage Director</a></td>
                <td><a  class="btn btn-danger" href="adminmanageproductioncontroller.php?mid=<?php echo $row['movie_id']?>">Manage Production Controller</a></td>
            </tr>
            <?php }?>
          </table>
      

<?php include 'footer.php'?>