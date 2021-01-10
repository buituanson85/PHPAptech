<?php
    $filepath = realpath (dirname (__FILE__));
    include ($filepath.'/../lib/session.php');
    Session::checkLogin ();
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>

<?php
    class adminlogin {
        private $db;
        private $format;
        public function __construct(){
            $this->db = new Database();
            $this->format = new Format();
        }

        public function login_admin($adminUser, $adminPass){
            $adminUser = $this->format->validation ($adminUser);
            $adminPass = $this->format->validation ($adminPass);

            $adminUser = mysqli_real_escape_string ($this->db->link, $adminUser);
            $adminPass = mysqli_real_escape_string ($this->db->link, $adminPass);

            if (empty($adminUser) || empty($adminPass)){ // kiểm tra người dùng có nhập hay ko
                $alert = "User and Pass must be not empty";
                return $alert;
            }else{ // nếu đã nhập kiểm tra tiếp trong db nếu đúng vào amin sai hiển thị ra thông báo
                $query = "SELECT * FROM tbl_admin where adminUser = '$adminUser' AND adminPass = '$adminPass'";
                $result = $this->db->select ($query);
                if ($result != false){
                    $value = $result->fetch_assoc();
                    Session::set ('adminlogin', true);

                    Session::set ('adminId', $value['adminId']);
                    Session::set ('adminUser', $value['adminUser']);
                    Session::set ('adminName', $value['adminName']);
                    header("Location:index.php");
                }else{
                    $alert = "User and Pass not match";
                    return $alert;
                }
            }
        }
    }
