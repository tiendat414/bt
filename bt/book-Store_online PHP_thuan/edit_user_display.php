<?php
include 'conect.php';
include 'header.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM member WHERE id=' . $id;
$persons = $db->GetRow($sql);
$name=$persons['Name_mem'];
$user=$persons['User_name'];
$pass=$persons['Pass'];
$type=$persons['User_type'];
$email=$persons['Email'];
$phone=$persons['Phone'];
$address=$persons['Address'];
?>
<header>
    <script src="http://localhost/edit_user.js"></script>
</header>
<div class="panel panel-default">
    <div class="panel-body">
        <form role="form" class="form-horizontal">
            <div class="col-md-6">
                <label >ID(*)</label> <input
                    type="text" class="form-control" id='user_id' keyid='<?php echo $id; ?>' disabled="disabled" value='<?php echo $id; ?>'>
            </div>
            <div class="col-md-6">
                <label>Name:(*) </label> <input type="text" id='name' value="<?php echo $name ?>"
                                                class="form-control" placeholder="Name..."
                                                required>
            </div>
            <div class="col-md-6">
                <label>User Name:(*)</label> <input type="text" id="user_name" class="form-control" value="<?php echo $user ?>">
            </div>
            <div class="col-md-6">
                <label>Pass:(*)</label> <input
                    class="form-control"  id="pass" value="<?php echo $pass ?>"
                    required>
            </div>
            <div class="col-md-6">
                <label>User Type:</label> <select class="form-control" id='type'>
                    <?php echo "<option value='$type'>$type</option>";
                       if($type=='Personal'){
                           echo "<option value='Organization'>Organization</option>";
                       }
                       if($type=="Organization"){
                           echo "<option value='Personal'>Personal</option>";
                       }
                            ?>
                </select>
            </div>
            <div class="col-md-6">
                <label>Email</label> <input type="email" id='email' value="<?php echo $email ?>"
                                            placeholder="Decription..." class="form-control" >
            </div>
            <div class="col-md-6">
                <label>Phone</label> <input id="phone" type="tel" min="0" value="<?php echo $phone ?>"
                                            class="form-control">
            </div>
            <div class="col-md-6">
                <label>Address</label>
                <input type="text" id='address' class='form-control'  value='<?php echo $address ?>'>  
            </div>
        </form>
        <div class="col-md-7 pull-center">					
            <button class="btn btn-success" ><a href="manager_user_display.php" style="color:white ">Back</a> </button>
            <button class="btn btn-primary" id='edit_user' ><a style="color:white ">Edit</a></button>
        </div>
    </div>
    <div class="panel-footer">
        <?php
        include 'foodter.php';
        ?>
    </div>
</div>

