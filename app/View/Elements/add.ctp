<div class="add_form_wrapper">
    <span class="close_add_container">X</span>
<form name="input" class="form-horizontal" action="/tasks/add" id="TaskAddForm" method="post">
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
    echo $this->Form->input('done',array( 'type' => 'checkbox' ));
    echo $this->Form->input('priority', array('options' => $options));
    ?>
</fieldset>
<?php echo $this->Form->end('Add Todo'); ?>
</div>




