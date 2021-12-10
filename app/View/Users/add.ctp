

<div class="users form">
<?=  $this->Form->create('User');   ?>
    <fieldset>
        <legend><?= __('Signup User') ?></legend>
        <?= $this->Form->input('username') ?>
        <?= $this->Form->input('password') ?>
        <?= $this->Form->input('full_name') ?>
   </fieldset>
<?= $this->Form->button(__('Submit')); ?>
<?= $this->Form->end() ?>
</div>