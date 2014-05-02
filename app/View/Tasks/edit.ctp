<?= $this->Form->create('Task');?>
<fieldset>
<legend>Edit Tasks</legend>
<!--<input type="text" value="task">
<input type="checkbox" value="0">-->
<?php 
echo $this->Form->hidden('id');
echo $this->Form->input('title');
echo $this->Form->input('done');
?>
</fieldset>
<?php echo $this->Form->end('Save'); ?>
<?php echo $this->Html->link('List All Task',array(
    'action'=>'index'));
?>
<?php echo $this->Html->link('List Done Tasks', array('action'=>
'index', 'done')); ?><br />
<?php echo $this->Html->link('List Pending Tasks', array('action'=>
'index', 'pending')); ?><br />


