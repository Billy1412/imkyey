<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <style>
        .wrapper {
            width: 360px;
            padding: 20px;
            margin: 0 auto;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <?php
    include('header.php');
    ?>
    <div class="wrapper">
        <form action="loginprocess.php" method="post">
            <h2>Login</h2>
            <p class="hint-text">Enter Login Details</p>
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="id">
                <div id="emailHelp" class="form-text"> We'll never share your email with anyone else. </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <button type="submit" name="save" class="btn btn-success btn-lg btn-block">
                    Login</button>
            </div>
            <p>Don't have an account? <a href="register.php"><u>Register Here</u></a>.</p>
        </form>
    </div>
</body>

</html>