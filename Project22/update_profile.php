<?php
    if($_SERVER['REQUEST_METHOD'] === "POST")
    {
        $errors = [];
        $user['name'] = filter_input(INPUT_POST , "name" , FILTER_SANITIZE_STRING);
        $allowedExtentions = ['jpg', 'png', 'jepg'];
        $maxSize = 1048576;

        $targetDir = 'uploads/';
        if(!empty($_FILES['avatar']['tmp_name']))
        {
            $fileinfo = pathinfo($_FILES['avatar']['name']);
            if(!in_array($fileinfo['extension'], $allowedExtentions))
            {
                $errors[] = 'Only JPG, PNG , JEPG files are allowed';
            }
            else if ($_FILES['avatar']['size'] > $maxSize)
            {
                $errors[] = 'File must be less than 1MB';
            }

            else{
                $fileName = uniqid(). '.'. $fileinfo['extension'];
                $targetFile =  $targetDir .$fileName;
                if (move_uploaded_file($_FILES['avatar']['tmp_name'], $targetFile))
                {
                    $user['avatar']  = $targetFile;
                }
                else{
                    $errors[] = 'Failed to up loadfile';
                }
            }
        }
    }

    if(empty($errors))
    {
        echo "Profile updated successfully";
    }
    else{
        echo "Errors:";
        foreach($errors as $error)
        {
            echo "<br> - $error";
        }
    }
?>