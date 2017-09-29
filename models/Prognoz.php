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

}