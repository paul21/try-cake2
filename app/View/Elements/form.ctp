<?php
	echo $this->Form->create('Post');
	echo $this->Form->input('title');
	echo $this->Form->input('body', array('rows' => '3'));
	echo $this->Form->end('Save Post');
	
	$data = $this->Js->get('#PostIndexForm')->serializeForm(array('isForm' => true, 'inline' => true));
    $this->Js->get('#PostIndexForm')->event(
          'submit',
          $this->Js->request(
            array('action' => 'add'),
            array(
                    'update' => '#commentStatus',
                    'data' => $data,
                    'async' => true,    
                    'dataExpression'=>true,
                    'method' => 'POST'
                )
            )
        );
    echo $this->Js->writeBuffer();
?>