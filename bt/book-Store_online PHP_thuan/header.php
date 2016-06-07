<html>
    <head>
        <link rel="stylesheet" href="http://localhost/php/bootstrap-3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://localhost/php/bootstrap-3/js/bootstrap.min.js"></script>
    </head> 
    <body>
        <?php session_start()?>
        <div class="jumbotron">
            <h1>Book Store <small>Online</small></h1>
            <label class="btn btn-success"><i class="glyphicon glyphicon-home"></i><a href="home.php" class="col-md-offset-1" style="color: white">Home</a> </label>
            <?php if(isset($_SESSION['manager'])||isset($_SESSION['user'])):?>
            <label class="btn btn-danger"> <a href="log_out.php" style="color: white">Singout</a></label>
            <?php else :?>
                <label class="btn btn-info"> <a style="color: white" href="login.php">Singin</a></label>
            <?php endif ;?>
            <label class="btn btn-info pull-right"><a  style="color: white" href="view_cart.php">Cart</a> <i class="glyphicon glyphicon-shopping-cart"></i></label>
        </div>
        <div id="content">



