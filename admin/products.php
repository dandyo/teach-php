<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once('../db.php');
require_once('header.php');
?>
	<section class="py-5">
		<div class="container-xl">
			<div class="d-flex align-items-center">
				<h1>Products</h1>
				<a href="add.php" class="btn btn-primary ms-3">Add</a>
			</div>
			
			<?php
            $sql = "SELECT * FROM products ORDER BY price ASC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) { ?>
            	<table class="table">
            		<thead>
            			<tr>
            				<th>Name</th>
            				<th>Price</th>
            				<th></th>
            			</tr>
            		</thead>
                <?php
                while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                    	<td><?php echo $row['name']; ?></td>
                    	<td><?php echo $row['price']; ?></td>
                    	<td>
                        	<a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> 
                        	<a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
	                    </td>
                    </tr>
            <?php } ?>
            	</table>
            <?php } else {
                echo "0 results";
            	}
            	$conn->close();
            ?>
			
		</div>
	</section>
<?php

require_once('footer.php');