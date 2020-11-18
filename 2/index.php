<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EZQUIZ2</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<style>
    body{
        background-color:grey;
    }
</style>
<body>
<h3>ระบุคำค้นหา</h3>
        <input id="songName" name="songName" type="text" width="80%">
        <button type="submit" class="btn btn-primary">ค้นหา</button>
    <?php
        $url = "https://dd-wtlab2020.netlify.app/pre-final/ezquiz.json";
        $res = file_get_contents($url);
        $data = json_decode($res);

        for ($i = 0; $i < sizeOf($data->tracks->items); $i++){
            $song = $data->tracks->items[$i]->album;
            echo "<center>";
            echo "<div class='card' style='width:640px; margin-top:30px;'>";
            echo "<img class='card-img-top' style='width:640px;height:640px;' src='".$song->images[0]->url."'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>" .$song->name."</h5>";
            echo "<p class='card-text'>Artist: ".$song->artists[0]->name."</p>";
            echo "<p class='card-text'>Release date: ".$song->release_date."</p>";
            echo "<p class='card-text'>Avaliable: ".sizeof($song->available_markets)." countries</p>";
            echo "</div>";
            echo "</div><br><br>";
            echo "</center>";
        }

    ?>
</body>
</html>