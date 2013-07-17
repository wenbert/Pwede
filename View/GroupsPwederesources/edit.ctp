<div class="groupsPwederesources form">
<?php echo $this->Form->create('GroupsPwederesource'); ?>
	<fieldset>
		<legend><?php echo __('Edit Resource for '.$this->data['Group']['name']); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('group_id', array('type' => 'hidden'));
		echo $this->Form->select('pwederesource_id', $resources);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('GroupsPwederesource.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('GroupsPwederesource.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Groups Pwederesources'), array('action' => 'index')); ?></li>
	</ul>
</div>

<?php
// debug($this->data);
?>