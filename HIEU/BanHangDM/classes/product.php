<?php
    $filepath = realpath (dirname (__FILE__));
    include_once ($filepath.'/../libs/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>

<?php
    class Product{
        private $db;
        private $fm;
        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insert_product($data, $files){
            $productName = mysqli_real_escape_string ($this->db->link, $data['productName']);
            $category = mysqli_real_escape_string ($this->db->link, $data['category']);
            $brand = mysqli_real_escape_string ($this->db->link, $data['brand']);
            $product_desc = mysqli_real_escape_string ($this->db->link, $data['product_desc']);
            $type = mysqli_real_escape_string ($this->db->link, $data['type']);
            $price = mysqli_real_escape_string ($this->db->link, $data['price']);

            //kiểm tra hình ảnh và lấy hình ảnh cho vào foder uploads
            $permited = array ('ipg', 'ipeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode ('.', $file_name);
            $file_ext = strtolower (end ($div));
            $unique_image = substr (md5(time ()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

            if ($productName == "" || $category == "" || $brand == ""|| $product_desc == "" || $price == "" || $type == ""|| $file_name == "" ){ // kiểm tra người dùng có nhập hay ko
                $alert = "<span class='error' style='color: red'>Fiels must be not empty</span>";
                return $alert;
            }else{ // nếu đã nhập kiểm tra tiếp trong db nếu đúng vào amin sai hiển thị ra thông báo
                move_uploaded_file ($file_temp, $uploaded_image);

                $query = "INSERT INTO tbl_product( productName, catID, brandId, product_desc, type, price, image) 
                values('$productName', '$category', '$brand', '$product_desc', '$type', '$price', '$unique_image')";
                $result = $this->db->insert ($query);
                if ($result){
                    $alert = "<span class='success'>Thêm sản phẩm thành công</span>";
                    return $alert;
                }else{
                    $alert = "<span style='color: red'>Thêm sản phẩm không thành công</span>";
                    return $alert;
                }
            }
        }

        public function show_product(){
            $query = "select tbl_product.*,tbl_category.catName, tbl_brand.brandName 
            from tbl_product inner join tbl_category
            on tbl_product.catId = tbl_category.catId
            inner join tbl_brand
            on tbl_product.brandId = tbl_brand.brandId
            order  by productId desc ";
            $result = $this->db->select ($query);
            return $result;
        }

        public function getProductbyId($productId){
            $query = "select * from tbl_product where productId = '$productId'";
            $result = $this->db->select ($query);
            return $result;
        }

        public function update_product($data, $files, $id){
            $productName = mysqli_real_escape_string ($this->db->link, $data['productName']);
            $category = mysqli_real_escape_string ($this->db->link, $data['category']);
            $brand = mysqli_real_escape_string ($this->db->link, $data['brand']);
            $product_desc = mysqli_real_escape_string ($this->db->link, $data['product_desc']);
            $type = mysqli_real_escape_string ($this->db->link, $data['type']);
            $price = mysqli_real_escape_string ($this->db->link, $data['price']);

            //kiểm tra hình ảnh và lấy hình ảnh cho vào foder uploads
            $permited = array ('ipg', 'ipeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode ('.', $file_name);
            $file_ext = strtolower (end ($div));
            $unique_image = substr (md5(time ()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

            if ($productName == "" || $category == "" || $brand == ""|| $product_desc == "" || $price == "" || $type == ""){ // kiểm tra người dùng có nhập hay ko
                $alert = "<span class='error' style='color: red'>Fiels must be not empty</span>";
                return $alert;
            }else{
                if (!empty($file_name)){//nếu người dùng chọn ảnh
                    if ($file_size > 1000000){
                        $alert = "<span style='color: red'>Size ảnh không lớn hơn 2MB!</span>";
                        return $alert;
                    }
                    elseif (in_array ($file_ext, $permited)){
//                    echo "<span class='error'>You can uploads only:-".implode (', ', $permited)."</span>";
                        $alert = "<span style='color: red'>Bạn phải uploat ảnh với đuôi: ".implode (', ', $permited)."</span>";
                        return $alert;
                    }
                    move_uploaded_file ($file_temp, $uploaded_image);
                    $query = "update tbl_product set
                       productName = '$productName',
                       catId    = '$category',
                       brandId = '$brand',
                       product_desc = '$product_desc',
                       type = '$type',
                       price = '$price',
                       image = '$unique_image'
                where productId = '$id'";
                    $result = $this->db->update ($query);
                    if ($result){
                        $alert = "<span class='success' style='color: green'>Cập nhật thành công</span>";
                        return $alert;
                    }else{
                        $alert = "<span style='color: red'>Cập nhật không thành công</span>";
                        return $alert;
                    }
                }else{//nếu người dùng ko chọn ảnh
                    $query = "update tbl_product set
                       productName = '$productName',
                       catId    = '$category',
                       brandId = '$brand',
                       product_desc = '$product_desc',
                       type = '$type',
                       price = '$price'
                where productId = '$id'";
                    $result = $this->db->update ($query);
                    if ($result){
                        $alert = "<span class='success' style='color: green'>Cập nhật thành công</span>";
                        return $alert;
                    }else{
                        $alert = "<span style='color: red'>Cập nhật không thành công</span>";
                        return $alert;
                    }
                }
            }
        }

        public function del_product ($id){
            $query = "delete from tbl_product where productId = '$id'";
            $result = $this->db->delete ($query);
            if ($result){
                $alert = "<span class='success' style='color: green'>Xoá sản phẩm thành công</span>";
                return $alert;
            }else{
                $alert = "<span style='color: red'>Xoá sản phẩm không thành công</span>";
                return $alert;
            }
        }

        // kết thúc back end.

        public function get_product_feature(){
            $query = "select * from tbl_product where type = '1' LIMIT 4";
            $result = $this->db->select ($query);
            return $result;
        }

        public function get_product_new(){
            $query = "select * from tbl_product where type = '1' order by productId desc LIMIT 4";
            $result = $this->db->select ($query);
            return $result;
        }

        public function get_details($id){
            $query = "select tbl_product.*,tbl_category.catName, tbl_brand.brandName 
            from tbl_product inner join tbl_category
            on tbl_product.catId = tbl_category.catId
            inner join tbl_brand
            on tbl_product.brandId = tbl_brand.brandId
            where tbl_product.productId = '$id'";
            $result = $this->db->select ($query);
            return $result;
        }
    }
?>
