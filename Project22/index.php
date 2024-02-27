<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input{
            height: 30px;
            width: 400px;
            
        }
        form{
            margin-left: 500px;
            background-color: bisque;
            width: 410px;
        }
        .avatar{
            border-radius: 50%;
            width : 100px;
            height: 100px;
            margin-bottom: 50px;
            margin-left: 100px;
        }

        .choose-file-button {
            display: inline-block;
            padding: 10px 15px;
            color: white;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            margin-left : 90px;
        }
        
    </style>
</head>
<body>
    <?php     
        $user = [
            "id" => 1,
            "name" => "John Doe",
            "email" => "johndoe@example.com",
            "avatar" => "uploads/avatar.png" // Initial avatar URL
        ];
    ?>

    <h1>Account Settings</h1>
    <p style="color: red">Profile</p>
    <br>
    <p>Password</p>
    <br>
    <p>Intergrations</p>
    <br>
    <p>Billing</p>
    <form action="admin/update_profile.php" method="post" enctype="multipart/form-data">
        
        <img src="<?php echo $user['avatar'] ?>" alt="Avatar" class="avatar">
        <br>
        <input type="file" name="avatar" id="avatar" class="choose-file-button" onchange="displaySelectedFileName(this)" value="Change My Avatar">
        <br>
        <br>
        <br>
        <label for="name">Full Name</label>
        <br>
        <input type="text" name="name" value="<?php echo $user['name'];?>" required>
        <br>
        <br>
        <label for="email">Email</label>
        <br>
        <input type="text" name="email" value="<?php echo $user['email'];?>" disabled>
        <br>
        <br>
        <label for="phone">Phone Number</label>
        <br>
        <input type="text" name="phone">
        <br>
        <br>
        <label for="">Company name</label>
        <br>
        <input type="text" name="Company Name">
        

        

    </form>
</body>
</html>