<?php include'directorheader.php';
 $dirid=$_SESSION['dirid'];

if(isset($_POST['sub'])){
    extract($_POST);
    
    $dir = "uploads/";
	$file = basename($_FILES['trailers']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target = $dir.uniqid("uploads_").".".$file_type;
	if(move_uploaded_file($_FILES['trailers']['tmp_name'], $target))
	{
        $q="insert into posters_trailer values(null,'$mid','$target')";
        $lid=insert($q);
        return redirect("directormovietrailer.php");
    
    }
    else
    {
        echo "file uploading error occured";
    }

  
  
}

if(isset($_GET['did'])){
    $q="delete from posters_trailer where poster_trailer_id='$did'";
    delete($q);
    return redirect("directormovietrailer.php");
}


if(isset($_POST['update'])){
    extract($_POST);

    $dir = "uploads/";
	$file = basename($_FILES['trailer']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target = $dir.uniqid("uploads_").".".$file_type;
	if(move_uploaded_file($_FILES['trailer']['tmp_name'], $target))
	{
        $q="update posters_trailer set file_path='$target' where poster_trailer_id='$uid'";
        update($q);
        return redirect("directormovietrailer.php");
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

<div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center" style="display: flex;align-items: center;justify-content:center;width: 100%;">
          <div data-aos="zoom-out" style="width: 400px;box-sizing: content-box;padding: 50px; border: 2px solid grey; box-shadow: 2px 4px 16px grey;margin-top: 200px;" >
          <center>
          <form  method="post" enctype="multipart/form-data">

          <?php if(isset($_GET['uid'])){?>


            <h2 style="font-size: 30px;" class="text-white" id="hstyle">Update Trailer</h2>

            <?php 
            $q="select * from posters_trailer where poster_trailer_id='$uid'";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
<table class="table " >
            <tr>
                <th>Trailer</th>
                <td><video width="150" height="100" src="<?php echo $row['file_path']?>"></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="file" name="trailer" id=""></td>
            </tr>
      
    <tr>
        <td colspan="2" align="center">
            <input type="submit" class="btn btn-success" value="update" name="update" id="">
        </td>
    </tr>
</table>
<?php }?>


            <?php }else{?>

    <h2 style="font-size: 30px;" class="text-white" id="hstyle">Add Trailers</h2>
<table class="table " >
    <tr>
        <th>Filim  </th>
        <td><select style="color: black;" name="mid" id="">
        <?php 
            $q="SELECT * FROM `movie` INNER JOIN `director` USING (movie_id) where director_id='$dirid' ";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <option value="<?php echo $row['movie_id']?>"><?php echo $row['movie_title']?></option>
            <?php }?>
        </select></td>
    </tr>
    <tr>
        <th>Trailer </th>
        <td><input type="file" required class="form-control" name="trailers" id=""></td>
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
          <table class="table">
            <tr align="">
              
                <th>Trailer</th>
                <th>Movie Name</th>
                <th>Movie Descripton</th>
           
            </tr>
            <?php 
            $q="SELECT * FROM `movie` INNER JOIN `posters_trailer` USING (movie_id) INNER JOIN `director` USING (movie_id)   where  director_id='$dirid'";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <tr align="">
                <td><video width="160" height="150" controls src="<?php echo $row['file_path']?>"></video></td>
                <td><?php echo $row['movie_title']?></td>
                <td><?php echo $row['movie_desc']?></td>
                <td><a class="btn btn-success" href="?uid=<?php echo $row['poster_trailer_id']?>">Update</a></td>
                <td><a class="btn btn-danger" href="?did=<?php echo $row['poster_trailer_id']?>">Delete</a></td>
            </tr>   
            <?php }?>
          </table>
      

<?php include 'footer.php'?>