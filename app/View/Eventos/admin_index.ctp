<div class="eventos index">
	<h2><?php echo __('Eventos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('titulo'); ?></th>
			<th><?php echo $this->Paginator->sort('descricao'); ?></th>
			<th><?php echo $this->Paginator->sort('data_inicio'); ?></th>
			<th><?php echo $this->Paginator->sort('data_fim'); ?></th>
			<th><?php echo $this->Paginator->sort('vagas'); ?></th>
			<th><?php echo $this->Paginator->sort('localizacao_id'); ?></th>
			<th><?php echo $this->Paginator->sort('organizador_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($eventos as $evento): ?>
	<tr>
		<td><?php echo h($evento['Evento']['id']); ?>&nbsp;</td>
		<td><?php echo h($evento['Evento']['titulo']); ?>&nbsp;</td>
		<td><?php echo h($evento['Evento']['descricao']); ?>&nbsp;</td>
		<td><?php echo h($evento['Evento']['data_inicio']); ?>&nbsp;</td>
		<td><?php echo h($evento['Evento']['data_fim']); ?>&nbsp;</td>
		<td><?php echo h($evento['Evento']['vagas']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($evento['Localizacao']['id'], array('controller' => 'localizacoes', 'action' => 'view', $evento['Localizacao']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($evento['Organizador']['usuario_id'], array('controller' => 'organizadores', 'action' => 'view', $evento['Organizador']['usuario_id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $evento['Evento']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $evento['Evento']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $evento['Evento']['id']), null, __('Are you sure you want to delete # %s?', $evento['Evento']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Evento'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Localizacoes'), array('controller' => 'localizacoes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Localizacao'), array('controller' => 'localizacoes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizadores'), array('controller' => 'organizadores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organizador'), array('controller' => 'organizadores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Participantes'), array('controller' => 'participantes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Participante'), array('controller' => 'participantes', 'action' => 'add')); ?> </li>
	</ul>
</div>
