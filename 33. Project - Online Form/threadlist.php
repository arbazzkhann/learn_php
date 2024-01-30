<?php include './partials/_dbconnect.php'?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to iDiscuss - Coding Forums</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
    #ques {
        min-height: 500px;
    }
    </style>
</head>

<body>
    <!--Header-->
    <?php include './partials/_header.php'?>

    <?php
           $cat_id = $_GET['catid'];

           // Corrected SQL query with backticks around table name
           $sql = "SELECT * FROM `categories` WHERE category_id=$cat_id";
           
           $result = mysqli_query($conn, $sql);
           
           if (!$result) {
               // Handle query execution error
               echo "Error: " . mysqli_error($conn);
           } else {
               // Fetch data only if the query was successful
               while($row = mysqli_fetch_assoc($result)) {
                   $cat_name = $row['category_name'];
                   $cat_desc = $row['category_description'];
               }
           }

           $showAlert = false;
           $method = $_SERVER['REQUEST_METHOD'];
           if($method == 'POST') {
               // Insert thread into db
               $thread_title = $_POST['thread_title'];
               $thread_desc = $_POST['thread_description'];
   
               $sql = "INSERT INTO `threads` (`thread_title`, `thread_description`, `thread_category_id`, `thread_user_id`, `time_stamp`) VALUES ('$thread_title', '$thread_desc', '$cat_id', '0', current_timestamp())";
   
               $result = mysqli_query($conn, $sql);
               $showAlert = true;
               if($showAlert) {
                    echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> Your thread has been submitted.
                                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                            </div>';
               }
   
           }
   

    ?>



    <!-- jumbotron -->
    <div class="container">
        <div class="jumbotron m-3">
            <h1 class="display-4"><?php echo $cat_name?></h1>
            <p class="lead"><?php echo $cat_desc?></p>
            <hr class="my-4">
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>


    <!-- form -->
    <div class="container">
        <form action="<?php $_SERVER['REQUEST_URI']?>" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Thread Title</label>
                <input type="text" class="form-control" name="thread_title" id="threadTitle">
            </div>
            <div class="mb-3">
                <label for="threadDescription" class="form-label">Ellaborate your concern</label>
                <textarea rows="6" class="form-control" name="thread_description" id="threadDescription"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>

    <!-- Q & A Section -->
    <div id="ques" class="container my-3 py-4">

        <h1>Browse Questions</h1>
        <?php
           $cat_id = $_GET['catid'];

           // Corrected SQL query with backticks around table name
           $sql = "SELECT * FROM `threads` WHERE thread_category_id=$cat_id";
           
           $result = mysqli_query($conn, $sql);
           $noResult = true;

           if (!$result) {
               // Handle query execution error
               echo "Error: " . mysqli_error($conn);
           } else {
               // Fetch data only if the query was successful
               while($row = mysqli_fetch_assoc($result)) {
                   $thread_title = $row['thread_title'];
                   $thread_cat_desc = $row['thread_description'];
                   $noResult = false;

            echo '
                    <div class="media my-3">
                        <img src="./images/userdefault.png" width="40px" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0"><a href="threads.php?threadid='.$cat_id.'">'.$thread_title.'</a></h5>
                        <p>'.$thread_cat_desc.'</p>
                    </div>
                    </div>';

                }

            }   
            if($noResult) {
                echo '
                    <div class="jumbotron jumbotron-fluid pl-4">
                        <h1 class="display-4">NO QUESTION HERE</h1>
                        <p>Be the first person to ask question.</p>
                    </div>
                    </div>';
            }
            echo '</div>';
    ?>





        <?php include './partials/_footer.php'?>
        <!--Footer-->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>

</html>