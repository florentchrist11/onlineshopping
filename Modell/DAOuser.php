<?php 
require_once(dirname(__FILE__) . "/PDOType.php");
require_once(dirname(__FILE__) . "/IDAOuser.php");



 class DAOuser implements IDAOuser {

   private  $db ;
 
  
   public function __construct(){
   
   
   
   }
    
    private function getPDO(){
  
    if($this->db ==null){
   

$file_db = new PDO('sqlite:bd_shops.sqlite3');                                                                
$base = 'bd_shops.sqlite3';

try {
  $db = new SQLite3($base);
} catch (SQLite3 $e) {
//  die("La création ou l'ouverture de la base [$base] a échouée ".
     //  "pour la raison suivante: ".$e->getMessage());
}

     $this->stmt =   $db ;
  }

   return    $this->stmt ;

  }

    public function getAllProduct($table) {
        $statement = " SELECT * FROM $table" ;
        $stmt = $this->getPDO()->query($statement);
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return   $datas ;

    }

    
    function insertTableEntry($table, $data = [])
    {
         $db = $this->getPDO();
       
        /*
         * CONSTRUCTION OF DATASETS
         */
        $db->beginTransaction();
        $fields = "";
        $values = "";
        $n = count($data);
        $i = 0;
        foreach ($data as $key => $value)
        {
            if($i < ($n - 1))
            {
                $fields .= "$key, ";
                $values .= ":$key, ";
            }
            else
            {
                $fields .= "$key";
                $values .= ":$key";
            }
            ++$i;
        }
       
        $req = "INSERT INTO $table ( $fields ) VALUES ( $values );";

        $q = $db->prepare($req);

        foreach ($data as $key => $value)
        {
            $q->bindValue(":$key", $value, getPDOtype($value));
        }
        $result = $q->execute();
        $db->commit();

        $q->closeCursor();
  
        return $result;
    }

    function deleteTableEntry($table, $clause = [], $operator = [])
    {
        $db = $this->getPDO();

        /*
         * CONSTRUCTION OF CONDITION
         */
        $db->beginTransaction();
        $conditions = "";
        $n = count($operator);
        $i = 0;
        foreach ($clause as $key => $value)
        {
            if($i < $n)
            {
                $conditions .= " $key = :$key " . $operator[$i];
            }
            else
            {
                $conditions .= " $key = :$key ";
            }
            ++$i;
        }
         
        $q = $db->prepare("DELETE FROM $table WHERE $conditions");

        foreach ($clause as $key => $value)
        {
            $q->bindValue(":$key", $value, getPDOtype($value));
        }

        $result = $q->execute();
        $db->commit();
        $q->closeCursor();

        return ($result ? true : false);
    }



    

    function isUse($table, $field, $value)
    {
       
        $db = $this->getPDO();

        $q = $db->prepare("SELECT id FROM $table WHERE $field = ?");
        $q->execute([$value]);

        $count = $q->rowCount();

        $q->closeCursor();

        return $count ? true : false;
    }

    function countRow($table, $field)
    {
       
        $db = $this->getPDO();

        $q = $db->prepare("SELECT count(*) FROM $table WHERE $field IS NOT NULl");
        $q->execute();

        $count = $q->fetch(PDO::FETCH_ASSOC);

        $q->closeCursor();

        return $count ;
    }
    function updateTableEntry($table, $data = [], $clause = [], $operator = [])
    {
        $db = $this->getPDO();

        /*
         * CONSTRUCTION OF DATASETS
         */
        $db->beginTransaction();
        $datasets = "";
        $n = count($data);
        $i = 0;
        foreach ($data as $key => $value)
        {
            if($i < ($n - 1))
            {
                $datasets .= "$key = :$key, ";
            }
            else
            {
                $datasets .= "$key = :$key";
            }
            ++$i;
        }

        /*
         * CONSTRUCTION OF CONDITION
         */
        $conditions = "";
        $n = count($clause);
        $i = 0;
        foreach ($clause as $key => $value)
        {
            if($i < ($n - 1))
            {
                $conditions .= " $key = :$key " . $operator[$i];
            }
            else
            {
                $conditions .= " $key = :$key ";
            }
            ++$i;
        }

        $req = ($conditions ? "UPDATE $table SET $datasets WHERE $conditions;" : "UPDATE $table SET $datasets;");

        $q = $db->prepare($req);
        foreach ($data as $key => $value)
        {
            $q->bindValue(":$key", $value, getPDOtype($value));
        }

        foreach ($clause as $key => $value)
        {
            $q->bindValue(":$key", $value, getPDOtype($value));
        }
        $result = $q->execute();
        $db->commit();
        $q->closeCursor();

        return  ($result ? true : false);
    }


    
 }

    