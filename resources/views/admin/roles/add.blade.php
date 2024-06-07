<!-- Modal with form -->
<div class="modal fade" id="addItem" tabindex="-1" role="dialog" aria-labelledby="formModal"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="formModal">Add Role</h5>
      <button type="button" class="close" onclick="$('#addItem').modal('hide')">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form class="" action="{{ route('admin.roles.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label>Role Name</label>
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Role Name" name="name" required>
          </div>
        </div>
        <div class="form-group">
              <label>Permissions</label>
              <div class="input-group permissions">
                
                    @foreach ($permissions as $permission)
                        <div>
                          <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" >
                            {{ $permission->name }}
                        </div>
                        
                    @endforeach
                
              </div>
            </div>              
              
        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button>
      </form>
    </div>
  </div>
</div>
</div>
