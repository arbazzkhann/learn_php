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
           $thread_id = $_GET['threadid'];

           // Corrected SQL query with backticks around table name
           $sql = "SELECT * FROM `threads` WHERE thread_id=$thread_id";
           
           $result = mysqli_query($conn, $sql);
           
           if (!$result) {
               // Handle query execution error
               echo "Error: " . mysqli_error($conn);
           } else {
               // Fetch data only if the query was successful
               while($row = mysqli_fetch_assoc($result)) {
                   $thread_title = $row['thread_title'];
                   $thread_desc = $row['thread_description'];
               }
           }

           if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $comment_contant = $_POST['discussion_contant'];
            $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment_contant', '$thread_id', '0', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if($result) {
                echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> Your comment has been submitted.
                            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                        </div>';
            }
            else if(!$result) {
                echo '  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Please fill correct comment.
                            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                        </div>';
            }
        }

    ?>



    <!-- jumbotron -->
    <div class="container">
        <div class="jumbotron m-3">
            <h1 class="display-4"><?php echo $thread_title?></h1>
            <p class="lead"><?php echo $thread_desc?></p>
            <hr class="my-4">
            <a class="btn btn-primary mb-5 btn-lg" href="#" role="button">Learn more</a>
            <p class="mb-0">Posted by: <b>Arbaz</b></p>
        </div>
    </div>


    <!-- POST COMMENT FORM -->
    <div class="container">
        <h1 class="mt-5">POST COMMENT</h1>
        <form action="<?php $_SERVER['REQUEST_URI']?>" method="post">
            <div class="mb-3">
                <label for="discussionComment" class="form-label">Type your comment : </label>
                <textarea rows="6" class="form-control" name="discussion_contant" id="discussionComment"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>


    <div id="ques" class="container my-3 py-4">

        <h1 class="mb-4">Discussion Section</h1>
        <?php
           $thread_id = $_GET['threadid'];

           // Corrected SQL query with backticks around table name
           $sql = "SELECT * FROM `comments` WHERE thread_id=$thread_id";
           
           $result = mysqli_query($conn, $sql);
           $noResult = true;

               // Fetch data only if the query was successful
               while($row = mysqli_fetch_assoc($result)) {
                   $comment_id = $row['comment_id'];
                   $contant = $row['comment_content'];
                   $noResult = false;

            echo '
                    <div class="media my-3">
                        <img src="./images/userdefault.png" width="40px" alt="...">
                    <div class="media-body">
                        <p>'.$contant.'</p>
                    </div>
                    </div>';

                }

            if($noResult) {
                echo '
                    <div class="jumbotron jumbotron-fluid pl-4">
                        <h1 class="display-4">NO DISCUSSIONS FOUND</h1>
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