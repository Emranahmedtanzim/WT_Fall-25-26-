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

    // NAME
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = $_POST["name"];
        if (!preg_match("/^[a-zA-Z .-]* [a-zA-Z .-]+$/", $name)) {
            $nameErr = "Invalid name";
        }
    }

    // EMAIL (NO filter_var)
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = $_POST["email"];
        if (!preg_match("/^[^ ]+@[^ ]+\.[a-z]{2,3}$/", $email)) {
            $emailErr = "Invalid email";
        }
    }

    // DOB
    if (empty($_POST["dd"]) || empty($_POST["mm"]) || empty($_POST["yy"])) {
        $dobErr = "Date required";
    } else {
        $dd = $_POST["dd"];
        $mm = $_POST["mm"];
        $yy = $_POST["yy"];
        if ($dd < 1 || $dd > 31 || $mm < 1 || $mm > 12 || $yy < 1953 || $yy > 1998) {
            $dobErr = "Invalid date";
        }
    }

    // GENDER
    if (empty($_POST["gender"])) {
        $genderErr = "Select gender";
    } else {
        $gender = $_POST["gender"];
    }

    // DEGREE
    if (empty($_POST["degree"])) {
        $degreeErr = "Select degree";
    } else {
        $degree = $_POST["degree"];
    }

    // BLOOD GROUP
    if (empty($_POST["blood"])) {
        $bloodErr = "Select blood group";
    } else {
        $blood = $_POST["blood"];
    }
}
?>

<form method="post">

Name:
<input type="text" name="name" value="<?php echo $name; ?>">
<?php echo $nameErr; ?>
<br><br>

Email:
<input type="text" name="email" value="<?php echo $email; ?>">
<?php echo $emailErr; ?>
<br><br>

Date of Birth:
<input type="text" name="dd" size="2" value="<?php echo $dd; ?>">
<input type="text" name="mm" size="2" value="<?php echo $mm; ?>">
<input type="text" name="yy" size="4" value="<?php echo $yy; ?>">
<?php echo $dobErr; ?>
<br><br>

Gender:
<input type="radio" name="gender" value="Male">Male
<input type="radio" name="gender" value="Female">Female
<?php echo $genderErr; ?>
<br><br>

Degree:
<select name="degree">
<option value="">Select</option>
<option>BSc</option>
<option>MSc</option>
<option>PhD</option>
</select>
<?php echo $degreeErr; ?>
<br><br>

Blood Group:
<select name="blood">
<option value="">Select</option>
<option>A+</option>
<option>A-</option>
<option>B+</option>
<option>B-</option>
<option>O+</option>
<option>O-</option>
<option>AB+</option>
<option>AB-</option>
</select>
<?php echo $bloodErr; ?>
<br><br>

<input type="submit" value="Submit">

</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"
    && empty($nameErr) && empty($emailErr) && empty($dobErr)
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
