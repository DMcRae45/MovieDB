<!DOCTYPE html>
<?php
/*
    Description: JustWatch Movies for free viewing.
    Author: David McRae, Oliver Dickens
*/

?>
<html>
<!--<head>-->
  <?php
  include '../Controller/session.php';
  include '../Controller/getAllMovies.php';
  include 'header.php';
  include 'navbar.php';
  ?>
<!-- </head> -->
<body>

  <div class="containerSearch text-center">
    <h1>Search</h1><hr>
    <?php
    //TODO: Sort by year(first showing current year when pressed then reverses to oldest when pressed again) and genre options?
    ?>
  </div>
    <?php
      //Error Reporting for the users
        if(isset($_GET['error']))
          {
            $error = $_GET['error'];
            echo $error;
          }
          ?>
            <div class="container text-center mt-2">
              <h1>Movies</h1><hr>

              <?php
              $rows = 0;
              $cols = 6;
              $counter = 1;
              $nbsp = $cols - ($rows % $cols);
              for ($i=0 ; $i < sizeof($movieArray) ; $i++)
              {

                if(($counter % $cols) == 1)
                {
                  echo '<div class="row">';
                }
                echo "<div class='col'>"; // open col
                echo "<div class='card'>"; // Open card div
                echo "<div class='poster' >"; // Open card poster
                echo "<a href='play.php?id=".$movieArray[$i]->Movie_ID."'> <img src='".$movieArray[$i]->Image_link."'  alt='".$movieArray[$i]->Movie_ID."' onerror=this.src='images/film.placeholder.poster.jpg'></a>"; // card image
                echo "</div>";// close poster
                //TODO: Expansion: add Bookmarked button to add to watch list
                echo "<div class='card-bottom'>";
                echo "<class='movieTitle'>".$movieArray[$i]->Title."<br>";
                echo "<class='movieTitle'>".$movieArray[$i]->Year."";
                echo "</div>";// close card-bottom
                echo "</div>";// close card
                echo "</div>";// close col

                if(($counter % $cols) == 0)
                {
                  echo '</div>';
                }
                $counter++;
              }

              if($nbsp > 0)
              {
                for ($i = 0; $i < $nbsp; $i++)
                {
                  echo'<div class="col-md-4">&nbsp;</div>';
                }
              }
              echo '</div></div><br>';
              ?>

          <?php
          include 'footer.php';
          include '../Controller/bootstrapScript.php';
          include '../Controller/ajaxScript.php';
          include '../Controller/navControl.js';
          ?>
    </body>
</html>
