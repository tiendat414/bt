<?php
include 'conect.php';
include 'header.php';
$books_list = array();
foreach ($_SESSION['cart'] as $k => $v) {
    $books_list[] = $k;
}
$str = implode(",", $books_list);
$sql = "SELECT * FROM book WHERE Id in ($str)";
$books = $db->Execute($sql);
?>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="container">
            <div class="table-responsive">
                <table cellspacing="0" width="100%" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name of Book</th>   
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Money</th>                                             
                        </tr>
                    </thead>
                    <div id="table">
                        <tbody id="tbbd">
                            <?php if (isset($_SESSION['cart'])): $sum_book = 0;
                                $sum_money = 0; ?>
                                <?php
                                foreach ($books as $k):
                                    $id=$k['Id'];      
                                    $sum_book+=(int) $_SESSION['cart'][$id];
                                    $Moneys = (int) $k['Price'] * (int) $_SESSION['cart'][$id];
                                    $sum_money+=$Moneys;
                                    ?>  
                                    <tr>
                                        <td><?php echo $k['Name_book'] ?></td>             
                                        <td><?php echo $k['Price'] ?></td>
                                        <td><?php echo $_SESSION['cart'][$id] ?></td>
                                        <td><?php echo $Moneys ?></td>                         
                                    </tr>                       
                                <?php endforeach; ?> 
                            <?php endif; ?>
                        </tbody>           
                    </div>
                </table>     
            </div>
    <form class="form-inline">
        <label>Total Books:</label><input type="text" value="<?php echo $sum_book ?>" disabled="true" class="form-control">
        <label>Sum Money:</label><input type="text" value="<?php echo $sum_money ?>" disabled="true" class="form-control">
        <label class="btn btn-primary"><a href="" style="color: white">Pay</a></label>
    </form>
</div>
    </div>
    <div class="panel-footer">
        <?php include 'foodter.php';?>
    </div>
</div>



