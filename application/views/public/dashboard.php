<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	
<div class="panel panel-default">
  	<div class="panel-heading">
  		<div class="row">
  			<div class="col-md-11">
  				<h4>Add New Task</h4>
  			</div>
  			<div class="col-md-1">
				<button type="button" class="btn btn-sm btn-info pull-right" data-toggle="collapse" data-target="#addTask"><i class="fa fa-plus"></i></button>
			</div>
		</div>
  	</div>

  	<div id="addTask" class="collapse<?php if(validation_errors()) echo ' in'; ?>">
  		<div class="panel-body">
			<form class="form-horizontal" action="<?php echo base_url('user/createTask'); ?>" method="post">
                <fieldset>
                    <div class="form-group">
                        <label for="name" class="col-lg-3 control-label">Name</label>
                        <div class="col-lg-6">
                            <input type="name" class="form-control" name="name" value="<?php echo set_value('name'); ?>" placeholder="Task" required>
                            <?php echo form_error('name'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-lg-3 control-label">Description</label>
                        <div class="col-lg-6">
                            <textarea class="form-control" name="description" placeholder="Description" required></textarea>
                            <?php echo form_error('description'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-6 col-lg-offset-3">
                            <button type="submit" class="btn btn-success pull-right">Create Task</button>
                        </div>
                    </div>
                </fieldset>
            </form>
		</div>
	</div>
</div>


<?php foreach ($tasks as $task) : ?>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
			<div class="col-md-10">
				<a href="#" onclick="fetchTask(<?php echo $task->id; ?>)"><?php echo $task->name; ?></a>
			</div>
			<div class="col-md-offset-10 col-md-2">
				<button onclick="deleteTask(<?php echo $task->id; ?>)" title="delete" class="btn btn-danger btn-xs pull-right"><i class="fa fa-trash-o"></i></button>
				<button onclick="editTask(<?php echo $task->id; ?>)" title="complete" class="btn btn-primary btn-xs pull-right"><i class="fa fa-pencil"></i></button>
			</div>
			</div>
			<i class="fa fa-clock-o"> <?php echo TimeDifference::time($task->updated_at); ?></i>
		</div>
	</div>
<?php endforeach; ?>

<center><?php echo $links; ?></center>


<!-- Modal -->
<div id="taskModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Task</h4>
			</div>
			<div class="modal-body">
				<div id="name" class="well well-sm text-center">
				</div>
				<p id="description"></p>
				<hr>
				<div class="pull-left">
					Created: <div id="created_at"></div>
				</div>

				<div class="pull-right">
					Last Updated: <div id="updated_at"></div>
				</div>
				<div class="row"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div id="editTaskModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Edit Task</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="<?php echo base_url('user/editTask'); ?>" method="post">
	                <fieldset>
	                	<input type="hidden" name="id" id="edit_id">
	                    <div class="form-group">
	                        <label for="name" class="col-lg-3 control-label">Name</label>
	                        <div class="col-lg-6">
	                            <input id="edit_name" type="name" class="form-control" name="name" value="<?php echo set_value('name'); ?>" placeholder="Task" required>
	                            <?php echo form_error('name'); ?>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label for="description" class="col-lg-3 control-label">Description</label>
	                        <div class="col-lg-6">
	                            <textarea class="form-control" id="edit_description" name="description" placeholder="Description" required></textarea>
	                            <?php echo form_error('description'); ?>
	                        </div>
	                    </div>

	                    <div class="form-group">
	                        <div class="col-lg-6 col-lg-offset-3">
	                            <button type="submit" class="btn btn-danger pull-right">Edit Task</button>
	                        </div>
	                    </div>
	                </fieldset>
	            </form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>