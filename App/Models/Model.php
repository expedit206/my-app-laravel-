<?php
namespace App\Models;

use PDO;
use Database\DBConnection;

abstract class Model{
    
    protected $db;
    protected $table;
    
    
    public function __construct( $db){
        $this ->db = $db;
    }  

    public function query(string $sql, array $param=null, bool $single = null)
    {
        $method = is_null($param) ? 'query' : 'prepare';
        $fetch = is_null($single) ? 'fetchAll' : 'fetch';
        
        if (
            strpos($sql, 'DELETE') === 0 
            || strpos($sql, 'UPDATE') === 0 
            || strpos($sql, 'INSERT') === 0 ) {

                $stmt = $this-> db ->getPDO()-> $method($sql);
                $stmt -> setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this -> db]);
                return $stmt ->execute();
        }

    
        $stmt = $this-> db ->getPDO()-> $method($sql);
    $stmt -> setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this -> db]);

    
    if($method==='query'){
       return $stmt -> $fetch();
    }else{
        $stmt ->execute();
        return $stmt -> $fetch();
    }
    
    }

    public function all():array
    {
        return $this -> query("SELECT * FROM {$this->table}");
    }

public function findById(int $id)  
    {
        return $this ->query("SELECT * FROM {$this->table} where id = $id", [$id], true);
    }

    public function create(array $data, ?array $relations = null)
    {
$title = $data['title'];

$content = $data['content'];

return $this -> query("INSERT INTO posts (title, content) VALUES('$title', '$content')");
    }



    public function createPost(array $data, ?array $ralations =null)
    {    
        $this-> isAdmin();

        $post = new Post($this->getDB());
        $tags = array_pop($_POST);
    
        $result = $post->create($_POST , $tags);
    
        if($result){
            return header('location: /my-app/admin/posts');
            // ><
        }
    }

    public function update(int $id, array $data, ?array $relations = null)
    {
        $i=1;
        $sqlRequestPart= "";
        foreach ($data as $key => $value) {
            $comma = $i===count($data) ? " " : ", ";
            // $sqlRequestPart.="{$key} = {$value}{$comma}";
            $sqlRequestPart.="{$key} = :{$key}{$comma}";
            $i++;
        }
        var_dump($sqlRequestPart);
        // echo phpinfo();
        $data['id'] = $id;

        $title = $data['title'];
        $content = $data['content'];
      return  $this -> query("UPDATE {$this->table} SET title= '$title', content = '$content' where id = '$id'", [$id]);
// return $this -> query("UPDATE {$this->table} SET title= :title, content : content", [$id]);
// return $this -> query("UPDATE {$this->table} SET {$sqlRequestPart}", [$id]);
         // echo 'pas encore gerer a 3h:40min';
    }


    public function destroy(int $id)
    {
        return $this->query("DELETE FROM {$this->table} WHERE id = $id", [$id]);
    }

    
    // public function getTags()
    // {
    //     return $this ->query("SELECT t.* FROM tags t INNER JOIN post_tags pt ON pt.tag_id=t.id");
    // }
    // >< 

    
}