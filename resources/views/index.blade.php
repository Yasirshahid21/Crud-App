@include ('partials.header')
<div class="container">
  <div class="row mt-5">
    <div class="col-md-6 py-4">
      <h4>All Students</h4>
    </div>
    <div class="col-md-4 py-4">
      <form class="ml-1" style="float:right;" action="{{route('search')}}" method="get">
      <div class="input-group">
        <div class="form-outline">
          <input type="search" name="search" id="form1" class="form-control" placeholder="Search" value="{{old('search')}}" />
        </div>
        <button type="submit" class="btn btn-primary">
        <i class="fa fa-search"></i>
        </button>
        <a href="{{'student'}}">
            <button type="button" class="btn btn-primary ml-2">Reset</button>
        </a>
      </div>
      </form>
    </div>
    @can('student.create')
    <div class="col-md-2 py-4 text-right">
      <button type="button" class="btn btn-primary text-right" data-toggle="modal" data-target="#modal">
          Add New
          </button>
    </div>
    @endcan
      @include('partials.modal')
  </div>
  @if(Session::get('success'))
		<div class="alert alert-success">
			{{Session::get('success')}}
		</div>
	@endif

	@if(Session::get('fail'))
		<div class="alert alert-danger">
			{{Session::get('fail')}}
		</div>
	@endif
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
            <th scope="col">Courses</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($students as $user)
          <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->address}}</td>
            <td>{{$user->phone}}</td>
            <td>@foreach($user->courses as $course)
            {{$course->name . ','}}
              @endforeach</td>
            <td class="d-flex">
          @can('student.edit')
            <a href="{{route('student.edit', $user->id)}}" class="btn btn-primary btn-xs">Edit</a>
            @endcan
            @can('student.delete')
            <form class="ml-1" action="{{route ('student.destroy', $user->id)}}" method="post">
            @csrf @method('DELETE')
            <input type="hidden">
            <input type="submit" value="Delete" class="btn btn-danger btn-xs" />
            </form>
          @endcan
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>
@include ('partials.footer')
