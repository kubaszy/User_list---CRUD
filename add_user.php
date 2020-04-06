<!DOCTYPE html>
<html>

    <head>

        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
        <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.compatibility.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

        <meta charset="UTF-8">
        <link href="css/style.css" rel="stylesheet">




        <title>Task1</title>
    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">



<script type="text/javascript">
$(document).ready(function(){
    $("#loadBtn").click(function() {
    $.ajax({
        url: 'user_list.php',
        type: 'get',
        dataType: 'JSON',
        success: function(response){
            var trHTML = '';
                $.each(response, function (i, item) {
                    trHTML +=    '<tr><td>' + item.index + '</td><td>' + item.name +
                               '</td><td>' + item.surname + '</td><td>' + item.telephone + '</td><td>' + item.street + " " + item.number + " " + item.zip + " " + item.city + '</td><tr>' ;
                            });
                            $('#Table').html(trHTML);
            console.log(response);
        }
    });
    });
});

</script>

    </head>

    <body>
<!-- Navigation -->
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">TASK</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Add User</a>
                </li>
            </ul>
        </div>
    </nav>


<!-- Header -->
    <header class="masthead">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in"><h2>List of User + CRUD operation.</h2> </div>
            </div>
        </div>
    </header>

<!-- Add section -->
    <div class="container pt-5">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 m-auto d-block">
                <form action="insert.php" method="post"> 
                    <div class="form-group">

                        <label for="ame">Name</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="Name" placeholder="Enter name">

                        <label for="surname">Surname</label>
                        <input type="text" class="form-control" id="surname" name="surname" aria-describedby="Surname" placeholder="Enter surname">

                        <label for="telephone">Telephone</label>
                        <input type="text" class="form-control" id="telephone" name="telephone" aria-describedby="Telephone" placeholder="Enter telephone">

                        <label for="street">Street</label>
                        <input type="text" class="form-control" id="street" name="street" aria-describedby="Street" placeholder="Enter street">

                        <label for="number">Number of house</label>
                        <input type="text" class="form-control" id="number" name="number" aria-describedby="Number" placeholder="Enter number">

                        <label for="zip">Code zip</label>
                        <input type="text" class="form-control" id="zip" name="zip" aria-describedby="Zip" placeholder="Enter zip">

                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" aria-describedby="City" placeholder="Enter city">

                    </div>
  
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    </body>

</html>