<h1>
    <h1>Les derniers articles</h1>
    <?php foreach($params['posts'] as $post): 
        
        ?>

<div class="card">
    <div class="cardbody">
    <h2><?=$post->title?></h2>
    <div>
    <?php foreach ($post -> getTags() as $tag ): ?>
        
        <span class="bagde badge-success"><a href="/my-app/tags/<?= $tag -> id ?>" class="text-white"> 
            <?= $tag -> name ?></a>
        </span>
    <!-- >< -->
        <?php endforeach ?>
     
    </div>
    <small class="text-info"  >Publié le <?=$post->getCreatedAt()?></small>
    <p><?=$post->getExcerpt()?></p>

       <a href="/my-app/posts/<?= $post ->id ?>  " class='btn btn-primary'>Lire plus</a>
       <!-- <?=$this ->getButton?>     -->
</div>
</div>
    <?php endforeach ?>
</h1>