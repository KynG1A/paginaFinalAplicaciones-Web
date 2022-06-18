<!DOCTYPE html>
<html>
<head>
	<title>Registrar usuario</title>
	<meta charset="utf-8">

<style type="text/css">

* {
    padding: 0;
    margin: 0;
    font-family: century gothic;
    text-align: center;
}
form {
    padding: 50px 20px;
    background-color: #ededed;
    margin: calc(25% + 100px);
    margin-top: 70px;
    padding-top: 28px;
    margin-bottom: 30px
}

h1 {
    text-align: center;
    padding: 12px;
    color: #444
}

input {
    width: calc(100% - 20px);
    padding: 9px;
    margin: auto;
    margin-top: 12px;
    font-size: 16px
}

input[type='submit']{
    background-color: #48e;
    color: #fff;
    width: calc(80% - 20px);
    margin: 0 10%;
    margin-top: 22px;
    border: none;
}

.ok {
    text-align: center;
    width: 100%;
    padding: 12px;
    background-color: #1e6;
    color: #fff
}
.bad {
    text-align: center;
    width: 100%;
    padding: 12px;
    background-color: #a22;
    color: #fff
}  

</style>
</head>
<body>
    <form method="post" action="index.php">
    	<h1>¡LOGIN!</h1>
    	<input type="text" name="name" placeholder="Nombre completo">
    	<input type="email" name="email" placeholder="Email">
    	<input type="submit" name="register">
        <?php session_start(); ?>
    </form>
</body>
</html>