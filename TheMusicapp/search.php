<?php
include_once'include/dbh.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" content="HTML"/>
    <link rel="stylesheet" type="text/css" href="myStyle.css">
    <script src="javaScripte.js"> </script>


<title>Search</title>
</head>
<body>

    <!-- //////////////////////////////////////////////////////////////////////////////////////////// -->
                                             <!--The Background Image-->
    <img class="searchImge" src="searchPageImage.png" width="508" height="572" >

    <table>
        <!-- //////////////////////////////////////////////////////////////////////////////////////////// -->
                                             <!--Logo + Nav bar-->
        <thead>
            <tr>
                 <th colspan="5" >
                     <!-- Logo -->
                    <img class="logo" src="logo.png" width="120" height="40" >   
                     <!-- Nav bar -->
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
        <tbody>
        <tr>           
                              <!---------------Header ----------------->

            <th class="searchHeadline" colspan="5"><h1> Search</h1></th>
        </tr>
        <tr>

                               <!--------------song type------------------>

            <th colspan="1" >
                <label>Gener:</label><br><br>
                <form action="" method="POST">
                    <select name="genre" class="dropmenu-field" onchange="dropDownLists(this)" onmouseover="hoverTextbox(this)" onmouseout="unHoverTextbox(this)">
                        <option value="0">Select A Genre </option>
                        <option value="POP">POP</option>
                        <option value="ROCK">ROCK</option>
                        <option value="ALTERNATIVE">ALTERNATIVE</option>
                        <option value="RB">R&B</option>
                    </select>

                    <input class="my-button search" type="submit" value="Search" name="search">
                </form>
                
            </th>
            
            </tr>
            <tr>
                <td colspan="5" ><hr></td>
            </tr>

                <?php

            if(isset($_POST['search'])){
                $genre = $_POST['genre'];
                $query= "SELECT * from songs where genre='$genre'";
                $query_run=mysqli_query($conn,$query);
                while($row = mysqli_fetch_array($query_run)){
                    ?>

<tr class="songInfo">          
<td>
            <p>
             <b>BY: </b>
               <?php
                 echo $row['artistName'];
                 ?>  
                    </p>

                    <p><b>SONG: </b> <a class="songLinks" href="<?php echo $row['link'];?>" target="_blank"> <?php echo $row['songName'];?></a></p>

                    <p>
             <b>ALBUM: </b>
               <?php
                 echo $row['album'];
                 ?>  
                    </p>

                    <p>
             <b>LANGUAGE: </b>
               <?php
                 echo $row['language'];
                 ?>  
                    </p>
</td>
        <tr>
            <td colspan="5" class="horLine">

                <hr>
            </td>
</tr>

    </tbody>
<?php 
                }
            }
?> 

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