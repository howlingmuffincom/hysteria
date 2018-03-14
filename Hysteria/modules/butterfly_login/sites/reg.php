<?php

namespace hm4 {

    new index();

    class index {

        public function __construct() {
            session_start();
            ?>
            <!DOCTYPE html>
            <html>

                <head>
                    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                    <link type="text/css" rel="stylesheet" href="../../materialize/css/materialize.min.css"  media="screen,projection"/>
                    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
                    <title>Howling Muffin 4</title>
                    <link type="shortcut-icon" href="../assets/img/favicon.ico">

                    <style>
                        a {
                            color: #90caf9;
                        }
                        #login-m {
                            margin-top: 150px;
                        }
                        @media screen and (max-width: 767px) {
                            #login-m {
                                margin-top: 20px !important;
                            }
                        }
                    </style>
                </head>

                <body class="blue-grey darken-3">

                    <?php
                    index::showContent();
                }

                public static function showContent() {
                    //echo $_SESSION['username'];
                    $image = rand(1, 3);

                    $text = array();
                    $text[1] = 'Well, I\'ll be waiting here...';
                    $text[2] = 'You come back, don\'t you?';
                    $text[3] = 'I\'m gonna terribly miss you here!';
                    ?>

                    <div class="row" id="login-m" style="">
                        <div class="col s12 m2 l3"> 

                        </div>

                        <div class="col s12 m8 l6"> 
                            <div class="card blue-grey darken-1 white-text " style="padding: 10px;">
                                
                                <img src="/hm4/web/images/hm4_logo_flat.png" style="float: left; max-width: 49%; margin-right: 30px; margin-left: 10px; margin-bottom: 30px; clear: both;">
                                <h1>Login, please!</h1>
                                <span>How else should we know it's you?</span><br /><br />
                                <form action="login.php" method="post" class="teal-text darken-4">
                                    <div class="row white-text">

                                        <div class="input-field col s12">
                                            <input id="last_name" type="text" name="username" class="validate white-text">
                                            <label for="last_name">Username</label>
                                        </div>
                                    </div>

                                    <div class="row white-text">
                                        <div class="input-field col s12">
                                            <input id="password" type="password" name="password" class="validate white-text">
                                            <label for="password">Password</label>
                                        </div>
                                    </div>

                                    <button class="btn waves-effect waves-light" type="submit" name="submit">Login
                                        <i class="material-icons right"></i>
                                    </button>

                                </form>

                                <?php
                                if (isset($_GET['error'])) {
                                    if ($_GET['error'] == 1) {
                                        $c = rand(1, 3);
                                        $m = array();
                                        $m[1] = 'That didn\'t work, honey...';
                                        $m[2] = 'Nope, nothing found. Sorry.';
                                        $m[3] = 'That was amazing! But it didn\'t work...';
                                        ?>
                                        <div class="card-panel red accent-1">
                                            <span class="white-text"><?php echo $m[$c]; ?></span>
                                        </div>
                                        <?php
                                    }
                                    if ($_GET['error'] == 99) {
                                        $c = rand(1, 3);
                                        $m = array();
                                        $m[1] = 'I don\'t get it... Why would you want to be logged out?';
                                        $m[2] = 'Now you\'re gone. And I\'m alone again...';
                                        $m[3] = 'You logged out. It\'s your fault.';
                                        ?>
                                        <div class="card-panel yellow accent-1">
                                            <span class="yellow-text text-darken-4"><?php echo $m[$c]; ?></span>
                                        </div>
                                        <?php
                                    }
                                    if ($_GET['error'] == 109) {
                                        $c = rand(1, 3);
                                        $m = array();
                                        $m[1] = 'You changed your Account Settings.';
                                        $m[2] = 'Ok, i think that worked...';
                                        $m[3] = 'Ehm... we had to do that. Sorry :/';
                                        ?>
                                        <div class="card-panel green accent-1">
                                            <span class="green-text text-darken-4"><?php echo $m[$c]; ?></span>
                                        </div>
                                        <?php
                                    }
                                    if($_GET['error'] == 129) {
                                        $m[1] = 'Your Account has been locked. You have currently no access to this website.';
                                        ?>
                                        <div class="card-panel red ">
                                            <span class="green-text text-darken-4"><?php echo $m[1]; ?></span>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <!--Import jQuery before materialize.js-->
                    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
                    <script type="text/javascript" src="../../materialize/js/materialize.min.js"></script>
                    <script type="text/javascript" src="../../core/assets/js/script.js"></script>

                </body>
            </html>

            <?php
            session_destroy();
        }

    }

}



