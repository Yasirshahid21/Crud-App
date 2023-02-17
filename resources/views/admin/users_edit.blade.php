@include ('partials.header')
<div class="row">
    <div class="clo-md-3">
        @include ('admin.sidebar')
    </div>
    <div class="col-md-9 mt-5">
        <form class="form-outline w-50 m-auto shadow p-4 mb-5 bg-white rounded"
            action="{{ route('user.update', $users->id) }}" method="POST">
            <div class="text-center">
                <h4>Edit User</h4>
            </div>
            @csrf @method('PUT')
            <div class="mb-3">
                <label for="Name" class="form-label">Name</label>
                <input type="text" name="name" value="{{ $users->name }}" class="form-control" id="Name"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="Name" class="form-label">Email</label>
                <input type="text" name="email" value="{{ $users->email }}" class="form-control" id="Name"
                    aria-describedby="emailHelp">
            </div>
            @foreach ($permissions as $permission)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $permission->id }}"
                        {{ $users->hasPermissionTo($permission->name) ? 'checked' : null }}>
                    <label class="form-check-label" for="flexCheckChecked">
                        {{ $permission->name }}
                    </label>
                </div>
            @endforeach
            <div class="mt-3">
                <input type="submit" name="submit" class="btn btn-primary" value="Update">
            </div>
        </form>
    </div>
</div>

@include('partials.footer')
