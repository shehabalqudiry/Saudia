{{-- تعديل الجنسية --}}
<div class="modal fade" id="settings_{{ $settings->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('settings.update', $settings->id) }}" method="post">
                <div class="modal-body">
                    @csrf
                    @method('put')
                    <div class="col-6">
                        <label for="status">حالة التسجيل</label>
                        <select class="form-control" name="form_status" id="status">
                            <option {{ old('status') ? 'selected' : '' }} value="0">غير مفعل</option>
                            <option {{ old('status') ? 'selected' : '' }} value="1">مفعل</option>
                        </select>
                    </div>

                    <input class="form-control col" type="datetime" name="from">

                    <input class="form-control col" type="datetime" name="to">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">حفظ</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                </div>
            </form>
        </div>
    </div>
</div>