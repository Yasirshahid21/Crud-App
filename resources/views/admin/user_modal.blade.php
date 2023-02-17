<!-- Modal -->
<div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" action="{{ route('registration') }}" method="POST">
                    @csrf
                    <div class="text-center">
                        <h4>Register User</h4>
                    </div>
                    <div class="mb-3">
                        <label for="Name" class="form-label">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                            id="Name">
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                            id="email">
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="adress" class="form-label">Password</label>
                        <input type="password" name="password" value="" class="form-control" id="password">
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="adress" class="form-label">Confirm Password</label>
                        <input type="password" name="confirm_password" value="" class="form-control"
                            id="password">
                        <span class="text-danger">
                            @error('confirm_password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mt-3">
                        <input type="submit" name="submit" class="btn btn-primary" value="Register">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
