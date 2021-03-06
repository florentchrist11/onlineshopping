<?php 
require_once(dirname(__FILE__) . "/PDOType.php");
require_once(dirname(__FILE__) . "/IDAOuser.php");



 class DAOuser implements IDAOuser {

    private function getPDO(){

            $stmt = new PDO('sqlite:bd_shops.sqlite3');
            // Set errormode to exceptions
            $stmt->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            $this->stmt =  $stmt;
        
        return    $stmt;
  }

 public function getAllProduct($table) {
        $statement = "SELECT * FROM $table" ;
        $stmt = $this->getPDO()->query($statement);
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return   $datas;
    } 
    public function updateUser($table,$active,$username){
        $db = $this->getPDO();
    
        $q = $db->prepare("UPDATE $table SET sellerID ='".$active."' WHERE $username=: value;");
        $q->bindParam(':value', $username);
        $q->execute();
    
        $data = $q->fetch(PDO::FETCH_ASSOC);
        return $data ;
}
    
    public function countUser($table,$password,$username)
    {
    
        $db = $this->getPDO();
        $q = $db->prepare("SELECT count(*) FROM $table WHERE $username=: value; AND password='".$password."' AND sellerID ='active'");
        $q->execute();
        $q->bindParam(':value', $username);
        $count = $q->fetch(PDO::FETCH_ASSOC);
    
        $q->closeCursor();
    
         return $count; 
        
    }
    public function getPass( $field, $username){
        $db = $this->getPDO();
        $q = $db->prepare("SELECT pwd FROM account WHERE $field = :value;");
        $q->bindParam(':value', $username);
        $q->execute();
        $data = $q->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function getStatus($table, $field, $value)
    {


        $db = $this->getPDO();
         $statement = $db->prepare("SELECT * FROM $table where $field=:value" );
         $statement->bindParam(':value', $value);
         $statement->execute();
         
        return $statement->fetchAll();

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
    function deleteRowFromDb( $table,$id,$field){
        $db = $this->getPDO();
        $db->beginTransaction();
        $q = $db->prepare ("DELETE FROM $table WHERE $field=:value; ");
        $q->bindValue(':value',$id);
        $q->execute();
        $db->commit();
        $q->closeCursor();
        $statement = "SELECT * FROM $table" ;
        $stmt = $this->getPDO()->query($statement);
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return   $datas; 

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

        $q = $db->prepare("SELECT $field FROM $table WHERE $field = ?");
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

    public function getTaskCountByProject( $fields , $value) {
        $db = $this->getPDO();

        $stmt = $db->prepare("SELECT COUNT(*) 
                                    FROM account
                                   WHERE  $fields = :value;");
        $stmt->bindParam(':value', $value);
        $stmt->execute();
        return $stmt->fetchColumn();
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

    function getAllByFilter($table, $clause = [], $elt = "*", $order = "", $filter = false, $limit = "")
    {
        global $db;

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
                $conditions .= " $key = :$key AND";
            }
            else
            {
                $conditions .= " $key = :$key ";
            }
            ++$i;
        }

        if($conditions)
            $conditions = "WHERE" . $conditions;

        /*
         * ORDER BY SOME FILTER
         */
        $orderBy = !empty($order) ? "ORDER BY " . $order : "";
        $limit = (empty($limit))? $limit : " LIMIT ".$limit;

        if($filter)
        {
            $req = "SELECT DISTINCT " . $elt . " FROM " . $table . " " . $conditions . $orderBy . $limit .  " ;";
        }
        else
        {
            $req = "SELECT " . $elt . " FROM " . $table . " " . $conditions . $orderBy . $limit .  " ;";
        }

        $q = $db->prepare("$req");

        foreach ($clause as $key => $value)
        {
            $q->bindValue(":$key", $value, getPDOtype($value));
        }

        $result = $q->execute();
        $data = $q->fetchAll(PDO::FETCH_OBJ);
        $q->closeCursor();

        return ($data ? ((count($data) > 1) ? $data : $data[0]) : false);
   
    }



function getValueByFucntionSQL($table, $clause = [], $elt = "id", $function = "COUNT")
{
    global $db;

    /*
     * CONSTRUCTION OF CONDITION
     */
    $conditions = "";
    if(!empty($clause))
    {
        $n = count($clause);
        $i = 0;
        $conditions = " WHERE ";

        foreach ($clause as $key => $value)
        {
            if($i < ($n - 1))
            {
                $conditions .= " $key = :$key AND";
            }
            else
            {
                $conditions .= " $key = :$key ";
            }
            ++$i;
        }
    }

    $req = "SELECT " . $function . "( " . $elt . " ) as element FROM " . $table . $conditions .";";

    $q = $db->prepare("$req");

    if(!empty($clause))
    {
        foreach ($clause as $key => $value)
        {
            $q->bindValue(":$key", $value, getPDOtype($value));
        }
    }

    $result = $q->execute();
    $data = $q->fetch(PDO::FETCH_OBJ);
    $q->closeCursor();

    return ($data ? $data->element : false);
}














}

