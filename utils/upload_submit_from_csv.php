<?php
// for ($i = 1; $i < count($csv) - 1; $i++) {
// $arrVals = $csv[$i];
// var_dump($arrVals);
// echo '<br>';
// $sql = "INSERT INTO shifts_submitted ($sqlCols) VALUES (?,?,?,?,?,?,?,?,?,?);";
// echo $sql . '<br>';
// $stmt = $dbh->prepare($sql);
// $stmt->execute($arrVals);
// var_dump($stmt->errorInfo());
// echo '<br>';
// }


class CsvRespondsUploader
{
    public function __construct($dbh, $homedir, $fpath)
    {
        $this->m = $_GET['m'];    
        $this->dbh = $dbh;
        $this->homedir = $homedir;
        $this->csv = array_map('str_getcsv', file($fpath));
        $this->csvCols = $this->csv[0];
        $this->setIdxRange();
        $this->setArrDate();
        $this->process();
        
    }

    private function process()
    {
        $this->dbh->beginTransaction();
        $this->deleteAppIfAny();
        $this->uploadApp();
        $this->dbh->commit();
        $this->dbh = NULL;
    }

    private function deleteAppIfAny()
    {
        $sql = "DELETE FROM shifts_submitted WHERE m='$this->m';";
        echo "Deleting any applications:<br>$sql<br>";
        $stmt = $this->dbh->query($sql);
        echo 'errorInfo:<br>';
        var_dump($stmt->errorInfo());
        echo '<br>';
    }

    private function uploadApp()
    {
        $this->addAllSql();
    }
    private function addAllSql()
    {
        for ($iRow = 1; $iRow <= $this->rowHighestIdx; $iRow++) {
            $this->addSql($iRow);
        }
    }
    private function addSql($iRow)
    {
        $id_user = $this->getIdUser($iRow); // 5
        echo "User: $id_user<br>";
        $arrSqlCols = [];
        for ($iCol = 3; $iCol <= $this->colHighestIdx; $iCol++) {
            $strApp = $this->csv[$iRow][$iCol]; // 'B, O' or ''
            if ($strApp === ''){
                continue;
            }
            $date = $this->arrDate[$iCol];
            echo "User $id_user Date $date App: $strApp<br>";
            $arrDateShifts = explode(', ', $strApp); // ['B', 'O'] or []
            var_dump($arrDateShifts);
            echo '<br>';
            foreach ($arrDateShifts as $key => $shift) {
                $arrDateShifts[$key] ="`" . $this->arrDate[$iCol] . $shift . "`"; // ['17B', '17O']...
                $arrSqlVals[] = 1; // [1, 1]...
            }
            $arrSqlCols = array_merge($arrSqlCols, $arrDateShifts); // ['id_user', 'm' , '16A', '17B', '17O']
        }
        $arrSqlCols = array_unique($arrSqlCols); // I don't know why but some cols are identical...
        $arrSqlVals = array_fill(0, count($arrSqlCols), 1);
        
        $sql = "INSERT INTO shifts_submitted (id_user, m, " . implode(', ', $arrSqlCols) . ") VALUES ($id_user, '$this->m', " . implode(', ', $arrSqlVals) . ');';
        echo "Insert applications for id_user $id_user:<br>$sql<br>";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        var_dump($stmt->errorInfo());
        sleep(0.05);
    }
    private function getIdUser($iRow)
    {
        $name = $this->csv[$iRow][2]; // '05KimHweemyoung'
        $id_user = substr($name, 0, strspn($name, "0123456789")); // '05'
        if (!intval($id_user)) {
            echo "ERROR: Couldn't locate correct id_user from name value :$name on row $iRow<br>";
            exit;
        }
        return intval($id_user); // 5
    }

    private function setIdxRange()
    {
        // Set row range
        $this->rowHighestIdx = count($this->csv) - 1;
        $this->colHighestIdx = count($this->csvCols) - 1; // e.g. 7
    }

    private function setArrDate()
    {
        $this->arrDate = [];
        for ($iCol = 3; $iCol <= $this->colHighestIdx; $iCol++) {
            // echo "iCol = $iCol<br>";
            $colName = $this->csvCols[$iCol]; // '16日(月)'
            $this->arrDate[$iCol] = intval(substr($colName, 0, strspn($colName, "0123456789"))); // $this->arrDate[3] = 16 ... 6 ...

        }
        // var_dump($this->arrDate);
    }
}

$host = 'localhost';
$DBName = 'gairyo_shift_dist';
$userName = 'root';
$pw = '111111';
$dbh = new PDO("mysql:host=$host;dbname=$DBName", "$userName", "$pw", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$homedir = '/var/www/html/gairyo_temp';
$fp = "$homedir/data/csv/2月分シフト希望表.csv";
if (isset($_FILES['csv_submit'])){
    $fp = $_FILES['csv_submit']["tmp_name"] . $_FILES['csv_submit']["name"];
}
$csv_responds_uploader = new CsvRespondsUploader($dbh, $homedir, $fpath);
