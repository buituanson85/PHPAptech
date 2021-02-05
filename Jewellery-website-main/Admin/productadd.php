<?php include 'include/header.php';?>
<?php include 'include/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php   include '../classes/category.php'; ?>
<?php   include '../classes/product.php'; ?>
<?php
    $product = new Product();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

        $insertProduct = $product-> insert_product($_POST, $_FILES); // có hình ảnh phải có $_FILES  $_POST lấy tất cả dữ liệu
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm sản phẩm</h2>
        <div class="block">
        <?php
            if (isset($insertProduct)){
                echo $insertProduct;
            }
        ?>
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Product's name</label>
                    </td>
                    <td>
                        <input name="productName" type="text" placeholder="Enter the product name..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Product portfolio</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option>Select a product category</option>
                            <?php
                                $cat = new Category();
                                $catList = $cat->show_category ();
                                if (isset($catList)){
                                    while ($resultCat = $catList->fetch_assoc()){
                            ?>
                             <option value="<?php echo $resultCat['catId'] ?>"><?php echo $resultCat['catName'] ?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand Category</label>
                    </td>
                    <td>
                        <select id="select" name="brand">
                            <option>Choose the brand of the product</option>
                            <?php
                                $brand = new Brand();
                                $brandList = $brand->show_brand ();
                                if (isset($brandList)){
                                    while ($resultBrand = $brandList->fetch_assoc()){
                            ?>
                            <option value="<?php echo $resultBrand['brandId'] ?>"><?php echo $resultBrand['brandName'] ?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Product Description</label>
                    </td>
                    <td>
                        <textarea name="product_desc" class="tinymce"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Product price</label>
                    </td>
                    <td>
                        <input name="price" type="text" placeholder="Enter the product price..." class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Product sale</label>
                    </td>
                    <td>
                        <input name="sale" type="text" placeholder="Enter the product sale..." class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Upload Product Photo</label>
                    </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                </tr>

				<tr>
                    <td>
                        <label>Hot products</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Choose a category</option>
                            <option value="1">Highlights</option>
                            <option value="2">Not prominent</option>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Lưu" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'include/footer.php';?>


