<div class="eventos view">
<h2><?php  echo __('Evento'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($evento['Evento']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Titulo'); ?></dt>
		<dd>
			<?php echo h($evento['Evento']['titulo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($evento['Evento']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Inicio'); ?></dt>
		<dd>
			<?php echo h($evento['Evento']['data_inicio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Fim'); ?></dt>
		<dd>
			<?php echo h($evento['Evento']['data_fim']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vagas'); ?></dt>
		<dd>
			<?php echo h($evento['Evento']['vagas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Localizacao'); ?></dt>
		<dd>
			<?php echo $this->Html->link($evento['Localizacao']['id'], array('controller' => 'localizacoes', 'action' => 'view', $evento['Localizacao']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Organizador'); ?></dt>
		<dd>
			<?php echo $this->Html->link($evento['Organizador']['usuario_id'], array('controller' => 'organizadores', 'action' => 'view', $evento['Organizador']['usuario_id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Evento'), array('action' => 'edit', $evento['Evento']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Evento'), array('action' => 'delete', $evento['Evento']['id']), null, __('Are you sure you want to delete # %s?', $evento['Evento']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Eventos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evento'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Localizacoes'), array('controller' => 'localizacoes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Localizacao'), array('controller' => 'localizacoes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizadores'), array('controller' => 'organizadores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organizador'), array('controller' => 'organizadores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Participantes'), array('controller' => 'participantes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Participante'), array('controller' => 'participantes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Participantes'); ?></h3>
	<?php if (!empty($evento['Participante'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Facebook Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($evento['Participante'] as $participante): ?>
		<tr>
			<td><?php echo $participante['facebook_id']; ?></td>
			<td><?php echo $participante['nome']; ?></td>
			<td><?php echo $participante['email']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'participantes', 'action' => 'view', $participante['facebook_id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'participantes', 'action' => 'edit', $participante['facebook_id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'participantes', 'action' => 'delete', $participante['facebook_id']), null, __('Are you sure you want to delete # %s?', $participante['facebook_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Participante'), array('controller' => 'participantes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
