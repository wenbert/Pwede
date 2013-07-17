<div class="groupsPwederesources view">
<h2><?php  echo __('Groups Pwederesource'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($groupsPwederesource['GroupsPwederesource']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo h($groupsPwederesource['GroupsPwederesource']['group_id']); ?>
			&nbsp;
			<?php
			echo $groupsPwederesource['Group']['name'];
			?>
		</dd>
		<dt><?php echo __('Resource'); ?></dt>
		<dd>
			<?php echo h($groupsPwederesource['GroupsPwederesource']['pwederesource_id']); ?>
			&nbsp;
			<?php
			echo $groupsPwederesource['Pwederesource']['plugin'].' '.$groupsPwederesource['Pwederesource']['controller'].' '.$groupsPwederesource['Pwederesource']['action']
			?>
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Groups Pwederesource'), array('action' => 'edit', $groupsPwederesource['GroupsPwederesource']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Groups Pwederesource'), array('action' => 'delete', $groupsPwederesource['GroupsPwederesource']['id']), null, __('Are you sure you want to delete # %s?', $groupsPwederesource['GroupsPwederesource']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups Pwederesources'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Groups Pwederesource'), array('action' => 'add')); ?> </li>
	</ul>
</div>
