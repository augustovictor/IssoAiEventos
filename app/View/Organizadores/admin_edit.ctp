<div class="organizadores form">
<?php echo $this->Form->create('Organizador'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Organizador'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('usuario_id');
		echo $this->Form->input('data_nascimento');
		echo $this->Form->input('plano_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Organizador.usuario_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Organizador.usuario_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Organizadores'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Planos'), array('controller' => 'planos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Plano'), array('controller' => 'planos', 'action' => 'add')); ?> </li>
	</ul>
</div>
