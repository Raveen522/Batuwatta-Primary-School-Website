<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/icons/moregreat_logo_white.png">
    <link rel="stylesheet" href="../css/style.css">

    <style>
        .container{
            padding-top: 10px;
        }

        .logo{
            width: 80px;
        }
        h1{
            margin: 10px 0 0 0;
        }
        h2{
            margin: 5px 0 10px 0;
        }

        form{
            width: 400px;
            height: 300px;
            border-radius: 15px;
            border: var(--primary-color) solid;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            background: white;
            box-shadow: 0 0 12px var(--shadow-color);
        }
    </style>
</head>
<body>
    <img src="../assets/images/blueprints/blueprint_04.svg" alt="" class="blueprint">
    <div class="container col">
        <img src="../assets/images/icons/MoreGreat-logo.png" alt="" class="logo">
        <h1 class="page-title">MoreGreat</h1>
        <h2>Content Management System</h2>
        <form onsubmit="return false">
            <h2>Login</h2>
            <input type="text" name="user-id" id="user-id" placeholder="User ID">
            <input type="password" name="user-pw" id="user-pw" placeholder="Password">
            <br>
            <button onclick="login()">Login</button>
        </form> 
    </div>

    <script>
        function login(){
            var userID = document.getElementById("user-id").value;
            var password = document.getElementById("user-pw").value;

            console.log(userID);
            console.log(password);
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    respond = this.responseText;
                    console.log(respond)
                    if(respond=="done"){
                        location.href = "./dashboard.php";
                    }else{
                        alert("Invalid user name or password. Please check !")
                    }
                }
            };
            xmlhttp.open("POST", "../php/login.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("userID=" + userID +"&"+ "password=" + password);
        }
    </script>
</body>
</html>