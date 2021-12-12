<?php 

App::uses('AppController', 'Controller');


class PostsController extends AppController {
    public $helpers = array('Html', 'Form','Flash');

    public function index() {
        $this->set('post', $this->Post->find('all'));
    }

    public function view($id) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $post);
    }

    public function add($id) {
        if ($this->request->is('post')) {
            $this->Post->create();
            $this->request->data['Post']['topic_id'] = $id;
            $this->request->data['Post']['user_id'] = AuthComponent::User('id');

            if ($this->Post->save($this->request->data)) {
                $this->Flash->success('Your post has been saved.');
                $this->redirect('/topics/view/'.$id);
            }   
        }
        $this->set('topics', $this->Post->Topic->find('list'));

    }   

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }
    
        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('topics', $this->Post->Topic->find('list'));
    
        if ($this->request->is(array('post', 'put'))) {
            $this->Post->id = $id;
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success('Your post has been updated.');
                return $this->redirect(array('action' => 'index'));
            }
            $this->Common->flash(array('warning', 'error'));
            $this->Session->setFlash('You are not authorized user.');
        }
     

        if (!$this->request->data) {
            $this->request->data = $post;
        }
    }

    public function delete($id) {
        if(AuthComponent::User('role') == 2){

      
            if ($this->request->is('get')) {
                throw new MethodNotAllowedException();
            }
        
            if ($this->Post->delete($id)) {
                $this->Flash->success('The post with id: %s has been deleted.', h($id));               
            } else {
                $this->Session->setFlash('The post with id: %s could not be deleted.', h($id));     }
        
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('You are not authorized user.');
    }
}