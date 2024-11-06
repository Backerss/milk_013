<?php
    session_start();
    include('../include/include_db_oo.php');

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE users_mail = '$email'";
    $result = $conn->query($sql);

    if($result->num_rows == 0){

        $text_error = $email;
        $response = [
            'success' => false,
            'message' => 'Email not found'
        ];

        echo json_encode($response);
        exit;
    }

    $user = $result->fetch_assoc();

    if(!password_verify($password, $user['users_password'])){
        $response = [
            'success' => false,
            'message' => 'Incorrect password'
        ];

        echo json_encode($response);
        exit;
    }

    $_SESSION['users_id'] = $user['users_id'];

    $response = [
        'success' => true,
        'message' => 'Login successful'
    ];

    echo json_encode($response);

?>