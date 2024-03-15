<?php
require_once '../functions.php';

if (isset($_GET['number'])) {
    
    $num = $_GET['number'];

    $departmentNth = getNthDepartment($num);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        $newDepartmentName = isset($_POST['NewDepartmentName']) ? $_POST['NewDepartmentName'] : '';
        $newAddress = isset($_POST['NewAddress']) ? $_POST['NewAddress'] : '';
        $newEmail = isset($_POST['NewEmail']) ? $_POST['NewEmail'] : '';
        $newPhone = isset($_POST['NewPhone']) ? $_POST['NewPhone'] : '';
        $newLogo = isset($_POST['NewLogo']) ? $_POST['NewLogo'] : '';
        $newWebsite = isset($_POST['NewWebsite']) ? $_POST['NewWebsite'] : '';
        $newParentDepartmentID = isset($_POST['NewParentDepartmentID']) ? $_POST['NewParentDepartmentID'] : '';

        if (updateDepartment($num,$newDepartmentName, $newAddress, $newEmail, $newPhone, $newLogo, $newWebsite, $newParentDepartmentID)) {
            echo "<script>alert('Update Successfully.')</script>";
        } else {
            echo "<script>alert('Update Failed.')</script>";
        }
    }
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
    <h3 class="text-center" style="font-family: 'YourDesiredFont', sans-serif; font-weight: bold; text-decoration: underline;">Department Update</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="department_update.php">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">ID</span>
                                <input type="text" class="form-control" placeholder="" aria-label="DepartmentID" aria-describedby="addon-wrapping" name="DepartmentID" value=<?= $departmentNth['DepartmentID'] ?> readonly>                            
                            </div>

                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">Department Name</span>
                                <input type="text" class="form-control" placeholder="" aria-label="DepartmentName" aria-describedby="addon-wrapping" name="NewDepartmentName">
                            </div>

                

                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">New Address</span>
                                <input type="text" class="form-control" placeholder="NewAddress" aria-label="NewAddress" aria-describedby="addon-wrapping" name="NewAddress">
                            </div>

                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">New Email</span>
                                <input type="text" class="form-control" placeholder="NewEmail" aria-label="NewEmail" aria-describedby="addon-wrapping" name="NewEmail">
                            </div>

                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">New Phone</span>
                                <input type="text" class="form-control" placeholder="NewPhone" aria-label="NewPhone" aria-describedby="addon-wrapping" name="NewPhone">
                            </div>

                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">New Logo</span>
                                <input type="text" class="form-control" placeholder="NewLogo" aria-label="NewLogo" aria-describedby="addon-wrapping" name="NewLogo">
                            </div>

                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">New Website</span>
                                <input type="text" class="form-control" placeholder="NewWebsite" aria-label="NewWebsite" aria-describedby="addon-wrapping" name="NewWebsite">
                            </div>

                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">New Parent Department ID</span>
                                <input type="text" class="form-control" placeholder="NewParentDepartmentID" aria-label="NewParentDepartmentID" aria-describedby="addon-wrapping" name="NewParentDepartmentID">
                            </div>
                            
                            <br>
                            <button type="submit" class="btn btn-primary mb-3">Update Department</button>
                            <a class="btn btn-primary mb-3" href="../View/department.php" type="button">Return</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyL/YxHTF3eAgCCdIWOmeaACBFXCW+XTvm" crossorigin="anonymous"></script>
</body>
</html>
