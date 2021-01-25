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

        public function insertOrder($customer_id)
        {
            $sId = session_id();
            $query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
            $get_product = $this->db->select($query);
            if($get_product){
                while($result = $get_product->fetch_assoc()){
                    $productid = $result['productId'];
                    $productName = $result['productName'];
                    $quantity = $result['quantity'];
                    $price = $result['price'] * $quantity;
                    $image = $result['image'];
                    $customer_id = $customer_id;
                    $query_order = "INSERT INTO tbl_order(productId,productName,quantity,price,image,customer_id) VALUES('$productid','$productName','$quantity','$price','$image','$customer_id')";
                    $insert_order = $this->db->insert($query_order);
                }
            }
        }

        public function getAmountPrice($customer_id)
        {
            $query = "SELECT price FROM tbl_order WHERE customer_id = '$customer_id' ";
            $get_price = $this->db->select($query);
            return $get_price;
        }

        public function get_cart_ordered($customer_id)
        {
            $query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id' ";
            $get_cart_ordered = $this->db->select($query);
            return $get_cart_ordered;
        }

        public function shifted_confirm($id,$time,$price)
        {
            $id = mysqli_real_escape_string($this->db->link, $id);
            $time = mysqli_real_escape_string($this->db->link, $time);
            $price = mysqli_real_escape_string($this->db->link, $price);
            $query = "UPDATE tbl_order SET

			status = '2'

			WHERE customer_id = '$id' AND date_order = '$time' AND price = '$price' ";

            $result = $this->db->update($query);
            return $result;
        }

        public function get_check_order($id){
            $sId = session_id ();
            $query = "select * from tbl_order where  customer_id = '$id'";
            $result = $this->db->select ($query);
            return $result;
        }

        public function get_inbox_cart()
        {
            $query = "SELECT * FROM tbl_order ";
            $get_inbox_cart = $this->db->select($query);
            return $get_inbox_cart;
        }

        public function shifted($id,$proid,$qty,$time,$price)
        {
            $id = mysqli_real_escape_string($this->db->link, $id);
            $proid = mysqli_real_escape_string($this->db->link, $proid);
            $qty = mysqli_real_escape_string($this->db->link, $qty);
            $time = mysqli_real_escape_string($this->db->link, $time);
            $price = mysqli_real_escape_string($this->db->link, $price);

            $query_select = "SELECT * FROM tbl_product WHERE productId='$proid'";
            $get_select = $this->db->select($query_select);

//            if($get_select){
//                while($result = $get_select->fetch_assoc()){
//                    $soluong_new = $result['product_remain'] - $qty;
//                    $qty_soldout = $result['product_soldout'] + $qty;
//
//                    $query_soluong = "UPDATE tbl_product SET
//
//					product_remain = '$soluong_new',product_soldout = '$qty_soldout' WHERE productId = '$proid'";
//                    $result = $this->db->update($query_soluong);
//                }
//            }

            $query = "UPDATE tbl_order SET

			status = '1'

			WHERE id = '$id' AND date_order = '$time' AND price = '$price' ";


            $result = $this->db->update($query);
            if ($result) {
                $msg = "<span class='success'> Update Order Succesfully</span> ";
                return $msg;
            }else {
                $msg = "<span class='erorr'> Update Order NOT Succesfully</span> ";
                return $msg;
            }
        }
        public function del_shifted($id,$time,$price)
        {
            $id = mysqli_real_escape_string($this->db->link, $id);
            $time = mysqli_real_escape_string($this->db->link, $time);
            $price = mysqli_real_escape_string($this->db->link, $price);
            $query = "DELETE FROM tbl_order 
					  WHERE id = '$id' AND date_order = '$time' AND price = '$price' ";

            $result = $this->db->update($query);
            if ($result) {
                $msg = "<span class='success'> DELETE Order Succesfully</span> ";
                return $msg;
            }else {
                $msg = "<span class='erorr'> DELETE Order NOT Succesfully</span> ";
                return $msg;
            }
        }

    }
?>
