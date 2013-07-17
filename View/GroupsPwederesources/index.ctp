<?php
// debug($groupsPwederesources);
?>
<p>The linking of the Groups to the different kind of permissions are set here. Everything is "deny all" unless specified here.</p>
<p>Make sure you have added the 'resource'. A 'resource' is a combination of a plugin/controller/action.</p>

<div class="groupsPwederesources index">
	<h2><?php echo __('Groups Pwederesources'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('Group.name'); ?></th>
			<th>Resources</th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($groupsPwederesources as $groupsPwederesource): ?>
	<tr>
		<td>
			<?php echo h($groupsPwederesource['GroupsPwederesource']['id']); ?>&nbsp;
		</td>
		<td>
			<?php echo h($groupsPwederesource['Group']['name']); ?>&nbsp;
		</td>
		<td>
			<?php echo h($groupsPwederesource['GroupsPwederesource']['pwederesource_id']); ?>&nbsp;
			<?php echo h($groupsPwederesource['Pwederesource']['plugin']."/".$groupsPwederesource['Pwederesource']['controller']."/".$groupsPwederesource['Pwederesource']['action']); ?>&nbsp;
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $groupsPwederesource['GroupsPwederesource']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $groupsPwederesource['GroupsPwederesource']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $groupsPwederesource['GroupsPwederesource']['id']), null, __('Are you sure you want to delete # %s?', $groupsPwederesource['GroupsPwederesource']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Groups Pwederesource'), array('action' => 'add')); ?></li>
	</ul>
</div>
