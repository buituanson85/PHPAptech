<?php include 'include/header.php';?>
<?php include 'include/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php
    $brand = new Brand();
    if (isset($_GET['delId'])){
        $brandId = $_GET['delId'];
        $delbrand = $brand->del_brand ($brandId);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Brand list</h2>
        <div class="block">
            <?php
            if (isset($delCat)){
                echo $delCat;
            }
            ?>
            <table class="data display datatable" id="example">
                <thead>
                <tr>
                    <th>Serial No.</th>
                    <th>Brand name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $show_brand = $brand->show_brand ();
                if ($show_brand){
                    $index = 1;
                    while ($result = $show_brand->fetch_assoc()){
                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo $index++;?></td>
                            <td><?php echo $result['brandName'] ?></td>
                            <td><a href="brandedit.php?brandid=<?php echo $result['brandId']?>">Update</a> || <a onclick="return confirm('Bạn có muốn xoá danh mục này không?')" href="?delId=<?php echo $result['brandId']?>">Delete</a></td>
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

