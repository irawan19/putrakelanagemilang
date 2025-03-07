<div class="modal fade" id="modalsukses" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Selamat!</h5>
                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="center-align">
                    <i class="icon icon-xxl mt-5 mb-2 cil-check"></i>
                </div>
                <p class="textmodalsukses">{{ Session::get('setelah_simpan.text') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-coreui-dismiss="modal">Oke</button>
            </div>
        </div>
    </div>
</div>