<?php 

    session_start();
    include_once 'include/include_db_oo.php';

    if(isset($_SESSION['users_id'])){
        $user_id = $_SESSION['users_id'];

        $sql = "SELECT * FROM users WHERE users_id = '$user_id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

    }else
    {
        $user_id = 0;
    }


?>

<nav class="main-nav">
    <!-- ***** Logo Start ***** -->
    <a href="index.html" class="logo">
        <img src="assets/images/logo.png" alt="" style="max-width: 112px;">
    </a>
    <!-- ***** Logo End ***** -->
    <!-- ***** Menu Start ***** -->
    <ul class="nav">
        <?php if(!$user_id) { ?>
            <li class="scroll-to-section"><a href="page/login.php">Login</a></li>
            <li class="scroll-to-section"><a href="page/register.php">Register</a></li>

        <?php }else { ?>
            <li><a href="#"><?php echo $row["users_name"] ?></a></li>
            <li><a href="page/home.php">home</a></li>
            <li><a href="page/logout.php">logout</a></li>
        <?php } ?>
        <a class='menu-trigger'>
            <span>Menu</span>
        </a>
    </ul>
</nav>