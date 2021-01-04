<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php   include '../classes/brand.php'; ?>

<?php
    $brand = new brand();
    if (!isset($_GET['brandId']) || $_GET['brandId'] == null){
        echo "<script>window.location = 'brandlistlist.php'</script>";
    }else{
        $brandId = $_GET['brandId'];
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $brandName = $_POST['brandName'];
        $updateBrand = $brand-> update_brand($brandName, $brandId);

    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa danh mục</h2>
        <div class="block copyblock">
            <?php
            if (isset($updateBrand)){
                echo $updateBrand;
            }
            ?>
            <?php
            $get_brand_name = $brand->getbrandbyId($brandId);
            if ($get_brand_name){
                while ($result = $get_brand_name->fetch_assoc()){
                    ?>
                    <form action="" method="post">
                        <table class="form">
                            <tr>
                                <td>
                                    <input type="text" value="<?php echo $result['brandName']?>" name="brandName" placeholder="Sửa thương hiệu sản phẩm..." class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" name="submit" Value="Edit" />
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
