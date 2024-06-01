
<?php include'directorheader.php';
  $dirid=$_SESSION['dirid'];
?>
<center>
    <h1>Set Filim Schedules</h1>
          <table class="table" style="width: 1000px;">
            <tr align="center">
                <th></th>
                <th>Title</th>
                <th>description</th>
                <th>cast and crew</th>
                <th>release Date</th>
            </tr>
            <?php 
            $q="SELECT * FROM director INNER JOIN `movie` USING (movie_id) WHERE director_id='$dirid'";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <tr align="center">
                <td><img width="100" height="120" src="<?php echo $row['poster'] ?>" alt=""></td>
                <td><?php echo $row['movie_title']?></td>
                <td><?php echo $row['movie_desc']?></td>
                <td><?php echo $row['cast_and_crew']?></td>
                <td><?php echo $row['release_date']?></td>
                <td><a href="directorsetfilimschedule.php?fid=<?php echo $row['movie_id']?>">Set Schedule</a></td>
                         </tr>
            <?php }?>
          </table>
          <?php include 'footer.php'?>