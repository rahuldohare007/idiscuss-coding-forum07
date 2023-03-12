<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to iDiscuss - Coding Forum</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
      #ques{
          min-height: 400px;
      }
      .About-me {
        width: 100%;
        text-align: center;
        margin-top: 50px;
        margin-bottom: 95px;
      }
      img {
        border-radius: 50%;
      }
      .bio{
        text-align: center;
        font-size: 20px;
      }
      
      .data {
        font-size: 20px;
      } 
      .icons {
        padding: 10px;
        text-align: center;
        text-decoration: none;
        color: white;
        border-radius: 8px;
        font-size: 30px;	  
      } 
    </style>
</head>
  <body>
    <?php include 'Partials/_dbconnect.php'; ?>
    <?php include 'Partials/_header.php'; ?>

    <div class="container bg-secondary bg-opacity-10" id="ques">
      <div class="About-me">
        <h1 class="text-center"> About Me </h1>
      <img  src="Images/logo.png" style="height: 100px;">
        <h3 style="text-align: center">Hello!</h3>
      <p class="bio">A PHP forum project is a web-based application that allows users to post and discuss topics in a community setting.</p>
      <hr>
          <p class="data" style="text-align: start">I am a final year student at MITS Gwalior pursuing B.Tech in Computer Science domain with an average CGPA of 8.02.</p>
          <p class="data" style="text-align: start">Rated 5 Star @hackerrank in C++ and have solved over 100+ problems on coding platforms like @Leetcode.</p> 
          <p class="data" style="text-align: start">My skills and expertise include C++, Data Structures, Algorithms, HTML, CSS, React, JavaScript, SQL, GitHub, PHP, etc. I am a consistent learner and a problem solver.</p>
      <h3 style="text-align: center"> Follow me on </h3>
      <div class="container icons p-2" style="text-align: center">
        <a href="https://www.instagram.com/rahul.dohare17/" class="fa fa-instagram"></a> 
        <a href="https://twitter.com/rahuldohare007" class="fa fa-twitter"></a> 
        <a href="https://www.linkedin.com/in/rahul-dohare-0a5a1619a/" class="fa fa-linkedin"></a>
        <a href="https://cyborgcoding007.blogspot.com/" class="fa fa-chrome"></a>
      </div>
      </div>
    </div>

    <?php include 'Partials/_footer.php'; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
