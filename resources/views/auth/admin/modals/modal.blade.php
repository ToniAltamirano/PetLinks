<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color: #000000">{{ __('admin/modals.borrar_exp') }}!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label style="color: #000000">{{ __('admin/modals.borrar_exp') }}</label>
            </div>
            <div class="modal-footer">
                <form action="" id="formularioDelete" method="POST" class="mt-3">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-primary" onclick="eliminar();" name="borrar">{{ __('admin/modals.btn_borrar') }}</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('admin/modals.btn_cancelar') }}</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color: #000000">{{ __('admin/modals.title_info') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label style="color: #000000">{{ __('admin/modals.text_info') }}</label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('admin/modals.btn_confirm') }}</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalInfoEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color: #000000">{{ __('admin/modals.title_info_edit') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label style="color: #000000">{{ __('admin/modals.text_info_edit') }}</label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('admin/modals.btn_confirm_edit') }}</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalInfoEditMultiple" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color: #000000">{{ __('admin/modals.title_info_multi') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label style="color: #000000">{{ __('admin/modals.text_info_multi') }}</label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('admin/modals.btn_confirm_multi') }}</button>
            </div>
        </div>
    </div>
</div>
