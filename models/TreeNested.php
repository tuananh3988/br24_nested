<?php
/**
 * Description of TreeNested
 *
 * @author tuana
 */
class TreeNested extends BaseModel{

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM tree");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($idParent) {
        
    }
    
    public function delete($id) {
        
    }
    
    public function restore() {
        
    }
}
