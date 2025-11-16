<!DOCTYPE html>
<html>
<head>
    <title>registration form</title>

    <style>
        div{
            text-align:left;
            margin:30px;
            font-size:20px;
            border:2px solid black;
            padding:20px;
            width:560px;
            background-color: white;
        }

        h2.title1{
            color:black;
        }

        #button1{
            background-color: blue;
            width:150px;
            padding:10px;
            color:white;
            font-size:18px;
            border:none;
            border-radius:5px;
            cursor:pointer;
        }
        #button2{
            background-color: blue;
            width:150px;
            padding:10px;
            color:white;
            font-size:18px;
            border:none;
            border-radius:5px;
            cursor:pointer;
        }
        #message {
            margin-top: 20px;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
        }
    </style>

    <script>
        function validation(){
            let name = document.getElementById("fullname").value;
            let email = document.getElementById("email").value;
            let phone = document.getElementById("phone").value;
            let pass = document.getElementById("pass").value;
            let cpass = document.getElementById("confirm pass").value;

            let message = document.getElementById("message");
            message.innerHTML = "";
            message.style.color = "";

            if(name === "" || email === "" || phone === "" || pass === "" || cpass === ""){
                message.innerHTML = "Please fill in all fields.";
                return false;
            }

            if(!email.includes("@")){
                message.innerHTML = "Email must contain '@'.";
                return false;
            }

            if(isNaN(phone)){
                message.innerHTML = "Phone number must contain only digits.";
                return false;
            }

            if(pass !== cpass){
                message.innerHTML = "Passwords do not match.";
                return false;
            }

            message.innerHTML = `
                <strong>Registration Complete!</strong><br><br>
                Name: ${name}<br>
                Email: ${email}<br>
                Phone: ${phone}<br>
            `;
            
            return false;
        }
    </script>
</head>

<body>
    <center>
        <h2 class="title1">participant registration</h2>
    </center>

    <center>
        <div>

            fullname:<br>
            <input type="text" id="fullname" style="width: 560px;"><br>

            email:<br>
            <input type="text" id="email" style="width:560px;"><br>

            phone number:<br>
            <input type="text" id="phone" style="width: 560px;"><br>

            password:<br>
            <input type="password" id="pass" style="width: 560px;"><br>

            confirm password:<br>
            <input type="password" id="confirm pass" style="width: 560px;"><br><br>

            <button id="button1" onclick="validation()">Register</button><br><br>

            <div id="message" style="width: 300px; margin: auto; text-align: left; font-size: 16px; font-weight: bold;"></div>
             <center>
            <h2 style="color:black"> activity selection:</h2>
            </center>
            activity name:<br><br>
            <input type="text"  style="width: 560px;"><br><br>
            <button id="button2">add activity</button>

        </div>
    </center>
</body>
</html>
