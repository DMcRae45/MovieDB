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

  if(!isset($_GET['filter']))
  {
    include '../Controller/getAllMovies.php';
  }
  else
  {
    $movieFilter = $_GET['filter'];
    include '../Controller/getMoviesByFilter.php';
  }
  include 'header.php';
  include 'navbar.php';
  ?>
<!-- </head> -->
<body>
  <div class="container">
    <div class="row mt-2">

      <form class="form-inline col-6" method="GET">
        <div class='form-group input-group'>
          <div class='input-group-prepend'>
            <span class='input-group-text' id='inputGroupPrepend'>Order By</span>
          </div>
          <select class='custom-select' name='orderBy'>
            <option value=''>Order By</option>
            <option value='year'>year</option>
            <option value='alphabetical'>alphabetical</option>
          </select>
        </div>
      </form>

      <form class="form-inline col-6" method="GET">
        <input class="form-control col-10" type="search" placeholder="Search by Title" name="filter">
        <button class="btn btn-danger col-2" type="submit">Search</button>
      </form>

    </div>
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
echo"
              <div class='no-gutters' id='Movies'>
                <div class='col-12 row no-gutters'>
                  ";

                  for ($i=0 ; $i < sizeof($movieArray) ; $i++)
                  {
                    //clickable item, Movie card.
                    echo"
                    <div class=''><a class='btn text-light' data-toggle='modal' data-target='#".$movieArray[$i]->Title."'>
                      <div class='card'>
                        <h6 class='card-title'>".$movieArray[$i]->Title."</h6>

                        <img src='".$movieArray[$i]->Image_link."' class='card-img-top homePage' alt='Movie Poster' onerror=this.src='images/film.placeholder.poster.jpg'>
                        ";
                        //  <ul class='list-group list-group-flush'>
                        //    <li class='list-group-item'>Genre: <text>".$movieArray[$i]->Genre."</text></li>
                        //    <li class='list-group-item'>Genre: <text>".$movieArray[$i]->Year."</text></li>
                        //  </ul>
                      echo "
                      </div>
                    </div>
                    ";

                    // Hidden modal content
                    echo "
                    <div class='modal fade' id='".$movieArray[$i]->Title."' tabindex='-1' role='dialog' aria-labelledby='modal' aria-hidden='true'>

                      <div class='container modal-dialog' role='document'>

                        <div class='modal-content bg-dark'>
                          <div class='modal-header'>
                            <h5 class='modal-title' id='".$movieArray[$i]->Title."'>'".$movieArray[$i]->Title."'</h5>
                            <button type='button' class='close btn btn-dark' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                          </div>
                        </div>


                        <ul class='list-group'>
                          <li class='list-group-item d-flex justify-content-between align-items-center'>
                            Description: <text>".$movieArray[$i]->Description."</text>
                          </li>
                          <li class='list-group-item d-flex justify-content-between align-items-center'>
                            Genre: <text>".$movieArray[$i]->Genre."</text>
                          </li>
                          <li class='list-group-item d-flex justify-content-between align-items-center'>
                            Year: <text>".$movieArray[$i]->Year."</text>
                          </li>
                        </ul>

                      </div>
                    </div>
                    ";
                  }
                  ?>
                </div>
              </div>









          <?php
          include 'footer.php';
          include '../Controller/bootstrapScript.php';
          include '../Controller/ajaxScript.php';
          include '../Controller/navControl.js';
          ?>
    </body>
</html>
