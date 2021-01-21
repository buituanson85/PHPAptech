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

        public function add_to_cart($quantity, $id){
            $quantity = $this->fm->validation ($quantity);

            $quantity = mysqli_real_escape_string ($this->db->link, $quantity);
            $id = mysqli_real_escape_string ($this->db->link, $id);
            $sId = session_id ();

            $query = "SELECT * FROM tbl_product WHERE productId = '$id'";
            $result = $this->db->select ($query)->fetch_assoc();

            $image = $result['image'];
            $price = $result['price'];
            $productName = $result['productName'];

            $check_cart = "select * from tbl_cart where productId = '$id' and sId = '$sId'";
            if ($check_cart){
                $msg = "Sản phẩm đã có trong giỏ hàng";
                return $msg;
            }else{
                $query_insert = "INSERT INTO tbl_cart( productId, quantity, sId, image, price, productName) 
                values('$id', '$quantity', '$sId', '$image', '$price', '$productName')";
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
    }
?>
