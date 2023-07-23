<!Doctype>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link type="text/css" rel="stylesheet" href="css/mine.css">
    </head>
    <body class="body-image">


    <nav class="navbar navbar-default nav-style">
        <div class="container-fluid">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="#">

                    <div style="display: inline-block;" onClick="toggleNav()" class="open_close">
                        <span></span><span></span><span></span>
                    </div>

                   <!-- <img style="display: inline-block;" width="80px" height="29px" src="../images/luno.png" class="img-responsive">-->
                </a>

            </div>


            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">



                <ul class="nav navbar-nav navbar-right" style="margin-right: 30px;">
                    <li><a class="btc-price link_font text-white" href="index-2.php">Home</a></li>
                    <!--<li><a href="/learn/en/" class="text-white link_font">Learn</a></li>
                    <li></li>
                    <li><a class="text-white link_font" href="/blog/en/">Blog</a></li>
                    <li><a class="text-white link_font" href="/en/login">Sign In</a></li>
                    <li><a href="/en/signup" class="link_font btn btn-primary text-white ln-btn-sm sign_up">Sign Up</a></li>-->
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">


            <div class="col-md-4 col-md-offset-4 col-xs-12 col-xs-offset-0 main-padds" style="margin-top: 100px;" >
                <div class="content_carier_2">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1 text-center" style="margin-top: 20px;">
                            <h3>Welcome back</h3>
                        </div>


                        <?php if(isset($_SESSION['formError'])){?>
                            <?php foreach($_SESSION['formError'] as $k => $eachErrorArray){?>
                                <?php foreach($eachErrorArray as $k => $eachError){?>
                                    <p class="alert alert-danger"><?php echo $eachError ?></p>
                                <?php } ?>
                            <?php } ?>
                            <?php unset($_SESSION['formError']); ?>
                        <?php } ?>
                        <?php if(isset($_GET['success'])){?>
                            <p class="alert alert-success"><?php echo trim($_GET['success']); ?></p>
                        <?php } ?>

                        <form action="action/main_work.php?option=login" method="post">

                        <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1 text-center" style="margin-top: 20px;">
                            <div class="form-group">
                                <input type="text" class="form-control my_form" value="<?php if (isset($_SESSION{'username'})) {echo $_SESSION['username'];}?>"  name="username" id="email_address" aria-describedby="emailHelp" placeholder="Username">
                            </div>
                        </div>

                        <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1 text-center" style="margin-top: 20px;">
                            <div class="form-group">
                                <input name="password" type="password" value="<?php if (isset($_SESSION{'password'})) {echo $_SESSION['password'];}?>" class="form-control my_form" placeholder="Password">
                            </div>
                        </div>

                        <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1 text-center" style="margin-top: 20px;">
                            <button style="border-radius:0px;" class="btn btn-lg btn-info btn-block" type="submit" name="log_admin">Login</button>
                        </div>

                        <!--<div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1 text-center" style="margin-top: 20px;">
                            <a style="border-radius:0px;" class="btn btn-lg btn-block btn-color" type="button">Sign Up</a>
                        </div>-->

                    </div>
                    </form>

                </div>
                <div class="content_carier_3" style="background: #f2f2f2; margin-bottom: 20px;" >
                    <div class="row">
                        <div class="col-md-12 text-center" style="margin-top: 20px" >
                            <small style="font-family: Roboto,'Open Sans',sans-serif; color: #757575; ">or Sign in with</small>
                        </div>

                        <div class="col-md-4 col-md-offset-2 col-xs-4 col-xs-offset-2 text-center" style="margin-top: 20px" >
                            <a style="border-radius:0px;" class="btn btn-lg btn-block btn-outline-danger">
                                <img _ngcontent-c2="" alt="Google" src="https://d32exi8v9av3ux.cloudfront.net/web/2019/01/17/5e25204/website/common/img/social-google.png" srcset="https://d32exi8v9av3ux.cloudfront.net/web/2019/01/17/5e25204/website/common/img/social-google@2x.png 2x">
                            </a>
                        </div>

                        <!--<div class="col-md-4 col-xs-4 text-center" style="margin-top: 20px; margin-bottom: 20px;" >
                            <a style="border-radius:0px;" class="btn btn-lg btn-block btn-outline-info">
                                <img _ngcontent-c2="" alt="Facebook" src="https://d32exi8v9av3ux.cloudfront.net/web/2019/01/17/5e25204/website/common/img/social-facebook.svg" srcset="https://d32exi8v9av3ux.cloudfront.net/web/2019/01/17/5e25204/website/common/img/social-facebook.svg">
                            </a>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    </body>
<script type="text/javascript" src="../boostrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
  /
    //cookie stuffs
    // function setCookie(name,value,days) {
    //     var expires = "";
    //     if (days) {
    //         var date = new Date();
    //         date.setTime(date.getTime() + (days*24*60*60*1000));
    //         expires = "; expires=" + date.toUTCString();
    //     }
    //     document.cookie = name + "=" + (value || "")  + expires + "; path=/";
    // }

    // function getCookie(name) {
    //     var nameEQ = name + "=";
    //     var ca = document.cookie.split(';');
    //     for(var i=0;i < ca.length;i++) {
    //         var c = ca[i];
    //         while (c.charAt(0)==' ') c = c.substring(1,c.length);
    //         if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    //     }
    //     return null;
    // }

    // function eraseCookie(name) {
    //     document.cookie = name+'=; Max-Age=-99999999;';
    // }
</script>

</html>