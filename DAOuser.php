<?php 
require_once(dirname(__FILE__) . "/PDOType.php");
 



 class DAOuser implements IDAOuser {

    
   private $host ;
   private  $name ;
   private  $user ;
   private $passwort ;
   private  $db ;
 
  
   public function __construct(){
   
    $this->host = "localhost";
    $this->name = "shop";
    $this->user = "root";
    $this->passwort = "";
   
   
   }
    
    private function getPDO(){
  
    if($this->db ==null){
 
        $stmt = new PDO("mysql:host=$this->host;dbname=$this->name", $this->user, $this->passwort);
     
        $stmt->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC );

     $this->stmt =   $stmt ;
  }
   return    $stmt  ;

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
        $q->closeCursor();

        return $result;
    }

    function deleteTableEntry($table, $clause = [], $operator = [])
    {
        $db = $this->getPDO();

        /*
         * CONSTRUCTION OF CONDITION
         */
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

    function updateTableEntry($table, $data = [], $clause = [], $operator = [])
    {
        $db = $this->getPDO();

        /*
         * CONSTRUCTION OF DATASETS
         */
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

        $q->closeCursor();

        return  ($result ? true : false);
    }


    
 }

    