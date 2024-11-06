<?php

    include('../include/include_db_oo.php');

    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $birthdate = $_POST['birthdate'];
    $sex = $_POST['sex'];
    $code = $_POST['code'];
    $phone = $_POST['phone'];

    $password_Hash = password_hash($password, PASSWORD_DEFAULT);


    $check_sql = "SELECT * FROM users WHERE users_mail = '$email'";
    $check_result = $conn->query($check_sql);

    if($check_result->num_rows > 0){
        $response = [
            'success' => false,
            'message' => 'Email already exists'
        ];

        echo json_encode($response);
        exit;
    }


    $sql = "INSERT INTO users (users_name, users_lastname, users_mail, users_password, users_date, users_sex, users_code, users_phone) VALUES ('$name', '$lastname', '$email', '$password_Hash', '$birthdate', '$sex', '$code', '$phone')";
    $result = $conn->query($sql);

    if(!$result){
        $response = [
            'success' => false,
            'message' => 'Error: ' . $conn->error
        ];

        echo json_encode($response);
        exit;
    }

    $response = [
        'success' => true,
        'message' => 'User registered successfully'
    ];

    echo json_encode($response);


    



?>