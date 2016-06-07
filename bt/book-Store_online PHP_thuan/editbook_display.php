<?php
include 'conect.php';
include 'header.php';
$id = $_GET['id'];
$sql = "SELECT * FROM book WHERE id=" . $id;
$kinds = $db->GetAll('SELECT Name_kind FROM book_kind');
$authors = $db->GetAll('SELECT Name_author FROM author');
$result = $db->GetRow($sql);
$kind = $result['Kind'];
$author = $result['Author'];
$total = $result['Total'];
$price = $result['Price'];
?>
<header>
    <script src="http://localhost/edit_book.js"></script> 
</header>
<div class="panel-default">
    <div class="panel-body">
        <form role="form" class="form-horizontal">
            <div class="col-md-6">
                <label >ID(*)</label> <input
                    type="text" class="form-control" id='book_id' keyid='<?php echo $result['Id']; ?>' disabled="disabled" value='<?php echo $id; ?>'>
            </div>


            <div class="col-md-6">
                <label>Name:(*) </label> <input type="text" id='book_name' value="<?php echo $result['Name_book'] ?>"
                                                class="form-control" placeholder="Name..."
                                                required>
            </div>

            <div class="col-md-6">
                <label>Kind:</label> <select class="form-control" id='book_kind'>                   
                    <?php
                    echo "<option value='$kind'>$kind</option>";
                    foreach ($kinds as $k) {
                        $value = $k['Name_kind'];
                        if ($v != $kind) {
                            echo "<option value='$value'>$value</option>";
                        }
                    }
                    ?>                               
                </select>
            </div>
            <div class="col-md-6">
                <label>Price:(*)</label> <input
                    type="number" class="form-control" id='book_price' value="<?php echo $price ?>"
                    required>
            </div>

            <div class="col-md-6">
                <label>Author</label> <select class="form-control" id='author'>
                    <?php
                    echo "<option value='$author'>$author</option>";
                    foreach ($authors as $a) {
                        $value = $a['Name_author'];
                        if ($value != $author) {
                            echo "<option value='$value'>$value</option>";
                        }
                    }
                    ?>                             
                </select>
            </div>
            <div class="col-md-6">
                <label>Decription</label> <input type="text" id='decription'
                                                 placeholder="Decription..." class="form-control" >
            </div>

            <div class="col-md-6">
                <label>Total</label> <input id="total" type="number" min="0" value="<?php echo $total ?>"
                                            class="form-control">
            </div>
            <div class="col-md-6">
                <label>date:</label>
                <input type="text" id='date_book' class='form-control' disabled="true" value=<?php echo $result['Date_'] ?>>  
            </div>
        </form>
        <div class="col-md-7 pull-center">					
            <button class="btn btn-success" ><a href="addbook_display.php" style="color:white ">Back</a> </button>
            <button class="btn btn-primary" id='edit' ><a style="color:white " >Edit</a></button>
        </div>
    </div>
    <?php include 'foodter.php'; ?>
