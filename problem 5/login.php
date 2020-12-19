1
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
28
29
30
31
32
33
34
35
36
37
38
39
40
41
42
43
44
45
46
47
48
49
50
51
52
53
54
55
56
57
58
59
60
61
62
63
64
<?php session_start(); ?>
<html>
<head>
    <title>Login</title>
</head>
 
<body>
<a href="index.php">Home</a> <br />
<?php
include("connection.php");
 
if(isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($mysqli, $_POST['username']);
    $pass = mysqli_real_escape_string($mysqli, $_POST['password']);
 
    if($user == "" || $pass == "") {
        echo "Either username or password field is empty.";
        echo "<br/>";
        echo "<a href='login.php'>Go back</a>";
    } else {
        $result = mysqli_query($mysqli, "SELECT * FROM login WHERE username='$user' AND password=md5('$pass')")
        or die("Could not execute the select query.");
        
        $row = mysqli_fetch_assoc($result);
        
        if(is_array($row) && !empty($row)) {
            $validuser = $row['username'];
            $_SESSION['valid'] = $validuser;
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
        } else {
            echo "Invalid username or password.";
            echo "<br/>";
            echo "<a href='login.php'>Go back</a>";
        }
 
        if(isset($_SESSION['valid'])) {
            header('Location: index.php');            
        }
    }
} else {
?>
    <p><font size="+2">Login</font></p>
    <form name="form1" method="post" action="">
        <table width="75%" border="0">
            <tr> 
                <td width="10%">Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr> 
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr> 
                <td>&nbsp;</td>
                <td><input type="submit" name="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
<?php
}
?>
</body>
</html>