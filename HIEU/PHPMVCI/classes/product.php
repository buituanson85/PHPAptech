<?php
    include_once '../lib/database.php';
    include_once '../helpers/format.php';
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
//    //hiển thị danh mục sản phẩm
//    public function show_brand(){
//        $query = "select * from tbl_brand order  by brandId desc ";
//        $result = $this->db->select ($query);
//        return $result;
//    }
//
//    //updagte
//    public function getbrandbyId($brandId){
//        $query = "select * from tbl_brand where brandId = '$brandId'";
//        $result = $this->db->select ($query);
//        return $result;
//    }
//    public function update_brand($brandName, $brandId){
//        $brandName = $this->format->validation ($brandName);
//
//        $brandName = mysqli_real_escape_string ($this->db->link, $brandName);
//        $brandId = mysqli_real_escape_string ($this->db->link, $brandId);
//
//        if (empty($brandName)){ // kiểm tra người dùng có nhập hay ko
//            $alert = "<span class='error' style='color: red'>Brand must be not empty</span>";
//            return $alert;
//        }else{ // nếu đã nhập kiểm tra tiếp trong db nếu đúng vào amin sai hiển thị ra thông báo
//            $query = "update tbl_brand set brandName = '$brandName' where brandId = '$brandId'";
//            $result = $this->db->update ($query);
//            if ($result){
//                $alert = "<span class='success' style='color: green'>Brand update Successfully</span>";
//                return $alert;
//            }else{
//                $alert = "<span class='error' style='color: red'>Brand update not Successfully</span>";
//                return $alert;
//            }
//        }
//    }
//
//    //delete
//    public function del_brand ($brandId){
//        $query = "delete from tbl_brand where brandId = '$brandId'";
//        $result = $this->db->delete ($query);
//        if ($result){
//            $alert = "<span class='success' style='color: green'>Brand deleted Successfully</span>";
//            return $alert;
//        }else{
//            $alert = "<span class='error' style='color: red'>Brand deleted not Successfully</span>";
//            return $alert;
//        }
//    }
}


