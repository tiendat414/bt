<?php
include 'header.php';
?>
<header>
    <script src="http://localhost/login.js"></script>
</header>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="container" >
            <div class="page-header">
                <h1>Wellcome to Login side <small>Please Login</small></h1>
            </div>
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="control-label col-sm-2" >User:</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="name" placeholder="Enter user" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd" >Password:</label>
                    <div class="col-sm-3"> 
                        <input type="password" class="form-control" id="pwd" name="pass"  placeholder="Enter password">
                    </div>
                </div>
                <div class="form-group"> 
                    <div class="col-sm-offset-2 col-sm-10">
                        <label class="btn btn-primary" id="login">Login</label>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="panel-footer">
    <?php include 'foodter.php' ?>
</div>


