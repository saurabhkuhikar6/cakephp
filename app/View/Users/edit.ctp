<!-- File: /app/View/Posts/edit.ctp -->

<h1>Edit Users</h1>
<?= $this->Form->create('User'); ?>
<?= $this->Form->input('username'); ?>
<!-- <?= $this->Form->input('password'); ?> -->
<?= $this->Form->input('full_name'); ?>
<?= $this->Form->end('Edit User'); ?>