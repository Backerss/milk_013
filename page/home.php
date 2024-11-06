<?php 

    session_start();

    if(!isset($_SESSION['users_id'])){
        header('Location: login.php');
        exit;
    }


    // ส่วนของการดึงข้อมูลจากฐานข้อมูล
    include('../include/include_db_oo.php');

    $sql = "SELECT * FROM users WHERE users_id = " . $_SESSION['users_id'];
    $result = $conn->query($sql);

    $user = $result->fetch_assoc();


    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/js/home.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><?php echo $user["users_name"] ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Index</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section text-center text-dark mt-3">
        <div class="container">
            <h1 class="display-4">ยินดีตอนรับเข้าสู่แบบสอบถาม</h1>
            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Id tenetur assumenda tempora pariatur, est asperiores excepturi ratione atque quod animi, expedita consequuntur molestias voluptatem voluptates, fugit laudantium exercitationem et quia.</p>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">ตอบแบบสอบถามของเรา</h5>
                            <!-- แบบฟอร์มสำหรับการตอบแบบสอบถาม -->
                            <form id="sentform" action="save_quiz.php" method="POST" class="mt-4">
                                <!-- คำถามที่ 1 -->
                                <div class="mb-3">
                                    <h6>1.คุณชอบดื่มเครื่องดื่มแอลกอฮอล์ประเภทใด</h6>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question1" id="q1a" value="A" required>
                                        <label class="form-check-label" for="q1a">สุรา</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question1" id="q1b" value="B">
                                        <label class="form-check-label" for="q1b">เบียร์</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question1" id="q1c" value="C">
                                        <label class="form-check-label" for="q1c">ไวน์</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question1" id="q1d" value="D">
                                        <label class="form-check-label" for="q1d">อื่นๆ:</label>
                                    </div>
                                </div>

                                <!-- คำถามที่ 2 -->
                                <div class="mb-3">
                                    <h6>2.ชอบบรรยากาศในร้านแบบใด</h6>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question2" id="q2a" value="A" required>
                                        <label class="form-check-label" for="q2a">นั่งชิวริมทาง</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question2" id="q2b" value="B">
                                        <label class="form-check-label" for="q2b">โซนดาดฟ้า</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question2" id="q2c" value="C">
                                        <label class="form-check-label" for="q2c">ห้องแอร์</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question2" id="q2d" value="D">
                                        <label class="form-check-label" for="q2d">คนพลุกพล่าน</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question2" id="q2e" value="E">
                                        <label class="form-check-label" for="q2e">อื่นๆ:</label>
                                    </div>
                                </div>

                                <!-- คำถามที่ 3 -->
                                <div class="mb-3">
                                    <h6>3.ประเภทดนตรีที่ชอบ</h6>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question3" id="q3a" value="A" required>
                                        <label class="form-check-label" for="q3a">เพลงลูกทุ่ง</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question3" id="q3b" value="B">
                                        <label class="form-check-label" for="q3b">เพลงเพื่อชีวิต</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question3" id="q3c" value="C">
                                        <label class="form-check-label" for="q3c">เพลงอกหัก</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question3" id="q3d" value="D">
                                        <label class="form-check-label" for="q3d">เพลงแดนซ์</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question3" id="q3e" value="E">
                                        <label class="form-check-label" for="q3e">เพลงสตริง</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question3" id="q3f" value="F">
                                        <label class="form-check-label" for="q3f">อื่นๆ:</label>
                                    </div>
                                </div>

                                <!-- คำถามที่ 4 -->
                                <div class="mb-3">
                                    <h6>4.ช่วงเวลาเข้าร้าน</h6>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question4" id="q4a" value="A" required>
                                        <label class="form-check-label" for="q4a">19.00-20.00 น.</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question4" id="q4b" value="B">
                                        <label class="form-check-label" for="q4b">20.00-21.00 น.</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question4" id="q4c" value="C">
                                        <label class="form-check-label" for="q4c">21.00-22.00 น.</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question4" id="q4d" value="D">
                                        <label class="form-check-label" for="q4d">22.00 น. เป็นต้นไป</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question4" id="q4e" value="E">
                                        <label class="form-check-label" for="q4e">อื่นๆ:</label>
                                    </div>
                                </div>

                                <!-- คำถามที่ 5 -->
                                <div class="mb-3">
                                    <h6>5.ชอบโปรโมชั่นแบบไหน</h6>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question5" id="q5a" value="A" required>
                                        <label class="form-check-label" for="q5a">ลด 50 เปอเซ็นต์</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question5" id="q5b" value="B">
                                        <label class="form-check-label" for="q5b">มาก่อน 21.00 น. เปิดขวดฟรี</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question5" id="q5c" value="C">
                                        <label class="form-check-label" for="q5c">โปรซื้อ 3แถม1</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question5" id="q5d" value="D">
                                        <label class="form-check-label" for="q5d">อื่นๆ:</label>
                                    </div>
                                </div>

                                <!-- คำถามที่ 6 -->
                                <div class="mb-3">
                                    <h6>6.รู้จักร้านจากช่องทางใด</h6>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question6" id="q6a" value="A" required>
                                        <label class="form-check-label" for="q6a">เพจเฟสบุ๊ค</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question6" id="q6b" value="B">
                                        <label class="form-check-label" for="q6b">ไอจี</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question6" id="q6c" value="C">
                                        <label class="form-check-label" for="q6c">tiktok</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question6" id="q6c" value="C">
                                        <label class="form-check-label" for="q6c">อื่นๆ:</label>
                                    </div>
                                </div>

                                <!-- คำถามที่ 7 -->
                                <div class="mb-3">
                                    <h6>7.อาหารที่คุณชอบสั่งเวลามาร้าน อย่างน้อย 3 เมนู</h6>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="question7" id="" required>
                                    </div>
                                </div>

                                <!-- คำถามที่ 8 -->
                                <div class="mb-3">
                                    <h6>8.ส่วนใหญ่คุณมาร้านกับใคร</h6>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question8" id="q8a" value="A" required>
                                        <label class="form-check-label" for="q6a">มาคนเดียว</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question8" id="q8b" value="B">
                                        <label class="form-check-label" for="q8b">มากับเพื่อน</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question8" id="q8c" value="C">
                                        <label class="form-check-label" for="q8c">มากับกิ๊ก/ชู้</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question8" id="q8d" value="D">
                                        <label class="form-check-label" for="q8c">มากับครอบครัว:</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question8" id="q8e" value="E">
                                        <label class="form-check-label" for="q8e">อื่นๆ:</label>
                                    </div>
                                </div>

                                <!-- คำถามที่ 9 -->
                                <div class="mb-3">
                                    <h6>9.คุณเดินทางไปร้านอย่างไร</h6>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question9" id="q9a" value="A" required>
                                        <label class="form-check-label" for="q9a">มอเตอไซค์</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question9" id="q9b" value="B">
                                        <label class="form-check-label" for="q9b">รถยนต์ส่วนบุคคล</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question9" id="q9c" value="C">
                                        <label class="form-check-label" for="q9c">แกร็บ</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question9" id="q9d" value="D">
                                        <label class="form-check-label" for="q9c">อื่นๆ:</label>
                                    </div>
                                </div>

                                <!-- คำถามที่ 10 -->
                                <div class="mb-3">
                                    <h6>10.สาเหตุที่ชอบมาร้านเหล้า</h6>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question10" id="q10a" value="A" required>
                                        <label class="form-check-label" for="q10a">อกหักบอกแฟนไม่ได้</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question10" id="q10b" value="B">
                                        <label class="form-check-label" for="q10b">คุยไม่ได้คบ</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question10" id="q10c" value="C">
                                        <label class="form-check-label" for="q10c">เป็นได้แค่พี่น้อง</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question10" id="q10d" value="D">
                                        <label class="form-check-label" for="q10d">เพื่อนกลับไปคบกับแฟนเก่า</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question10" id="q10e" value="E">
                                        <label class="form-check-label" for="q10e">ชอบบรรยากาศในร้าน</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="question10" id="q10f" value="F">
                                        <label class="form-check-label" for="q10f">อื่นๆ:</label>
                                    </div>
                                </div>
                                    

                                <!-- ปุ่มส่งฟอร์ม -->
                                <button type="submit" class="btn btn-primary">Submit Answers</button>
                            </form>

                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/home.js"></script>
</body>
</html>
