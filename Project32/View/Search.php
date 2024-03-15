<?php
require_once '../functions.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $table = isset($_POST['searchType']) ? $_POST['searchType'] : '';
    $attb = '';
    if ($table == 'departments') {
        $attb = isset($_POST['departmentAttribute']) ? $_POST['departmentAttribute'] : '';
    } elseif ($table == 'employees') {
        $attb = isset($_POST['employeeAttribute']) ? $_POST['employeeAttribute'] : '';
    }
    $value = isset($_POST['value']) ? $_POST['value'] : '';
    $res = getDataFromTable($table, $attb, $value);
    print_r($res);
    if (empty($res)) {
        echo "<script>alert('No Data Found');</script>";
        header('Location: ../View/Search.php');
        exit();
    } else {
        session_start();
        $_SESSION['res'] = $res;
        header('Location: ../View/SearchResult.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        
    </style>
</head>
<body>
    <?php require_once '../View/layout/header_foruser.php';?>
    <div class="container mt-5">
        <form  action="Search.php" method="POST" >
            <div class="mb-3">
                <label for="searchType" class="form-label">Search Type:</label>
                <select class="form-select" id="searchType" name="searchType">
                    <option value="departments">departments</option>
                    <option value="employees">employees</option>
                </select>
            </div>

            <div id="departmentDropdown" class="mb-3">
                <label for="departmentAttribute" class="form-label">Select Department Attribute:</label>
                <select class="form-select" id="departmentAttribute" name="departmentAttribute">
                    <option value="DepartmentName">DepartmentName</option>
                    <option value="Address">Address</option>
                    <option value="Email">Email</option>
                    <option value="Phone">Phone</option>
                </select>
            </div>

            <div id="employeeDropdown" class="mb-3" style="display: none;">
                <label for="employeeAttribute" class="form-label">Select Employee Attribute:</label>
                <select class="form-select" id="employeeAttribute" name="employeeAttribute">
                    <option value="FullName">FullName</option>
                    <option value="Address">Address</option>
                    <option value="Email">Email</option>
                    <option value="MobilePhone">MobilePhone</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="value" class="form-label">Your Information:</label>
                <input type="text" class="form-control" id="value" name="value">
            </div>

            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

    <!-- Liên kết Bootstrap JS và Popper.js (đối với Dropdown) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyL/YxHTF3eAgCCdIWOmeaACBFXCW+XTvm" crossorigin="anonymous"></script>

    <script>
    document.getElementById('searchType').addEventListener('change', function () {
        var departmentDropdown = document.getElementById('departmentDropdown');
        var employeeDropdown = document.getElementById('employeeDropdown');

        if (this.value === 'departments') {
            departmentDropdown.style.display = 'block';
            employeeDropdown.style.display = 'none';
        } else if (this.value === 'employees') {
            departmentDropdown.style.display = 'none';
            employeeDropdown.style.display = 'block';
        }
    });
</script>

    <?php
	    require_once "../View/layout/footer.php";
	?>
</body>
</html>
</body>
</html>