<?= $this->Form->create('Task'); ?>
<fieldset>
    <legend>Add New Task</legend>
    <!--<input type="text" value="task">
    <input type="checkbox" value="0">-->
    <?php
    $options = array(
        'Low' => 'Low',
        'Medium' => 'Medium',
        'Highest' => 'Highest'
    );
    echo $this->Form->input('title');
    echo $this->Form->input('done');
    echo $this->Form->input('priority', array('options' => $options));
    ?>
</fieldset>
<?php echo $this->Form->end('Add Todo'); ?>
<?php
echo $this->Html->link('List All Task', array(
    'action' => 'index'));
?>
<?php
echo $this->Html->link('List Done Tasks', array('action' =>
    'index', 'done'));
?><br />
<?php
echo $this->Html->link('List Pending Tasks', array('action' =>
    'index', 'pending'));
?><br />




