<?php 
    require_once("../functions.php");
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $username = $_POST['Username'];
        $password1 = $_POST['Password1'];
        $password2 = $_POST['Password2'];
        $role = $_POST['Role'];

        if($username == '' || $password1 == ''|| $password2== ''|| $role== '')
        {
            echo "<script>alert('Please fill in all fields');</script>";

            exit();
        }
        
        if(!checkUsername($username))
        {
            echo "<script>alert('Username already exists');</script>";
            exit();
        }

        if ($password1!= $password2)
        {
            header("Location: ../View/user_add.php?id=404");
            exit();
        }

        if($role!= 'admin' && $role != 'regular')
        {
            header("Location: ../View/user_add.php?id=406");
            exit();
        }

        else
        {
            
            if(insertUser($username, $password1, $role))
            {
                header("Location:../View/user_add.php?id=200");
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
    <title>Add user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h3 class="text-center" style="font-family: 'YourDesiredFont', sans-serif; font-weight: bold; text-decoration: underline;">Add User</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">Username</span>
                                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping" name="Username">
                            </div>

                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">Enter your password</span>
                                <input type="password" class="form-control" placeholder="Password1" aria-label="Password1" aria-describedby="addon-wrapping"  name="Password1">
                            </div>

                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">Enter your password again</span>
                                <input type="passwro" class="form-control" placeholder="Password2" aria-label="Password2" aria-describedby="addon-wrapping" name="Password2">
                            </div>

                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">Role</span>
                                <input type="text" class="form-control" placeholder="Role" aria-label="Role" aria-describedby="addon-wrapping" name="Role">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary mb-3">Add User</button>
                            <a class="btn btn-primary mb-3" href="../View/user.php" type="button">Return</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php 
        if(isset($_GET['id']) && $_GET['id'] == 404)
        {
            echo "<script>alert('Invalid Password')</script>";
        }

        if(isset($_GET['id']) && $_GET['id'] == 405)
        {
            echo "<script>alert('Username existed.')</script>";

        }

        if(isset($_GET['id']) && $_GET['id'] == 406)
        {
            echo "<script>alert('Invalid Role.')</script>";

        }
        if(isset($_GET['id']) && $_GET['id'] == 200)
        {
            echo "<script>alert('User added successfully.')</script>";
        }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyL/YxHTF3eAgCCdIWOmeaACBFXCW+XTvm" crossorigin="anonymous"></script>
</body>
</html>
