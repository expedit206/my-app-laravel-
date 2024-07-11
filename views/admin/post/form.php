<h1>modifier <?= $params['post']-> title?? 'creer un nouvel article' ?> </h1>

<form action="<?= isset($params['post']) ? "/my-app/admin/posts/edit/{$params['post'] -> id}": "/my-app/admin/posts/create" ?>" method="POST">

<div class="form-group">
    <label for="title">Titre de l'article</label>
    <input type="text" class="form-control" name="title" id="title" value="<?= $params['post']->title ?? ''?>" required>
</div>

<div class="form-group">
    <label for="content">Contenu de l'article</label>

            <textarea name="content" id="content" rows ="8" class="form-control" required>
                
                <?= $params['post']->content??'' ?>
        </textarea>
</div>
<?php
// echo  '<pre>';
// var_dump($params['tags']);
// echo  '</pre>';
?>
<div class="form-group">
    <label for="tags">Tags de l'article</label>
    <select multiple id="tags" class="form-control" name="tags[]" required>  
        <?php
         foreach ($params['tags'] as $tag ): ?>
            <option value="<?=$tag->id?>"
            <?php 
            if(isset($params['post'])) {
                
                foreach ($params['post']->getTags() as $postTag) {
                    echo ($tag->id===$postTag->id)? 'selected' : '';
                }  
             }
                ?>
            ><?=$tag->name ?></option>   
        
        <?php endforeach ?> 
        </select>
</div>
    <button type="submit" class="btn btn-primary"><?=isset($params['post']) ? "Enregistrer les modifications" : "Enregitrer mon article" ?> </button>
</form>

<!-- >< -->