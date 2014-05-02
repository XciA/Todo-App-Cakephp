<!-- Shows the next and previous links -->
<?php // echo $this->Paginator->prev('« Previous', null, null, array('class' => 'disabled')); ?>
<?php // echo $this->Paginator->next('Next »', null, null, array('class' => 'disabled')); ?>
<!-- prints X of Y, where X is current page and Y is number of pages -->
<?php if ($status != 'done' && $status != 'pending' && !empty($tasks) && $status != 'Highest' && $status != 'Medium' && $status != 'Low'): ?>
    <span class="right" style="color:#cc3333;font-weight: bold;">Page <?php echo $this->Paginator->counter(); ?></span>
<?php endif; ?>
<?php if ($status == 'done' || $status == 'pending' || !empty($tasks) ||  $status == 'Highest' ||  $status == 'Medium' ||  $status == 'Low') : ?>
    <div class="sort_container">
        <h2>Tasks</h2>
        <span class="right">
            <?php if ($status == 'done' || $status == 'pending' ||  $status == 'Highest' ||  $status == 'Medium' ||  $status == 'Low'): ?>
                <?php
                echo $this->Html->link('List All Tasks', array('action' =>
                    'index'));
                ?>
    <?php endif; ?></span>
        <div class="sort_container_content">
            <div class="btn btn-default right">
                Sort&nbsp;&nbsp;<span class="caret"></span>
            </div>
            <div class="sort_option btn btn-default right">
                <?php if ($status): ?>

                <?php endif; ?>
                <?php if ($status != 'done'): ?>
                    <?php
                    echo $this->Html->link('List All Done Tasks', array('action' =>
                        'index', 'done'));
                    ?><br />
                <?php endif; ?>
                <?php if ($status != 'pending'): ?>
                    <?php
                    echo $this->Html->link('List All Pending Tasks', array('action' =>
                        'index', 'pending'));
                    ?>
                    <br />
                <?php endif; ?>
                <?php if ($status != 'Highest'): ?>
                    <?php
                    echo $this->Html->link('List All High Priority Tasks', array('action' =>
                        'index', 'Highest'));
                    ?>
                    <br />
                <?php endif; ?>
                <?php if ($status != 'Medium'): ?>
                    <?php
                    echo $this->Html->link('List All Medium Priority Tasks', array('action' =>
                        'index', 'Medium'));
                    ?>
                    <br />
                <?php endif; ?>
                <?php if ($status != 'Low'): ?>
                    <?php
                    echo $this->Html->link('List All Low Priority Tasks', array('action' =>
                        'index', 'Low'));
                    ?>
                    <br />
    <?php endif; ?>
            </div>
        </div>
        <br style="clear:both">
    </div>
<?php endif; ?>
<?php if (empty($tasks)): ?>
    <p style="text-align:center;color:#cc3333;font-weight:bold;">There are no tasks in this list

        <?php
        echo $this->Html->link('Show Other Tasks', array('action' =>
            'index'));
        ?>

    </p>
<?php else: ?>
    <div class="listing left">
        <table class="table table-responsive">
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Created</th>
                <th>Priority</th>
                <th></th>
            </tr>
                    <?php foreach ($tasks as $task): ?>
                <tr>
                    <td>
                        <?php echo $task['Task']['title'] ?>
                    </td>
                    <td>
                        <?php
                        if ($task['Task']['done'])
                            echo "Done";
                        else
                            echo "Pending";
                        ?>
                    </td>
                    <td>
                        <?php echo $task['Task']['modified'] ?>
                    </td>
                    <td class=" <?= $task['Task']['priority'] ?>">
        <?php echo $task['Task']['priority'] ?>
                        <!-- actions on tasks will be added later -->
                    </td>
                    <td>
                        <span class="edit_" data-id="<?php echo $task['Task']['id'] ?>">Edit</span>
                        <span class=" icon-edit"></span>

                    </td>
                    <td>
                        <?php
                        echo $this->Html->link('Delete', array(
                            "action" => "delete", $task['Task']['id']), null, 'Are you sure');
                        ?>
                    </td>
                </tr>
    <?php endforeach; ?>
        </table>
    </div>
<?php endif; ?>
    <!--paginate section-->
        <?php if ($status != 'done' && $status != 'pending' && !empty($tasks) && $status != 'Highest' && $status != 'Low' && $status != 'Medium'): ?>
    <div class="pagination">
        <ul>
            <?php
            echo $this->Paginator->prev('<<', array('class' => '', 'tag' => 'li'), null, array('class' => 'disabled myclass', 'tag' => 'li'));
            echo $this->Paginator->numbers(array('tag' => 'li', 'separator' => '', 'currentClass' => 'disabled myclass'));
            echo $this->Paginator->next('>>', array('class' => '', 'tag' => 'li'), null, array('class' => 'disabled myclass', 'tag' => 'li'));
            ?>
        </ul>
    </div>
<?php endif; ?>