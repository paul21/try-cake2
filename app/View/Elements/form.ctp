<?php
	echo $this->Form->create('Post');
	echo $this->Form->input('title');
	echo $this->Form->input('body', array('rows' => '3'));

	if($this->action == 'edit'){
		echo $this->Form->input('id', array('type' => 'hidden'));
	}
	
	echo $this->Form->end('Save Post');
?>