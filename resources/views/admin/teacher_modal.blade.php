<!-- Modal -->
<div class="modal fade" id="teacher" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add New</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route ('teacher.store')}}" method="POST">
            @csrf
              <div class="mb-3">
                  <label for="Name" class="form-label">Name</label>
                  <input type="text" name="name" class="form-control" id="Name" value="{{old('name')}}">
                  <span class="text-danger">@error('name'){{$message}}@enderror</span>
              </div>
              <div class="mb-3">
                <label for="Name" class="form-label">email</label>
                <input type="text" name="email" class="form-control" id="Name" value="{{old('email')}}">
                <span class="text-danger">@error('email'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
              <label for="Name" class="form-label">Phone</label>
              <input type="text" name="phone" class="form-control" id="Name" value="{{old('phone')}}">
              <span class="text-danger">@error('phone'){{$message}}@enderror</span>
          </div>
              <div class="mt-3">
              <input type="submit" name="submit" class="btn btn-primary" value="Save">
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  