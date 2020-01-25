<?php
$homedir = '/var/www/html/gairyo_temp';
require_once "$homedir/class/class_request_object.php";
require_once "$homedir/class/class_date_object.php";
require_once "$homedir/class/class_db_handler.php";

class MarketItemHandler extends DBHandler
{
    public function __construct($master_handler, $config_handler)
    {
        $this->dbh = $master_handler->dbh;
        $this->arrayMemberObjectsByIdUser = $master_handler->arrayMemberObjectsByIdUser;
        $this->arrayShiftsByPart = $config_handler->arrayShiftsByPart;
        $this->date_objects_handler = new DateObjectsHandler($master_handler, $config_handler);
        $this->load_market_items();
    }
    private function load_market_items()
    {
        // $sql = "SELECT date_shift, id_transaction, id_to, shift FROM requests_pending WHERE `status`=2 AND id_from=NULL ORDER BY time_created ASC;";
        // $stmt = $this->querySql($sql);
        // $arrayCallObjectsByDate = $stmt->fetchAll(PDO::FETCH_UNIQUE | PDO::FETCH_CLASS, 'RequestObject');
        // $stmt->closeCursor();
        // $stmt = $this->querySql($sql);
        // $arrayPutObjectsByDate = $stmt->fetchAll(PDO::FETCH_UNIQUE | PDO::FETCH_CLASS, 'RequestObject');
        // $stmt->closeCursor();

        $sql = "SELECT id_shift, id_transaction, date_shift, shift FROM requests_pending WHERE `status`=2 AND id_to IS NULL ORDER BY time_created ASC;";
        $stmt = $this->querySql($sql);
        $arrRequestsByIdShift = $stmt->fetchAll(PDO::FETCH_UNIQUE);
        $stmt->closeCursor();
        $sqlConditions = $this->genSqlConditions(array_keys($arrRequestsByIdShift), 'id_shift', 'OR');

        $sql = "SELECT date_shift, date_shift, id_user, shift FROM shifts_assigned WHERE $sqlConditions AND under_request=1 AND done=0";
        $stmt = $this->querySql($sql);
        $arrayPutObjectsByDate = $stmt->fetchAll(PDO::FETCH_GROUP | PDO::FETCH_CLASS, 'ShiftObject', [$this->arrayShiftsByPart]);
        $stmt->closeCursor();

        foreach ($arrayPutObjectsByDate as $arrayShiftObjects) {
            foreach ($arrayShiftObjects as $shiftObject) {
                $shiftObject->setMemberObj($this->arrayMemberObjectsByIdUser);
            }
        }
        $this->date_objects_handler->setArrayDateObjects($arrayPutObjectsByDate);
        ksort($this->date_objects_handler->arrayDateObjects);
    }

    public function echoMarketTimeline()
    {
        foreach (array_keys($this->date_objects_handler->arrayDateObjects) as $key => $date) {
            if ($key % 2) {
                // $key % 2 === 0:left, 1:right
                $classFlexRowReverse = '';
            } else {
                $classFlexRowReverse = 'flex-row-reverse';
            }
            $this->echoSection($this->date_objects_handler->arrayDateObjects[$date], $classFlexRowReverse);
            if ($key === count($this->date_objects_handler->arrayDateObjects) - 1) {
                break;
            }
            $this->echoPath($classFlexRowReverse);
        }
    }

    private function echoSection($dateObject, $classFlexRowReverse)
    {

        echo "
        <div class='div-timeline-section'>
        ";
        echo "
            <div class='row no-gutters align-items-center how-it-works d-flex $classFlexRowReverse'>";
        $dateTime = DateTime::createFromFormat('Y-m-d', $dateObject->date);
        $this->echoColDate($dateTime);
        $this->echoColShifts($dateObject, $classFlexRowReverse);
        echo '
            </div>';

        echo '
        </div>'; // .div-timeline-section
    }

    private function echoPath($classFlexRowReverse)
    {
        if ($classFlexRowReverse === '') {
            $position = 'left';
            $counter = 'right';
        } else {
            $position = 'right';
            $counter = 'left';
        }
        echo "
            <div class='row timeline d-flex $classFlexRowReverse'>
                <div class='col-2'>
                    <div class='corner top-$counter'></div>
                </div>
                <div class='col-8'>
                    <hr />
                </div>
                <div class='col-2'>
                    <div class='corner $position-bottom'></div>
                </div>
            </div>
            ";
    }

    private function echoColShifts($dateObject, $classFlexRowReverse)
    {
        echo '
                <div class="col-6">';
        echo "
                    <div class='row no-gutters'>
                        <div class='col-12 col-put d-flex $classFlexRowReverse'>";
        echo '              <div class="btn-group">';
        foreach (array_keys($dateObject->arrayShiftObjectsByShift) as $shift) {
            echo "
                                <a href='#modal' class='btn' data-toggle='modal'>$shift</a>";
        }
        echo "
                            
                            </div>
                        </div>
                    </div>";
        echo '
                </div>';
    }

    private function echoColDate($dateTime)
    {
        $date = $dateTime->format('M j');
        $day = $dateTime->format('D');
        switch ($day) {
            case 'Sun':
                $classTextColor = 'text-danger';
                break;
            case 'Sat':
                $classTextColor = 'text-primary';
                break;
            default:
                $classTextColor = '';
        }
        echo "
                <div class='col-2 text-center bottom d-inline-flex justify-content-center align-items-center'>
                    <div class='circle'>
                        <div class='div-circle-text'>$date</div><div class='div-circle-text $classTextColor'>$day</div>
                    </div>
                </div>
        ";
    }
}
$market_item_handler = new MarketItemHandler($master_handler, $config_handler);
// var_dump($market_item_handler->date_objects_handler->arrayDateObjects);
?>

<div class="container">
    <div class="bs4-timeline px-1 py-1 py-sm-2 py-md-4">
        <?php
        $market_item_handler->echoMarketTimeline();
        ?>
    </div>
    <div class="modal fade" id="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">.modal-title</h1>
                </div>
                <div class="modal-body">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis minus quisquam sapiente amet perspiciatis officia similique repellendus. Ea cupiditate voluptatem harum possimus, voluptas nulla, odio placeat perspiciatis totam, et vitae!</p>
                </div>
                <div class="modal-footer"><button class="btn btn-danger" type="button" data-dismiss="modal">Close</button></div>
            </div>
        </div>
    </div>
</div>
<script src="./js/marketplace.js"></script>
<script>

</script>