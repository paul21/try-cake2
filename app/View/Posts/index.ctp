<!-- File: /app/View/Posts/index.ctp -->

<h1>Blog posts</h1>

<table>
<?php 
    echo $this->Html->tableHeaders(array('Id', 'Title', '', '', 'Created'));

    foreach ($posts as $post):

        echo $this->Html->tableCells(array(array(
                $post['Post']['id'],
                $this->Html->link(
                            $post['Post']['title'],
                            array('action' => 'view', $post['Post']['id'])
                            ),
                $this->Form->postLink(
                            'Delete',
                            array('action' => 'delete', $post['Post']['id']),
                            array('confirm' => 'Are you sure?')
                            ),
                $this->Html->link(
                            'Edit', array('action' => 'edit', $post['Post']['id'])
                            ),
                $post['Post']['created']
                )));       
    endforeach; 
?>
</table>

<p><?php echo $this->Html->link('Add Post', array('action' => 'add')); ?></p>

<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Add Post</button>

<?php echo $this->element('modal'); ?>