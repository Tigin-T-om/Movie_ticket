<?php include 'publicheader.php'?>
  
<center>

<div style="width: 100%;height: 200px;background: url('images/netflixbg.jpg');" >

</div>
    <h2 style="margin: 20px;font-family: 'Luckiest Guy';font-size: 22px;font-size: 3rem; color: #000;">Movies and Details</h2>

    <div class="container-floating">
      <div class="row" style="padding-bottom: 100px;padding-top: 50px;box-shadow: 0px 2px 16px 2px grey;">

    <?php 
            $q="select * from movie";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
    <div class="card col-lg-4 col-md-4" style="width: 18rem;box-shadow: 2px 4px 6px #E7E7E7;margin: 30px;">
  <img src="<?php echo $row['poster'] ?>" width="150" height="190" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['movie_title']?></h5>
   
    <a href="viewmoviedetails.php?mid=<?php echo $row['movie_id']?>" class="btn btn-primary">More Details</a>
  </div>
</div>
<?php }?>

</div>
</div>
           
            


    <?php include 'footer.php' ?> 