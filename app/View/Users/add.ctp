
<div class="container">
    <div class="col-md-3"></div>
    <div class="row">
        <div class="col-md-6">
        <?=  $this->Flash->render('auth'); ?>
            <?=  $this->Form->create('User');?>
                <div class="panel panel-primary">
                    <div class="panel-heading">Sign Up Form</div>
                        <div class="panel-body">                
                            <div class="col-md-12">   
                                <div class="form-group">                             
                                    <label for="username">User Name</label>
                                    <?= $this->Form->input('username',array('label'=>'','placeholder'=>'Enter the User name'));?>   
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <?= $this->Form->input('password',array('type'=>'password','label'=>'','placeholder'=>'Enter the Password'));?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password">Full Name</label>
                                    <?= $this->Form->input('full_name',array('label'=>'','placeholder'=>'Enter the Password'));?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?= $this->Form->submit('Signup',array('class'=>'btn btn-info')); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
            <?= $this->Form->end() ?>        
        </div>    

    </div>
</div>