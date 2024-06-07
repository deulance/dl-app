<!-- Modal with form -->
<div class="modal fade" id="addItem" tabindex="-1" role="dialog" aria-labelledby="formModal"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="formModal">Add User</h5>
      <button type="button" class="close" onclick="$('#addItem').modal('hide')">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form class="" action="{{ route('admin.admins.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label>Name</label>
          <div class="input-group">
            <input type="text" class="form-control" placeholder="User Name" name="name" required>
          </div>
        </div>
        <div class="form-group">
          <label>Email</label>
          <div class="input-group">
            <input type="email" class="form-control" placeholder="User Email" name="email" required>
          </div>
        </div>
        <div class="form-group">
          <label>Password</label>
          <div class="input-group">
            <input type="password" class="form-control" placeholder="" name="password" required>
          </div>
        </div>
        <div class="form-group">
          <label>User Role</label>
          <div class="input-group">
            <select name="roles[]">
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" >
                        {{ $role->name }}
                    </option>
                @endforeach
            </select> 
          </div>
        </div>               
        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button>
      </form>
    </div>
  </div>
</div>
</div>
