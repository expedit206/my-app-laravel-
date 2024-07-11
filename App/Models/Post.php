<?php

namespace App\Models;
use DateTime;
class Post extends Model{

protected $table = 'posts';
public function getCreatedAt():string
{
    return(new DateTime($this ->created_at))->format('d/m/Y à H:m:s');
}


public function getExcerpt()
{
    return substr($this -> content, 0, 300 ). '...';
    
}

public function getButton():string
{
    
    echo 'le button';
    return <<<HTML
    <a href="/posts/$this ->id" class='btn btn-primary'>Lire plus</a>
    
HTML;
}

public function getTags()
{
    return  $this -> query("SELECT t.* FROM tags t 
    INNER JOIN post_tag pt ON pt.tag_id = t.id 
    WHERE pt.post_id= $this->id",[$this -> id]);
}

public function create(array $data, ?array $relations = null)
{

    parent::create($data);

    $id = $this->db->getPDO()->lastInsertId();

    foreach ($relations as $tagId) {    
        $stmt =  $this ->db->getPDO()->prepare("INSERT post_tag(post_id, tag_id) values($id, $tagId)");
         $stmt ->execute();
     }

     return true;

}


public function update(int $id, array $data , ?array $relations = null)
{
    parent::update($id, $data);

    $stmt = $this -> db-> getPDO()->prepare("DELETE FROM post_tag WHERE post_id = $id");
    $result= $stmt -> execute();  
    
    foreach ($relations as $tagId) {
        
       $stmt =  $this ->db->getPDO()->prepare("INSERT post_tag(post_id, tag_id) values($id, $tagId)");
        $stmt ->execute();
    }

    if($result){
        return true;
    }
}
}
// ><