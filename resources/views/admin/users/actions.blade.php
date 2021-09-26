<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">استيراد البيانات</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('users.import') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    اختار الملف
                    <input type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required id="importUser" name="importUser">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">متابعة</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                </div>
            </form>
        </div>
    </div>
</div>
