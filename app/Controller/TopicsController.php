<?php
 

 App::uses('AppController', 'Controller');
 App::import('Vendor','tcpdf/tcpdf');
 App::import('Vendor','tcpdf',array('file' => 'tcpdf/tcpdf.php'));

class TopicsController extends AppController {

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
                $this->Flash->success(__('The Topics has been created.'));
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
                $this->Flash->success('Your topic has been updated.');
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

    public function excel_export()
    {
        $this->autoRender=false;
        ini_set('max_execution_time', 1600); //increase max_execution_time to 10 min if data set is very large
        $results = $this->Topic->find('all', array());// set the query function
        // echo "<pre>";
        // print_r($results);
        // die();
        $header_row = "";
        $header_row .='
        <table border="1"> 
            <tr>          
            <th>ID</th>
            <th>User Name</th>               
            <th>Title</th>
            <th>Created</th>
            <th>Updated</th>
            </tr>';
        foreach($results as $result)
        {
            $header_row.= 
            '<tr><td>'.$result['Topic']['id'].'</td>
            <td>'.$result['User']['username'].'</td>
            <td>'.$result['Topic']['title'].'</td>
            <td>'.$result['Topic']['created'].'</td>
            <td>'.$result['Topic']['updated'].'</td>
            </tr>';

        }
        $header_row .='</tabel>';
        $filename = "export_".date("Y.m.d").".xls";
        header('Content-type: application/ms-excel');
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        echo($header_row);
    }    
   
}

?>