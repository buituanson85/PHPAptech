<?php
    $filepath = realpath (dirname (__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>

<?php
/**
 *Session Class
 **/
class Cart{
    private $db;
    private $format;
    public function __construct(){
        $this->db = new Database();
        $this->format = new Format();
    }

    public function add_to_cart($quantity, $id){
        $quantity = $this->format->validation ($quantity);

        $quantity = mysqli_real_escape_string ($this->db->link, $quantity);
        $id = mysqli_real_escape_string ($this->db->link, $id);
        $sId = session_id ();

        $query = "SELECT * FROM tbl_product WHERE productId = '$id'";
        $result = $this->db->select ($query)->fetch_assoc();

        $image = $result['image'];
        $price = $result['price'];
        $productName = $result['productName'];

        $check_cart = "select *from tbl_cart where productId = '$id' and sId = '$sId'";
        if ($check_cart){
            $msg = "Product Already Added";
            return$msg;
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

    public function get_product_cart(){
        $sId = session_id ();
        $query = "SELECT * FROM tbl_cart where sId = '$sId'";

        $result = $this->db->select ($query);
        return $result;
    }
}
?>


