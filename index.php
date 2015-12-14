<!--<!DOCTYPE html>-->
<!-- saved from url=(0043)http://getbootstrap.com/examples/jumbotron/ -->
<html>
        <head>
    <!--    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">-->
    <!--
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    -->
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="http://getbootstrap.com/favicon.ico">

        <title>Project Omicron - Weight Converter</title>

        <!-- Bootstrap core CSS -->
        <link href="./Jumbotron_Template_for_Bootstrap_files/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="./Jumbotron_Template_for_Bootstrap_files/jumbotron.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="./Jumbotron_Template_for_Bootstrap_files/ie-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- My custom CSS -->
        <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
        <link href="./Jumbotron_Template_for_Bootstrap_files/mycustomcss.css" rel="stylesheet" type="text/css">
      </head>

      <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
             <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>-->
              <a class="navbar-brand" href="http://lamp.cse.fau.edu/~eguerre4">Project Omicron</a>
            </div>
          <!--/.navbar-collapse -->
          </div>
        </nav>

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
          <div class="container">
            <h1>Weight Converter</h1>
            <p>
                See how much you weigh on the other side of the world in kilograms!<br>
                Or if you are from the other side of the world, check out how much you are<br>
                in the good ol' USA!
            </p>
          </div>
        </div>

        <div class="container">
          <!-- Example row of columns -->
          <div class="row">
            <div class="col-md-4">
              <h2>Time For Some Converting Fun</h2>
                <form action="index.php" method="POST">
                    <input type="text" name="weight" id="weight" class="form-control" required autofocus/>
                    <label for="pound_to_kg">Convert to Kilogram</label>
                    <input type="radio" name="conversion" id="pound_to_kg" class="btn btn-default" value="pound_to_kg"/>
                    <label for="kg_to_pound">Convert to Pounds</label>
                    <input type="radio" name="conversion" id="kg_to_pound" class="btn btn-default" value="kg_to_pound"/>
                    <div>
                        <input type="submit">
                    </div>
                </form>

                <!-- Custom PHP for weight conversion -->  
                <?php
                  function sanitizeString($str) {
                      $str = strip_tags($str);
                      $str = htmlentities($str);
                      $str = stripslashes($str);
                      return $str;
                  }

                  function toPound($kg) {
                      $result = $kg * 2.20462;
                      report($kg, $result);
                  }

                  function toKilogram($pound) {
                      $result = $pound / 2.20462;
                      report($result, $pound);
                  }

                  function report($kilogram, $pound) {
                      echo $kilogram . "kg =" . $pound . "lb";
                  }

                  if (isset($_POST['weight'])) {
                      //Sanitize the weight from the textbox to process
                      $weight = sanitizeString($_POST['weight']);

                      if (is_numeric($weight)) {
                          //Check to see if the user selected one of the conversions
                          if (!isset($_POST['conversion'])) {
                             echo "Sorry, a conversion needs to be selected!"; 
                          }
                          else {
                              //If the user submits a pound to kilogram request
                              if (isset($_POST['conversion']) && $_POST['conversion'] === 'pound_to_kg') {
                                  toKilogram($weight);
                              }
                              //If the user submits a kilogram to pound request
                              else if (isset($_POST['conversion']) && $_POST['conversion'] === 'kg_to_pound'){
                                  toPound($weight);
                              }
                          }
                      }
                      else {
                          echo "Sorry, the weight needs to be numeric!";
                      }
                  }
                ?>

            </div>
          </div>

          <hr>

          <footer>
            <p>© Emanuel Guerrero 2015</p>
          </footer>
        </div> <!-- /container -->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="./Jumbotron_Template_for_Bootstrap_files/jquery.min.js"></script>
        <script src="./Jumbotron_Template_for_Bootstrap_files/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="./Jumbotron_Template_for_Bootstrap_files/ie10-viewport-bug-workaround.js"></script>

    </body>
</html>