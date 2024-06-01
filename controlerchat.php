<?php include'controllerheader.php'?>
<div style="width: 100%;height: 100vh;background: url('images/tc.jpg');background-size: cover;display: flex;align-items: center;justify-content: center;" >
<div style="display: flex; width: 800px;gap: 30px;margin-bottom: 250px;">

    <a class="btn btn-success" href="controllerviewdirector.php">Chat with Director</a>
    <a class="btn btn-success" href="controllerviewproducer.php">Chat with Producer</a>
    <a class="btn btn-success" href="controllerviewactors.php">Chat with Actors</a>
</div>
</div>

<style>
    a{
        padding: 20px;
    }
    .btn{
        border-radius: 0%;
        padding: 20px 40px;
        box-shadow: red 2px 2px ,
                    green 2px 4px
        ;
    }
    body{
        overflow: hidden;
    }
</style>
<?php include 'footer.php'?>