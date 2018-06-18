<?php
class MenuModels
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function MenuEntrees()
    {
        $sql = 'SELECT * FROM product WHERE id_category = ?';
        $value = [1];
        $result = $this->db->query($sql, $value);
        return $result;
    }
    public function MenuPlats()
    {
        $sql = 'SELECT * FROM product WHERE id_category = ?';
        $value = [2];
        $result = $this->db->query($sql, $value);
        return $result;
    }
}
 ?>
