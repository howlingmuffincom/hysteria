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
                    <meta http-equiv="refresh" content="3.0; url=reg.php?error=99">
                    <style>
                        a {
                            color: #90caf9;
                        }
                    </style>
                </head>

                <body class="blue-grey darken-3" onload="prog();">

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



                    <div class="row">
                        <div class="col s12 m2 l3"></div>

                        <div class="card col s12 m8 l6 blue-grey darken-1" style="margin-top: 50px;">
                            <div class="erfolg" style="width: 100%; text-align: center; margin-top: 15px;">
                                <h2 class="white-text">logout successful</h2><br ><br/>
                                
                            </div>   
                            
                            <h5 style="text-align: center;" class="white-text">redirecting...</h5>
                                    <div class="progress blue-grey darken-3">
                                        <div class="determinate  blue lighten-5" id="progress-bar"></div>
                                    </div>
                                    <br />
                                    
                                
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col s12 m4 l5"></div>

                        <div class="col s12 m2 l2">
                            <div class="card blue-grey darken-1">
                                <div class="card-image">
                                    <img src="../../web/images/sys/<?php echo $image; ?>.jpg" ><br />

                                </div>
                                <div class="card-content">
                                    <span style="width: 300px; text-align: center; margin-left: auto; margin-right: auto;" class="white-text"><br /><h3><?php echo $text[$image]; ?></h3></span>
                                </div>
<!--                                <div class="card-action">
                                    <a href="reg.php">Redirect -></a>
                                </div>-->
                            </div>
                        </div>
                        <!--                        <div class="card col s12 m4 l2" style="margin-top: 100px;">
                                                    <img src="../../web/images/sys/<?php echo $image; ?>.jpg" class="responsive-img"><br />
                                                    <span style="width: 300px; text-align: center; margin-left: auto; margin-right: auto;" class="white-text"><br /><?php echo $text[$image]; ?></span>
                                                </div><br />-->

                    </div>
                    
                    <!--Import jQuery before materialize.js-->
                    <script>
                        function prog() {
                            var progressBar = $('#progress-bar'),
                                    width = 0;

                            progressBar.width(width);

                            var interval = setInterval(function () {

                                width += 2;

                                progressBar.css('width', width + '%');

                                if (width >= 100) {
                                    clearInterval(interval);
                                }
                            }, 40);
                        }
                    </script>
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
?>
