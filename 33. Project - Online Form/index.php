<?php include './partials/_dbconnect.php'?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to iDiscuss - Coding Forums</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php include './partials/_header.php'?>
    <!--Header-->


    <!-- slider start here -->
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://source.unsplash.com/1600x400/?coding,python" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/1600x400/?coding,java" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/1600x400/?coding,computers" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>





    <!-- card container -->
    <div class="container my-3">
        <h2 class="text-center">iDiscuss - Categories</h2>
        <div class="row">

        <?php 
          $sql = "SELECT * FROM categories";
          $result = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_assoc($result)) {

            $cat_id = $row['category_id'];
            $cat_name = $row['category_name'];          //holding all categories_name into variable
            $cat_desc = $row['category_description'];   //holding all categories_description into variable
            $threadAddress = "http://localhost/arbaz/learn_php/33.%20Project%20-%20Online%20Form/threadlist.php";  //thread page address
            // card 
            echo '<div class="col-md-4">
                <div class="card" style="width: 18rem;">
                  <img src="https://source.unsplash.com/500x400/?code,'. $cat_name .'" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title"><a href="threadlist.php?catid='. $cat_id .'">'. $cat_name .'</a></h5>
                    <p class="card-text">'. substr($cat_desc, 0, 58) . '...</p>
                    <a href="threads.php?catid='. $cat_id .'" class="btn btn-primary">View Thread</a>
                  </div>
                </div>   
              </div>';
          } 
        ?>
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