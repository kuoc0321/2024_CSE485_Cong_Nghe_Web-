<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
         .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            color: #007bff; 
        }

        .navbar-brand:hover {
            color: #0056b3; 
        }
    </style>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="../View/home.php">Phonebook Management</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="../View/introduce.php">Introduction</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../View/Feature_Contact.php">Feature Contact</a>
                            </li>
                        
                            <li class="nav-item">
                                <a class="nav-link" href="../View/Search.php">Advanced Search</a>
                            </li>
                         
                            <li class="nav-item">
                                <a class = "nav-link active" href="../View/news_events.php">News & Events</a>
                            </li>

                        </ul>
                        <div>
                            <?php  
                                if(!isset($_SESSION['username'])){
                            ?>
                                    <a href="../View/log_in.php" class="btn btn-primary">Log In</a>
                            <?php 
                                }
                                else{
                            ?>
                                    <a class="text-decoration-none" href="">User: <?php echo $_SESSION['username'] ?></a>

                                    <a href="../View/home_guest.php" class="btn btn-danger">Log out</a>
                            <?php 
                                }
                            ?>


                        </div>
                        </div>
                    </div>
                </nav>
    <img src="../public/image/logo.png" alt="">

</header>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

