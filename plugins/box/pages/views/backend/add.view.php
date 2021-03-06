<h2><?php echo __('New Page', 'pages'); ?></h2>
<br>

<?php if (Notification::get('success')) Alert::success(Notification::get('success')); ?>

<?php
    echo (
        Form::open().
        Form::hidden('csrf', Security::token())
    );
?>

<ul class="nav nav-tabs">
    <li <?php if (Notification::get('page')) { ?>class="active"<?php } ?>><a href="#page" data-toggle="tab"><?php echo __('Page', 'pages'); ?></a></li>
    <li <?php if (Notification::get('metadata')) { ?>class="active"<?php } ?>><a href="#metadata" data-toggle="tab"><?php echo __('Metadata', 'pages'); ?></a></li>
    <li <?php if (Notification::get('settings')) { ?>class="active"<?php } ?>><a href="#settings" data-toggle="tab"><?php echo __('Settings', 'pages'); ?></a></li>
</ul>

<div class="tab-content tab-page">
    <div class="tab-pane <?php if (Notification::get('page')) { ?>active<?php } ?>" id="page">
        <div class="form-group">
        <?php
            echo (                
                Form::label('page_title', __('Title', 'pages')).
                Form::input('page_title', $post_title, array('class' => (isset($errors['pages_empty_title'])) ? 'form-control error-field' : 'form-control'))
            );
            if (isset($errors['pages_empty_title'])) echo Html::nbsp(3).'<span style="color:red">'.$errors['pages_empty_title'].'</span>';
        ?>            
        </div>
        <div class="form-group">
        <?php

            echo (
                Form::label('page_name', __('Name (slug)', 'pages')).
                Form::input('page_name', $post_name, array('class' => (isset($errors['pages_empty_name'])) ? 'form-control error-field' : 'form-control'))
            );

            if (isset($errors['pages_exists'])) echo Html::nbsp(3).'<span style="color:red">'.$errors['pages_exists'].'</span>';
            if (isset($errors['pages_empty_name'])) echo Html::nbsp(3).'<span style="color:red">'.$errors['pages_empty_name'].'</span>';
        ?>
        </div>

    </div>
    <div class="tab-pane <?php if (Notification::get('metadata')) { ?>active<?php } ?>" id="metadata">
        <div class="form-group">
        <?php
            echo (
                Form::label('page_keywords', __('Keywords', 'pages')).
                Form::input('page_keywords', $post_keywords, array('class' => 'form-control'))
            );
        ?>
        </div>
        <div class="form-group">
        <?php    
            echo (            
                Form::label('page_description', __('Description', 'pages')).
                Form::textarea('page_description', $post_description, array('class' => 'form-control'))
            );
        ?>
        </div>
        <div class="form-group">
        <?php
            echo (
                Form::label('robots', __('Search Engines Robots', 'pages')).
                Html::br(1).
                'no Index'.Html::nbsp().Form::checkbox('robots_index', 'index', $post_robots_index).Html::nbsp(2).
                'no Follow'.Html::nbsp().Form::checkbox('robots_follow', 'follow', $post_robots_follow)
            );
        ?>
        </div>
    </div>
    <div class="tab-pane <?php if (Notification::get('settings')) { ?>active<?php } ?>" id="settings">
        <div class="form-group">
            <?php
                echo (
                    Form::label('pages', __('Parent', 'pages')).
                    Form::select('pages', $pages_array, $parent_page, array('class' => 'form-control'))
                );
            ?>
        </div>
        <div class="form-group">
            <?php
                echo (
                    Form::label('templates', __('Template', 'pages')).
                    Form::select('templates', $templates_array, $post_template, array('class' => 'form-control'))
                );
            ?>
        </div>
        <div class="form-group">
            <?php
                echo (
                    Form::label('status', __('Status', 'pages')).
                    Form::select('status', $status_array, $post_status, array('class' => 'form-control'))
                );
            ?>
        </div>
        <div class="form-group">
            <?php
                echo (
                    Form::label('access', __('Access', 'pages')).
                    Form::select('access', $access_array, $post_access, array('class' => 'form-control'))
                );
            ?>
        </div>            
    </div>
</div>

<br>

<?php Action::run('admin_editor', array(Html::toText($post_content))); ?>

<br>

<div class="row">
    <div class="col-xs-6">
        <?php
            echo (
                Form::submit('add_page_and_exit', __('Save and Exit', 'pages'), array('class' => 'btn btn-primary')).Html::nbsp(2).
                Form::submit('add_page', __('Save', 'pages'), array('class' => 'btn btn-default'))
            );
        ?>
    </div>
    <div class="col-xs-6">
        <div class="pull-right">               
            <div class="input-group datapicker">
                <?php echo Form::input('page_date', $date, array('class' => 'form-control')); ?>
                <span class="input-group-addon add-on">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>            
            </div>           
        </div>
        <?php echo Form::close(); ?>
    </div>
</div>
