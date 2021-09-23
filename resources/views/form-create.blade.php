<form class="form repeater-default">
  <div data-repeater-list="group-a">
    <div data-repeater-item>
      <div class="row justify-content-between">
        <div class="col-md-2 col-sm-12 form-group">
          <label for="Email">Email </label>
          <input type="email" class="form-control" id="Email" placeholder="Enter email id">
        </div>
        <div class="col-md-2 col-sm-12 form-group">
          <label for="password">password</label>
          <input type="password" class="form-control" id="password" placeholder="Enter Password">
        </div>
        <div class="col-md-2 col-sm-12 form-group">
          <label for="gender">Gender</label>
          <select name="gender" id="gender" class="form-control">
            <option value="Male">Male</option>
            <option value="Female">female</option>
          </select>
        </div>
        <div class="col-md-2 col-sm-12 form-group">
          <label for="Profession">Profession</label>
          <select name="profession" id="Profession" class="form-control">
            <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
            <option value="option3">Option 3</option>
            <option value="option4">Option 4</option>
            <option value="option5">Option 5</option>
          </select>
        </div>
        <div class="col-md-2 col-sm-12 form-group d-flex align-items-center pt-2">
          <button class="btn btn-danger" data-repeater-delete type="button"> <i class="bx bx-x"></i>
            Delete
          </button>
        </div>
      </div>
      <hr>
    </div>
  </div>
  <div class="form-group">
    <div class="col p-0">
      <button class="btn btn-primary" data-repeater-create type="button"><i class="bx bx-plus"></i>
        Add
      </button>
    </div>
  </div>
</form>
<script>
    // form repeater Initialization
 $('.repeater-default').repeater({
    show: function () {
    $(this).slideDown();
    },
    hide: function (deleteElement) {
    if (confirm('Are you sure you want to delete this element?')) {
    $(this).slideUp(deleteElement);
    }
    }
    });
</script>
