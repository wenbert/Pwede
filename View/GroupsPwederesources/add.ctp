<h2><?php echo __($page_title); ?></h2>
<div id="content-left">
    <div id="content-left-top">
    </div><!-- end content-left-search --> 

    <div id="content-left-mid">
        <?php echo $this->Form->create('GroupsPwederesource'); ?>
            <fieldset>
            <div class="input select_medium required">
	            <label for="GroupsPwederesourceGroupId">Group</label>
	            <div class="custom_select_medium" >
	                <?php
	                echo $this->Form->input('group_id', array('options' => $groups, 'label' => false, 'div' => false, 'class' => 'select_medium styled'));
	                ?>
	            </div>
	        </div>

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
	<a href="#" class="selected">Add Group-Resource Access</a>
    <?php echo $this->Html->link(__('Show All Group-Resource Access'), array('action' => 'index')); ?>
</div>
