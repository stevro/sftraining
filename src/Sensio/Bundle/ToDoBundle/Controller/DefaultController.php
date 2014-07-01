<?php

namespace Sensio\Bundle\ToDoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\ToDoBundle\Model\TaskTable;
use Sensio\Bundle\ToDoBundle\Model\Task;

class DefaultController extends Controller {

    /**
     * @Route("/",name="todo_list")
     * @Template()
     */
    public function indexAction() {
        $table = new TaskTable($this->get('sensio.db'));
        
        return array('count' => $table->countAll(), 'tasks' => $table->findAll());
    }

    /**
     * @Route("/{id}/show", requirements={"id"="\d+"}, name="todo_show")
     * @Template()
     */
    public function showAction($id) {
        $table = new TaskTable($this->get('sensio.db'));
        //$conn = $this->getDatabaseConnection();
        
        if (!$task = $table->find($id)) {
            throw $this->createNotFoundException('Task #' . $id . ' does not exist!');
        }
        return array('task' => $task);
    }

    /**
     * @Route("/new",name="todo_create")
     * @Method("POST")
     */
    public function createAction(Request $request) {
        $title = $request->request->get('title');

        $task = new Task();
        $task->title = $request->request->get('title');
        $task->save($this->get('sensio.db'));

        return $this->redirect($this->generateUrl('todo_list'));
    }

    /**
     * @Route("/{id}/close", name="todo_close")
     */
    public function closeAction($id) {
        $db = $this->get('sensio.db');
        $table = new TaskTable($db);

        if (!$task = $table->find($id)) {
            throw $this->createNotFoundException('Task #' . $id . ' does not exist');
        }
        $task->close($db);

        return $this->redirect($this->generateUrl('todo_list'));
    }

    /**
     * @Route("/{id}/delete", name="todo_delete")
     */
    public function deleteAction($id) {
        $db = $this->get('sensio.db');
        
        $table = new TaskTable($db);

        if (!$task = $table->find($id)) {
            throw $this->createNotFoundException('Task #' . $id . ' does not exist');
        }
        $task->delete($db);

        return $this->redirect($this->generateUrl('todo_list'));
    }

//    private function getDatabaseConnection() {
//        $p = $this->container->getParameter('database.server');
//
//        $pdo = new \PDO($p['dsn'], $p['username'], $p['password'], array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
//
//        $pdo->query("SET NAMES 'UTF8'");
//
//        return $pdo;
//    }

}
