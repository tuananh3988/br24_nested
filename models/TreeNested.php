<?php

/**
 * Description of TreeNested
 *
 * @author tuana
 */
class TreeNested extends BaseModel {
    
    /**
    * Get all folder
    *
    * @author tuananh3988
    */
    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM tree");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
    * add new folder
    *
    * @author tuananh3988
    */
    public function add($folderArr, $name) {
        $left = $folderArr['right'];
        $right = $folderArr['right'] + 1;
        //update other folder
        $this->db->exec("UPDATE tree SET tree.left = tree.left + 2 WHERE tree.left>=$left");
        $this->db->exec("UPDATE tree SET tree.right = tree.right + 2 WHERE tree.right>=$left");
        //insert new folder
        $this->db->exec("INSERT INTO tree(tree.`name`, tree.`left`, tree.`right`) VALUES ('{$name}', $left , $right)");
    }
    
    /**
    * Delete folder
    *
    * @author tuananh3988
    */
    public function delete($folderArr) {
        $left = $folderArr['left'];
        $right = $folderArr['right'];
        
        //get number of folder delede
        $stmt = $this->db->query("SELECT COUNT(id) FROM tree WHERE tree.left>=$left AND tree.right <=$right");
        $numberDelete = $stmt->fetchColumn();
        $number = $numberDelete * 2;
        //delete folder
        $this->db->exec("DELETE FROM tree WHERE tree.left>=$left AND tree.right <=$right");
        //update other folder
        $this->db->exec("UPDATE tree SET tree.left = tree.left - $number WHERE tree.left>=$left and tree.left>=$right");
        $this->db->exec("UPDATE tree SET tree.right = tree.right - $number WHERE tree.right>=$left and tree.right>=$right");
    }
    
    /**
    * Restore
    *
    * @author tuananh3988
    */
    public function restore() {
        $sql = file_get_contents($this->config['backup_dir']);
        return $this->db->exec($sql);
    }
    
    /**
    * Create tree folder
    *
    * @author tuananh3988
    */
    public function createTree($category, $left = 0, $right = null) {
        $tree = array();
        foreach ($category as $cat => $range) {
            //unset category not use when looped
            unset($category[$cat]);
            if ($range['left'] == $left + 1 && (is_null($right) || $range['right'] < $right)) {
                $tree[$cat] = $this->createTree($category, $range['left'], $range['right']);
                $left = $range['right'];
            }
        }

        return $tree;
    }
    
    /**
    * Find folder by id
    *
    * @author tuananh3988
    */
    public function findOne($id) {
        $stmt = $this->db->query("SELECT * FROM tree WHERE id ={$id}");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
