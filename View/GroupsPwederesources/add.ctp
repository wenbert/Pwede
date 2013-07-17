<div class="groupsPwederesources form">
<?php echo $this->Form->create('GroupsPwederesource'); ?>
	<fieldset>
		<legend><?php echo __('Add Groups Pwederesource'); ?></legend>
	<?php
		echo $this->Form->select('group_id', $groups);
		echo $this->Form->select('pwederesource_id', $resources);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Groups Pwederesources'), array('action' => 'index')); ?></li>
	</ul>
</div>
