<?php
 

 App::uses('AppController', 'Controller');


class TopicsController extends AppController {
    public $components = array('Session','Paginator');

    public function beforefilter(){
        $this->Auth->allow('index');
    }

    public function add(){
        if ($this->request->is('post')) {
            $this->Topic->create();
            $this->request->data['Topic']['user_id'] = AuthComponent::User('id');;

            if(AuthComponent::User('role') == 1){
                $this->request->data['Topic']['visible'] = 2;
            }

            if ($this->Topic->save($this->request->data)) { 
                $this->Session->setFlash('The Topics has been created.');
                return $this->redirect('/topics/index');
            }
            $this->Flash->error(__('Unable to add your topics.'));
        }
    }

    public function index(){
        $this->set('framework','CakePHP');
        $this->paginate = array(            
            'limit' => 3,
            'order' => array('id' => 'desc')
        );
            // we are using the 'User' model        
        // pass the value to our view.ctp
        $this->set('topic', $this->paginate('Topic'));       
    }

    public function view($id){

        $data = $this->Topic->findById($id);
        $this->set('topic',$data);

    }


    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }
        
        if(AuthComponent::User('role') == 1){
            $this->redirect('index');
        }
    
        $topic = $this->Topic->findById($id);
        if (!$topic) {
            throw new NotFoundException(__('Invalid post'));
        }
    
        if ($this->request->is(array('post', 'put'))) {
            $this->Topic->id = $id;
            if ($this->Topic->save($this->request->data)) {
                $this->Session->setFlash('Your topic has been updated.');
                return $this->redirect('index');
            }
            $this->Flash->error(__('Unable to update your topic.'));
        }
    
        if (!$this->request->data) {
            $this->request->data = $topic;
        }
    }

    public function delete($id) {

        $this->Topic->id = $id;
                      
        if ($this->request->is(array('post', 'put'))) {
            if($this->Topic->delete()){
                $this->Session->setFlash('The topic has been deleted');
                return $this->redirect('index');
            }
        }
    }
}

?>