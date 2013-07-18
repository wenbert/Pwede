<?php
echo $this->Html->script(array(
        'admin/pwede/groupspwederesources/index'
    ), array('inline' => false));
?>
<h2><?php echo __($page_title); ?></h2>

<p>The linking of the Groups to the different kind of permissions are set here. Everything is "deny all" unless specified here.</p>
<p>Make sure you have added the 'resource'. A 'resource' is a combination of a plugin/controller/action.</p>

<div id="content-left">
    <div id="content-left-search">
        <form class="floatleft" action="<?php echo $this->webroot; ?>pwede/groupspwederesources/index" method="GET" id="search">   
            <input type="text" name="search" id="search" />
            <input type="submit" value="" id="ssubmit" />
        </form>
        <div class="sort">
            &nbsp;
        </div>
    </div><!-- end content-left-search -->

    <div id="content-left-mid">
        <?php foreach ($groupsPwederesources as $groupsPwederesource): ?>
            <div id="item<?php echo h($groupsPwederesource['Pwederesource']['id']); ?>" class="item floatleft">
                
                <?php
                echo $this->Html->link('', array('action' => 'edit',$groupsPwederesource['GroupsPwederesource']['id']), array('class' => 'edit'));
                ?>
                <a href="#" id="<?php echo $groupsPwederesource['GroupsPwederesource']['id']?>" class="trash delete-pwederesource"></a>
                <div class="description floatleft">
                    <img src="<?php echo $this->webroot; ?>img/admin/icon-document.png" width="30" height="30" />
                    <h3>
                    	<?php echo h($groupsPwederesource['Group']['name']); ?>
                    	has access to: 
                    </h3>
                    <div class="resource-red">
                    	<?php
                        echo $groupsPwederesource['Pwederesource']['plugin'];
                        ?>
                        /
                        <?php
                        echo $groupsPwederesource['Pwederesource']['controller'];
                        ?>
                        /
                        <?php
                        echo $groupsPwederesource['Pwederesource']['action'];
                        ?>
                    </div>
                </div>

                <div style="display: none;" id="confirmation-<?php echo $groupsPwederesource['GroupsPwederesource']['id']?>" class="confirmation">Are you sure you want to delete this resources? &nbsp; <a class="delete-confirm red-gradient" id="delete-confirm-<?php echo $groupsPwederesource['GroupsPwederesource']['id'] ?>" rel="<?php echo $groupsPwederesource['GroupsPwederesource']['id'] ?>" href="">Yes</a>&nbsp;&nbsp;<a class="delete-cancel gray-gradient" id="delete-cancel-<?php echo $groupsPwederesource['GroupsPwederesource']['id']?>" rel="<?php echo $groupsPwederesource['GroupsPwederesource']['id'] ?>" href="#">No</a></div>
            </div>
            <div class="clear"></div>
        <?php endforeach;?>
    </div> <!-- end content-left-mid -->
    
    <div id="content-left-btm">
        <div id="" class="pagination floatleft">
            <?php
            
            if($this->params['paging']['GroupsPwederesource']['pageCount'] > 1):
            ?>
            <div class="paging">
                <?php
                echo $this->Paginator->prev('<', array(), null, array('class' => 'prev disabled'));
                echo $this->Paginator->numbers(array('separator' => ''));
                echo $this->Paginator->next('>', array(), null, array('class' => 'next disabled'));
                ?>
            </div>
            <?php
            endif;
            ?>
        </div>

    </div> <!-- content-left-btm -->
</div><!-- end content-left -->


<div id="content-right-panel">
    <?php echo $this->Html->link(__('New Resource'), array('action' => 'add')); ?>
</div>

