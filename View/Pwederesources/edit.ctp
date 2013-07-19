<h2><?php echo __($page_title); ?></h2>

<div id="content-left">
    <div id="content-left-top">
    </div><!-- end content-left-search --> 

    <div id="content-left-mid">
        <?php echo $this->Form->create('Pwederesource'); ?>
            <fieldset>
            <?php
                echo $this->Form->input('id');
                echo $this->Form->input('plugin', array('class' => 'long', 'maxlength' => '255'));
                echo $this->Form->input('controller', array('class' => 'long', 'maxlength' => '255'));
                echo $this->Form->input('action', array('class' => 'long', 'maxlength' => '255'));
                echo $this->Form->input('named', array('class' => 'long', 'maxlength' => '255'));
                echo $this->Form->input('pass', array('class' => 'long', 'maxlength' => '255'));
                echo $this->Form->input('query', array('class' => 'long', 'maxlength' => '255'));
            ?>
            </fieldset>
        <?php 
        echo $this->Form->submit('Save Item', array('id' => 'submit'));
        echo $this->Form->end();
        ?>
        <div class="clear"></div>
    </div> <!-- end content-left-mid -->
    <div id="content-left-btm">
    </div><!-- end content-left-btm -->
</div> <!-- end content-left -->

<div id="content-right-panel">
	<?php echo $this->Html->link(__('Show All Group-Resource Access'), array('controller' => 'groupspwederesources', 'action' => 'index')); ?>
    <?php echo $this->Html->link(__('Add Group-Resource Access'), array('controller' => 'groupspwederesources', 'action' => 'add')); ?>
    <br/>
    <?php echo $this->Html->link(__('Show All Resources'), array('controller' => 'pwederesources', 'action' => 'index')); ?>
    <?php echo $this->Html->link(__('Add Resource'), array('controller' => 'pwederesources', 'action' => 'add')); ?>
</div>

