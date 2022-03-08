<?php
 include_once'dbh.inc.php';
$songName = $_POST['song_name'];
$artistName = $_POST['artist_name'];
$genre = $_POST['genre'];
$album = $_POST['album'];
$link = $_POST['song_link'];
$language = $_POST['language'];
$sql= "insert into songs(songName,artistName,genre,album,link,language) values('$songName','$artistName','$genre','$album','$link','$language');";
    mysqli_query($conn,$sql);
    header("Location: ../recommend.php?recommendadong=success")
?>