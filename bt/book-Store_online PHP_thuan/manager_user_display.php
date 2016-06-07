<?php
include 'conect.php';
include 'header.php';
$sql="SELECT * FROM member";
$users=$db->GetAll($sql);
?>
<header>
    <script src="http://localhost/search.js"></script>
</header>
<div class="panel-default">
    <div class="panel-body">
        <div class="container" >
            <form role="form" class="form-inline">
                <div class="form-group">                
                    <input class="form-control" id="name" type="text" required placeholder="Put in Name or ID...">			
                    <label>User Type:</label>			
                    <select class="form-control" id="type">
                        <option value="All">--All--</option>
                        <option value="Personal">Personal</option>                               
                        <option value="Organization">Organization</option>                               
                    </select>
                    <label>SDT:</label>				
                    <input type="tel" class="form-control" id="phone">
                    <label id="search" class="btn btn-info" ><i class="glyphicon glyphicon-search" ></i> Search </label>	              
                </div>
            </form>
            <div class="table-responsive">
            <table cellspacing="0" width="100%" class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>                    
                        <th>User Name</th>
                        <th>Pass</th>
                        <th>User Type</th>
                        <th>Email</th> 
                        <th>Phone</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <div id="table">
                    <tbody id="tbbd">
                    <?php foreach ($users as $k): $id_ = $k['Id']; ?>
                        <tr>
                            <td><?php echo $k['Id'] ?></td>
                            <td><?php echo $k['Name_mem'] ?></td>             
                            <td><?php echo $k["User_name"] ?></td>
                            <td><?php echo $k['Pass'] ?></td>
                            <td><?php echo $k['User_type'] ?></td>
                            <td><?php echo $k['Email'] ?></td>
                            <td><?php echo $k['Phone'] ?></td>
                            <td><?php echo $k['Address'] ?></td>
                            <?php echo "<td><a class='btn btn-danger' href='delete_user.php?id=$id_'>Delete</a></td>" ?>
                            <?php echo "<td><a class='btn btn-success' href='edit_user_display.php?id=$id_'>Edit</a></td>" ?>
                        </tr>
                    <?php endforeach; ?> 
                </tbody>
                </div>
            </table>
        </div>
        </div>
    </div>
    <div class="panel-footer">
        <?php include 'foodter.php';?>
    </div>
</div>