<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to iDiscuss - Coding Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
        #maincontainer {
            min-height: 674px;
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

    

    <!-- Search Results -->
    <div class="container my-3" id="maincontainer">
        <h1 class="p-y-2">Search results for <em>"<?php echo $_GET['search']?>"</em></h1>
        <?php
            $query = $_GET["search"];
            $sql = "SELECT * FROM `threads` WHERE MATCH(thread_title, thread_desc) against ('$query')";
            $result = mysqli_query($conn, $sql);
            $noResult = true;
            while($row = mysqli_fetch_assoc($result)){
                $title = $row['thread_title'];
                $desc = $row['thread_desc'];
                $thread_id = $row['thread_id'];   
                $url = "thread.php?threadid=". $thread_id;
                $noResult = false;

                //Display the search results
                echo '<div class="result">
                <h3><a href="'. $url. '" class="text-dark hover">'. $title. '</a></h3>
                <p>' . $desc . '</p>
                </div>';
            } 
            if($noResult){
                echo '<div class="jumbotron jumbotron-fluid bg-secondary bg-opacity-10 p-3">
                <div class="container">
                    <p class="display-4">No Results Found</p>
                    <p class="lead">Suggestions: <ul>
                        <li>Make sure that all words are spelled correctly.</li>
                        <li>Try different keywords.</li>
                        <li>Try more general keywords.</li></ul>
                    </p>
                </div>
            </div>';
            }    
        ?>
        
    </div>

    <?php include 'Partials/_footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>