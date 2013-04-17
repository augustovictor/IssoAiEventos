<div class="organizadores index">
	<h2><?php echo __('Organizadores'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('usuario_id'); ?></th>
			<th><?php echo $this->Paginator->sort('data_nascimento'); ?></th>
			<th><?php echo $this->Paginator->sort('plano_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($organizadores as $organizador): ?>
	<tr>
		<td><?php echo h($organizador['Organizador']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($organizador['Usuario']['nome'], array('controller' => 'usuarios', 'action' => 'view', $organizador['Usuario']['id'])); ?>
		</td>
		<td><?php echo h($organizador['Organizador']['data_nascimento']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($organizador['Plano']['id'], array('controller' => 'planos', 'action' => 'view', $organizador['Plano']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $organizador['Organizador']['usuario_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $organizador['Organizador']['usuario_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $organizador['Organizador']['usuario_id']), null, __('Are you sure you want to delete # %s?', $organizador['Organizador']['usuario_id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Organizador'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Planos'), array('controller' => 'planos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Plano'), array('controller' => 'planos', 'action' => 'add')); ?> </li>
	</ul>
</div>
