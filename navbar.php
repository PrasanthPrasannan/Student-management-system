
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<div class="container-fluid rem-pad navs">
<div class="container rem-pad">
 
<nav class="navbar navbar-expand-lg navbar-light bg-info">
 
 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#demo-navbar" aria-controls="demo-navbar" aria-expanded="false" aria-label="Toggle navigation">
 
    <span class="navbar-toggler-icon"></span>
 
  </button>
 
 
 
  <div class="collapse navbar-collapse" id="demo-navbar">
 
    <ul class="navbar-nav mr-auto">

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="student_add.php" id="navbardrop" data-toggle="dropdown">
    ADD STUDENTS
      </a>
      <div class="dropdown-menu">
        
        <a class="dropdown-item" href="student_search.php">Search Students</a>
        <a class="dropdown-item" href="student_edit.php">Edit/Delete Student</a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        BOOKS
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="book_add.php">Add Books</a>
        <a class="dropdown-item" href="book_search.php">Search Books</a>
        <a class="dropdown-item" href="book_edit.php">Edit/Delete Books</a>
      </div>
    </li>

     <li class="nav-item">
 
      <a class="nav-link text-light" href="book_issue.php">ISSUE BOOKS</a>

     </li>

     <li class="nav-item">
 
      <a class="nav-link text-light" href="bookreturn.php">BOOKS RETURN</a>

     </li>

     <li class="nav-item">
 
      <a class="nav-link text-light" href="viewalltransaction.php">VIEW ALL TRASACTION</a>

     </li>


    
    </ul>
 
    <a class="nav-link text-light" href="login-admin.php">LOGOUT</a>
  </div>
 
</nav>
 </div>
</div>