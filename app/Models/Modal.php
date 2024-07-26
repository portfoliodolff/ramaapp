
    <?php

    namespace App\Models;

    use CodeIgniter\Model;

    class Modal extends Model
    {
        function tiket()
        {
            return $this->db->query("select * from tb_ticket ;");
        }
        function Datastasiun()
        {
            return $this->db->query("select * from tb_stasiun ;");
        }
        function datainventory()
        {
            return $this->db->query("select * from tb_inventory ;");
        }
        function datalogin()
        {
            return $this->db->query("select * from tb_login ;");
        }
        function datateknisi()
        {
            return $this->db->query("select * from tb_teknisi ;");
        }
        function user()
        {
            return $this->db->query("select * from tb_user ;");
        }
    }
