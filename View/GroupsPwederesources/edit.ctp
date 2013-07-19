<h2><?php echo __($page_title); ?> for <?php echo $this->data['Group']['name'] ?></h2>
<div id="content-left">
    <div id="content-left-top">
    </div><!-- end content-left-search --> 

    <div id="content-left-mid">
        <?php echo $this->Form->create('GroupsPwederesource'); ?>
            <fieldset>
            <?php
            echo $this->Form->input('id');
            echo $this->Form->input('group_id', array('type' => 'hidden'));
            ?>
           
	        <div class="input select_medium required">
	            <label for="GroupsPwederesourcePwederesourceId">Resource</label>
	            <div class="custom_select_medium" >
	                <?php
	                echo $this->Form->input('pwederesource_id', array('options' => $resources, 'label' => false, 'div' => false, 'class' => 'select_medium styled'));
				
	                ?>
	            </div>
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

