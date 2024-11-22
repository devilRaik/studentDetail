<?php include 'components/_title.php'; ?>
<?php
$login = false;
$showError = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '_dbconnect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE userid='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if ($num == 1) {
        $row = mysqli_fetch_array($result);
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        // Set user role
        $_SESSION['role'] = ($row['userid'] == 'admin') ? 'admin' : $username;

        // Redirect based on role
        if ($_SESSION['role'] == 'admin') {
            header("location: test-admin.php");
        } else {
            header('location: test-dataform.php');
        }
    } else {
        $showError = "Invalid Credentials";
    }
}
?>

<?php include 'components/_header.php'; ?>
<?php echo '<link rel="stylesheet" href="bootstrap-5.3.3-dist/css/login-css.css">'; ?>
<?php include 'components/_alert.php'; ?>

<div class="login-container">
    <div class="login-form shadow-lg p-4 rounded">
        <h2 class="form-title text-center">Login</h2>
        <form action="index.php" method="post" id="loginForm" onsubmit="return validateForm()">
            <!-- Username Input -->
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" required>
                <div class="invalid-feedback">Username is required.</div>
            </div>

            <!-- Password Input -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
                <div class="invalid-feedback">Password is required.</div>
            </div>

            <!-- Login Button -->
            <button type="submit" class="btn btn-primary form-button">Login</button>
        </form>

        <div class="mt-3 text-center">
            <p class="form-text">Don't have an account? <a href="#">Sign Up</a></p>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS -->
<script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>

<!-- JavaScript for Form Validation -->
<script>
    // Form validation function
    function validateForm() {
        const username = document.getElementById("username");
        const password = document.getElementById("password");

        // Reset the form validation
        username.classList.remove('is-invalid');
        password.classList.remove('is-invalid');

        // Validate username and password
        let isValid = true;
        if (username.value.trim() === "") {
            username.classList.add('is-invalid');
            isValid = false;
        }
        if (password.value.trim() === "") {
            password.classList.add('is-invalid');
            isValid = false;
        }

        return isValid;
    }
</script>
<?php include 'components/_footer.php'; ?>