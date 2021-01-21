<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
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
                <h2>Danh sách danh mục</h2>
                <div class="block">
                    <?php
                        if (isset($delCat)){
                            echo $delCat;
                        }
                    ?>
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên danh mục</th>
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
							<td><a href="catedit.php?catid=<?php echo $result['catId']?>">Sửa</a> || <a onclick="return confirm('Bạn có muốn xoá danh mục này không?')" href="?delId=<?php echo $result['catId']?>">Xoá</a></td>
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
<?php include 'inc/footer.php';?>

