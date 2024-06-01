
<?php include'actorheader.php';

?>
<div style="width: 100%;height: 200px;background: url('images/netflixbg.jpg');" >

</div>
<center>
    <h1>Availabe Filim Schedules</h1>
          <table class="table" >
            <tr align="">
                <th></th>
                <th>Title</th>
                <th>description</th>
                <th>cast and crew</th>
                <th>release Date</th>
                <th>Filim Schedule Place</th>
                <th>Filim Schedule Date</th>
            </tr>
            <?php 
            $q="SELECT * FROM  filim_schedule inner join movie on filim_schedule.filim_id = movie.movie_id";
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
                <td><?php echo $row['filim_schedule_place']?></td>
                <td><?php echo $row['filim_schedule_date']?></td>

                         </tr>
            <?php }?>
          </table>
          <?php include 'footer.php'?>