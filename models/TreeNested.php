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
    
    public function createTree($category, $left = 0, $right = null) {
        $tree = array();
        foreach ($category as $cat => $range) {
            unset($category[$cat]);
            if ($range['left'] == $left + 1 && (is_null($right) || $range['right'] < $right)) {

                $tree[$cat] = $this->createTree($category, $range['left'], $range['right']);
                $left = $range['right'];
            }
        }
        
        return $tree;
    }
}
