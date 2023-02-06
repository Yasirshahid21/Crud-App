<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add New</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route ('student.store')}}" method="POST">
          @csrf
            <div class="mb-3">
                <label for="Name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="Name" value="{{old('name')}}">
                <span class="text-danger">@error('name'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}">
                <span class="text-danger">@error('email'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label for="adress" class="form-label">Address</label>
                <input type="text" name="address" class="form-control" id="adress" value="{{old('address')}}">
                <span class="text-danger">@error('address'){{$message}}@enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="adress" class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" id="adress" value="{{old('phone')}}">
                <span class="text-danger">@error('phone'){{$message}}@enderror</span>
            </div>
            <span class="text-danger">@error('course'){{$message}}@enderror</span>
            @foreach($courses as $course)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="course[]" value="{{$course->id}}" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    {{$course->name}}
                </label>
            </div>
            @endforeach
            <div class="mt-3">
            <input type="submit" name="submit" class="btn btn-primary" value="Save changes">
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
