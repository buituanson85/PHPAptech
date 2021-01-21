<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
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
                        <label>Tên sản phẩm</label>
                    </td>
                    <td>
                        <input name="productName" type="text" placeholder="Nhập tên sản phẩm..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Danh mục sản phẩm</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option>Chọn danh mục sản phẩm</option>
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
                        <label>Thương hiệu</label>
                    </td>
                    <td>
                        <select id="select" name="brand">
                            <option>Chọn thương hiệu sản phẩm</option>
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
                        <label>Mô tả sản phẩm</label>
                    </td>
                    <td>
                        <textarea name="product_desc" class="tinymce"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Giá sản phẩm</label>
                    </td>
                    <td>
                        <input name="price" type="text" placeholder="Nhập giá sản phẩm..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Ảnh sản phẩm</label>
                    </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Sản phẩm nổi bật</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Chọn loại</option>
                            <option value="1">Nổi bật</option>
                            <option value="2">Không nổi bật</option>
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
<?php include 'inc/footer.php';?>


