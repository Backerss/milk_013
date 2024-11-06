function login() {
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const message = document.getElementById("message");


    if (!email || !password) {
        message.style.color = "#ff4757";
        message.textContent = "Please fill in all required fields.";
        return;
    }

    const data = new URLSearchParams();
    data.append("email", email);
    data.append("password", password);

    fetch("check_login.php", {
        method: "POST",
        body: data
    })
    .then(response => response.json())
    .then(result => {
        if (result.success) {
            message.style.color = "#2ed573";
            message.textContent = "Login successful!";


            alert("Login successful!");

            setTimeout(() => {
                window.location.href = "home.php";
            }, 1500);




        } else {
            message.style.color = "#ff4757";
            message.textContent = result.message || "Login failed.";
        }
    })

}


function calculateAge(birthdate) {
    const today = new Date();
    const birthDate = new Date(birthdate);
    let age = today.getFullYear() - birthDate.getFullYear();
    const monthDiff = today.getMonth() - birthDate.getMonth();
    
    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    
    return age;
}

function checkAge() {
    const birthdate = document.getElementById("birthdate").value;
    const age = calculateAge(birthdate);
    const message = document.getElementById("message");

    if (age < 20) {
        message.style.color = "#ff4757";
        message.textContent = "You must be at least 20 years old to register.";
        return false;
    } else {
        message.textContent = ""; // เคลียร์ข้อความเมื่อผ่านเกณฑ์
        return true;
    }
}

function register() {
    // ตรวจสอบอายุก่อนทำการสมัคร
    if (!checkAge()) {
        return;
    }

    const name = document.getElementById("name").value;
    const lastname = document.getElementById("lastname").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const birthdate = document.getElementById("birthdate").value;
    const sex = document.getElementById("sex").value;
    const code = document.getElementById("code").value;
    const phone = document.getElementById("phone").value;
    const message = document.getElementById("message");

    // ตรวจสอบว่าข้อมูลทั้งหมดถูกกรอกครบถ้วน
    if (!name || !lastname || !email || !password || !birthdate || !sex || !code || !phone) {
        message.style.color = "#ff4757";
        message.textContent = "Please fill in all required fields.";
        return;
    }

   //ส่งค่า action ไปที่ ../save_regis.php
    const data = new URLSearchParams();
    data.append("name", name);
    data.append("lastname", lastname);
    data.append("email", email);
    data.append("password", password);
    data.append("birthdate", birthdate);
    data.append("sex", sex);
    data.append("code", code);
    data.append("phone", phone);

    fetch("save_regis.php", {
        method: "POST",
        body: data
    })
    .then(response => response.json())  // คาดหวังว่าเซิร์ฟเวอร์จะส่งข้อมูลกลับมาเป็น JSON
    .then(result => {
        if (result.success) {  // สมมติว่าเซิร์ฟเวอร์ส่งค่าที่บอกว่าทำสำเร็จหรือไม่ผ่าน `result.success`
            message.style.color = "#2ed573";
            message.textContent = "Registration successful!";

            // เคลียร์ค่าในฟอร์ม และส่งผู้ใช้ไปหน้า login ในแบบ 3 วินาที
            setTimeout(() => {
                window.location.href = "login.php";
            }, 3000);

        } else {
            message.style.color = "#ff4757";
            message.textContent = result.message || "Registration failed.";
        }
    })
    .catch(error => {
        message.style.color = "#ff4757";
        message.textContent = "An error occurred. Please try again later.";
        console.log("Error:", error);
    });
    
}

