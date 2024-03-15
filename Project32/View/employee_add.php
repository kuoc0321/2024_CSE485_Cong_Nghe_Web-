<?php 
    require_once("../functions.php");
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {   
        $employeeID = $_POST['EmployeeID'];
        $fullName = $_POST['FullName'];
        $address = $_POST['Address'];
        $email = $_POST['Email'];
        $mobilePhone = $_POST['MobilePhone'];
        $position = $_POST['Position'];
        print_r($employeeID);
     
        if ($employeeID == '' || $fullName == '' || $address == '' || $email == '' || $mobilePhone == '' || $position == '') {
            echo "<script>alert('Please fill in all fields')</script>";
        } else {
            if(insertEmployee($employeeID, $fullName, $address, $email, $mobilePhone, $position))
            {
                header("Location: ../View/employee.php?id=200");
                exit();
            }

        }
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add employees</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h3 class="text-center" style="font-family: 'YourDesiredFont', sans-serif; font-weight: bold; text-decoration: underline;">Add Employee</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="employee_add.php">
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">EmployeeID</span>
                                        <input type="text" class="form-control" placeholder="" aria-label="Department ID" aria-describedby="addon-wrapping" name="EmployeeID">
                                    </div>

                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">FullName</span>
                                        <input type="text" class="form-control" placeholder="" aria-label="Department Name" aria-describedby="addon-wrapping" name="FullName">
                                    </div>

                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">Address</span>
                                        <input type="text" class="form-control" placeholder="" aria-label="Address" aria-describedby="addon-wrapping" name="Address">
                                    </div>

                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">Email</span>
                                        <input type="text" class="form-control" placeholder="" aria-label="Email" aria-describedby="addon-wrapping" name="Email">
                                    </div>

                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">Phone</span>
                                        <input type="text" class="form-control" placeholder="" aria-label="MobilePhone" aria-describedby="addon-wrapping" name="MobilePhone">
                                    </div>

                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">Position</span>
                                        <input type="text" class="form-control" placeholder="" aria-label="Logo" aria-describedby="addon-wrapping" name="Position">
                                    </div>

                                                        

                                    <button type="submit" class="btn btn-primary mb-3">Add Employee</button>
                                    <a class="btn btn-primary mb-3" href="../View/Employee.php" type="button">Return</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyL/YxHTF3eAgCCdIWOmeaACBFXCW+XTvm" crossorigin="anonymous"></script>
</body>
</html>
