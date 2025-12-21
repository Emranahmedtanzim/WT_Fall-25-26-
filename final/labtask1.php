<!DOCTYPE html>
<html>
<head>
    <title>PHP Code</title>
</head>
<body>

<h1>Welcome to Registration</h1>

<?php

$name = $email = $gender = $degree = $blood = "";
$dd = $mm = $yy = "";

$nameErr = $emailErr = $dobErr = $genderErr = $degreeErr = $bloodErr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

   
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

 
    if (empty($_POST["dd"]) || empty($_POST["mm"]) || empty($_POST["yy"])) {
        $dobErr = "Date of birth is required";
    } else {
        $dd = test_input($_POST["dd"]);
        $mm = test_input($_POST["mm"]);
        $yy = test_input($_POST["yy"]);
        if ($dd < 1 || $dd > 31 || $mm < 1 || $mm > 12 || $yy < 1953 || $yy > 1998) {
            $dobErr = "Invalid date";
        }
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }

    
    if (empty($_POST["degree"])) {
        $degreeErr = "Degree is required";
    } else {
        $degree = test_input($_POST["degree"]);
    }

    
    if (empty($_POST["blood"])) {
        $bloodErr = "Blood group is required";
    } else {
        $blood = test_input($_POST["blood"]);
    }
}


function test_input($data) {
    $data = trim($data); 
    $data = stripslashes($data); 
    $data = htmlspecialchars($data);  
    return $data;
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    <label for="name">Name:</label>
    <input type="text" name="name" value="<?php echo $name; ?>">
    <?php echo $nameErr; ?>

    <br><br>

    <label for="email">Email:</label>
    <input type="text" name="email" value="<?php echo $email; ?>">
    <?php echo $emailErr; ?>

    <br><br>

    <label for="dob">Date of Birth:</label>
    <input type="text" name="dd" size="2" value="<?php echo $dd; ?>" placeholder="DD">
    <input type="text" name="mm" size="2" value="<?php echo $mm; ?>" placeholder="MM">
    <input type="text" name="yy" size="4" value="<?php echo $yy; ?>" placeholder="YYYY">
    <?php echo $dobErr; ?>

    <br><br>

    <label for="gender">Gender:</label>
    <input type="radio" name="gender" value="Male" <?php if ($gender == "Male") echo "checked"; ?>> Male
    <input type="radio" name="gender" value="Female" <?php if ($gender == "Female") echo "checked"; ?>> Female
    <?php echo $genderErr; ?>

    <br><br>

    <label for="degree">Degree:</label>
    <select name="degree">
        <option value="">Select</option>
        <option value="BSc" <?php if ($degree == "BSc") echo "selected"; ?>>BSc</option>
        <option value="MSc" <?php if ($degree == "MSc") echo "selected"; ?>>MSc</option>
        <option value="PhD" <?php if ($degree == "PhD") echo "selected"; ?>>PhD</option>
    </select>
    <?php echo $degreeErr; ?>

    <br><br>

    <label for="blood">Blood Group:</label>
    <select name="blood">
        <option value="">Select</option>
        <option value="A+" <?php if ($blood == "A+") echo "selected"; ?>>A+</option>
        <option value="A-" <?php if ($blood == "A-") echo "selected"; ?>>A-</option>
        <option value="B+" <?php if ($blood == "B+") echo "selected"; ?>>B+</option>
        <option value="B-" <?php if ($blood == "B-") echo "selected"; ?>>B-</option>
        <option value="O+" <?php if ($blood == "O+") echo "selected"; ?>>O+</option>
        <option value="O-" <?php if ($blood == "O-") echo "selected"; ?>>O-</option>
        <option value="AB+" <?php if ($blood == "AB+") echo "selected"; ?>>AB+</option>
        <option value="AB-" <?php if ($blood == "AB-") echo "selected"; ?>>AB-</option>
    </select>
    <?php echo $bloodErr; ?>

    <br><br>

    <input type="submit" value="Submit">

</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($nameErr) && empty($emailErr) && empty($dobErr)
    && empty($genderErr) && empty($degreeErr) && empty($bloodErr)) {

    echo "<h3>Your Input:</h3>";
    echo "Name: $name <br>";
    echo "Email: $email <br>";
    echo "DOB: $dd-$mm-$yy <br>";
    echo "Gender: $gender <br>";
    echo "Degree: $degree <br>";
    echo "Blood Group: $blood <br>";
}
?>

</body>
</html>
