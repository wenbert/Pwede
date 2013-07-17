<div class="pwederesources view">
<h2><?php  echo __('Pwederesource'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pwederesource['Pwederesource']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Plugin'); ?></dt>
		<dd>
			<?php echo h($pwederesource['Pwederesource']['plugin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Controller'); ?></dt>
		<dd>
			<?php echo h($pwederesource['Pwederesource']['controller']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Action'); ?></dt>
		<dd>
			<?php echo h($pwederesource['Pwederesource']['action']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Named'); ?></dt>
		<dd>
			<?php echo h($pwederesource['Pwederesource']['named']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pass'); ?></dt>
		<dd>
			<?php echo h($pwederesource['Pwederesource']['pass']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Query'); ?></dt>
		<dd>
			<?php echo h($pwederesource['Pwederesource']['query']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pwederesource'), array('action' => 'edit', $pwederesource['Pwederesource']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Pwederesource'), array('action' => 'delete', $pwederesource['Pwederesource']['id']), null, __('Are you sure you want to delete # %s?', $pwederesource['Pwederesource']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pwederesources'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pwederesource'), array('action' => 'add')); ?> </li>
	</ul>
</div>
