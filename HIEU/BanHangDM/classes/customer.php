<?php
    $filepath = realpath (dirname (__FILE__));
    include_once ($filepath.'/../libs/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php
    class Customer{
        private $db;
        private $fm;
        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insert_customer($data){
            $name = mysqli_real_escape_string ($this->db->link, $data['name']);
            $address = mysqli_real_escape_string ($this->db->link, $data['address']);
            $city = mysqli_real_escape_string ($this->db->link, $data['city']);
            $country	 = mysqli_real_escape_string ($this->db->link, $data['country']);
            $zipcode = mysqli_real_escape_string ($this->db->link, $data['zipcode']);
            $phone = mysqli_real_escape_string ($this->db->link, $data['phone']);
            $email = mysqli_real_escape_string ($this->db->link, $data['email']);
            $password = mysqli_real_escape_string ($this->db->link, md5 ($data['password']));

            if ($name == "" || $address == "" || $city == ""|| $country == "" || $zipcode == "" || $phone == ""|| $email == "" || $password == ""){ // kiểm tra người dùng có nhập hay ko
                $alert = "<span class='error' style='color: red'>Chưa nhập thông tin</span>";
                return $alert;
            }else{
                $check_email = "select * from tbl_customer where email = '$email' limit 1";
                $result_check_email = $this->db->select ($check_email);
                if ($result_check_email){
                    $alert = "<span class='error' style='color: red'>Email đã tồn tại</span>";
                    return $alert;
                }else{
                    $query = "INSERT INTO tbl_customer( name, address, city, country, zipcode, phone, email, password) values('$name', '$address', '$city', '$country', '$zipcode', '$phone', '$email', '$password')";
                    $result = $this->db->insert ($query);
                    if ($result){
                        $alert = "<span class='success'>Đăng ký thành công</span>";
                        return $alert;
                    }else{
                        $alert = "<span style='color: red'>Đăng ký không thành công</span>";
                        return $alert;
                    }
                }
            }
        }

        public function login_customer($data){
            $email = mysqli_real_escape_string ($this->db->link, $data['email']);
            $password = mysqli_real_escape_string ($this->db->link, md5 ($data['password']));

            if ($email == "" || $password == ""){ // kiểm tra người dùng có nhập hay ko
                $alert = "<span class='error' style='color: red'>Chưa nhập thông tin</span>";
                return $alert;
            }else{
                $check_login = "select * from tbl_customer where email = '$email' and password = '$password' limit 1";
                $result_check_login = $this->db->select ($check_login)->fetch_assoc();
                if ($result_check_login != false){
                    Session::set ('customer_login', true);
                    Session::set ('customer_id', $result_check_login['id']);
                    Session::set ('customer_name', $result_check_login['name']);
                    header ('Location: order.php');
                }else{
                    $alert = "<span class='error' style='color: red'>Email hoặc mật khẩu không đúng</span>";
                    return $alert;
                }
            }
        }

        public function show_customers($id){
            $query = "SELECT * FROM tbl_customer WHERE id = '$id' ";
            $result = $this->db->select ($query);
            return $result;
        }

        public function update_customer ($data, $id){
            $name = mysqli_real_escape_string ($this->db->link, $data['name']);
            $address = mysqli_real_escape_string ($this->db->link, $data['address']);
            $zipcode = mysqli_real_escape_string ($this->db->link, $data['zipcode']);
            $phone = mysqli_real_escape_string ($this->db->link, $data['phone']);
            $email = mysqli_real_escape_string ($this->db->link, $data['email']);

            if ($name == "" || $address == "" || $zipcode == "" || $phone == ""|| $email == ""){ // kiểm tra người dùng có nhập hay ko
                $alert = "<span class='error' style='color: red'>Chưa nhập thông tin</span>";
                return $alert;
            }else{
                $query = "update tbl_customer set name = '$name', address= '$address', zipcode = '$zipcode', phone = '$phone', email = '$email' where id = '$id'";
                $result = $this->db->update ($query);
                if ($result){
                    $alert = "<span class='success'>Cập nhật thành công</span>";
                    return $alert;
                }else{
                    $alert = "<span style='color: red'>Cập nhật không thành công</span>";
                    return $alert;
                }
            }
        }
    }
?>
