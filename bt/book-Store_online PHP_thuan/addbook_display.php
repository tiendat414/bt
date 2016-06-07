<?php
include 'conect.php';
include 'header.php';
$max_id = $db->GetOne("SELECT max(id) FROM book");
$id = (int) $max_id + 1;
$date_ip = date("Y/m/d");
$categories = $db->GetAssoc("SELECT id, name_kind FROM book_kind");
$authors = $db->GetAssoc("SELECT id, name_author FROM author");
$books = $db->GetAll("SELECT * FROM book");
if(!isset($_SESSION['manager'])){
    exit("<h1>No Data</h1>");
}
?>
<header>
    <script src="http://localhost/add_book.js"></script>       
</header>
<div class="panel panel-default">
    <div class="panel-body">
        <form role="form" class="form-horizontal">
            <div class="col-md-6">
                <label >ID(*)</label> <input
                    type="text" class="form-control" id='book_id' keyid='<?php echo $id; ?>' disabled="disabled" value='<?php echo $id; ?>'>
            </div>


            <div class="col-md-6">
                <label>Name:(*) </label> <input type="text" id='book_name'
                                                class="form-control" placeholder="Name..."
                                                required>
            </div>

            <div class="col-md-6">
                <label>Kind:</label> <select class="form-control" id='book_kind'>

                    <?php
                    foreach ($categories as $k => $v) {
                        echo "<option value='$v'>$v</option>";
                    }
                    ?>                               
                </select>
            </div>

            <div class="col-md-6">
                <label>Price:(*)</label> <input
                    type="number" class="form-control" id='book_price'
                    required>
            </div>

            <div class="col-md-6">
                <label>Author</label> <select class="form-control" id='author'>

                    <?php
                    foreach ($authors as $a => $b) {
                        echo "<option value='$b'>$b</option>";
                    }
                    ?>                             
                </select>
            </div>

            <div class="col-md-6">
                <label>Decription</label> <input type="text" id='decription'
                                                 placeholder="Decription..." class="form-control" >
            </div>

            <div class="col-md-6">
                <label>Total</label> <input id="total" type="number" min="0"
                                            class="form-control">
            </div>

            <div class="col-md-6">
                <label>date:</label>
                <input type="text" id='date_book' class='form-control' disabled="true" value=<?php echo $date_ip ?>>  
            </div>
        </form>
        <div class="col-md-7 pull-center">					
            <button class="btn btn-success" ><a href="addbook_display.php" style="color:white ">Reset</a> </button>
            <button class="btn btn-primary" id='add_book' ><a style="color:white ">Add</a></button>
        </div>
        <div class="table-responsive">
            <table cellspacing="0" width="100%" class="table table-hover">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>                    
                        <th>Kind</th>
                        <th>Author</th>
                        <th>Price</th>
                        <th>Decription</th> 
                        <th>Date</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $k): $id_ = $k['Id']; ?>
                        <tr>
                            <td><?php echo $k['Id'] ?></td>
                            <td><?php echo $k['Name_book'] ?></td>             
                            <td><?php echo $k["Kind"] ?></td>
                            <td><?php echo $k['Author'] ?></td>
                            <td><?php echo $k['Price'] ?></td>
                            <td><?php echo $k['Decription'] ?></td>
                            <td><?php echo $k['Date_'] ?></td>
                            <td><?php echo $k['Total'] ?></td>
                            <?php echo "<td><a class='btn btn-danger' href='delete_book.php?id=$id_'>Delete</a></td>" ?>
                            <?php echo "<td><a class='btn btn-success' href='editbook_display.php?id=$id_'>Edit</a></td>" ?>
                        </tr>
                    <?php endforeach; ?> 
                </tbody>
            </table>
            <div id="modal"></div>
        </div>
    </div>
    <div class="panel-footer">
        <?php
        include 'foodter.php';
        ?>
    </div>
</div>

