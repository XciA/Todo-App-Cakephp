<?php
class TasksController extends AppController {

    var $name = 'Tasks'; //Database in use
    var $helpers = array('Html', 'Form');
    public $components = array('Paginator');
//pagination parameters
    public $paginate = array(
        'limit' => 8,
        'contain' => array('Task')
    );
//default view index
    function index($status = null) {
        $this->Paginator->settings = $this->paginate;
        //data fetch from server based on parameters pending done highest low medium
        if ($status == 'done'){
            $tasks = $this->Task->find('all', array('conditions' =>
    array('Task.done' => '1')));}
        else if ($status == 'pending'){
            $tasks = $this->Task->find('all', array('conditions' =>
        array('Task.done' => '0')));}
        else if ($status == 'Highest'){
            $tasks = $this->Task->find('all', array('conditions' =>
        array('Task.priority' => 'Highest')));}
        else if ($status == 'Medium'){
            $tasks = $this->Task->find('all', array('conditions' =>
        array('Task.priority' => 'Medium')));}
        else if ($status == 'Low'){
            $tasks = $this->Task->find('all', array('conditions' =>
        array('Task.priority' => 'Low')));}
        else
         $tasks = $this->Paginator->paginate('Task');
        //pagination 
        $this->set('tasks', $tasks);
        $this->set('status', $status);
    }

    function add() {
        
        if (!empty($this->data)) {
            //print_r($this->data);
            //when called it creates a new data
            $this->Task->create();
            if ($this->Task->save($this->data)) {
                $this->Session->setFlash('The Task has been saved !!','flash_notification');
                $this->redirect(array('action' => 'index'), null, true);
            } else {
                $this->Session->setFlash('Task not saved. Try again.');
            }
        }
    }
//Function to return JSON data for editing
    function returnEditData($id = null) {
        $this->layout = null;
        $data = $this->Task->find('first', array('conditions' => array('Task.id' => $id)));
        return new CakeResponse(array('body' => json_encode($data)));
    } 

    //save the edited data
    function save_edit() {
        if ($this->Task->save($this->data)) {
            $this->Session->setFlash('The Task has been saved','flash_notification');
            $this->redirect(array('action' => 'index'), null, true);
        } else {
            $this->Session->setFlash('The Task could not be saved.
Please, try again.');
        }
    }
//function to delete task
    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash('Invalid id for Task');
            $this->redirect(array('action' => 'index'), null, true);
        }
        if ($this->Task->DELETE($id)) {
            $this->Session->setFlash('Task #' . $id . ' deleted');
            $this->redirect(array('action' => 'index'), null, true);
        }
    }

}

?>