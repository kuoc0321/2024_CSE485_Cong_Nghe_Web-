<?php 
require_once("../functions.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {   
    $employeeID = $_POST['EmployeeID'];
    $fullName = $_POST['FullName'];
    $address = $_POST['Address'];
    $email = $_POST['Email'];
    $mobilePhone = $_POST['MobilePhone'];
    $position = $_POST['Position'];

    if ($employeeID == '' || $fullName == '' || $address == '' || $email == '' || $mobilePhone == '' || $position == '') {
        echo "<script>alert('Please fill in all fields')</script>";
    } else {
        if (updateEmployee($employeeID, $fullName, $address, $email, $mobilePhone, $position)) {
            echo "<script>alert('Update Successfully.')</script>";
        } else {
            echo "<script>alert('Update Failed.')</script>";
        }
    }
}

// Lấy thông tin nhân viên để hiển thị trong form
if (isset($_GET['id'])) {
    $employeeID = $_GET['id'];
    $employeeInfo = getEmployeeInfo($employeeID);
    if (!$employeeInfo) {
        // Xử lý khi không tìm thấy thông tin nhân viên
        echo "<script>alert('Employee not found.')</script>";
        // Có thể thêm mã chuyển hướng hoặc xử lý khác ở đây
    }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h3 class="text-center" style="font-family: 'YourDesiredFont', sans-serif; font-weight: bold; text-decoration: underline;">Update Employee</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="employee_update.php">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">EmployeeID</span>
                                <input type="text" class="form-control" placeholder="" aria-label="Employee ID" aria-describedby="addon-wrapping" name="EmployeeID" value="<?= $employeeInfo['EmployeeID'] ?>" readonly>
                            </div>

                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">FullName</span>
                                <input type="text" class="form-control" placeholder="" aria-label="Full Name" aria-describedby="addon-wrapping" name="FullName" value="<?= $employeeInfo['FullName'] ?>">
                            </div>

                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">Address</span>
                                <input type="text" class="form-control" placeholder="" aria-label="Address" aria-describedby="addon-wrapping" name="Address" value="<?= $employeeInfo['Address'] ?>">
                            </div>

                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">Email</span>
                                <input type="text" class="form-control" placeholder="" aria-label="Email" aria-describedby="addon-wrapping" name="Email" value="<?= $employeeInfo['Email'] ?>">
                            </div>

                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">Phone</span>
                                <input type="text" class="form-control" placeholder="" aria-label="MobilePhone" aria-describedby="addon-wrapping" name="MobilePhone" value="<?= $employeeInfo['MobilePhone'] ?>">
                            </div>

                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">Position</span>
                                <input type="text" class="form-control" placeholder="" aria-label="Position" aria-describedby="addon-wrapping" name="Position" value="<?= $employeeInfo['Position'] ?>">
                            </div>

                            <button type="submit" class="btn btn-primary mb-3">Update Employee</button>
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
