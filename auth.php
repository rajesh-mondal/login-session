<?php
session_start( [
    'cookie_lifetime' => 300,
] );

if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {
    if ( 'admin' == $_POST['username'] && 'rabbit' == $_POST['password'] ) {
        $_SESSION['loggedin'] = true;
    } else {
        $_SESSION['loggedin'] = false;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Hello World</title>
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/milligram/1.3.0/milligram.css">
        <style>
            body{
                margin-top: 30px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="column column-60 column-offset-20">
                    <h3>Simple Auth Example</h3>
                </div>
            </div>
            <div class="row">
                <div class="column column-60 column-offset-20">
                    <?php
                    if ( true == $_SESSION['loggedin'] ) {
                        echo "Hello Admin, Welcome.";
                    } else {
                        echo "Hello Stranger! Login Below";
                    }
                    ?>
                </div>
            </div>
            <div class="row" style="margin-top:20px;">
                <div class="column column-60 column-offset-20">
                    <?php
                    if ( false == $_SESSION['loggedin'] ):
                    ?>
                    <form method="POST">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password">
                        <button type="submit" class="button-primary" name="submit">Log In</button>
                    </form>
                    <?php
                    else:
                    ?>
                    <form action="auth.php?logout=true" method="POST">
                        <button type="submit" class="button-primary" name="submit">Log Out</button>
                    </form>
                    <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>