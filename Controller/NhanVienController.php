<?php
include '../Model/database.php';
include '../Model/format.php';
?>

<?php
class NhanVienController
{
    private $database;
    private $format;

    public function __construct()
    {
        $this->database = new Database();
        $this->format = new Format();
    }

    public function Create($ten, $luongCoBan, $capDo)
    {
        if (empty($ten) || empty($luongCoBan) || empty($capDo)) {
            $msg = "Các thành phần không được bỏ trống!";
            return $msg;
        }

        $ten = $this->format->validation($ten);
        $luongCoBan = $this->format->validation($luongCoBan);
        $capDo = $this->format->validation($capDo);


        $ten = mysqli_real_escape_string($this->database->link, $ten);
        $luongCoBan = mysqli_real_escape_string($this->database->link, $luongCoBan);
        $capDo = mysqli_real_escape_string($this->database->link, $capDo);

        $query = "INSERT INTO vitri(Ten, LuongCoBan, CapDo) VALUE ('$ten', '$luongCoBan', '$capDo')";
        $result = $this->database->insert($query);
        if ($result) {
            $msg = "Thêm thành công";
            return $msg;
        } else {
            $msg = "Thêm thất bại";
            return $msg;
        }
    }

    public function Read()
    {
        $query = "SELECT * FROM nhanvien ORDER BY Id DESC";
        $result = $this->database->select($query);
        return $result;
    }

    public function GetViTri($id = null, $ten = null, $luongCoBan = null, $capDo = null)
    {
        if (is_null($id) && is_null($ten) && is_null($luongCoBan) && is_null($capDo)) {
            return Read();
        }

        $query = "SELECT * FROM vitri WHERE ";
        if (!is_null($id)) {
            $query .= " Id = '$id' ";
        }

        if (!is_null($ten)) {
            $query .= " Ten = '$ten' ";
        }

        if (!is_null($luongCoBan)) {
            $query .= " LuongCoBan = '$luongCoBan' ";
        }

        if (!is_null($capDo)) {
            $query .= " CapDo = '$capDo' ";
        }

        $result = $this->database->select($query);
        return $result;
    }

    public function Update($id, $ten, $luongCoBan, $capDo)
    {
        if (empty($ten) || empty($luongCoBan) || empty($capDo)) {
            $msg = "Các thành phần không được bỏ trống!";
            return $msg;
        }

        $id = $this->format->validation($id);
        $ten = $this->format->validation($ten);
        $luongCoBan = $this->format->validation($luongCoBan);
        $capDo = $this->format->validation($capDo);

        $id = mysqli_real_escape_string($this->database->link, $id);
        $ten = mysqli_real_escape_string($this->database->link, $ten);
        $luongCoBan = mysqli_real_escape_string($this->database->link, $luongCoBan);
        $capDo = mysqli_real_escape_string($this->database->link, $capDo);

        $query = "UPDATE vitri SET Ten = '$ten', LuongCoBan = '$luongCoBan', CapDo = '$capDo' WHERE Id = '$id'";
        $result = $this->database->insert($query);
        if ($result) {
            $msg = "Sửa thành công";
            return $msg;
        } else {
            $msg = "Sửa thất bại";
            return $msg;
        }
    }

    public function Del($id)
    {
        $query = "DELETE FROM vitri WHERE Id = '$id'";
        $result = $this->database->delete($query);
        if ($result) {
            $msg = "Xóa thành công";
            return $msg;
        } else {
            $msg = "Xóa thất bại";
            return $msg;
        }
    }
}
?>