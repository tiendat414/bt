<?php
include 'conect.php';
include 'header.php';
$search=$_GET['id'];
$kind=$_GET['kind'];
$author=$_GET['author'];
$sql="SELECT * FROM book WHERE";
$param=array();

if($search!=""){
    $sql .= " Name_book LIKE ?";
    $param[] = "%".$search."%";
    if($author!="All"){
        $sql.= " AND Author=?";
        $param[]=$author;
     }
    if($kind!="All"){
       $sql.=" AND Kind=?";
       $param[]=$kind;
    }  
}
$books=$db->GetAll($sql,$param);
?>
<div class="container">
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
                <?php if($books!=false): ?>
               <?php foreach($books as $k):$id=$k['Id']; ?>
                <tr>
                    <td><?php echo $k['Name_book'] ?></td>
                    <td><?php echo $k['Author'] ?></td>
                    <td><?php echo $k['Price']?></td>
                    <td><?php echo $k["Kind"]?></td>
                    <td><?php echo $k['Decription']?></td>
                    <?php echo "<td><a class='btn btn-success' href='muasach.php?id=$id'>Mua</a></td>"?>
                </tr>
                <?php endforeach; ?> 
                <?php endif; ?>
            </tbody>
        </table>
        <div id="modal"></div>
    </div>
</div>

