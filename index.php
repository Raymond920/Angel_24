<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style/mystyle2.css">
    </head>
    <body>
        <?php include("includes/header.php"); ?>

        <video id="wallpaper" autoplay muted loop poster="wallpaper.jpeg">
            <source src="wallpaper.mp4" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
        
        <div class="loginForm">
            <h3>Login</h3>
            <form class="formContent" action="home" method="POST">
                <div class="container">
                    <label for="username">Username: </label>
                    <input type="text" name="username" placeholder="Enter Username" required><br>
                    <label for="password">Password: </label>
                    <input type="password" name="password" placeholder="Enter Password" required><br>
                    <p id="forgotPassword">Forgot <a href="#forgotPassword">Password?</a></p>
                    <button type="submit">Login</button>
                    <a id="register" href="#register">Register</a>
                </div>
            </form>
        </div>
    </body>
</html>