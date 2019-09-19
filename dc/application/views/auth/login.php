    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

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

<!-- login START -->
<div class="row" style="margin-top: 3%;margin-bottom: 2%">
    <div class="col-4"></div>
    <div class="col-4" style="text-align: center">
        <img src="https://2019fun.justmy.com/assets/dist/img/logo_justmy.jpg">
        <p id="content-header" style="font-size: 32px">Login</p>
        <p id="excerpt">Please login using your email and password.</p>
        <?php if (isset($message)) { ?>
            <div id="infoMessage">
                <div class="alert alert-danger" role="alert"><p>
                        <?php echo $message; ?>
                    </p></div>
            </div>
        <?php } ?>
        <form action="login" method="post" accept-charset="utf-8" >
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
            <div class="row no-gutters">
                <div class="col-4" style="text-align: left">
                    <input type="submit" class="btn btn-info" value="Submit" >
                </div>
                <div class="col-4" style="text-align: right">
                    No Account? <a href="register" style="color: #0f6ab4;">Sign up</a>
                </div>
                <div class="col-3" style="text-align: right">
                    <a href="auth/forgot_password" style="font-size: 14px;
                                       color: brown">Forgot password?</a>
                </div>
            </div>
        </form>

        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="<?=$fbUrl?>" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fab fa-facebook"><span class="social-text"> Sign in using Facebook</span></i> </a>
            <a href="<?=$google_login_url?>" class="btn btn-block btn-social btn-google btn-flat"><i class="fab fa-google-plus"><span class="social-text"> Sign in using Google+</span></i></a>
        </div>
    </div>
    <div class="col-4"></div>
</div>
