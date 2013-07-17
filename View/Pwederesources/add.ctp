<div class="pwederesources form">
<?php echo $this->Form->create('Pwederesource'); ?>
	<fieldset>
		<legend><?php echo __('Add Pwederesource'); ?></legend>
	<?php
		echo $this->Form->input('plugin');
		echo $this->Form->input('controller');
		echo $this->Form->input('action');
		echo $this->Form->input('named');
		echo $this->Form->input('pass');
		echo $this->Form->input('query');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Pwederesources'), array('action' => 'index')); ?></li>
	</ul>
</div>
