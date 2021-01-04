<?php
include_once '../lib/database.php';
include_once '../helpers/format.php';
?>

<?php
class brand {
    private $db;
    private $format;
    public function __construct(){
        $this->db = new Database();
        $this->format = new Format();
    }

    //thêm danh múc sản phẩm
    public function insert_brand($brandName){
        $brandName = $this->format->validation ($brandName);

        $brandName = mysqli_real_escape_string ($this->db->link, $brandName);

        if (empty($brandName)){ // kiểm tra người dùng có nhập hay ko
            $alert = "<span class='error' style='color: red'>Brand must be not empty</span>";
            return $alert;
        }else{ // nếu đã nhập kiểm tra tiếp trong db nếu đúng vào amin sai hiển thị ra thông báo
            $query = "INSERT INTO tbl_brand(brandName) values('$brandName')";
            $result = $this->db->insert ($query);
            if ($result){
                $alert = "<span class='success' style='color: green'>Insert brand Successfully</span>";
                return $alert;
            }else{
                $alert = "<span class='error' style='color: red'>Insert brand not Successfully</span>";
                return $alert;
            }
        }
    }
    //hiển thị danh mục sản phẩm
    public function show_brand(){
        $query = "select * from tbl_brand order  by brandId desc ";
        $result = $this->db->select ($query);
        return $result;
    }

    //updagte
    public function getbrandbyId($brandId){
        $query = "select * from tbl_brand where brandId = '$brandId'";
        $result = $this->db->select ($query);
        return $result;
    }
    public function update_brand($brandName, $brandId){
        $brandName = $this->format->validation ($brandName);

        $brandName = mysqli_real_escape_string ($this->db->link, $brandName);
        $brandId = mysqli_real_escape_string ($this->db->link, $brandId);

        if (empty($brandName)){ // kiểm tra người dùng có nhập hay ko
            $alert = "<span class='error' style='color: red'>Brand must be not empty</span>";
            return $alert;
        }else{ // nếu đã nhập kiểm tra tiếp trong db nếu đúng vào amin sai hiển thị ra thông báo
            $query = "update tbl_brand set brandName = '$brandName' where brandId = '$brandId'";
            $result = $this->db->update ($query);
            if ($result){
                $alert = "<span class='success' style='color: green'>Brand update Successfully</span>";
                return $alert;
            }else{
                $alert = "<span class='error' style='color: red'>Brand update not Successfully</span>";
                return $alert;
            }
        }
    }

    //delete
    public function del_brand ($brandId){
        $query = "delete from tbl_brand where brandId = '$brandId'";
        $result = $this->db->delete ($query);
        if ($result){
            $alert = "<span class='success' style='color: green'>Brand deleted Successfully</span>";
            return $alert;
        }else{
            $alert = "<span class='error' style='color: red'>Brand deleted not Successfully</span>";
            return $alert;
        }
    }
}

