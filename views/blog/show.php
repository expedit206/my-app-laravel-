<!-- >< -->
<?php 
// var_dump($params['post'])
?>

<h1> <?= $params ['post'] -> title?></h1>
<div>
    <?php foreach ($params['post']  -> getTags() as $tag ): ?>
        
        <span class="bagde badge-info"><?= $tag -> name ?></span>
        <?php endforeach ?>
    
    </div>
<p> <?= $params ['post'] -> content?></p>

<a href="/my-app/posts" class ='btn btn-secondary'>Retourner en arriere</a>