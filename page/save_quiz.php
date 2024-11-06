<?php

    session_start();
    include_once '../include/include_db_oo.php';

    if(isset($_SESSION['users_id'])){
        $user_id = $_SESSION['users_id'];

        $sql = "SELECT * FROM users WHERE users_id = '$user_id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

    }else
    {
        $user_id = 0;
    }


    //เก็บค่า quiz จาก name question1 - 10
    $quiz = array();
    for($i=1; $i<=10; $i++){
        $quiz[$i] = $_POST["question".$i];
    }

    $sql = "INSERT INTO questions (q_users_id, q_1, q_2, q_3, q_4, q_5, q_6, q_7, q_8, q_9, q_10) 
            VALUES ('$user_id', '$quiz[1]', '$quiz[2]', '$quiz[3]', '$quiz[4]', '$quiz[5]', '$quiz[6]', '$quiz[7]', '$quiz[8]', '$quiz[9]', '$quiz[10]')";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo "Save quiz success";
        //รีเฟรชหน้าเว็บ 3 วิ
        header("refresh:3; url=../page/home.php");
    }else{
        echo "Save quiz fail";
    }
    



?>