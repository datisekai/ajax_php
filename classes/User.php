<?php
include_once('Database.php');
?>

<?php
class User
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAll()
    {
        $sql = "select * from tbl_taikhoan";
        $result = $this->db->select($sql);
        return $result->num_rows > 0 ? $result : false;
    }

    public function deleteUser($id){
        $sql = "delete from tbl_taikhoan where taikhoan_id = ". $id;
        return $this->db->delete($sql);
    }

    public function addUser($email, $password, $phone, $quyenhan, $khxau, $maquyen)
    {
        $sql = "insert into tbl_taikhoan values('','".$email."','".$password."','".$phone."','".$quyenhan."','".$khxau."','".$maquyen."')";
        return $this->db->insert($sql);
    }

    public function getUserById($id){
        $sql = "select * from tbl_taikhoan where taikhoan_id = ".$id;
        $result = $this->db->select($sql);
        return $result;
    }

}
?>