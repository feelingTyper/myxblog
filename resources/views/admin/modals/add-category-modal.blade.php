<div class="modal fade" id="add-category-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <form role="form" class="form-inline" action="{{ route('category.store') }}" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">新的分类</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="form-control-label">分类名称</label>
                        <input id="name" type="text" class="form-control ml-3" name="name" autofocus>
                    </div>
                    {{ csrf_field() }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                    <button id="confirm-btn" type="submit" class="btn btn-primary">确定</button>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->