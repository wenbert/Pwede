<?php
echo $this->Html->script(array(
        'admin/pwede/pwederesources/index'
    ), array('inline' => false));
?>
<h2><?php echo __($page_title); ?></h2>

<p>Resources are combinations of plugins, controller, actions, etc. After adding a 'resource' make sure you add a Group to that resource.</p>


<div id="content-left">
    <div id="content-left-search">
        <form class="floatleft" action="<?php echo $this->webroot; ?>pwede/pwederesources/index" method="GET" id="search">   
            <input type="text" name="search" id="search" />
            <input type="submit" value="" id="ssubmit" />
        </form>
        <div class="sort">
            &nbsp;
        </div>
    </div><!-- end content-left-search -->

    <div id="content-left-mid">
        <?php foreach ($pwederesources as $pwederesource): ?>
            <div id="item<?php echo h($pwederesource['Pwederesource']['id']); ?>" class="item floatleft">
                
                <?php
                echo $this->Html->link('', array('action' => 'edit', $pwederesource['Pwederesource']['id']), array('class' => 'edit'));
                ?>
                <a href="#" id="<?php echo $pwederesource['Pwederesource']['id']; ?>" class="trash delete-pwederesource"></a>
                <div class="description floatleft">
                    <img src="<?php echo $this->webroot; ?>img/admin/icon-document.png" width="30" height="30" />
                    <h3>
                        <?php
                        echo $pwederesource['Pwederesource']['id'];
                        ?>
                        :
                        <?php
                        echo $pwederesource['Pwederesource']['plugin'];
                        ?>
                        /
                        <?php
                        echo $pwederesource['Pwederesource']['controller'];
                        ?>
                        /
                        <?php
                        echo $pwederesource['Pwederesource']['action'];
                        ?>
                    </h3>
                </div>

                <div style="display: none;" id="confirmation-<?php echo $pwederesource['Pwederesource']['id']?>" class="confirmation">Are you sure you want to delete this resources? &nbsp; <a class="delete-confirm red-gradient" id="delete-confirm-<?php echo $pwederesource['Pwederesource']['id'] ?>" rel="<?php echo $pwederesource['Pwederesource']['id'] ?>" href="">Yes</a>&nbsp;&nbsp;<a class="delete-cancel gray-gradient" id="delete-cancel-<?php echo $pwederesource['Pwederesource']['id']?>" rel="<?php echo $pwederesource['Pwederesource']['id'] ?>" href="#">No</a></div>
            </div>
            <div class="clear"></div>
        <?php endforeach;?>
    </div> <!-- end content-left-mid -->
    
    <div id="content-left-btm">
        <div id="" class="pagination floatleft">
            <?php
            
            if($this->params['paging']['Pwederesource']['pageCount'] > 1):
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



