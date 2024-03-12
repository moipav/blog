<?php $this->layout('layout', ['title' => 'Homepage']);
/**
 * @var array $posts
 *
 */
?>

<div class="content">
    <div class="row">
        <div class="col-md-8">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Post</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($posts as $post):?>
                    <tr>
                        <th scope="row"><?=$post['id']?></th>
                        <td><?=$post['title']?></td>
                        <td><?=$post['post']?></td>
                    </tr>
                <?php endforeach;?>

                </tbody>
            </table>
        </div>
    </div>
</div>

