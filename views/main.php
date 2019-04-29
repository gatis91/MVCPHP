<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo ROOT_URL."/assets/css/style.css" ?>">
    <title>Share Board</title>
</head>
<body>
<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
            <a class="nav-link" href="<?php echo ROOT_URL ?>">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ">
            <a class="nav-link" href="<?php echo ROOT_URL?>/shares">Posts <span class="sr-only">(current)</span></a>
            </li>


        </ul>

        <ul class="navbar-nav  mr-0 ">
            <?php if(isset($_SESSION["is_logged_in"])) : ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" 
                href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                 href="<?php echo ROOT_URL ?>/users/mypage">Welcome <?php echo $_SESSION["user_data"]["name"] ?></a>
                <div class="dropdown-menu mr-0" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo ROOT_URL ?>/users/mypage">My Posts</a>
                    <a class="dropdown-item" href="<?php echo ROOT_URL ?>/shares/add">Add New post</a>
                    <a class="dropdown-item" href="<?php echo ROOT_URL?>/categories/managecategories">Manage Categories</a>
                    <a class="dropdown-item" href="<?php echo ROOT_URL?>/categories/addcategory">Add Category</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item"href="<?php echo ROOT_URL ?>/users/logout">LogOut</a>
                </div>
            </li>

            

            <?php else :?>
             <li class="nav-item ">
            <a class="nav-link" href="<?php echo ROOT_URL ?>/users/login">Login</a>
            </li>

            <li class="nav-item">
            <a class="nav-link " href="<?php echo ROOT_URL ?>/users/register">Register</a>
            </li>
            <?php endif ;?>
        </ul>
        </div>
  </div>

  </nav>
</header>
<div  class="container ">
<?php Messages::display() ?>
<?php require $view; ?>
</div>
   




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 

</body>
</html>