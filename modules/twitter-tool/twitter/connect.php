<?php

/**
 * @file
 * Check if consumer token is set and if so send user to get a request token.
 */

/**
 * Exit with an error message if the CONSUMER_KEY or CONSUMER_SECRET is not defined.
 */
require_once('config.php');
if (CONSUMER_KEY === '' || CONSUMER_SECRET === '') {
  exit;
}

?>
<html>
    <head>
        <title>Conectar a Twitter</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <style>
            * {
                font-family: Arial, Verdana;
            }
            center {
                width: 600px;
            }
            img {
                border: 0px;
            }
        </style>
    </head>
    <body>
        <div align="center">
            <center>
                <h1>Acceso Autorizado solo para Usuarios de Twitter</h1>
                <a href="redirect.php"><img src="./images/lighter.png" alt="Sign in with Twitter"/></a>
            </center>
        </div>
    </body>
</html>

