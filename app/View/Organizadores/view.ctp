<div class="organizadores view">
<h2><?php  echo __('Organizador'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($organizador['Organizador']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($organizador['Usuario']['nome'], array('controller' => 'usuarios', 'action' => 'view', $organizador['Usuario']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Nascimento'); ?></dt>
		<dd>
			<?php echo h($organizador['Organizador']['data_nascimento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Plano'); ?></dt>
		<dd>
			<?php echo $this->Html->link($organizador['Plano']['id'], array('controller' => 'planos', 'action' => 'view', $organizador['Plano']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Organizador'), array('action' => 'edit', $organizador['Organizador']['usuario_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Organizador'), array('action' => 'delete', $organizador['Organizador']['usuario_id']), null, __('Are you sure you want to delete # %s?', $organizador['Organizador']['usuario_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizadores'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organizador'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Planos'), array('controller' => 'planos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Plano'), array('controller' => 'planos', 'action' => 'add')); ?> </li>
	</ul>
</div>
