<div class="loginForm">
    <h3>Login</h3>
    <!-- Display error messages -->
    <?php 
        if (isset($_SESSION['error'])) { 
            echo '<p style="color: red;">' . $_SESSION['error'] . '</p>';
            unset($_SESSION['error']); // Clear the error message after displaying
        } 
    ?>
    <form class="formContent" action="includes/login.php" method="POST">
        <div class="container">
            <label for="username">Username: </label>
            <input type="text" name="username" placeholder="Enter Username" required><br>
            <label for="password">Password: </label>
            <input type="password" name="password" placeholder="Enter Password" required><br>
            <p id="forgotPassword">Forgot <a href="#forgotPassword">Password?</a></p>
            <button type="submit">Login</button>
            <a id="register" href="../Angel_24/register/register.php">Register</a>
        </div>
    </form>
</div>
