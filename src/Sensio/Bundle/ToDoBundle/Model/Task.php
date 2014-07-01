<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Task'
 *
 * @author stefan
 */
namespace Sensio\Bundle\ToDoBundle\Model;

class Task {
    public $id;
    public $title;
    public $is_done = 0;
    
    public function save(\PDO $db)
    {
        if(!$this->title){
            throw new \LogicException('Title must be set');
        }
        
        if(!$this->id){
            $stmt = $db->prepare('INSERT INTO todo (title) VALUES (?)');
            $stmt->bindParam(1, $this->title);
            $stmt->id = $db->lastInsertId();
            
        }else{
            $stmt = $db->prepare('UPDATE todo SET title = ?, is_done = ? WHERE id= ?');
            $stmt->bindParam(1, $this->title);
            $stmt->bindParam(2,$this->is_done, \PDO::PARAM_INT);
            $stmt->bindParam(3,$this->id, \PDO::PARAM_INT);
             
        }
       if(!$stmt->execute())
                $this->createNotFoundException('Big error!');
    }
    
    public function close(\PDO $db){
        if(!$this->is_done){
            $this->is_done = 1;
            $this->save($db);
        }
    }
    
    public function delete(\PDO $db){
        if(!$this->id){
            throw new \LogicException('Missing ID');
        }
        $stmt = $db->prepare('DELETE FROM todo WHERE id= ?');
        $stmt->bindParam(1, $this->id, \PDO::PARAM_INT);
        if(!$stmt->execute())
                $this->createNotFoundException('Big error!');
    }
}
?>
