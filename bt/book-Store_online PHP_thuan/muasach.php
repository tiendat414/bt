<?php
include 'conect.php';
include 'header.php';
if (isset($_GET['id'])) {
    $id_book = $_GET['id'];
    $sql = "select Name_book,Price from book where id=" . $id_book;
    $recordSet = $db->GetRow($sql);
    $name = $recordSet['Name_book'];
    $price = $recordSet['Price'];
}
?>
<header>
    <script src="http://localhost/purchase.js"></script>
</header>
<form role="form" class="form-inline">
    <label for="book_name">Tên Đầu Sách:</label> 
    <input class="form-control" id="book_name" keyid="<?php echo $id_book ?>" type="text" value="<?php echo $name; ?>" disabled="true">
    
    <label>Price </label>
    <input type="text" min="0" class="form-control" value="<?php echo $price; ?>" disabled="true">
    
    <label>Nhập Số Lượng: </label> <input type="number"class="form-control" id="total" name="quantity"required min="0">           
    <a class="btn btn-primary" id="purchase">Mua</a> 
</form>

<?php
include 'foodter.php';

