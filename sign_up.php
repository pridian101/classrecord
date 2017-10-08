<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Sign Up</title>

    <!-- forebase JS -->
    <script src="https://www.gstatic.com/firebasejs/4.5.0/firebase.js"></script>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/create_profile.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

        <!-- MultiStep Form -->
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form id="msform">
                    <fieldset>
                        <h2 class="fs-title">Login Information</h2>
                        <input id="txtEmail" type="email" placeholder="Email Address"/>
                        <input id="txtPassword" type="password" placeholder="Password"/>
                        <input type="button" id="signup" class="submit action-button" value="Sign Up"/>
                    </fieldset>
                </form>
            </div>
        </div>
        <!-- /.MultiStep Form -->

    </div> <!-- /container -->

        <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script type="text/javascript" src="js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/create_profile.js"></script>
  </body>
</html>