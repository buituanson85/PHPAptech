<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php
    $cat = new Category();
    if (!isset($_GET['catid']) || $_GET['catid'] == null){
        echo "<script>window.location = 'catlist.php'</script>";
    }else{
        $catId = $_GET['catid'];
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $catName = $_POST['catName'];
        $updateCat = $cat->updates_category($catName, $catId);
    }
?>
    <div class="grid_10">
        <div class="box round first grid">
            <h2>Sửa danh mục</h2>
            <div class="block copyblock">
                <?php
                    if (isset($updateCat)){
                        echo $updateCat;
                    }
                ?>
                <?php
                    $get_cate_name = $cat->getcatsbyId ($catId);
                    if ($get_cate_name){
                        while ($result = $get_cate_name->fetch_assoc()){
                ?>
                <form action="" method="post">
                    <table class="form">
                        <tr>
                            <td>
                                <input type="text" name="catName" value="<?php echo $result['catName']?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="submit" Value="Sửa" />
                            </td>
                        </tr>
                    </table>
                </form>
                <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>
<?php include 'inc/footer.php';?>