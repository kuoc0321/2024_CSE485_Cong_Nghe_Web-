<?php
    session_start();

    if(isset($_SESSION['res']))
    {
        $res = $_SESSION['res'];
        

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div class="container text-center mt-5">
        <h3 class="text-center" style="font-family: 'YourDesiredFont', sans-serif; font-weight: bold; text-decoration: underline;">Result</h3>

        <div class="row">
            <?php foreach($res as $result) { ?>
                <div class="col-3">
                    <div class="card w-100 h-100">
                        <img src="../public/image/pic.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $result['DepartmentName'] ?></h5>
                            <p class="card-text"><?php echo $result['Address']  ?></p>
                            <p class="card-text"><?php  echo $result['Phone'] ?></p>
                            <p class="card-text"><?php  echo $result['Email'] ?></p>
                            <p class="card-text"><?php  echo $result['Website'] ?></p>
                        </div>
                    </div>
                    <br>
                    <br>
                    
                    <a class="btn btn-primary mb-3" href="../View/Search.php" type="button">Return</a>

                </div>
            <?php } ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyL/YxHTF3eAgCCdIWOmeaACBFXCW+XTvm" crossorigin="anonymous"></script>
</body>
</html>
