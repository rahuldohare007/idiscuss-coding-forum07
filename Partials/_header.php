<?php
session_start();

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="https://idiscuss-coding-forum07.000webhostapp.com/">iDiscuss</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href="https://idiscuss-coding-forum07.000webhostapp.com/">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Top Categories
        </a>
        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">';

          $sql = "SELECT category_name, category_id FROM `categories` LIMIT 5";
          $result = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_assoc($result)){

            echo '<li><a class="dropdown-item" href="threadlist.php?catid=' . $row['category_id']. '">' . $row['category_name']. '</a></li>';

          }
        echo '</ul>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="https://idiscuss-coding-forum07.000webhostapp.com/contact.php">Contact</a>
      </li>
    </ul>

    <div class="row mx-2"></div>';
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
      echo '<form class="d-flex" role="search" method="get" action="search.php">
      <input class="form-control" type="search" name="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-success mx-2" type="submit">Search</button>
      <p class="text-light text-center lh-1 mx-3 my-0">Welcome '. $_SESSION['user_email']. ' </p>
      <a href="https://idiscuss-coding-forum07.000webhostapp.com/Partials/_logout.php" class="btn btn-outline-success ml-2">Logout</a>
      </form>';
    }
    else{
      echo '<form class="d-flex" role="search">
      <input class="form-control" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-success mx-2" type="submit">Search</button>
      </form>
      <button class="btn btn-outline-success ml-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
      <button class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>
      </div>';
    }      
  echo '</div>
</div>
</nav>';

include 'Partials/_loginModal.php';
include 'Partials/_signupModal.php';

if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Success!</strong> You can now login  
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
?>