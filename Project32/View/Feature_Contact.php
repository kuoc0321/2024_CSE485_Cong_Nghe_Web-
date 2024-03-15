<?php
require_once '../functions.php';
$departmentlimit = getDepartmentslimit4();
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .featured-department-title {
            font-size: 32px;
            font-weight: bold;
            color: #007bff; 
            margin-bottom: 20px; 
        }
    </style>
</head>
<body>
    <?php require_once '../View/layout/header_foruser.php';?>
    <div class="container">
    <h1 class="text-center featured-department-title">Featured Department</h1>
        <div class="row">
            <?php foreach ($departmentlimit as $department):?>
                <div class="col-3">
                    <div class="card">
                        <img src="<?php echo $department['Logo']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php  echo $department['DepartmentName'];  ?></h5>
                            <p class="card-text"><?php echo $department['Email']; ?></p>
                            <p class="card-text"><?php echo $department['Phone']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
    </div>
    <?php
	require_once "../View/layout/footer.php";
	?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>