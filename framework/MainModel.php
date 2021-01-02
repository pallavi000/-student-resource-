<?php

class MainModel
{

    /**
     *
     * @var type is pdo connection object
     */
    protected $pdoCon = NULL;

    /*
     * 
     * @var type is name of table to access database 
     */
    public $tableName = NULL;
    public $condition = "1";
    public $params = array();
    public $attribute = array();
    public $limit = 30;
    public $start = 0;

    /**construct function is used to initialize the connection which is automatic*/

    public function __construct()
    {
        $config = new DbConfig();
        $this->pdoCon = $config->connect();

    }
    /** to insert data into table */
    public function insert()
    {
        $sql = "INSERT INTO $this->tableName(";

        $keys = array_keys($this->attribute);

        $sql .= implode(", ", $keys);
        $sql .= ") VALUES(";
        $data = array();
        foreach ($this->attribute as $key => $value) {
            $data[] = ":" . $key;
        }

        foreach ($this->attribute as $key => $value) {
            $this->params[":" . $key] = $value;
        }
        $sql .= implode(", ", $data);
        $sql .= ")";
        $query = $this->pdoCon->prepare($sql);
        $insert = $query->execute($this->params);
        if ($insert) {
            return true;
        } else {

            return $query->errorInfo();
        }
    }

    /** return total records with pagination*/
    public function getPaginationRecords()
    {


        // How many adjacent pages should be shown on each side?
        $adjacents = 2;

        /*
          First get total number of rows in data table.
          If you have a WHERE clause in your query, make sure you mirror it here.
         */
        $sql = "SELECT COUNT(*) as 'num' FROM $this->tableName WHERE $this->condition";
        $query = $this->pdoCon->prepare($sql);
        $query->execute($this->params);
        $count = $query->fetch(PDO::FETCH_OBJ);
        $total_pages = $count->num;


        /* Setup vars for query. */
        $targetpage = LINK_URL . CONTROLLER . "/" . METHOD; //your file name (the name of this file)
        //$this->limit = 2; 	//how many items to show per page
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        if ($page)
            $start = ($page - 1) * $this->limit;    //first item to display on this page
        else
            $start = 0;        //if no page var is given, set start to 0

        /* Get data. */
        $sql = "SELECT * FROM $this->tableName WHERE $this->condition LIMIT $start, $this->limit";
        $query = $this->pdoCon->prepare($sql);
        $query->execute($this->params);


        /* Setup page vars for display. */
        if ($page == 0)
            $page = 1;     //if no page var is given, default to 1.
        $prev = $page - 1;       //previous page is page - 1
        $next = $page + 1;       //next page is page + 1
        $lastpage = ceil($total_pages / $this->limit);  //lastpage is = total pages / items per page, rounded up.
        $lpm1 = $lastpage - 1;      //last page minus 1

        /*
          Now we apply our rules and draw the pagination object.
          We're actually saving the code to a variable in case we want to draw it more than once.
         */
        $pagination = "";
        if ($lastpage > 1) {
            $pagination .= "<div class=\"pagination\">";
            //previous button
            if ($page > 1)
                $pagination .= "<a href=\"$targetpage&page=$prev\">&laquo; Prev</a>";
            else
                $pagination .= "<span class=\"disabled\">&laquo; Prev</span>";

            //pages
            if ($lastpage < 7 + ($adjacents * 2)) { //not enough pages to bother breaking it up
                for ($counter = 1; $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination .= "<span class=\"current\">$counter</span>";
                    else
                        $pagination .= "<a href=\"$targetpage&page=$counter\">$counter</a>";
                }
            } elseif ($lastpage > 5 + ($adjacents * 2)) { //enough pages to hide some
                //close to beginning; only hide later pages
                if ($page < 1 + ($adjacents * 2)) {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                        if ($counter == $page)
                            $pagination .= "<span class=\"current\">$counter</span>";
                        else
                            $pagination .= "<a href=\"$targetpage&page=$counter\">$counter</a>";
                    }
                    $pagination .= "...";
                    $pagination .= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
                    $pagination .= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";
                } //in middle; hide some front and some back
                elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                    $pagination .= "<a href=\"$targetpage&page=1\">1</a>";
                    $pagination .= "<a href=\"$targetpage&page=2\">2</a>";
                    $pagination .= "...";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                        if ($counter == $page)
                            $pagination .= "<span class=\"current\">$counter</span>";
                        else
                            $pagination .= "<a href=\"$targetpage&page=$counter\">$counter</a>";
                    }
                    $pagination .= "...";
                    $pagination .= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
                    $pagination .= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";
                } //close to end; only hide early pages
                else {
                    $pagination .= "<a href=\"$targetpage&page=1\">1</a>";
                    $pagination .= "<a href=\"$targetpage&page=2\">2</a>";
                    $pagination .= "...";
                    for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                        if ($counter == $page)
                            $pagination .= "<span class=\"current\">$counter</span>";
                        else
                            $pagination .= "<a href=\"$targetpage&page=$counter\">$counter</a>";
                    }
                }
            }

            //next button
            if ($page < $counter - 1)
                $pagination .= "<a href=\"$targetpage&page=$next\">Next &raquo;</a>";
            else
                $pagination .= "<span class=\"disabled\">Next &raquo;</span>";
            $pagination .= "</div>\n";
        }


        $data = array();
        $data['pagination'] = $pagination;
        $data['limit'] = $this->limit;
        $data['totalRecords'] = $total_pages;
        $data['start'] = $start;
        $data['records'] = $query->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    /** do with sql statement*/
    public function BySqlStatement($sql = NULL)
    {
        $query = $this->pdoCon->prepare($sql);
        $exe = $query->execute($this->params);
        if ($exe) {
            return true;
        } else {
            return $query->errorInfo();
        }

    }

    /** To delete single row with passing one value*/
    public function deleteByAttribute($att = Null, $value = NULL)
    {
        $sql = "DELETE  FROM $this->tableName WHERE $att = :value";
        $this->params = array(":value" => $value);
        $query = $this->pdoCon->prepare($sql);
        $query->execute($this->params);
        if ($query) {
            return true;
        } else {
            return $query->errorInfo();
        }
    }

    /** To delete single row with passing multiple condition*/
    public function deleteByCondition()
    {
        $sql = "DELETE  FROM $this->tableName WHERE $this->condition";
        $query = $this->pdoCon->prepare($sql);
        $query->execute($this->params);
        if ($query) {
            return true;
        } else {
            return $query->errorInfo();
        }
    }

    /** To get single row with passing one value*/
    public function findByAttribute($attr, $value)
    {
        $sql = "SELECT * FROM $this->tableName WHERE $attr=:value";
        $this->params[':value'] = $value;
        $query = $this->pdoCon->prepare($sql);
        $query->execute($this->params);
        return $query->fetch(PDO::FETCH_OBJ);
    }
    /** To get multiple row with passing multiple condition*/
    public function findAllByAttribute($attr, $value)
    {
        $sql = "SELECT * FROM $this->tableName WHERE $attr=:value";
        $this->params[':value'] = $value;
        $query = $this->pdoCon->prepare($sql);
        $query->execute($this->params);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /** USED FOR UPDATE VALUE WITH ANY ATTRIBUTE*/
    public function updateByAttribute($attribute = null, $val = null)
    {

        $sql = "UPDATE $this->tableName SET ";
        $data = array();
        foreach ($this->attribute as $key => $value) {
            $data[] = "$key = :" . $key;
        }
        foreach ($this->attribute as $key => $value) {
            $this->params[":" . $key] = $value;
        }
        $sql .= implode(", ", $data);
        $sql .= " WHERE $attribute =:value";
        $this->params[":value"] = $val;


        $query = $this->pdoCon->prepare($sql);
        $update = $query->execute($this->params);
        if ($update) {
            return true;
        } else {
            return $query->errorInfo();

        }
    }

    /** USED FOR UPDATE VALUE WITH ANY CONDITION*/
    public function updateByCondition()
    {
        $sql = "UPDATE $this->tableName SET ";
        $data = array();
        foreach ($this->attribute as $key => $value) {
            $data[] = "$key = :" . $key;
        }
        foreach ($this->attribute as $key => $value) {
            $this->params[":" . $key] = $value;
        }
        $sql .= implode(", ", $data);
        $sql .= " WHERE $this->condition";
        $query = $this->pdoCon->prepare($sql);
        $update = $query->execute($this->params);
        if ($update) {
            return true;
        } else {
            return $query->errorInfo();

        }
    }

    /** to get Fields from table*/
    public function getAllTableFields()
    {
        $sql = "DESC $this->tableName";
        $query = $this->pdoCon->prepare($sql);
        $query->execute($this->params);
        $result = $query->fetchAll(PDO::FETCH_COLUMN);

        return $result;
    }

    /** to get total no. of rows. */
    public function TotalNoOfRecords()
    {
        $sql = "SELECT COUNT(*) as 'num' FROM $this->tableName WHERE $this->condition";
        $query = $this->pdoCon->prepare($sql);
        $query->execute($this->params);
        $count = $query->fetch(PDO::FETCH_OBJ);
        $total_records = $count->num;
        return $total_records;
    }

    /** to get all rows */
    public function getAllRecords()
    {
        /* Get data. */
        $start = 0;
        $sql = "SELECT * FROM $this->tableName WHERE $this->condition LIMIT $start, $this->limit";
        $query = $this->pdoCon->prepare($sql);
        $query->execute($this->params);
        $records = $query->fetchAll(PDO::FETCH_OBJ);
        return $records;
    }

    /**88888888888888888888888888888888888888888888*/

    /** USED*/
    public function changeStatus($id = Null)
    {
        $sql = "UPDATE $this->tableName SET status = !status WHERE id = :id";
        $this->params = array(":id" => $id);
        $query = $this->pdoCon->prepare($sql);
        $query->execute($this->params);

    }

    public function changeApprove($id = Null)
    {
        $sql = "UPDATE $this->tableName SET approved = !approved WHERE id = :id";
        $this->params = array(":id" => $id);
        $query = $this->pdoCon->prepare($sql);
        $query->execute($this->params);

    }

    /** USED */
    public function deleteById($id = NULL)
    {
        $sql = "DELETE  FROM $this->tableName WHERE id = :id";
        $this->params = array(":id" => $id);
        $query = $this->pdoCon->prepare($sql);

        $query->execute($this->params);
        if ($query) {
            return true;
        } else {
            return $query->errorInfo();
        }
    }

    public function deleteBySql($sql = NULL)
    {
        $query = $this->pdoCon->prepare($sql);
        $query->execute($this->params);
        if ($query) {
            return true;
        } else {
            return $query->errorInfo();
        }
    }

    /** USED */
    public function getFields()
    {
        $sql = "DESC $this->tableName";
        $query = $this->pdoCon->prepare($sql);
        $query->execute($this->params);
        return $query->fetchAll(PDO::FETCH_COLUMN);
    }


    /** USED */
    public function find()
    {
        $sql = "SELECT * FROM $this->tableName WHERE $this->condition";
        $query = $this->pdoCon->prepare($sql);
        $query->execute($this->params);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function findByField($field = NULL)
    {
        $sql = "SELECT $field FROM $this->tableName WHERE $this->condition";
        //echo $sql;
        // print_r($this->params);
        $query = $this->pdoCon->prepare($sql);
        $query->execute($this->params);
        return $query->fetch(PDO::FETCH_OBJ);
        // print_r();

    }
    public function findAllByField($field = NULL)
    {
        $sql = "SELECT  $field FROM $this->tableName WHERE $this->condition";
        //echo $sql;
        // print_r($this->params);
        $query = $this->pdoCon->prepare($sql);
        $query->execute($this->params);
        return $query->fetchAll(PDO::FETCH_OBJ);
        // print_r();

    }
    public function findAllByFieldDistinct($field = NULL)
    {
        $sql = "SELECT DISTINCT  $field FROM $this->tableName WHERE $this->condition";
        //echo $sql;
        // print_r($this->params);
        $query = $this->pdoCon->prepare($sql);
        $query->execute($this->params);
        return $query->fetchAll(PDO::FETCH_OBJ);
        // print_r();

    }


    public function findBySql($sql = NULL)
    {
        $query = $this->pdoCon->prepare($sql);
        $query->execute($this->params);
        $res = $query->fetch(PDO::FETCH_OBJ);
        return $res;

    }

    public function findAllBySql($sql = NULL)
    {
        $query = $this->pdoCon->prepare($sql);
        $query->execute($this->params);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function updateBySql($sql = NULL)
    {
        $query = $this->pdoCon->prepare($sql);
        $update = $query->execute($this->params);
        if ($update) {
            return true;
        } else {
            /* print_r($query->errorInfo());
             exit;*/
            $query->errorInfo();
        }
    }

    /**
     * @findById($id = NULL) method used for fetch the data through
     */
    public function findById($id = NULL)
    {
        $sql = "SELECT * FROM $this->tableName WHERE id = :id";

        $this->params = array(":id" => $id);
        $query = $this->pdoCon->prepare($sql);
        $query->execute($this->params);

        return $query->fetch(PDO::FETCH_OBJ);
        //return "echo";

    }

    public function findByUserid($id = NULL)
    {
        $sql = "SELECT * FROM $this->tableName WHERE user_id = :id";
        $this->params = array(":id" => $id);
        $query = $this->pdoCon->prepare($sql);
        $query->execute($this->params);
        return $query->fetch(PDO::FETCH_OBJ);

    }

    /**Return total Records with out pagination*/

    public function findAll()
    {
        $sql = "SELECT * FROM $this->tableName WHERE $this->condition LIMIT $this->start,$this->limit";
        $query = $this->pdoCon->prepare($sql);

        $query->execute($this->params);
        return $query->fetchAll(PDO::FETCH_OBJ);;
    }

    public function countTotalRecords()
    {
        $sql = "SELECT COUNT(*) AS 'countTotalRecords' FROM $this->tableName WHERE $this->condition";
        $query = $this->pdoCon->prepare($sql);
        $query->execute($this->params);
        $data = array();
        $data['countTotalRecords'] = $query->fetch(PDO::FETCH_COLUMN);
        return $data;
    }

    public function update($id = NULL)
    {
        $sql = "UPDATE $this->tableName SET ";
        $data = array();
        foreach ($this->attribute as $key => $value) {
            $data[] = "$key = :" . $key;
        }
        /*
          echo "<pre>";
          print_r($data);
          exit;
         * */

        foreach ($this->attribute as $key => $value) {
            $this->params[":" . $key] = $value;
        }
        //print_r($this->params);
        $sql .= implode(", ", $data);

        $sql .= " WHERE id =:id";
        // echo $sql;
        $this->params[":id"] = $id; //$this->params = array(":id" => $id);
        // print_r($this->params);
        // exit;
        $query = $this->pdoCon->prepare($sql);
        $update = $query->execute($this->params);
        if ($update) {
            return true;
        } else {
            /* print_r($query->errorInfo());
             exit;*/
            $query->errorInfo();
        }
    }


    /** Return total records with pagination*/
    public function getRecords()
    {


        // How many adjacent pages should be shown on each side?
        $adjacents = 2;

        /*
          First get total number of rows in data table.
          If you have a WHERE clause in your query, make sure you mirror it here.
         */
        $sql = "SELECT COUNT(*) as 'num' FROM $this->tableName WHERE $this->condition";
        // echo $sql;
        //exit;


        $query = $this->pdoCon->prepare($sql);
        //print_r($this->params);
        //exit;
        $query->execute($this->params);
        $count = $query->fetch(PDO::FETCH_OBJ);
        $total_pages = $count->num;


        /* Setup vars for query. */
        $targetpage = LINK_URL . CONTROLLER . "/" . METHOD; //your file name (the name of this file)
        //$this->limit = 2; 	//how many items to show per page
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        if ($page)
            $start = ($page - 1) * $this->limit;    //first item to display on this page
        else
            $start = 0;        //if no page var is given, set start to 0

        /* Get data. */
        $sql = "SELECT * FROM $this->tableName WHERE $this->condition LIMIT $start, $this->limit";

        $query = $this->pdoCon->prepare($sql);
        $query->execute($this->params);

        /* Setup page vars for display. */
        if ($page == 0)
            $page = 1;     //if no page var is given, default to 1.
        $prev = $page - 1;       //previous page is page - 1
        $next = $page + 1;       //next page is page + 1
        $lastpage = ceil($total_pages / $this->limit);  //lastpage is = total pages / items per page, rounded up.
        $lpm1 = $lastpage - 1;      //last page minus 1

        /*
          Now we apply our rules and draw the pagination object.
          We're actually saving the code to a variable in case we want to draw it more than once.
         */
        $pagination = "";
        if ($lastpage > 1) {
            $pagination .= "<div class=\"pagination\">";
            //previous button
            if ($page > 1)
                $pagination .= "<a href=\"$targetpage&page=$prev\">&laquo; Prev</a>";
            else
                $pagination .= "<span class=\"disabled\">&laquo; Prev</span>";

            //pages	
            if ($lastpage < 7 + ($adjacents * 2)) { //not enough pages to bother breaking it up
                for ($counter = 1; $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination .= "<span class=\"current\">$counter</span>";
                    else
                        $pagination .= "<a href=\"$targetpage&page=$counter\">$counter</a>";
                }
            } elseif ($lastpage > 5 + ($adjacents * 2)) { //enough pages to hide some
                //close to beginning; only hide later pages
                if ($page < 1 + ($adjacents * 2)) {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                        if ($counter == $page)
                            $pagination .= "<span class=\"current\">$counter</span>";
                        else
                            $pagination .= "<a href=\"$targetpage&page=$counter\">$counter</a>";
                    }
                    $pagination .= "...";
                    $pagination .= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
                    $pagination .= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";
                } //in middle; hide some front and some back
                elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                    $pagination .= "<a href=\"$targetpage&page=1\">1</a>";
                    $pagination .= "<a href=\"$targetpage&page=2\">2</a>";
                    $pagination .= "...";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                        if ($counter == $page)
                            $pagination .= "<span class=\"current\">$counter</span>";
                        else
                            $pagination .= "<a href=\"$targetpage&page=$counter\">$counter</a>";
                    }
                    $pagination .= "...";
                    $pagination .= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
                    $pagination .= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";
                } //close to end; only hide early pages
                else {
                    $pagination .= "<a href=\"$targetpage&page=1\">1</a>";
                    $pagination .= "<a href=\"$targetpage&page=2\">2</a>";
                    $pagination .= "...";
                    for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                        if ($counter == $page)
                            $pagination .= "<span class=\"current\">$counter</span>";
                        else
                            $pagination .= "<a href=\"$targetpage&page=$counter\">$counter</a>";
                    }
                }
            }

            //next button
            if ($page < $counter - 1)
                $pagination .= "<a href=\"$targetpage&page=$next\">Next &raquo;</a>";
            else
                $pagination .= "<span class=\"disabled\">Next &raquo;</span>";
            $pagination .= "</div>\n";
        }


        $data = array();
        $data['pagination'] = $pagination;

        $data['totalRecords'] = $total_pages;
        $data['start'] = $start;
        $data['records'] = $query->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

}
