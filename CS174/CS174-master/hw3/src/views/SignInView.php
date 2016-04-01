<?php

namespace soloRider\hw3\views;
require_once "View.php";

class SignInView extends View {
    /**
     * Draw the web page to the browser
     */
    public function render($data) {
    ?>
        <!DOCTYPE html>
        <html>
        <head>
          <meta charset="utf-8">
          <title>Login</title>
          <link rel="stylesheet" href="src/views/css/style.css" />
        </head>
        <body>
          <div class="form">
          <h1>Log In</h1>
          <form action="" method="post" name="login">
            <input type="text" name="username" placeholder="Username" required />
            <input type="password" name="password" placeholder="Password" required />
            <form>
              <input type="submit" class="buttonLink" name="signIn" value="Sign In"/>
            </form>
          </form>
          <p>Not registered yet?
            <form method="post" action="index.php">
              <input type="submit" class="buttonLink" name="createAccount" value="Sign Up"/>
            </form>
          </p>
          </div>
        </body>
        </html>
    <?php
    }
}
