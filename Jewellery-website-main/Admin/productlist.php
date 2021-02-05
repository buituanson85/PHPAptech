<?php include 'include/header.php';?>
<?php include 'include/sidebar.php';?>

<?php include '../classes/brand.php';?>
<?php   include '../classes/category.php'; ?>
<?php   include '../classes/product.php'; ?>
<?php   include_once '../helpers/format.php'; ?>
<?php
    $pd = new product();
    $fm = new Format();//gọi fomat desc
    if (isset($_GET['productId'])){
        $id = $_GET['productId'];
        $delPro = $pd->del_product($id);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">
            <?php
                if (isset($delPro)){
                    echo $delPro;
                }
            ?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
                    <th>Serial No.</th>
                    <th>Product's name</th>
                    <th>Price</th>
                    <th>Sale</th>
                    <th>Image</th>
                    <th>Product portfolio</th>
                    <th>Product brands</th>
                    <th>Describe</th>
                    <th>Species</th>
                    <th>Action</th>
				</tr>
			</thead>
			<tbody>
            <?php
                $pdList = $pd->show_product();
                if ($pdList){
                $i = 0;
                while ($result = $pdList->fetch_assoc()){
                $i++;
            ?>
				<tr class="odd gradeX">
                    <td><?php echo $i ?></td>
                    <td><?php echo $result['productName']?></td>
                    <td><?php echo $result['price']?></td>
                    <td><?php echo $result['sale']?></td>
                    <td><img src="uploads/<?php echo $result['image']?>" style="max-width: 50px;"></td>
                    <td><?php echo $result['catName']?></td>
                    <td><?php echo $result['brandName']?></td>
                    <td><?php echo $fm->textShorten ($result['product_desc'], 50) ?></td>
                    <!--                    chỉ hiển thị 50 ký tự-->
                    <td>
                        <?php
                        if ($result['type'] == 1){
                            echo 'Featherd';
                        }else{
                            echo 'No-Featherd';
                        }
                        ?>
                    </td>
                    <td><a href="productEdit.php?productId=<?php echo $result['productId']?>">Edit</a> || <a onclick="return confirm('Bạn có muốn xoá sản phẩm này?')" href="?productId=<?php echo $result['productId']?>">Delete</a></td>
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
