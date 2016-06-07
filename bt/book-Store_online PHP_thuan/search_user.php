<?php
include 'conect.php';
include 'header.php';
$search = $_GET['id'];
$type = $_GET['type'];
$phone = $_GET['phone'];
//$search=1;      /// Data test
//$phone="";
//$type="";

$sql = "SELECT * FROM member where";
$params = array();
if (isset($search)){
    if($search!=""){
        $sql .="(Id=? OR Name_mem LIKE ?)";  
        $params[]= $search; 
        $params[]="%".$search."%"; 
    }
    if($phone){
        $sql .=" AND Phone=?";
        $params[]= $phone;
    }
    if($type!="All"){
      $sql .=" AND User_type=?";  
      $params[]= $type;
    }
}
$result_rt = $db->GetAll($sql,$params);
?>
<div class="container">
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
                <?php if ($result_rt!=false): ?>             
                <?php foreach ($result_rt as $k): $id_ = $k['Id']; ?>
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
                <?php endif; ?> 
            </tbody>
        </div>
    </table>
</div>
</div>
<?php
include 'foodter.php';
?>
