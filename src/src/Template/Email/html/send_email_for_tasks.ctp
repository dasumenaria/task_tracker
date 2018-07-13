<p>Dear Sir,</p>
<p>Today's Completed Task</p>
<p><ul>
<?php foreach($user['tasks'] as $task){ ?>
	<li><?php echo $task['title']; ?></li>
<?php } ?>
</ul></p>
<p>Regards</p>
<p><?= $user['name'] ?></p>