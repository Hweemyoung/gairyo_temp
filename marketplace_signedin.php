<?php
$homedir = '/var/www/html/gairyo_temp';
require_once "$homedir/class/class_request_object.php";
require_once "$homedir/class/class_date_object.php";
require_once "$homedir/class/class_db_handler.php";
require_once "$homedir/utils.php";
require_once "$homedir/class/class_martket_item_handler.php";

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
                    <h1 class="modal-title">Confirm Purchase</h1>
                </div>
                <div class="modal-body">
                    <table class="table table-responsive-md text-center">
                        <thead>
                            <tr>
                                <th>From</th>
                                <th>Month</th>
                                <th>Day</th>
                                <th>Shift</th>
                                <th>To</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-modal"></tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" title="Back" data-dismiss="modal"><i class="fas fa-undo"></i></button>
                    <form id="form" action="<?= $config_handler->http_host ?>/process/market_purchase.php" method="GET">
                        <input id="input-id-request" type="hidden" name="id_request">
                        <input id="input-mode" type="hidden" name="mode">
                        <button class="btn btn-primary" type="submit" title="Confirm"><i class="fas fa-file-export"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= $config_handler->http_host ?>/js/constants.js"></script>
<script src="<?= $config_handler->http_host ?>/js/marketplace.js"></script>
<script>
    const market_item_handler = new MarketItemHandler(<?= json_encode($master_handler->arrayMemberObjectsByIdUser[$master_handler->id_user]) ?>, <?= json_encode($market_item_handler->date_objects_handler->arrayDateObjects) ?>, <?= json_encode($market_item_handler->arrIdPutRequestsByIdShift) ?>, <?= json_encode($market_item_handler->arrIdCallRequestsByDate) ?>, <?= json_encode($market_item_handler->date_objects_put_handler->arrayDateObjects) ?>, <?= json_encode($market_item_handler->date_objects_call_handler->arrayDateObjects) ?>, _constants);
</script>