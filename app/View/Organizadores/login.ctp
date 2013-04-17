<div class="login_form">
	<?php
		echo $this->Form->create('Organizador', array('inputDefaults' => Configure::read('Form.inputDefaults')));
		echo $this->Form->input('Usuario.email');
		echo $this->Form->input('Usuario.senha', array('type' => 'password'));
		echo $this->Form->end(array('Login', 'class' => 'btn'));
	?>
</div>