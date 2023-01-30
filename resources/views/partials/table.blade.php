<!-- <div class="container">
  <div class="row">
    <div class="col-md-6 mt-5">
      <h1>ALL Students Records</h1>
    </div>
    <div class="col-md-6 mt-5 text-right">
        <button type="button" class="btn btn-primary text-right" data-toggle="modal" data-target="#exampleModalCenter">
        Add Student
        </button>
    </div>
      @include('partials.modal')
  </div>
  <div class="row">
    <div class="col-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Phone</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->address}}</td>
            <td>{{$user->phone}}</td>
            <td>
            <button type="button" class="btn btn-success">Edit</button>
            <button type="button" class="btn btn-danger">Delete</button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div> -->