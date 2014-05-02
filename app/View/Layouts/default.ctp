<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            Todo task manager
        </title>
        <?php
        echo $this->Html->css('cake.generic');
        echo $this->Html->css('bootstrap');
        echo $this->fetch('meta');
        echo $this->fetch('css');
        ?>
    </head>
    <body>
        <header>
            <div class="add_container">
                <span class="btn btn-default add_container_btn">Add Task</span>
                <div class="add_section left">        
                    <?php echo $this->element('add'); ?>
                </div>
            </div>
        </header>
        <div id="container">
            <div id="header"></div>
            <div id="content">
                <?php echo $this->fetch('content'); ?>
            </div>
            <div id="footer">
                <!-- CDN  Scripts-->
                <?php
                $this->Html->script('script', array('block' => 'scriptBottom'));
                echo $this->fetch('scriptBottom');
                ?>
                <script id="entry-template" type="text/x-handlebars-template">
                    <div class="add_form_wrapper">
                    <form name="input" class="form-horizontal" action="/tasks/save_edit" method="post">
                    <fieldset>
                    <legend>Edit Task</legend>
                    <input name="data[id]" type="hidden" id="id" value="{{id}}">
                    <div class="input text">
                    <label for="title">Title</label>
                    <input name="data[title]" type="text" id="title" value="{{title}}">
                    </div>
                    <div class="input checkbox">
                    <input type="hidden" name="data[done]" id="done_" value="0">
                    <input type="checkbox" name="data[done]" value="1" id="done">
                    <label for="done">Done</label>
                    </div>
                    <div class="input select">
                    <label for="priority">Priority</label>
                    <select name="data[priority]" id="priority">
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                    <option value="Highest">Highest</option>
                    </select></div></fieldset>
                    <div class="submit">
                    <input type="submit" value="Add Todo"></div></form></div>
                </script>
                <div class="overlay">
                    <div class="wrapper">
                        <div style="position:relative;width:40%;margin: 0 auto;">
                            <span class="close_edit_container">X</span>
                            <div class="overlay_content add_section">                 
                            </div>
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo $this->Session->flash(); ?>
                </body>
                </html>

