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
    $("button").click(function() {
    var id = $(this).closest('tr').attr('name');
    var name = $(this).closest('button').attr('name');
    console.log (name);
    if (name=='delete') {
    $.ajax({
        
        url: 'delete_record.php',
        data:'id='+id,
        type: 'get',
        success: function(response){
            location.reload();
        }
    });
}
    else if (name=='update') {
       $.ajax({
        
        url: 'update.php',
        data:'id='+id,
        type: 'get',
 
        success: function(response){
            var parsed_data =  JSON.parse(response);
            console.log(parsed_data[0]);

            $("#id").val(parsed_data[0].index);   
            $("#name").val(parsed_data[0].name);
            $("#surname").val(parsed_data[0].surname);
            $("#telephone").val(parsed_data[0].telephone);
            $("#street").val(parsed_data[0].street);
            $("#number").val(parsed_data[0].number);
            $("#zip").val(parsed_data[0].zip);
            $("#city").val(parsed_data[0].city);
        }
    });
    }
    });
});

</script>


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
                    <a class="nav-link" href="add_user.php">Add User</a>
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

<!-- List -->
    <div class="container pt-5">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 m-auto d-block">
                <table class="table ">
                    <thead class="bg-success text-white" id="firstThead">
                        <th> Index </th>
                        <th> Name </th>
                        <th> Surname </th>
                        <th> Telephone </th>
                        <th> Addres </th>
                        <th> Action </th>
                    </thead>
                    <tbody id="Table">

                        <?php
                            include 'db.php';

                            $query = "SELECT * from user";

                            $statement = $pdo->prepare($query);
                            $statement->execute();
                            $result = $statement->fetchAll();
                            $counter=1;
                            //var_dump($result);
                            foreach($result as $row)
                                { ?>
                                <tr name=<?php echo $row[0]; ?> ><td><?php echo $counter ?></td>
                                    <td><?php echo $row["name"] ?></td>
                                    <td><?php echo $row["surname"] ?></td>
                                    <td><?php echo $row["telephone"] ?></td>
                                    <td><?php echo $row["street"] . " " .  $row["number"] . " " . $row["zip"] . " " . $row["city"] ?></td>
                                    <td> <button type="button" class="btn btn-info btn-sm" name="delete"><i class="fa fa-refresh"></i> Delete </button> 
                                    <a  data-toggle="modal" href="#portfolioModal6"><button type="button" class="btn btn-info btn-sm" name="update"><i class="fa fa-refresh" ></i> Edit </button></a> </td> </tr>
                                <?php
                                $counter++;
                             }   
                             ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


 <!-- Update -->
  <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div id="modal-body">
                <form action="update_current_user.php" method="post"> 
                    <div class="form-group">

                        <input type="hidden" class="form-control" id="id" name="id" aria-describedby="id" placeholder="Enter id" value="" >

                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="Name" placeholder="Enter name" value="">

                        <label for="surname">Surname</label>
                        <input type="text" class="form-control" id="surname" name="surname" aria-describedby="Surname" placeholder="Enter surname" value="">

                        <label for="telephone">Telephone</label>
                        <input type="number" class="form-control" id="telephone" name="telephone" aria-describedby="Telephone" placeholder="Enter telephone" value="">

                        <label for="street">Street</label>
                        <input type="text" class="form-control" id="street" name="street" aria-describedby="Street" placeholder="Enter street" value="">

                        <label for="number">Number of house</label>
                        <input type="text" class="form-control" id="number" name="number" aria-describedby="Number" placeholder="Enter number" value="">

                        <label for="zip">Code zip</label>
                        <input type="text" class="form-control" id="zip" name="zip" aria-describedby="Zip" placeholder="Enter zip" value="">

                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" aria-describedby="City" placeholder="Enter city" value="">

                    </div>
  
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    </body>

</html>