<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

// $cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
// $cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<title>My APP</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		// echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?= $this->Html->url(array('controller'=>'topics','action'=>'index')) ?>">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="<?= $this->Html->url(array('controller'=>'topics','action'=>'index')) ?>">Home</a></li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
		<?php if(AuthComponent::user()){  ?>
			<li><a href="<?= $this->Html->url(array('controller'=>'users','action'=>'logout')) ?>"><span class="glyphicon glyphicon-log-in"></span> Logout (<?=AuthComponent::user('username') ?>)</a></li>
			
			<?php }else{ ?>			
		
		<li><a href="<?= $this->Html->url(array('controller'=>'users','action'=>'login')) ?>"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
		<li><a href="<?= $this->Html->url(array('controller'=>'users','action'=>'add')) ?>"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
		<?php  } ?>

    </ul>
  </div>
</nav>
	<div id="container">
		
		<div id="content">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			
		</div>
	</div>
	<!-- <?php echo $this->element('sql_dump'); ?> -->
</body>
</html>
