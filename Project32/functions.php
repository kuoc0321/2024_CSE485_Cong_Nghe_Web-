<?php 
    require_once 'config.php';
    function connectDB() 
    {
        $conn = mysqli_connect("localhost", "root", "", "danhba");
        if (!$conn) {
            die("Connection failed: ". mysqli_connect_error());
        }
        return $conn;
    }
    // check logging
    function getUserInfo() {
        $conn = connectDB();
        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn, $sql);
        $users= [];
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $users[] = $row;
            }
        }
        return $users;
        
    }


    function getDepartmentsLimit4()
    {
        $conn = connectDB();
        $sql = "SELECT * FROM departments limit 4";
        $result = mysqli_query($conn, $sql);
        $departments = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $departments[] = $row;
            }
        }
        mysqli_close($conn);
        return $departments;
    }
    

    function checkLogIn($username, $password)
    {
        $conn = connectDB();
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
       
        if (mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
    }

    function getNumerDepartments()
    {
        $conn = connectDB();
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    
        $sql = "SELECT COUNT(DepartmentName) FROM Departments";
        $result = mysqli_query($conn, $sql);
    
        if ($result) {
            $row = mysqli_fetch_row($result);
            $num = $row[0];
            mysqli_free_result($result); // Giải phóng bộ nhớ của kết quả
        } else {
            $num = 0; 
        }
    
        mysqli_close($conn);
    
        return $num;
    }

    function getNumerUsers()
    {
        $conn = connectDB();
        if (!$conn) {
            die("Connection failed: ". mysqli_connect_error());
        }
    
        $sql = "SELECT COUNT(Username) FROM users";
        $result = mysqli_query($conn, $sql);
    
        if ($result) {
            $row = mysqli_fetch_row($result);
            $num = $row[0];
            mysqli_free_result($result); 
        } else {
            $num = 0; 
        }
    
        mysqli_close($conn);
    
        return $num;
    }

    function getNumberEmployee()
    {
        $conn = connectDB();
        if (!$conn) {
            die("Connection failed: ". mysqli_connect_error());
        }
        $sql = "SELECT COUNT(EmployeeID) FROM employees";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $row = mysqli_fetch_row($result);
            $num = $row[0];
            mysqli_free_result($result); 
        } else {
            $num = 0; 
    
            mysqli_close($conn);
        }

        return $num;
    }

    function getDataFromTable($table, $attribute, $value)
{
    $conn = connectDB();
    $sql = "SELECT * FROM $table WHERE $attribute LIKE '%$value%'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}


    
    function checkUsername($username)
    {
        $conn = connectDB();
        $sql = "SELECT Username FROM users WHERE Username = '$username'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    function insertUser($username, $password , $role)
    {
        $conn = connectDB();
        if (checkUsername($username))
        {
               $sql = "INSERT INTO users (Username,Password,Role) VALUES ('$username', '$password', '$role')";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                return false;
            }
            return true;
        
        }
    }

    function updateRole($username , $newRole)   
    {
        if($newRole != 'regular' && $newRole != 'admin')
        {
            return false;
        }
        $conn = connectDB();
        $sql = "UPDATE users SET Role = '$newRole' WHERE Username = '$username'";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            return false;
        }
        return true;
    }
    
    function getNthUser($n)
    {
        $conn = connectDB();
        $n = (int) $n; // Chắc chắn rằng $n là một số nguyên
        $sql = "SELECT * FROM users LIMIT 1 OFFSET " . ($n - 1);
    
        $result = mysqli_query($conn, $sql);
    
        $user = [];
        if ($result !== false && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $user[] = $row;
            }
        }
    
        mysqli_free_result($result);
        mysqli_close($conn);
    
        return $user;
    }

    function getAllByUser($username)
    {
        $conn = connectDB();
        $sql = "SELECT * FROM users where username = '$username'";
        $result = mysqli_query($conn, $sql);
        $users= [];
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $users[] = $row;
            }
        }
        return $users;
    }

    function deleteUser($username)
    {
        $conn = connectDB();
        $sql = "DELETE FROM users WHERE Username = '$username'";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            return false;
        }
        return true;
    }


    function updatePassword($username, $newPassword1 , $newPassword2)
    {
        if($newPassword1 != $newPassword2)
        {
            return false;
        }
        $conn = connectDB();
        $sql = "UPDATE users SET Password = '$newPassword1' WHERE Username = '$username'";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            return false;
        }
        return true;
    }
    

    function getDepartmentInfo() {
        $conn = connectDB();
        $sql = "SELECT * FROM departments";
        $result = mysqli_query($conn, $sql);
        $department = [];
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $department[] = $row;
            }
        }
        return $department;
        
    }
    function getEmployeeInfo()
{
    $conn = connectDB();
    $sql = "SELECT * FROM employees WHERE EmployeeID";
    $result = mysqli_query($conn, $sql);
    $employee = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $employee[] = $row;
        }
    }

    return $employee;
}
 

    function checkDepartmentID($departmentID)
    {
        $conn = connectDB();

        $sql = "SELECT * FROM departments WHERE DepartmentID = '$departmentID'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $rowCount = mysqli_num_rows($result);

            if ($rowCount > 0) {
                return true;
            } else {
                return false;
            }
        }

        return false;
    }

    function insertDepartment($departmentID, $departmentName, $address, $email, $phone, $logo, $website, $parentDepartmentID)
        {
            $conn = connectDB();

            // Kiểm tra xem DepartmentID đã tồn tại chưa
            if (!checkDepartmentID($departmentID)) {
                $sql = "INSERT INTO departments (DepartmentID, DepartmentName, Address, Email, Phone, Logo, Website, ParentDepartmentID) VALUES ('$departmentID', '$departmentName', '$address', '$email', '$phone', '$logo', '$website', '$parentDepartmentID')";
                $result = mysqli_query($conn, $sql);

                if (!$result) {
                    return false;
                }

                return true;
            }

            return false; 
        }

        function updateDepartment($departmentID, $newDepartmentName, $newAddress, $newEmail, $newPhone, $newLogo, $newWebsite, $newParentDepartmentID) {
            $conn = connectDB();
            $sql = "UPDATE departments 
                    SET 
                        DepartmentName = '$newDepartmentName',
                        Address = '$newAddress',
                        Email = '$newEmail',
                        Phone = '$newPhone',
                        Logo = '$newLogo',
                        Website = '$newWebsite',
                        ParentDepartmentID = '$newParentDepartmentID'
                    WHERE DepartmentID = '$departmentID'";
        
            $result = mysqli_query($conn, $sql);
        
            if (!$result) {
                echo "Error: " . mysqli_error($conn);
            }
            return true;
        }
    
        function getNthDepartment($n) {
            $conn = connectDB();
            $sql = "SELECT * FROM departments where DepartmentID = '$n'";
            $result = mysqli_query($conn, $sql);
            $department = [];
            if ($result !== false && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $department[] = $row;
                }
            }
        
            mysqli_free_result($result);
            mysqli_close($conn);
        
            return $department;
        }

        function delDepartments($num)
        {
        $conn = connectDB();
        $sql = "DELETE FROM departments WHERE DepartmentID = '$num'";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo "Error: " . mysqli_error($conn);
            return false;
        }
        return true;
        }

        function getNthEmployee($n) {
            $conn = connectDB();
            $sql = "SELECT * FROM employees where EmployeeID = '$n'";
        
            $result = mysqli_query($conn, $sql);
        
            $employee = [];
            if ($result !== false && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $employee[] = $row;
                }
            }
        
            mysqli_free_result($result);
            mysqli_close($conn);
        
            return $employee;
        }

        function checkEmployeeID($EmployeeID)
        {
            $conn = connectDB();
    
            $sql = "SELECT * FROM employees WHERE EmployeeID = '$EmployeeID'";
            $result = mysqli_query($conn, $sql);
    
            if ($result) {
                $rowCount = mysqli_num_rows($result);
    
                if ($rowCount > 0) {
                    return true;
                } else {
                    return false;
                }
            }
    
            return false;
        }
    
        function insertEmployee($employeeID,$FullName,$address, $email, $mobilephone, $position)
            {
                $conn = connectDB();
    
                if (!checkEmployeeID($employeeID)) {
                    $sql = "INSERT INTO employees (EmployeeID, FullName, Address, Email, MobilePhone, Position) VALUES ('$employeeID', '$FullName', '$address', '$email', '$mobilephone', '$position')";
                    $result = mysqli_query($conn, $sql);
                    if (!$result) {
                        return false;
                    }
    
                    return true;
                }
    
                return false; 
            }
        
        
    function deleteEmployee($id)
            {
                $conn = connectDB();
                $sql = "DELETE FROM employees WHERE EmployeeID = '$id'";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    echo "Error: " . mysqli_error($conn);
                    return false;
                }
                return true;
            }
            
            function updateEmployee($employeeID, $fullName, $address, $email, $mobilePhone, $position)
{
    $conn = connectDB();

    $sql = "UPDATE employees 
            SET FullName = '$fullName', Address = '$address', Email = '$email', 
                MobilePhone = '$mobilePhone', Position = '$position'
            WHERE EmployeeID = '$employeeID'";

    $result = mysqli_query($conn, $sql);

    return $result;
}
            
    
?>