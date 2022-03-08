<?php
include_once'include/dbh.inc.php';
error_reporting(E_ERROR | E_PARSE);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" content="HTML"/>
    <title>Recommend</title>
    <link rel="stylesheet" type="text/css" href="myStyle.css">
    <script src="javaScripte.js"> </script>

    

</head>
<body>






              <!-- //////////////////////////////////////////////////////////////////////////////////////////// -->
                                                       <!-- PHP -->                                     
              <?php
              $url = $_POST["song_link"];
                  $url = filter_var($url, FILTER_SANITIZE_URL);
                  $enterbutton= $_POST['submit'];


              if ($_SERVER["REQUEST_METHOD"] == "POST") {
              // is required valedation
                ////////////song_name/////////////////
                if (empty($_POST["song_name"])) {
                  $song_nameErr = "Name of the song is required";
                }
                else if (!preg_match ("/^[a-zA-z]*$/", $_POST["song_name"]) ) {  
                  $song_nameErr = "Only alphabets and whitespace are allowed.";  
                }
                else {
                  $song_name = test_input($_POST["song_name"]);
                }
                /////////////artist name////////////////
                if (empty($_POST["artist_name"])) {
                  $artist_nameErr = "Name of the artist is required";
                } else {
                  $artist_name = test_input($_POST["artist_name"]);
                }
                 /////////////genre////////////////
                if (empty($_POST["genre"])) {
                  $genreErr = "choosnig a genre is required";
                } else {
                  $genre = test_input($_POST["genre"]);
                }
                 /////////////album name////////////////
                 $albumlen = strlen ($_POST ["album"]);  

                if (empty($_POST["album"])) {
                    $albumErr = "Name of the album is required";
                
                } else if (isset($enterbutton)){
                  if ($albumlen < 4){
                  $albumErr= " Album name must at least have 4 characters.";
                  }}
                else {
                    $album = test_input($_POST["album"]);
                }
                 /////////////link////////////////
                if (empty($_POST["song_link"])) {
                  $song_linkErr = "A link is required";
                }

                  else if(filter_var( $url, FILTER_VALIDATE_URL) === false) {
                    $song_linkErr="$url is an invalid URL";
                  }

                   else {
                  $song_link = test_input($_POST["song_link"]);
                }
                 /////////////link////////////////
                if (empty($_POST["language"])) {
                  $languageErr = "A language is required";
                } else {
                  $language = test_input($_POST["language"]);
                }
              }
              function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
              }
              ?>

            <!-- //////////////////////////////////////////////////////////////////////////////////////////// -->

                                             <!--The Background Image-->
  <img class="recommendImge" src="RecommendPageImage.png" width="1218" height="928" >


  <table class="formTable" >

    <!-- //////////////////////////////////////////////////////////////////////////////////////////// -->
                                             <!--Logo + Nav bar-->
        <thead>
            <tr>
                 <th colspan="5" >
                   <!-- logo -->
                   <img class="logo" src="logo.png" width="120" height="40" >  
                   <!-- Nav bar-->
                    <nav class="hover-nav">
                        <ul> 
                        <li> <a class="navLinks" href="index.html"> Home</a></li>
                        <li> <a class="navLinks" href="browse.html"> Browse</a></li>
                        <li> <a class="navLinks" href="search.php"> Search</a></li>
                         <li> <a class="navLinks" href="Recommend.php"> Recommend</a></li>
                        </ul>
                    </nav>
               
                </th>
            </tr>
        </thead>
        <!-- //////////////////////////////////////////////////////////////////////////////////////////// -->
                                         <!-- Body -->

    <tr>
      <td class="parCell">
                                      <!---------------Header ----------------->

        <p class="recommendParagraph"><b> Recommend</b> <br>A Song! </p>
      </td>

      <!------------ The FORM ------------>
      <td>
        <!-- onsubmit="confirmRecommendation()" onreset="confirmCancelation(this)" -->
        <form id="formrecommend" action="include/recommendDB.inc.php" method="POST" >
          <label class="recLabels"> Song Title: </label><br>
          <input class="input-field" type="text"  id="songName" name="song_name" onfocus="backgroundColor_focus(this)" onblur="backgroundColor_blur(this)" onmouseover="hoverTextbox(this)" onmouseout="unHoverTextbox(this)" >     
          <br>
          <span><?php 
          if(isset($song_nameErr)) echo  $song_nameErr; ?></span> 

          <br>
          <label class="recLabels"> Artist: </label><br>
          <input class="input-field" type="text"  id="artistName" name="artist_name" onfocus="backgroundColor_focus(this)" onblur="backgroundColor_blur(this)" onmouseover="hoverTextbox(this)" onmouseout="unHoverTextbox(this)">
          <br>
          <span><?php 
          if(isset($artist_nameErr)) echo  $artist_nameErr; ?></span> 

<br>
          <label class="recLabels">Genre: </label>
          <br>
          <select id="genreOption" name="genre" onchange="dropDownLists(this)" onfocus="backgroundColor_focus(this)" onblur="backgroundColor_blur(this)" onmouseover="hoverTextbox(this)" onmouseout="unHoverTextbox(this)">
            <option value="0">Select A Genre </option>
            <option value="POP">POP</option>
            <option value="ROCK">ROCK</option>
            <option value="ALTERNATIVE">ALTERNATIVE</option>
            <option value="RB">R&B</option>
        </select>
        <br>
        <span><?php 
          if(isset($genreErr)) echo  $genreErr; ?></span> 
        <br>

        <label class="recLabels"> Album: </label><br>
        <input class="input-field" type="text" id="albumName"  name="album" onfocus="backgroundColor_focus(this)" onblur="backgroundColor_blur(this)" onmouseover="hoverTextbox(this)" onmouseout="unHoverTextbox(this)">
        <br>
        <span><?php 
          if(isset($albumErr)) echo  $albumErr; ?></span> 
        <br>

        <label class="recLabels"> Link: </label><br>
        <input class="input-field" type="text" id="songLink"  name="song_link"onfocus="backgroundColor_focus(this)" onblur="backgroundColor_blur(this)" onmouseover="hoverTextbox(this)" onmouseout="unHoverTextbox(this)">
        <br>
        <span><?php 
          if(isset($song_linkErr)) echo  $song_linkErr; ?></span> 
        <br>

        <label class="recLabels" >Song Language: </label>
        <br>
        <br>
          <input type="radio" id="arabic" name="language" value="ar">
          <label for="arabic">Arabic</label><br>
          <input type="radio" id="english" name="language" value="en">
          <label for="english">English</label><br>
          <input type="radio" id="Korean" name="language" value="kr">
          <label for="Korean">Korean</label>
      

          <br>


        <span><?php 
          if(isset($languageErr)) echo  $languageErr; ?></span> 

        <br>
        <br>
        <br>



        <input class="my-button submit" type="submit" name="submit" value="Recommend!" onclick="return confirm_submit();">

        <input class="my-button clear" type="reset" name="clear" value="Clear" onclick="return confirm_reset();">


        </form>   
        
        <!--DataBase Connection-->
        <p id="hint" style ="color: white; font-size: 10px;"> </p>

      </td>

    </tr>

    <tr>
      <td colspan="5" class="horLine">
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>

          <hr>
      </td>
</tr>

<!-- //////////////////////////////////////////////////////////////////////////////////////////// -->
                                          <!-- signature + Email -->
                                          <tfoot>
            <tr>
                <td class="footerEmail" colspan="3">
                    <p class="signature" ><strong> Group member</strong><br><br>
                        AtheerAlghamdi | <a href="mailto:aalghamdi3293@stu.kau.edu.sa">Email</a><br>
                        Maha Benaider | <a href="mailto:Malmutairi0458@stu.kau.edu.sa">Email</a><br>
                        Rina Alfarsi | <a href="mailto:ralfarsi0027@stu.kau.edu.sa">Email</a><br>
                        Ghada Alsulmi | <a href="mailto:GALSULAMI0037@stu.kau.edu.sa">Email</a><br>
                    
                    </p>
                </td>
             </tr>
        </tfoot>
        
    </table>
    <!-- //////////////////////////////////////////////////////////////////////////////////////////// -->

</body>
</html>