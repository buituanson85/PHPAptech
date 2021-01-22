<?php
    $filepath = realpath (dirname (__FILE__));
    include_once ($filepath.'/../libs/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php
    class Cart{
        private $db;
        private $fm;
        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function add_to_cart($id, $quantity){
            $quantity = $this->fm->validation ($quantity);

            $quantity = mysqli_real_escape_string ($this->db->link, $quantity);
            $id = mysqli_real_escape_string ($this->db->link, $id);
            $sId = session_id ();

            $query = "SELECT * FROM tbl_product WHERE productId = '$id'";
            $result = $this->db->select ($query)->fetch_assoc();

            $image = $result['image'];
            $price = $result['price'];
            $productName = $result['productName'];

            $check_cart = "SELECT * FROM tbl_cart WHERE productId = '$id' AND sId = '$sId'";
            $result_check_cart = $this->db->select ($check_cart);
            if ($result_check_cart){
                $msg = "Sản phẩm này đã được thêm vào giỏ hàng";
                return $msg;
            }else{
                $query_insert = "INSERT INTO tbl_cart( productId, productName, quantity, sId, price, image) VALUES( '$id', '$productName', '$quantity', '$sId', '$price', '$image' ) ";
                $insert_cart = $this->db->insert ($query_insert);
                if ($result){
                    header ('Location:cart.php');
                }else{
                    header ('Location:404.php');
                }
            }
        }

        public  function get_product_cart(){
            $sId = session_id ();
            $query = "SELECT * FROM tbl_cart WHERE sId = '$sId' order by cartId desc ";
            $result = $this->db->select ($query);
            return $result;
        }

        public function update_quantity_cart ($cartId, $quantity){
            $quantity = mysqli_real_escape_string ($this->db->link, $quantity);
            $cartId = mysqli_real_escape_string ($this->db->link, $cartId);
            $query = "update tbl_cart set quantity = '$quantity' where cartId = '$cartId'";
            $result = $this->db->update ($query);
            if ($result){
                header ('Location: cart.php');
            }else{
                $msg = "<span style='color: red'>update không thành công</span>";
                return $msg;
            }
        }

        public function del_product_cart ($cartId){
            $cartId = mysqli_real_escape_string ($this->db->link, $cartId);
            $query = "delete from tbl_cart where cartId = '$cartId'";
            $result = $this->db->delete ($query);
            if ($result){
                header ('Location: cart.php');
            }else{
                $msg = "<span style='color: red'>Xoá không thành công</span>";
                return $msg;
            }
        }

        public function get_check_cart(){
            $sId = session_id ();
            $query = "SELECT * FROM tbl_cart WHERE sId = '$sId' order by cartId desc ";
            $result = $this->db->select ($query);
            return $result;
        }

        public function dell_all_data_cart(){
            $sId = session_id ();
            $query = "delete FROM tbl_cart WHERE sId = '$sId' ";
            $result = $this->db->delete ($query);
            return $result;
        }
    }
?>
