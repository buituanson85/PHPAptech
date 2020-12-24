<?php
require_once ('../../DBConnection/dbhelper.php');

$id = $title = $price = $thumbnail = $content = $id_category = '';
if (!empty($_POST)){
    if (isset($_POST['title'])){
        $title = $_POST['title'];
        $title = str_replace ('"', '\\"', $title);
    }
    if (isset($_POST['price'])){
        $price = $_POST['price'];
        $price = str_replace ('"', '\\"', $price);
    }
    if (isset($_POST['thumbnail'])){
        $thumbnail = $_POST['thumbnail'];
        $thumbnail = str_replace ('"', '\\"', $thumbnail);
    }
    if (isset($_POST['content'])){
        $content = $_POST['content'];
    }
    if (isset($_POST['id_category'])){
        $id_category = $_POST['id_category'];
    }
    $created_at = $updated_at = date ('Y-m-d H:s:i');
    $sql = 'insert into product( title, price, thumbnail, content, id_category, created_at, updated_at)
            values ( "'.$title.'", "'.$price.'", "'.$thumbnail.'", "'.$content.'", 
                "'.$id_category.'", "'.$created_at.'", "'.$updated_at.'")';
    execute ($sql);
    header ('Location: index.php');
    die();

}

?>
<!doctype html>
<html lang="en">
<head>
    <title>Thêm/Sửa sản phẩm</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--    Css-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!--    Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--    Js-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!--    Popper-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>
<body>
<div class="container-fluid">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="../category/">Quản lý danh mục</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php">Quản lý sản phẩm</a>
        </li>
        </li>
    </ul>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading" style="padding: 30px 0">
                <h2 style="text-align: center">Thêm/Sửa sản phẩm</h2>
            </div>
            <div class="panel-body">
                <form method="post">
                    <div class="form-group">
                        <label for="title">Tên sản phẩm:</label>
                        <input required="true" type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="id_category">Danh mục sản phẩm: </label>
                        <select class="form-control" name="id_category" id="id_category">
                            <option>-- Lựa chọn danh mục --</option>
                            <?php
                            $sql = 'select * from category';
                            $categoryList = executeResult ($sql);
                            foreach ($categoryList as $item){
                                if ($item['id'] == $id_category){ //update
                                    echo '<option selected value="'.$item['id'].'">'.$item['name'].'</option>';
                                }else{
                                    echo '<option value="'.$item['id'].'">'.$item['name'].'</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Giá sản phẩm:</label>
                        <input required="true" type="number" class="form-control" id="price" name="price" >
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Ảnh sản phẩm:</label>
                        <input required="true" type="text" class="form-control" id="thumbnail" name="thumbnail" onchange="updateThumbnail()">
                        <img src="<?=$thumbnail?>" style="max-width: 200px" id="img_thumbnail">
                    </div>
                    <div class="form-group">
                        <label for="content">Bài viết:</label>
                        <textarea class="form-control" rows="5" name="content" id="content" ></textarea>
                    </div>
                    <button class="btn btn-success">Lưu</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function updateThumbnail() {
        $('#img_thumbnail').attr('src', $('#thumbnail').val());
    }
    //đợi website load song nội dung ==> xử lý js
    $(function () {
        $('#content').summernote({
            placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    })
</script>
</body>
</html>

