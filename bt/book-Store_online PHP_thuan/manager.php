<html>
    <header>
        <link rel="stylesheet" href="http://localhost/php/bootstrap-3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://localhost/php/bootstrap-3/js/bootstrap.min.js"></script>
    </header>
    <body>
        <?php session_start()?>
        <div class="container" >
            <div class="page-header">
                <h1> Admin Page <small>Please Login</small></h1>
            </div>
            <form class="form" role="form">
                <?php if (isset($_SESSION['manager'])): ?>
                    <a href="addbook_display.php" class="btn btn-primary">Manager Book</a>
                    <a href="manager_user_display.php" class="btn btn-info">Manager User</a>
                <?php else : echo "You don't See this Page ! Please Login Whith Addmin Account"; ?>                 
                <?php endif; ?>
            </form>
        </div>
    </body>
</html>

