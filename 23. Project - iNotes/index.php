<!-- php connection -->
<?php 

$conn = mysqli_connect("localhost", "root", "", "phpnotes");

if(!$conn) {
    die("Connection Error!" . mysqli_connect_error());
}


?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
  </head>
  <body>
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PHP CRUD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>


    <!-- Form -->
    <div class="container my-4">
        <h2>Add a note</h2>
        <form action="index.php" method="post">
            <div class="mb-3">
                <label class="form-label">Note title</label>
                <input name="noteTitle" type="text" class="form-control" id="noteTitleId" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control form-label" name="noteDescription" id="noteDescriptionId" cols="115" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Note</button>
        </form> 
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>



    <!-- table with php -->
    <div class="container my-4">
        
        <table class="table" id="myTable">
            <thead>
                <tr>
                <th scope="col">S. No</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- php -->
                <?php 
                    $sql = "SELECT * FROM notes";
                    $result = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_assoc($result)) {
                        echo "  <tr>
                                <th scope='row'> " . $row['sno'] ."</th>
                                <td>" . $row['title'] . " </td>
                                <td>" . $row['description'] . "</td>
                                <td> Actions </td>";
                    }

                    if($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $title = $_POST['noteTitle'];
                        $descritption = $_POST['noteDescription'];

                        $sql = "INSERT INTO `notes` (`sno`, `title`, `description`, `time`) VALUES ('', '$title', '$descritption', '')";
                        $result = mysqli_query($conn, $sql);

                        if($result == true) {
                            echo "
                                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                    <strong>Success! Your notes has been submit successfully.</strong>
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>
                                ";
                        }
                        else {
                            echo "ERROR! " . mysqli_error($result);
                        }
                    }

                ?>
            </tbody>
        </table>
    </div>





  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script>
    let table = new DataTable('#myTable');
  </script>
</html>