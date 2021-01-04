<?php
    include_once '../lib/database.php';
    include_once '../helpers/format.php';
?>

<?php
class category {
    private $dbc;
    private $formatc;
    public function __construct(){
        $this->dbc = new Database();
        $this->formatc = new Format();
    }

    //thêm danh múc sản phẩm
    public function insert_category($catName){
        $catName = $this->formatc->validation ($catName);

        $catName = mysqli_real_escape_string ($this->dbc->link, $catName);

        if (empty($catName)){ // kiểm tra người dùng có nhập hay ko
            $alert = "<span class='error' style='color: red'>Category must be not empty</span>";
            return $alert;
        }else{ // nếu đã nhập kiểm tra tiếp trong db nếu đúng vào amin sai hiển thị ra thông báo
            $query = "INSERT INTO tbl_category(catName) values('$catName')";
            $result = $this->dbc->insert ($query);
            if ($result){
                $alert = "<span class='success' style='color: green'>Insert Category Successfully</span>";
                return $alert;
            }else{
                $alert = "<span class='error' style='color: red'>Insert Category not Successfully</span>";
                return $alert;
            }
        }
    }
    //hiển thị danh mục sản phẩm
    public function show_category(){
        $query = "select * from tbl_category order  by catId desc ";
        $result = $this->dbc->select ($query);
        return $result;
    }

    //updagte
    public function getcatbyId($catId){
        $query = "select * from tbl_category where catId = '$catId'";
        $result = $this->dbc->select ($query);
        return $result;
    }
    public function update_category($catName, $catId){
        $catName = $this->formatc->validation ($catName);

        $catName = mysqli_real_escape_string ($this->dbc->link, $catName);
        $catId = mysqli_real_escape_string ($this->dbc->link, $catId);

        if (empty($catName)){ // kiểm tra người dùng có nhập hay ko
            $alert = "<span class='error' style='color: red'>Category must be not empty</span>";
            return $alert;
        }else{ // nếu đã nhập kiểm tra tiếp trong db nếu đúng vào amin sai hiển thị ra thông báo
            $query = "update tbl_category set catName = '$catName' where catId = '$catId'";
            $result = $this->dbc->update ($query);
            if ($result){
                $alert = "<span class='success' style='color: green'>Category update Successfully</span>";
                return $alert;
            }else{
                $alert = "<span class='error' style='color: red'>Category update not Successfully</span>";
                return $alert;
            }
        }
    }

    //delete
    public function del_category ($catId){
        $query = "delete from tbl_category where catId = '$catId'";
        $result = $this->dbc->delete ($query);
        if ($result){
            $alert = "<span class='success' style='color: green'>Category deleted Successfully</span>";
            return $alert;
        }else{
            $alert = "<span class='error' style='color: red'>Category deleted not Successfully</span>";
            return $alert;
        }
    }
}

