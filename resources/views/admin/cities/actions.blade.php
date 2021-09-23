{{-- تعديل الجنسية --}}
<div class="modal fade" id="edit_{{ $na->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">تعديل الجنسية : {{ $na->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('nationalities.update', $na->id) }}" method="post">
                <div class="modal-body">
                    @csrf
                    <input class="form-control col" type="text" name="name" placeholder="الجنسية">

                    <input class="form-control col" type="text" name="key" placeholder="مفتاح الدولة">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">حفظ</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- حذف الجنسية --}}
<div class="modal fade" id="delete_{{ $na->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">حذف الجنسية : {{ $na->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('nationalities.destroy', $na->id) }}" method="post">
                <div class="modal-body">
                    @csrf
                    @method('delete')
                    هل انت متأكد من عملية الحذف ؟
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">حذف</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                </div>
            </form>
        </div>
    </div>
</div>
