<?php
include 'conect.php';
require 'header.php';
$categories = $db->GetAssoc("SELECT id, name_kind FROM book_kind");
$authors = $db->GetAssoc("SELECT id, name_author FROM author");
$books = $db->GetAll("SELECT * FROM book");
?><header>
    <script src="http://localhost/home.js"></script> 
</header>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="container" >
            <form role="form" class="form-inline">
                <div class="form-group">                
                    <input class="form-control" type="text" id="name" required placeholder="Put in Name of book:">			
                    <label>Kind:</label>			
                    <select class="form-control" id="kind">
                        <option value="All">--All--</option>
                        <?php
                        foreach ($categories as $k => $v) {
                            echo "<option value='$v'>$v</option>";
                        }
                        ?>                               
                    </select>
                    <label>Author:</label>				
                    <select class="form-control" id="author">
                        <option value="All">--All--</option>
                        <?php
                        foreach ($authors as $a => $b) {
                            echo "<option value='$b'>$b</option>";
                        }
                        ?>                             
                    </select>
                    <label id="search" class="btn btn-info" ><i class="glyphicon glyphicon-search" ></i> Search </label>	               
                </div>
            </form>
            <div class="table-responsive">
                <table cellspacing="0" width="100%" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Author</th>
                            <th>Price</th>
                            <th>Kind</th>
                            <th>Decription</th>      
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($books as $k):$id = $k['Id']; ?>
                            <tr>
                                <td><?php echo $k['Name_book'] ?></td>
                                <td><?php echo $k['Author'] ?></td>
                                <td><?php echo $k['Price'] ?></td>
                                <td><?php echo $k["Kind"] ?></td>
                                <td><?php echo $k['Decription'] ?></td>
                                <?php echo "<td><a class='btn btn-success' href='muasach.php?id=$id'>Mua</a></td>" ?>
                            </tr>
                        <?php endforeach; ?> 
                    </tbody>
                </table>
                <div id="modal"></div>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <?php include 'foodter.php'; ?>
    </div>
</div>

