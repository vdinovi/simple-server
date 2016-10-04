<html>
<body>
<?php
echo shell_exec('php -l cgi-bin/util.php');
echo "<br>";
echo shell_exec('php -l cgi-bin/login.php');
echo "<br>";
echo shell_exec('php -l cgi-bin/signup.php');
echo "<br>";
echo shell_exec('php -l cgi-bin/clear.php');
echo "<br>";
?>
</body>
</html>
