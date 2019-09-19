<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
      integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>

<style type="text/css">
    .form-control {
        width: 100%;
    }

    .input-container {
        display: flex;
        width: 100%;
    }

    i {
        padding: 10px;
        text-align: center;
        min-width: 50px;
    }
</style>
</head>

<body>
<!-- register START -->
<div class="row">
    <div class="col-4"></div>
    <div class="col-4" style="text-align: center">
        <img src="https://2019fun.justmy.com/assets/dist/img/logo_justmy.jpg">
        <p id="content-header" style="font-size: 32px">Register</p>
        <p id="excerpt">Join today. It's free, it's easy!</p>
        <?php if (isset($message)) { ?>
            <div id="infoMessage">
                <div class="alert alert-danger" role="alert"><p>
                        <?php echo $message; ?>
                    </p></div>
            </div>
        <?php } ?>
        <form action="register" method="post" accept-charset="utf-8" style="font-size: 1.6rem;">
            <div class="row">
                <div class="col-12">
                    <div class="form-group required input-container">
                        <i class="fas fa-user"></i>
                        <input type="text" class="form-control" id="fname" name="first_name" required
                               placeholder="First Name">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group required input-container">
                        <i class="fas fa-user"></i>
                        <input type="text" class="form-control" id="lname" name="last_name" required
                               placeholder="Last Name">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group required input-container">
                        <i class="fas fa-phone"></i>
                        <input type="text" class="form-control" id="phone" name="phone" required placeholder="Phone">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group required input-container">
                        <i class="fas fa-envelope"></i>
                        <input type="email" class="form-control" id="email" name="email" required placeholder="Email">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group required input-container">
                        <i class="fas fa-lock"></i>
                        <input type="password" class="form-control" id="password" name="password" required
                               placeholder="Password">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group required input-container">
                        <i class="fas fa-bullseye"></i>
                        <select id="field-market" name="market" class="form-control">
                            <?php foreach ($marketList as $id => $name): ?>
                                <option value="<?php echo $id; ?>" <?php if ($market_id == $id) echo 'selected'; ?> ><?php echo $name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row no-gutters">
                <div class="col-9" style="text-align: left">
                    <input type="submit" class="btn btn-info" value="Submit">
                </div>
                <div class="col-3" style="text-align: right">
                    <a href="login" style="font-size: 16px;
                                       color: brown">Login</a>
                </div>
            </div>
        </form>
        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="<?=$fbUrl?>" class="btn btn-block btn-social btn-facebook btn-flat">
                <i class="fab fa-facebook"><span class="social-text">  Sign up using Facebook</span></i>

            </a>
            <a href="<?=$google_login_url?>" class="btn btn-block btn-social btn-google btn-flat">
                <i class="fab fa-google-plus"><span class="social-text"> Sign up using Google+
                    </span> </i>
            </a>
        </div>
    </div>
    <div class="col-4"></div>
</div>