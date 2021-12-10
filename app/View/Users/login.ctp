
<div class="users form">
    <?=  $this->Flash->render('auth'); ?>
    <?=  $this->Form->create('User'); ?>
   
    <fieldset>
        <legend>
            <?php echo __('Please enter your username and password'); ?>
        </legend>
        <?= $this->Form->input('username');?>
        <?=  $this->Form->input('password');?>
    </fieldset>
    <?= $this->Form->end(__('Login')); ?>
    <?= $this->Html->link('Sign Up', array('action' => 'add')); ?>

</div>