<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <!-- buat date picker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <style>
        .wrapper {
            width: 360px;
            padding: 20px;
            margin: 0 auto;
        }
    </style>
</head>
<script>
    //buat date picker booking form check in
    $(function() {
        $('#checkin1').datepicker({
            format: "yyyy/mm/dd",
            language: "fr",
            changeMonth: true,
            changeYear: true
        });
    });

    //buat date picker booking form check out
    $(function() {
        $('#checkout1').datepicker({
            format: "yyyy/mm/dd",
            language: "fr",
            changeMonth: true,
            changeYear: true
        });
    });
</script>

<body>
    <?php include('header.php'); ?>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account</p>
        <form action="registera.php" method="post">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="id" id="id">
            </div>

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama">
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <div class="input-group date" id="checkout1">
                    <input type="text" class="form-control" name="tanggal" id="tanggal">
                    <span class="input-group-append">
                        <span class="input-group-text bg-white d-block">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </span>
                </div>

            </div>
            <div class="mb-3">
                <label class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" name="nomor" id="nomor">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="email" id="email">
                <div id="emailHelp" class="form-text"> We'll never share your email with anyone else. </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <button type="submit" name="save" class="btn btn-primary">

                Register Now</button>
            <p>Already have an account? <a href="login.php"><u>Login Here</u></a>.</p>
        </form>
    </div>

</body>

</html>