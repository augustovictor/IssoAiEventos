<div class="eventos form">
<?php echo $this->Form->create('Evento'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Evento'); ?></legend>
	<?php
		echo $this->Form->input('titulo');
		echo $this->Form->input('descricao');
		echo $this->Form->input('data_inicio');
		echo $this->Form->input('data_fim');
		echo $this->Form->input('vagas');
		echo $this->Form->input('localizacao_id');
		echo $this->Form->input('organizador_id');
		echo $this->Form->input('Participante');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Eventos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Localizacoes'), array('controller' => 'localizacoes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Localizacao'), array('controller' => 'localizacoes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizadores'), array('controller' => 'organizadores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organizador'), array('controller' => 'organizadores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Participantes'), array('controller' => 'participantes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Participante'), array('controller' => 'participantes', 'action' => 'add')); ?> </li>
	</ul>
</div>
