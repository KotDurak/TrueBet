<?php


class Prognoz
{
    const SHOW_BY_DEFAULT = 10;


    public static function getAllPrognoz($page = 1)
    {
        $limit = Prognoz::SHOW_BY_DEFAULT;

        // Смещение (для запроса)
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;


        $db = Db::getConnection();

        $sql = 'SELECT * FROM prognoz ORDER  BY id DESC LIMIT :limit OFFSET :offset';

        $result = $db->prepare($sql);
        $result->bindParam(':limit',$limit,PDO::PARAM_INT);
        $result->bindParam(':offset',$offset,PDO::PARAM_INT);

        $result->execute();

        $i = 0;
        $prognozes = array();

        while($row = $result->fetch()){
            $prognozes[$i]['id'] = $row['id'];
            $prognozes[$i]['name'] = $row['name'];
            $prognozes[$i]['coefficent'] = $row['coefficent'];
            $prognozes[$i]['gb'] = $row['gb'];
            $prognozes[$i]['date'] = $row['date'];
            $prognozes[$i]['description'] = $row['description'];
            $i++;
        }
        return $prognozes;
    }

    public static  function getTotalPrognoz()
    {
        $db = Db::getConnection();

        $sql = 'SELECT count(id) AS count FROM prognoz';

        $result = $db->prepare($sql);

        $result->execute();
        $row = $result->fetch();
        return $row['count'];
    }

    public static function deleteCategoryById($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM prognoz WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id',$id,PDO::PARAM_INT);
        return $result->execute();

    }

    public static function createPrognoz($options)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO prognoz '
            . '(name,gb,date,description,coefficent)'
             .'VALUES'
            .'(:name,:gb,:date,:description,:coefficent)';

        $result = $db->prepare($sql);

        $result->bindParam(':name',$options['name'],PDO::PARAM_STR);
        $result->bindParam(':gb', $options['gb'],PDO::PARAM_INT);
        $result->bindParam(':date',$options['date'],PDO::PARAM_STR);
        $result->bindParam(':description',$options['description'],PDO::PARAM_STR);
        $result->bindParam(':coefficent',$options['coefficent'],PDO::PARAM_STR);

        if($result->execute()){
            return $db->lastInsertId();
        }
        return 0;

    }

    public static function updatePrognozById($id,$options)
    {
        $db = Db::getConnection();

        $sql = "UPDATE prognoz 
                SET  
                    name = :name,
                    gb = :gb, 
                    date =:date,
                    description = :description,
                    coefficent = :coefficent
                WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id',$id,PDO::PARAM_INT);
        $result->bindParam(':gb',$options['gb'],PDO::PARAM_INT);
        $result->bindParam(':name',$options['name'],PDO::PARAM_STR);
        $result->bindPAram(':date',$options['date'],PDO::PARAM_STR);
        $result->bindParam(':description',$options['description'],PDO::PARAM_STR);
        $result->bindParam(':coefficent',$options['coefficent'], PDO::PARAM_STR);
        return $result->execute();
    }

    public static function getPrognozById($id)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM prognoz WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id',$id,PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

    public static function getImage($id)
    {
        $noImage = 'no-image.png';

        $path = '/uploads/itemsimg/';

        $pathToPrognozImage = $path . $id . '.jpg';

        if(file_exists($_SERVER['DOCUMENT_ROOT'].$pathToPrognozImage)){
            return $pathToPrognozImage;
        }

        return $path . $noImage;
    }

}