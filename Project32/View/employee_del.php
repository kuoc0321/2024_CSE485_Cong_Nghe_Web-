'<?php
require_once '../functions.php';

if($_GET['num'])
{
    $num = $_GET['num'];
}
if(deleteEmployee($num))
    {
        echo "<script>alert('Delete Successfully.')</script>";
        header('Location: ../View/employee_del.php');

    }
    else
    {
        echo "<script>alert('Delete Failed.')</script>";
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <br>
    <br>
    <h3 class="text-center" style="font-family: 'YourDesiredFont', sans-serif; font-weight: bold; text-decoration: underline;">Employee Delete</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="employee.php">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">EmployeeID</span>
                                <input type="text" class="form-control" placeholder="" aria-label="EmployeeID" aria-describedby="addon-wrapping" name="EmployeeID" value=<?= $num;?> readonly>
                            </div>

                            <button type="submit" class="btn btn-primary mb-3">Delete</button>
                            <a class="btn btn-primary mb-3" href="../View/Employee.php" type="button">Return</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyL/YxHTF3eAgCCdIWOmeaACBFXCW+XTvm" crossorigin="anonymous"></script>

</body>
</html>'