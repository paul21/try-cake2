<!-- File: /app/View/Posts/index.ctp -->

<h1>Blog posts</h1>

<table class="table" id="postsTable">
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

<?php echo $this->element('modal');

$postAddUrl = Router::url(array('controller' => 'posts', 'action' => 'add'));
$postViewUrl = Router::url(array('controller' => 'posts', 'action' => 'view'));
$postEditUrl = Router::url(array('controller' => 'posts', 'action' => 'edit'));

$scriptJS = $this->Html->scriptBlock(
<<<JS
    $(document).ready(function(){
        $('#PostIndexForm').on('submit',function(event){
            event.preventDefault();
            var title = $('#PostIndexForm').find('input[type=text]').val();
            var content = $('#PostIndexForm').find('textarea').val();
            var post = { Post: { title: title, body:content }}
            $.ajax(
            {
                async:true,
                contentType: "application/json",
                data:JSON.stringify(post),
                dataType:'html',
                success:function (data, textStatus) {
                    add_new_row(data);
                },
                type:'POST',
                url:"$postAddUrl.json"
              }); 
            $('#myModal').modal('hide');
            //return false;
            
        });
    });
    var add_new_row = function(data){
        response = JSON.parse(data);
        $('#postsTable').append('<tr><td>' + response.Post.id + '</td><td><a href="$postViewUrl/' + response.Post.id + '">' + response.Post.title + '</a>' + '</td><td><a href="">Delete</a></td><td><a href="$postEditUrl/' + response.Post.id + '">Edit</a></td><td>' + response.Post.created + '</td></tr>');
    };
JS
);

echo $scriptJS;

?>