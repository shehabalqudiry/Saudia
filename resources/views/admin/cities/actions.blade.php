{{-- تعديل الجنسية --}}
<div class="modal fade" id="edit_{{ $city->id }}" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">تعديل الجنسية : {{ $city->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('cities.update', $city->id) }}" method="post">
                <div class="modal-body">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        {{--  <input type="text" class="form-control" name="name" value="{{ $city->name }}" hidden placeholder="المحافظة">  --}}
                        <input type="text" name="name" value="{{ $city->name }}" placeholder="المحافظة">
                    </div>
                    <select class="form-control" name="nationality_id">
                        @foreach ($nationalities as $nationality)
                            <option value="{{ $nationality->id}}" {{ $city->nationality_id == $nationality->id ? 'selected' : '' }}>{{$nationality->name }}</option>
                        @endforeach
                    </select>
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
<div class="modal fade" id="delete_{{ $city->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">حذف الجنسية : {{ $city->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('cities.destroy', $city->id) }}" method="post">
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
