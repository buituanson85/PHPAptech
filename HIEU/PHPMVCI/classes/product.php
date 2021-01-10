<?php
    $filepath = realpath (dirname (__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>

<?php
class product {
    private $db;
    private $format;
    public function __construct(){
        $this->db = new Database();
        $this->format = new Format();
    }

    //thêm danh múc sản phẩm
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

            $query = "INSERT INTO tbl_product( productName, category, brand, product_desc, type, price, image) 
                values('$productName', '$category', '$brand', '$product_desc', '$type', '$price', '$unique_image')";
            $result = $this->db->insert ($query);
            if ($result){
                $alert = "<span class='success' style='color: green'>Insert product Successfully</span>";
                return $alert;
            }else{
                $alert = "<span class='error' style='color: red'>Insert product not Successfully</span>";
                return $alert;
            }
        }
    }
    //hiển thị danh mục sản phẩm
    public function showProduct(){
        $query = "select tbl_product.*,tbl_category.catName, tbl_brand.brandName 
            from tbl_product inner join tbl_category
            on tbl_product.category = tbl_category.catId
            inner join tbl_brand
            on tbl_product.brand = tbl_brand.brandId
            order  by productId desc ";
        $result = $this->db->select ($query);
        return $result;
    }

    //updagte
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
                    $alert = "<span style='color: red'>Image Size should be less then 2MB!</span>";
                    return $alert;
                }
                elseif (in_array ($file_ext, $permited)){
//                    echo "<span class='error'>You can upload only:-".implode (', ', $permited)."</span>";
                    $alert = "<span style='color: red'>You can upload only: ".implode (', ', $permited)."</span>";
                    return $alert;
                }
                move_uploaded_file ($file_temp, $uploaded_image);
                $query = "update tbl_product set
                       productName = '$productName',
                       category    = '$category',
                       brand = '$brand',
                       product_desc = '$product_desc',
                       type = '$type',
                       price = '$price',
                       image = '$unique_image'
                where productId = '$id'";
                $result = $this->db->update ($query);
                if ($result){
                    $alert = "<span class='success' style='color: green'>Product update Successfully</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error' style='color: red'>Product update not Successfully</span>";
                    return $alert;
                }
            }else{//nếu người dùng ko chọn ảnh
                $query = "update tbl_product set
                       productName = '$productName',
                       category    = '$category',
                       brand = '$brand',
                       product_desc = '$product_desc',
                       type = '$type',
                       price = '$price'
                where productId = '$id'";
                $result = $this->db->update ($query);
                if ($result){
                    $alert = "<span class='success' style='color: green'>Product update Successfully</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error' style='color: red'>Product update not Successfully</span>";
                    return $alert;
                }
            }
        }
    }

//    //delete
    public function del_product ($id){
        $query = "delete from tbl_product where productId = '$id'";
        $result = $this->db->delete ($query);
        if ($result){
            $alert = "<span class='success' style='color: green'>product deleted Successfully</span>";
            return $alert;
        }else{
            $alert = "<span class='error' style='color: red'>product deleted not Successfully</span>";
            return $alert;
        }
    }

    //kết thúc backend.

    public function getproduct_feathered(){
        $query = "select * from tbl_product where type = '0'";
        $result = $this->db->select ($query);
        return $result;
    }

    public function getproduct_new(){
        $query = "select * from tbl_product order by productId desc LIMIT 4";
        $result = $this->db->select ($query);
        return $result;
    }

    public function get_details($id){
        $query = "select tbl_product.*,tbl_category.catName, tbl_brand.brandName 
            from tbl_product inner join tbl_category
            on tbl_product.category = tbl_category.catId
            inner join tbl_brand
            on tbl_product.brand = tbl_brand.brandId
            where tbl_product.productId = '$id'";
        $result = $this->db->select ($query);
        return $result;
    }
}


