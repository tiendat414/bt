<?php
include 'conect.php';
include 'header.php';
$list_id = array();
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $k => $v) {
        $list_id[] = $k;
    }
}
$str = implode(",", $list_id);
$sql = "SELECT * FROM book WHERE Id in ($str)";
$books = $db->GetAll($sql);
?>
<div class="container">
    <div class="table-responsive">
        <table cellspacing="0" width="100%" class="table table-hover">
            <thead>
                <tr>
                    <th>Name of Book</th>   
                    <th>Decription</th> 
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Money</th>                                             
                </tr>
            </thead>
            <div id="table">
                <tbody id="tbbd">
                    <?php if($books!=false):?>
                    <?php foreach ($books as $k): $id_ = $k['Id']; ?>                       
                        <tr>
                            <td><?php echo $k['Name_book'] ?></td>             
                            <td><?php echo $k["Decription"] ?></td>
                            <td><?php echo $k['Price'] ?></td>
                            <td><?php echo $_SESSION['cart'][$id_] ?></td>
                            <td><?php echo (int) $k['Price'] * (int) $_SESSION['cart'][$id_] ?></td>
                            <?php echo "<td><a class='btn btn-danger' href='delete_element_cart.php?id=$id_'>Delete from Cart</a></td>" ?>
                        </tr>                       
                    <?php endforeach; ?> 
                    <?php endif;?>    
                </tbody>           
            </div>
        </table>     
    </div>
     <a class="btn btn-primary" href="view_bill.php">View Bill</a>
</div>

