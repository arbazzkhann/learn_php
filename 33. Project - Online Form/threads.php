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

    ?>



    <!-- jumbotron -->
    <div class="container">
        <div class="jumbotron m-3">
            <h1 class="display-4"><?php echo $cat_name?></h1>
            <p class="lead"><?php echo $cat_desc?></p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>


    <!-- Q & A Section -->
    <div class="container my-3 py-4">
        <h1>Browse Questions</h1>
        <div class="d-flex py-2">
            <div class="flex-shrink-0">
                <img src="./images/userdefault.png" width="40px" alt="...">
            </div>
            <div class="flex-grow-1 ms-3">
                <h5>Question Title</h5>
                This is some content from a media component. You can replace this with any content and adjust it as
                needed.</p>
            </div>
        </div>
    </div>





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