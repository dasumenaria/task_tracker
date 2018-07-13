<p>Dear Sir,</p>
<p>Delayed Tasks</p>
<?php foreach ($projects as $key => $project):?>
	<table border="1px" cellspacing="0" cellpadding="5px" style="width: 100%; border: 1px solid">
		<tr><th colspan="3"><?= $project['title'] ?></th></tr>
		<?php $k = 0; foreach($project['tasks'] as $task){  $k++;?>
			<tr>
			<td><?= $k ?></td>
			<td style="width: 80%;"><?= $task['title']; ?></td>
			<td><?= date('d-M-y',strtotime($task['deadline'])) ?></td>
			</tr>
		<?php } ?>
	</table>
	<br><br>
<?php endforeach; ?>
<p>Regards</p>
<p>PhpPoets IT Solution Pvt Ltd</p>
