<?php 
    require_once("../functions.php");
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {   $departmentID = $_POST['DepartmentID'];
        $departmentName = $_POST['DepartmentName'];
        $address = $_POST['Address'];
        $email = $_POST['Email'];
        $phone = $_POST['Phone'];
        $logo = $_POST['Logo'];
        $website = $_POST['Website'];
        $parentDepartmentID = $_POST['ParentDepartmentID'];
    
        if ($departmentID == '' || $departmentName == '' || $address == '' || $email == '' || $phone == '' || $logo == '' || $website == '' || $parentDepartmentID == '') {
            echo "<script>alert('Please fill in all fields')</script>";
        } else {
            insertDepartment($departmentID, $departmentName, $address, $email, $phone, $logo, $website, $parentDepartmentID);

            header("Location: ../View/department.php?id=200");
            exit();
        }


    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h3 class="text-center" style="font-family: 'YourDesiredFont', sans-serif; font-weight: bold; text-decoration: underline;">Add Department</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="department_add.php">
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">DepartmentID</span>
                                        <input type="text" class="form-control" placeholder="Enter Department ID" aria-label="Department ID" aria-describedby="addon-wrapping" name="DepartmentID">
                                    </div>

                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">DepartmentName</span>
                                        <input type="text" class="form-control" placeholder="Enter Department Name" aria-label="Department Name" aria-describedby="addon-wrapping" name="DepartmentName">
                                    </div>

                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">Address</span>
                                        <input type="text" class="form-control" placeholder="Enter Address" aria-label="Address" aria-describedby="addon-wrapping" name="Address">
                                    </div>

                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">Email</span>
                                        <input type="text" class="form-control" placeholder="Enter Email" aria-label="Email" aria-describedby="addon-wrapping" name="Email">
                                    </div>

                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">Phone</span>
                                        <input type="text" class="form-control" placeholder="Enter Phone" aria-label="Phone" aria-describedby="addon-wrapping" name="Phone">
                                    </div>

                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">Logo</span>
                                        <input type="text" class="form-control" placeholder="Enter Logo URL" aria-label="Logo" aria-describedby="addon-wrapping" name="Logo">
                                    </div>

                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">Website</span>
                                        <input type="text" class="form-control" placeholder="Enter Website URL" aria-label="Website" aria-describedby="addon-wrapping" name="Website">
                                    </div>

                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">ParentDepartmentID</span>
                                        <input type="text" class="form-control" placeholder="Enter Parent Department ID" aria-label="Parent Department ID" aria-describedby="addon-wrapping" name="ParentDepartmentID">
                                    </div>

                                                        

                                    <br>
                                    <button type="submit" class="btn btn-primary mb-3">Add Department</button>
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
