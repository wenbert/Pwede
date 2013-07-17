<p>Resources are combinations of plugins, controller, actions, etc. After adding a 'resource' make sure you add a Group to that resource.</p>
<div class="pwederesources index">
	<h2><?php echo __('Pwederesources'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('plugin'); ?></th>
			<th><?php echo $this->Paginator->sort('controller'); ?></th>
			<th><?php echo $this->Paginator->sort('action'); ?></th>
			<th><?php echo $this->Paginator->sort('named'); ?></th>
			<th><?php echo $this->Paginator->sort('pass'); ?></th>
			<th><?php echo $this->Paginator->sort('query'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($pwederesources as $pwederesource): ?>
	<tr>
		<td><?php echo h($pwederesource['Pwederesource']['id']); ?>&nbsp;</td>
		<td><?php echo h($pwederesource['Pwederesource']['plugin']); ?>&nbsp;</td>
		<td><?php echo h($pwederesource['Pwederesource']['controller']); ?>&nbsp;</td>
		<td><?php echo h($pwederesource['Pwederesource']['action']); ?>&nbsp;</td>
		<td><?php echo h($pwederesource['Pwederesource']['named']); ?>&nbsp;</td>
		<td><?php echo h($pwederesource['Pwederesource']['pass']); ?>&nbsp;</td>
		<td><?php echo h($pwederesource['Pwederesource']['query']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $pwederesource['Pwederesource']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $pwederesource['Pwederesource']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $pwederesource['Pwederesource']['id']), null, __('Are you sure you want to delete # %s?', $pwederesource['Pwederesource']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Pwederesource'), array('action' => 'add')); ?></li>
	</ul>
</div>
