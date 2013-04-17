<div class="organizadores form">
<?php echo $this->Form->create('Organizador', array('inputDefaults' => Configure::read('Form.inputDefaults'))); ?>
	<fieldset>
		<legend><?php echo __('Edit Organizador'); ?></legend>
	<?php
		echo $this->Form->input('Usuario.id');
		echo $this->Form->input('Organizador.id', array('type' => 'hidden'));
		echo $this->Form->input('Usuario.nome');
		echo $this->Form->input('Usuario.email');
		echo $this->Form->input('Usuario.senha', array('type' => 'password'));
		echo $this->Form->input('Usuario.confirmar_senha', array('type' => 'password'));
		echo $this->Form->input('Usuario.data_nascimento', array('type' => 'text'));
		//echo $this->Form->input('Organizador.plano_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>