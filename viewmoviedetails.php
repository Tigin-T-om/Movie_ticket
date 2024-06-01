<?php include 'publicheader.php'?>
<div style="width: 100%;height: 200px;background: url('images/netflixbg.jpg');" >

</div>
<center>

<table class="table">
            <tr align="center">
                <th></th>
                <th>Title</th>
                <th>description</th>
                <th>release Date</th>
                <th>Director</th>
                <th>Actor</th>
                <th>Production Controller</th>
            </tr>
            <?php 
            $q="SELECT *,CONCAT(`actors`.`firstname`,'',`actors`.lastname  )AS actor, CONCAT(`production_controller`.`firstname`,'',`production_controller`.lastname  )AS CONTROLLER , CONCAT(`director`.`firstname`,'',`director`.lastname  )AS director FROM movie INNER JOIN `director` USING (movie_id) INNER JOIN `production_controller` USING (movie_id) INNER JOIN `actors` USING (movie_id) INNER JOIN `posters_trailer` USING (movie_id) WHERE movie_id='$mid'";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <tr >
                <td><img width="100" height="120" src="<?php echo $row['poster'] ?>" alt=""></td>
                <td><?php echo $row['movie_title']?></td>
                <td><?php echo $row['movie_desc']?></td>
                <td><?php echo $row['release_date']?></td>
                <td><?php echo $row['director']?></td>
                <td><?php echo $row['actor']?></td>
                <td><?php echo $row['CONTROLLER']?></td>
                <td><a class="btn btn-success" href="<?php echo $row['file_path']?>">View Trailer</a></td>
                 </tr>
            <?php }?>
          </table>


<style>
 
</style>









<?php include 'footer.php' ?> 