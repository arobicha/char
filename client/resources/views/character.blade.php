/**
 * Created by PhpStorm.
 * User: arobichaud
 * Date: 8/17/2016
 * Time: 12:22 PM
 */
<!DOCTYPE html>
<html>
    <head>
        <title>Char</title>
        <link href="static/semantic/semantic.css" rel="stylesheet" type="text/css">

        <style type="text/css">
            .main.container {
                margin-top: 7em;
            }
        </style>

    </head>
    <body>
        <div class="ui fixed inverted menu">
            <div class="ui container">
                <a href="#" class="header item"><i class="icon user"></i> Char</a>
                <a href="#" class="item">Log In</a>
            </div>
        </div>
        <div class="ui main text container">
            <h1 class="ui header">Welcome to apo.calypti.ca/char</h1>
            <p>Your one-stop-shop for telling stories online.</p>
        </div>

        <div class="ui modal">
            <i class="close icon"></i>
            <div class="header">
                Profile Picture
            </div>
            <div class="image content">
                <div class="ui medium image">
                    <img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=300%C3%97300&w=300&h=300">
                </div>
                <div class="description">
                    <div class="ui header">Please log in with your NG++ Mattermost Account to continue.</div>
                    <p>We've grabbed the following image from the <a href="https://www.gravatar.com" target="_blank">gravatar</a> image associated with your registered e-mail address.</p>
                    <p>Is it okay to use this photo?</p>
                </div>
            </div>
            <div class="actions">
                <div class="ui black deny button">
                    Nope
                </div>
                <div class="ui positive right labeled icon button">
                    Yep, that's me
                    <i class="checkmark icon"></i>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="static/jquery-3.1.0.min.js"></script>
        <script type="text/javascript" src="static/semantic/semantic.js"></script>
    </body>
</html>
