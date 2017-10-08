<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Create Profile</title>

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
                    <!-- progressbar -->
                    <ul id="progressbar">
                        <li class="active">School Profile</li>
                        <li>Teacher Information</li>
                        <li>Grade and Section</li>
                    </ul>
                    <!-- fieldsets -->
                    <fieldset>
                        <h2 class="fs-title">School Profile</h2>
                        <input type="text" name="region" placeholder="Region"/>
                        <input type="text" name="division" placeholder="Division"/>
                        <input type="text" name="district" placeholder="District"/>
                        <input type="text" name="school_name" placeholder="Name of School"/>
                        <input type="text" name="school_id" placeholder="School ID"/>
                        <input type="button" name="next" class="next action-button" value="Next"/>
                    </fieldset>
                    <fieldset>          
                        <h2 class="fs-title">Teacher Profile</h2>
                        <input type="text" name="first_name" placeholder="First Name"/>
                        <input type="text" name="last_name" placeholder="Last Name"/>
                        <input type="text" name="grade" placeholder="Grade"/>
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                        <input type="button" name="next" class="next action-button" value="Next"/>
                    </fieldset>
                    <fieldset>
                        <h2 class="fs-title">Grade and Section</h2>
                        <input type="password" name="Section" placeholder="Section"/>
                        <input type="password" name="academic_year" placeholder="Academic Year"/>
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                        <input type="submit" name="submit" class="submit action-button" value="Submit"/>
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
    <script src="https://www.gstatic.com/firebasejs/4.5.0/firebase.js"></script>
    <script>
      // Initialize Firebase
      var config = {
        apiKey: "AIzaSyAbRxSiIbQ9BD0FTYB4-JOICDtzGstGKlI",
        authDomain: "eclassrecord-wj.firebaseapp.com",
        databaseURL: "https://eclassrecord-wj.firebaseio.com",
        projectId: "eclassrecord-wj",
        storageBucket: "",
        messagingSenderId: "330072311646"
      };
      firebase.initializeApp(config);
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/create_profile.js"></script>
  </body>
</html>