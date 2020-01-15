<?php
function groupArrayByKey($array, $key)
{
    $arrayGrouped = array();
    foreach ($array as $element) {
        $arrayGrouped[$element[$key]][] = $element;
    }
    return $arrayGrouped;
}

$sql = "SELECT date_shift, id_user, shift, id_shift FROM shifts_assigned WHERE done = 0";
$stmt = $dbh->prepare($sql);
$stmt->execute();
// var_dump($stmt->errorInfo());OK
$arrayShiftsByDate = $stmt->fetchAll(PDO::FETCH_ASSOC | PDO::FETCH_GROUP);
ksort($arrayShiftsByDate);
$sql = "SELECT id_user, date_shift, shift FROM shifts_assigned WHERE done = 0";
$stmt = $dbh->prepare($sql);
$stmt->execute();
// var_dump($stmt->errorInfo());OK
$arrayShiftsByIdUser = $stmt->fetchAll(PDO::FETCH_ASSOC | PDO::FETCH_GROUP);
ksort($arrayShiftsByIdUser);
// foreach(array_keys($arrayShiftsByIdUser) as $idUser){
// $arrayShiftsByIdUser[$idUser] = groupArrayByKey($arrayShiftsByIdUser[$idUser], 'date_shift');
// }

$arrayMonths = array();
$arrayMonths[0] = "Jan";
$arrayMonths[1] = "Feb";
$arrayMonths[2] = "Mar";
$arrayMonths[3] = "Apr";
$arrayMonths[4] = "May";
$arrayMonths[5] = "Jun";
$arrayMonths[6] = "Jul";
$arrayMonths[7] = "Aug";
$arrayMonths[8] = "Sep";
$arrayMonths[9] = "Oct";
$arrayMonths[10] = "Nov";
$arrayMonths[11] = "Dec";
$arrayShifts = array('A', 'B', 'H', 'C', 'D');

?>

<main>
    <div class="container px-1">
        <hr>
        <section>
            <form action="./upload_transaction.php" method="POST">
                <input id="input-ids" type="hidden" name="formIDs" value="1">
                <div class="form-item" id="1">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <div class="form-group row no-gutters">
                                <div class="col-3 text-center">
                                    <label for="id_from">From</label>
                                </div>
                                <div class="col-9">
                                    <select name="id_from" class="form-control select-id-from">
                                        <option value="0">Member</option>
                                        <?php
                                        foreach (array_keys($arrayShiftsByIdUser) as $idUser) {
                                            $nickname = $arrayMemberObjectsByIdUser[$idUser]->nickname;
                                            echo "
                                        <option value='$idUser'>$idUser $nickname</option>
                                            ";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row no-gutters">
                                <div class="col-4">
                                    <select name="month" class="form-control" disabled>
                                        <option value="0">Month</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <select name="day" class="form-control" disabled>
                                        <option value="0">Day</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <select name="shift" id="shift" class="form-control" disabled>
                                        <option value="0">Shift</option>
                                        <?php
                                        for ($i = 1; $i <= count($arrayShifts); $i++) {
                                            $shift = $arrayShifts[$i - 1];
                                            echo "
                                        <option value='$i'>$shift</option>    
                                            ";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row no-gutters">
                                <div class="col-2 text-center">
                                    <label for="id_to">To</label>
                                </div>
                                <div class="col-7">
                                    <select name="id_to" class="form-control select-id-to" disabled>
                                        <option value="0">Member</option>
                                        <?php
                                        foreach (array_keys($arrayShiftsByIdUser) as $idUser) {
                                            $nickname = $arrayMemberObjectsByIdUser[$idUser]->nickname;
                                            echo "
                                        <option value='$idUser'>$idUser $nickname</option>
                                            ";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-1 d-flex flex-column div-form-icons">
                                        <i class="i-not-found fas fa-clone text-warning mx-auto d-none"></i>
                                        <i class="i-target-overlap fas fa-compress-arrows-alt text-danger mx-auto d-none"></i>
                                        <i class="i-shift-overlap fas fa-share-alt-square text-info mx-auto d-none"></i>
                                </div>
                                <div class="col-2">
                                    <button class="btn btn-danger btn-delete ml-auto align-middle" title="Delete transaction"><i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-12">
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modal-confirm">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title">Confirm Requests</h1>
                            </div>
                            <div class="modal-body">
                                <table class="table table-responsive-sm table-sm table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th>From</th>
                                            <th>Month</th>
                                            <th>Day</th>
                                            <th>Shift</th>
                                            <th>To</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-danger" type="button" title="Back" data-dismiss="modal"><i class="fas fa-undo"></i></button>
                                <button class="btn btn-primary" type="submit" title="Confirm"><i class="fas fa-file-export"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div id="div-buttons" class="text-right">
                <i id="i-not-found" class="fas fa-clone text-warning invisible"></i>
                <i id="i-target-overlap" class="fas fa-compress-arrows-altt-danger invisible"></i>
                <i id="i-shift-overlap" class="fas fa-share-alt-square text-info invisible"></i>
                <button id="btn-add-item" class="btn btn-primary" title="Add"><i class="fas fa-plus"></i></button>
                <a id="btn-confirm" class="btn btn-primary disabled" href="#modal-confirm" data-toggle="modal" title="Final Check"><i class="fas fa-check"></i></a>
            </div>
        </section>
    </div>
</main>
<footer></footer>
<script src="./js/transactionform.js"></script>
<script>
    const formHandler = new FormHandler(<?= json_encode($arrayShiftsByIdUser) ?>);
    // const arrayShiftsByIdUser =;
</script>