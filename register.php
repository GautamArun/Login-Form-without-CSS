<?php

    include 'connect.php';

    if(isset($_POST['signUp'])){
        $firstName = $_POST['fName'];
        $lastName = $_POST['lName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password=md5($password);

        $checkEmail = "SELECT * FROM users WHERE email='$email'";
        $results = $conn->query($checkEmail);
        if($results->num_rows > 0){
            echo"Email Adress already exits!";
        }
        else{
            $inseryQuery = "INSERT INTO users(firstName, lastName, email, password)
                            VALUES ('$firstName', '$firstName', '$email', '$password')";
                            if($conn->query($insertQuery)==TRUE){
                                header("location: index.php");
                            }
                            else{
                                echo "Error:".$conn->error;
                            }
        }


    }

    if(isset($_POST['signIn'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password=md5($password);

        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){ //Checks if any rows match the query. 
            session_start();
            $row = $result->fetch_assoc();
            $_SESSION['email'] = $row['email'];
            header("Location: homepage.php");
            exit();
        }
        else{
            echo "Not found, Incorrect email or password.";
        }
    }
?>