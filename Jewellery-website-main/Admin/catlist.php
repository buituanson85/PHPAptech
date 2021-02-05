<?php include 'include/header.php';?>
<?php include 'include/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php
    $cat = new Category();
    if (isset($_GET['delId'])){
        $catId = $_GET['delId'];
        $delCat = $cat->del_category ($catId);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
                    <?php
                        $show_cat = $cat->show_category ();
                        if ($show_cat){
                        $index = 1;
                        while ($result = $show_cat->fetch_assoc()){
                    ?>
						<tr class="odd gradeX">
							<td><?php echo $index++;?></td>
							<td><?php echo $result['catName'] ?></td>
                            <td><a href="catedit.php?catid=<?php echo $result['catId']?>">Update</a> || <a onclick="return confirm('Do you want to delete this category.?')" href="?delId=<?php echo $result['catId']?>">Delete</a></td>
						</tr>
                    <?php
                            }
                        }
                    ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'include/footer.php';?>

