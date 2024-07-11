<h1>Administration des articles </h1>

<?php if(isset($_GET['success'])) : ?>
    <div class="alert alert-success">Vous etes connecté!</div>
    <?php endif ?>
    
<a href="/my-app/admin/posts/create" class="btn btn-success my-3">Creer Un nouvel article</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titre</th>
            <th scope="col">Publié le</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>

    <tbody>
    <?php foreach ($params['posts'] as $post) : ?> 
        <tr>
            <th scope="row"><?= $post -> id ?></th>
            <td><?= $post -> title ?></td>
            <td><?= $post -> getCreatedAt() ?></td>
            <td>
                <form action="/my-app/admin/posts/delete/<?= $post -> id ?>" method ="POST" class="d-inline">
                    <a href="/my-app/admin/posts/edit/<?= $post -> id ?>" class="btn btn-warning">Modifier</a>
                 <button type="submit"  class="btn btn-danger">Supprimer</button>
                        
                   </form>
            </td>
        </tr>
     <?php endforeach ?>

<!-- >< -->

    </tbody>
</table>