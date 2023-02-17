@include ('partials.header')
@include ('admin.modal')
<div class="row">
    <div class="col-md-3">
        @include ('admin.sidebar')
    </div>
    <div class="col-md-8 mt-5 justify-content-start">
        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        @if (Session::get('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-4 py-4">
                <h4>All Courses</h4>
            </div>
            <div class="col-md-6 py-4">
                <form class="ml-1" style="float:right;" action="{{ route('search') }}" method="get">
                    <div class="input-group">
                        <div class="form-outline">
                            <input type="search" name="search" id="form1" class="form-control"
                                placeholder="Search" value="{{ old('search') }}" />
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-search"></i>
                        </button>
                        <a href="{{ 'student' }}">
                            <button type="button" class="btn btn-primary ml-2">Reset</button>
                        </a>
                    </div>
                </form>
            </div>
            <div class="col-md-2 py-4 text-right">
                @can('course.create')
                    <button type="button" class="btn btn-primary text-right" data-toggle="modal" data-target="#modal">
                        Add New
                    </button>
                @endcan
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Course Name</th>
                        <th scope="col" style="width:20px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{ $course->name }}</td>
                            <td class="d-flex">
                                @can('course.edit')
                                    <a href="{{ route('course.edit', $course->id) }}"
                                        class="btn btn-primary btn-xs">Edit</a>
                                @endcan
                                @can('course.delete')
                                    <form class="ml-1" action="{{ route('course.destroy', $course->id) }}" method="POST">
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
    @include ('partials.footer')
