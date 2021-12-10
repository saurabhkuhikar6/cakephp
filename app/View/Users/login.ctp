
<div class="col-md-3"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?=  $this->Flash->render('auth'); ?>
                <?=  $this->Form->create('User'); ?>         
                <div class="panel panel-primary">
                    <div class="panel-heading">Panel with panel-primary class</div>
                    <div class="panel-body">                
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="username">User Name</label>
                                <?= $this->Form->input('username',array('label'=>'','class'=>'form-control','placeholder'=>'Enter the User name'));?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <?= $this->Form->input('password',array('label'=>'','class'=>'form-control','placeholder'=>'Enter the Password'));?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                            <?= $this->Form->submit('Login',array('class'=>'btn btn-success')); ?>
                               <p><?= $this->Html->link('Sign Up', array('action' => 'add','class'=>'btn btn info')); ?></p>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>     
        </div>
    </div>
<div class="col-md-3"></div>