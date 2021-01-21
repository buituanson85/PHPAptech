<?php
    $filepath = realpath (dirname (__FILE__));
    include_once ($filepath.'/../libs/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php
    class Brand{
        private $db;
        private $fm;
        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insert_brand($brandName){
            $brandName = $this->fm->validation ($brandName);

            $brandName = mysqli_real_escape_string ($this->db->link, $brandName);

            if (empty($brandName)){
                $alert = "<span style='color: red'>Chưa nhập tên danh mục</span>";
                return $alert;
            }else{
                $query = "insert into tbl_brand( brandName) values ( '$brandName')";
                $result = $this->db->insert ($query);
                if ($result){
                    $alert = "<span class='success'>Thêm danh mục thành công</span>";
                    return $alert;
                }else{
                    $alert = "<span style='color: red'>Thêm danh mục không thành công</span>";
                    return $alert;
                }
            }
        }

        public function show_brand(){
            $query = "select * from tbl_brand order by brandId desc";
            $result = $this->db->select ($query);
            return $result;
        }

        public function getbrandbyId($brandId){
            $query = "select * from tbl_brand where brandId = '$brandId'";
            $result = $this->db->select ($query);
            return $result;
        }

        public function updates_brand($brandName, $brandId){
            $brandName = $this->fm->validation ($brandName);
            $brandName = mysqli_real_escape_string ($this->db->link, $brandName);
            $brandId = mysqli_real_escape_string ($this->db->link, $brandId);

            if (empty($brandName)){
                $alert = "<span style='color: red'>Chưa nhập tên danh mục</span>";
                return $alert;
            }else{
                $query = "update tbl_brand set brandName = '$brandName' where brandId = '$brandId'";
                $result = $this->db->update ($query);
                if ($result){
                    $alert = "<span class='success'>Sửa danh mục thành công</span>";
                    return $alert;
                }else{
                    $alert = "<span style='color: red'>Sửa danh mục không thành công</span>";
                    return $alert;
                }
            }
        }

        public function del_brand ($brandId){
            $query = "delete from tbl_brand where brandId = '$brandId'";
            $result = $this->db->delete ($query);
            if ($result){
                $alert = "<span class='success'>Xoá danh mục thành công</span>";
                return $alert;
            }else{
                $alert = "<span style='color: red'>Xoá danh mục không thành công</span>";
                return $alert;
            }
        }
    }
?>
