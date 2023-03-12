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
        color: black;
    }

    a.hover:hover {
        text-decoration: underline;
    }
    </style>

</head>

<body>

    <?php include 'Partials/_dbconnect.php'; ?>
    <?php include 'Partials/_header.php'; ?>

    <?php
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `threads` WHERE thread_id = $id";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $thread_user_id = $row['thread_user_id'];

            //Query the users table to find out the name of original poster
            $sql2 = "SELECT user_email FROM `users` WHERE sno = $thread_user_id";                         
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);  
            $posted_by = $row2['user_email'];
        }    
    ?>

    <?php
        $showAlert = false;
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == 'POST'){
            // Insert into comment db
            $comment = $_POST['comment'];
            $comment = str_replace("<", "&lt;", $comment);
            $comment = str_replace(">", "&gt;", $comment);
            $sno = $_POST['sno'];
            $sql = "INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_by`, `comment_time`)
             VALUES ( '$comment', '$id', '$sno', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            $showAlert = true;
            if($showAlert){
                echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your comment has been added!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        }
    ?>

    <!-- Categories Container Start Here -->
    <div class="container my-4 bg-secondary bg-opacity-10 p-5">
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $title; ?></h1>
            <p class="lead"> <?php echo $desc; ?> </p>
            <hr class="my-2">
            <p>This is a peer to peer forum. Keep it friendly.
                Be courteous and respectful. Appreciate that others may have an opinion different from yours.
                Stay on topic. Share your knowledge. Refrain from demeaning, discriminatory, or harassing behaviour and
                speech.
            </p>
            <p>
              Posted by: <b><?php echo $posted_by; ?></b></p>
        </div>
    </div>

    <?php 

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    echo '<div class="container">
    <h1>Post a Comment</h1>
    <form action="'. $_SERVER['REQUEST_URI'] . '" method="post">
        <div class="form-group">
            <label for="floatingTextarea2">Type your comment</label>
            <textarea class="form-control mt-2" id="comment" name="comment" rows="3"></textarea>
            <input type="hidden" name="sno" value="'. $_SESSION['sno'] . '">
        </div>
        <button type="submit" class="btn btn-success mt-2">Post Comment</button>
    </form>
    </div>';
    }

    else{
        echo '<div class="container">
        <h1>Post a Comment</h1>
        </div>
        <div class="container alert alert-warning d-flex justify-content-center p-2">
            <div class="flex-shrink-0">
                <img src="Images/warning.png" height="30px" alt="...">
            </div>
            
            <div class="d-flex ms-3">            
                <p class="lead text-center my-0">You are not logged in. Please login to be able to post comments.</p>
            </div>
        </div>';        
    }
    
    ?>

    <div class="container" id="ques">
        <h1 class="py-2">Discussions</h1>

        <?php
            $id = $_GET['threadid'];
            $sql = "SELECT * FROM `comments` WHERE thread_id = $id";
            $result = mysqli_query($conn, $sql);
            $noResult = true;
            while($row = mysqli_fetch_assoc($result)){
                $noResult = false;
                $id = $row['comment_id'];
                $content = $row['comment_content']; 
                $comment_time = $row['comment_time'];  
                $thread_user_id = $row['comment_by'];   

                $sql2 = "SELECT user_email FROM `users` WHERE sno = $thread_user_id";                         
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);                         

            echo  '<div class="d-flex my-2">
                    <div class="flex-shrink-0">
                        <img src="Images/Userdefault.png" height="50px" class="mr-3" alt="...">
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <p class="fw-bold align-content-end my-0">'. $row2['user_email'] . ' at ' . $comment_time .'</p>
                        ' . $content . '
                    </div>
                </div>';
            } 

            if($noResult){
                echo '<div class="jumbotron jumbotron-fluid bg-secondary bg-opacity-10 p-3">
                    <div class="container">
                        <p class="display-4">No Comments Found</p>
                        <p class="lead">Be the first person to comment</p>
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