<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to iDiscuss - Coding Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
        #ques {
            min-height: 400px;
        }

        a.hover {
            text-decoration: none;
            color: blue;
        }

        a.hover:hover {
            text-decoration: underline;
        }
    </style>

</head>

<body>
    <?php include 'Partials/_dbconnect.php'; ?>
    <?php include 'Partials/_header.php'; ?>

    <!-- Slider Start Here -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                aria-label="Slide 5"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="Images/c3.jpg" class="d-block w-100" height="650px" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <img src="Images/c2.jpg" class="d-block w-100" height="650px" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2500">
                <img src="Images/c1.jpg" class="d-block w-100" height="650px" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="1250">
                <img src="Images/c4.jpg" class="d-block w-100" height="650px" alt="...">
            </div>
            <div class="carousel-item">
                <img src="Images/c5.jpg" class="d-block w-100" height="650px" alt="...">
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

    <!-- Categories Container Start Here -->
    <div class="container my-3" id="ques">
        <h2 class="text-center my-3">iDiscuss - Browse Categories</h2>
        <div class="row">

            <!-- Fetch all the categories and use a loop to iterate through categories -->

            <?php 
        $sql = "SELECT * FROM `categories`"; 
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            // echo $row['category_id'];
            // echo $row['category_name'];

            $id = $row['category_id'];
            $cat = $row['category_name'];
            $desc = $row['category_description'];
            echo '<div class="col-md-3 my-2">
                    <div class="card" style="width: 18rem;">
                        <img src="Images/card' .$id. '.avif" class="card-img-top" height="250px" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><a class="hover" href="threadlist.php?catid=' . $id . '">' . $cat . '</a></h5>
                            <p class="card-text">' . substr($desc, 0, 90).'...</p>
                            <a href="threadlist.php?catid=' . $id . '" class="btn btn-success ">View Threads</a>
                        </div>
                    </div>
                </div>';
        }     
        ?>

        </div>
    </div>

    <?php include 'Partials/_footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>