@include ('partials.header')
<div class="row">
    <div class="col-md-3">
        @include ('admin.sidebar')
    </div>

    <div class="col-md-8 mt-5 justify-content-start">
        <div class="btn-group pb-3">
            <form action="{{ route('users') }}" method="get">
                @csrf
                <select class="btn btn-primary" name="role">
                    @foreach ($all_role as $role)
                        <option value="{{ $role->id }}" {{ @$_GET['role'] == $role->id ? 'SELECTED' : '' }}>
                            {{ $role->name }}</option>
                    @endforeach
                    {{-- @foreach ($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->name }}</option>
                    @endforeach --}}
                </select>

                <input type="submit" class="btn btn-primary" value="Go" />

            </form>
        </div>
        <form action="{{ route('edit', $roles->id) }}" method="POST">
            @csrf @method('PUT')
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Modules</th>
                        <th scope="col">View</th>
                        <th scope="col">Create</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($roles as $role)
                    {{$role->name}}
                    @endforeach --}}
                    @foreach ($modules as $module)
                        <tr>
                            <td>
                                <h4>{{ $module['module'] }}</h4>
                                @foreach (\Spatie\Permission\Models\Permission::where('module', $module['module'])->get() as $perm)
                            <td>
                                {{-- {{dd($role)}} --}}
                                <input type="checkbox" name="permission[]" value="{{ $perm->id }}"
                                    {{ $roles->hasPermissionTo($perm->name) ? 'checked' : null }} />
                                {{ $perm->name }}
                            </td>
                    @endforeach
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <input type="submit" class="btn btn-primary"value="Save" />
        </form>
    </div>
</div>
@include ('partials.footer')
