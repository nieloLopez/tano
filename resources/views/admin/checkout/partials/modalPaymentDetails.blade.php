<div id="userModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Detalles Del Pago</h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped" id="tablePaymentItems">
                    <tr>
                        <th>ADMIN</th>
                        <th>FECHA</th>
                        <th>MONTO</th>
                    </tr>
                    <tfoot>
                        <tr>
                            <td>Debe</td>
                            <td></td>
                            <td id="pay-pending"></td>
                        </tr>
                    </tfoot>
                </table>
                <h4 class="modal-title">Detalles De Los Pagos</h4>
                <table class="table table-striped" id="tablePaymentActivities">
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>