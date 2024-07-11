
    <h1><?= $params['tag']->name?></h1>
    <?php foreach($params['tag']->getPosts( ) as $post): 
        
        ?>

<div class="card">
    <div class="cardbody">
        <a href="/my-app/posts/<?= $post -> id ?> "><?= $post -> title ?></a>

</div>
</div>
    <?php endforeach ?>
</h1>