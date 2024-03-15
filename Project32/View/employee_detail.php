<?php
require_once '../functions.php';

if (isset($_GET['num'])) {
    $num = $_GET['num'];
    $employeeNth = getNthEmployee($num);
    $employeeID = $num;  

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <br>
    <br>
    <h3 class="text-center" style="font-family: 'YourDesiredFont', sans-serif; font-weight: bold; text-decoration: underline;">Employee Detail</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="department_update.php">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">EmployeeID</span>
                                <input type="text" class="form-control" placeholder="" aria-label="DepartmentID" aria-describedby="addon-wrapping" name="DepartmentID" value=<?= $employeeNth[0]['EmployeeID'];?> readonly>
                            </div>

                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">FullName</span>
                                <input type="text" class="form-control" placeholder="" aria-label="DepartmentName" aria-describedby="addon-wrapping" name="DepartmentName" value=<?= $employeeNth[0]['FullName'] ;?> readonly>
                            </div>

                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">Address</span>
                                <input type="text" class="form-control" placeholder="" aria-label="NewAddress" aria-describedby="addon-wrapping" name="Address" value=<?= $employeeNth[0]['Address'];?> readonly>
                            </div>

                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">Email</span>
                                <input type="text" class="form-control" placeholder="" aria-label="NewEmail" aria-describedby="addon-wrapping" name="Email" value=<?= $employeeNth[0]['Email']?> readonly>
                            </div>

                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">MobilePhone</span>
                                <input type="text" class="form-control" placeholder="" aria-label="NewPhone" aria-describedby="addon-wrapping" name="Phone" value=<?= $employeeNth[0]['MobilePhone'];?> readonly>
                            </div>

                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">Position</span>
                                <input type="text" class="form-control" placeholder="" aria-label="NewLogo" aria-describedby="addon-wrapping" name="Logo" value=<?= $employeeNth[0]['Position']; ?> readonly>
                            </div>

                            <div class="card" style="width: 18rem;">
                                <img src="<?= $employeeNth[0]['Avatar'] ?>" class="card-img-top" alt="...">
                            </div>
                            <br>
                            <a class="btn btn-primary mb-3" href="../View/employee.php" type="button">Return</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyL/YxHTF3eAgCCdIWOmeaACBFXCW+XTvm" crossorigin="anonymous"></script>
</body>
</html>
