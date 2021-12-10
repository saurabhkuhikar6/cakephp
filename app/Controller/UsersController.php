<?php


App::uses('AppController', 'Controller');

class UsersController extends AppController {

    public $components = array('Paginator');

    public function beforefilter(){
        $this->Auth->allow('add','login');
    }


    public function login(){
        
        if($this->Session->check('Auth.User')){
            $this->redirect('/topics/index');      
        }
     
        // if we get the post information, try to authenticate
        if ($this->request->is('post')) {   
            if ($this->Auth->login()) {
                $this->Session->setFlash(__('Welcome, '. $this->Auth->user('username')));
                $this->redirect('/topics/index');
            } else {
                $this->Session->setFlash(__('Invalid username or password'));
            }
        } 

    }
    public function logout(){
        $this->Auth->logout();
        $this->redirect('/topics/index');
    }
    
    public function add(){
        if ($this->request->is('post')) {

           $this->User->create();

            $this->request->data['User']['password'] = AuthComponent::password( $this->request->data['User']['password']);
            $this->request->data['User']['role'] = 1;

            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        }
    }

    public function index(){
        
        $this->User->recursive = 0;
        $this->set('users',$this->Paginator->paginate());
    }

    public function view($id){

        $data = $this->User->findById($id);
        $this->set('users',$data);

    }


    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }
    
        $user = $this->User->findById($id);
        if (!$user) {
            throw new NotFoundException(__('Invalid post'));
        }
    
        if ($this->request->is(array('post', 'put'))) {
            $this->User->id = $id;
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('Your topic has been updated.'));
                return $this->redirect('index');
            }
            $this->Flash->error(__('Unable to update your topic.'));
        }
    
        if (!$this->request->data) {
            $this->request->data = $user;
        }
    }

    public function delete($id) {

        $this->User->id = $id;
                      
        if ($this->request->is(array('post', 'put'))) {
            if($this->User->delete()){
                $this->Session->setFlash('The topic has been deleted');
                return $this->redirect('index');
            }
        }
    }

    public function getUserNameById($id){
        $data = $this->User->findById($id);
        return $data;
    }

    
}