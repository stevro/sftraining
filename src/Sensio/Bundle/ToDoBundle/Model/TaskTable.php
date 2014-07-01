<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TaskTable
 *
 * @author stefan
 */
namespace Sensio\Bundle\ToDoBundle\Model;

use Sensio\Bundle\ToDoBundle\Model\Task;

class TaskTable {
    private $db;
    
    const RECORD_CLASS = 'Sensio\\Bundle\\ToDoBundle\\Model\\Task';
    
    public function __construct(\PDO $db) {
        $this->db = $db;
    }
    
    public function countAll(){
        $stmt = $this->db->query('SELECT COUNT(*) FROM todo');
        
        return (int)$stmt->fetchColumn();
    }
    
    public function findAll(){
        $stmt = $this->db->query('SELECT * FROM todo');
        
        return $stmt->fetchAll(\PDO::FETCH_CLASS, self::RECORD_CLASS);
    }
    
    public function find($id){
        $stmt = $this->db->prepare('SELECT * FROM todo WHERE id=?');
        $stmt->bindParam(1,  $id, \PDO::PARAM_INT);
        $stmt->execute();
        
        return current($stmt->fetchAll(\PDO::FETCH_CLASS,self::RECORD_CLASS));
    }
}

?>
