<div class="organizadores form">
<?php echo $this->Form->create('Organizador', array('inputDefaults' => Configure::read('Form.inputDefaults'))); ?>
	<fieldset>
		<legend><?php echo __('Cadastro'); ?></legend>
	<?php
		echo $this->Form->input('Usuario.nome');
		echo $this->Form->input('Usuario.email');
		echo $this->Form->input('Usuario.senha', array('type' => 'password'));
		echo $this->Form->input('Usuario.confirmar_senha', array('type' => 'password'));
		echo $this->Form->input('Organizador.data_nascimento', array('type' => 'text'));
		echo $this->Form->input('Organizador.plano_id');
	?>
	</fieldset>
<?php echo $this->Form->end(array(__('Enviar'), 'class' => 'btn')); ?>
</div>