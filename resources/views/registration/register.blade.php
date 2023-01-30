@include ('partials.header')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-12">
            <form class="form-outline w-50 m-auto shadow p-4 mb-5 bg-white rounded" action="{{route('registration')}}" method="POST">
                @csrf
             <div class="text-center">
                <h4>Register User</h4>
             </div>
                <div class="mb-3">
                    <label for="Name" class="form-label">Name</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="Name" >
                    <span class="text-danger">@error('name'){{$message}}@enderror</span>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" value="{{old('email')}}" class="form-control" id="email">
                    <span class="text-danger">@error('email'){{$message}}@enderror</span>
                </div>
                <div class="mb-3">
                    <label for="adress" class="form-label">Password</label>
                    <input type="password" name="password" value="" class="form-control" id="password">
                    <span class="text-danger">@error('password'){{$message}}@enderror</span>
                </div>
                <div class="mb-3">
                    <label for="adress" class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_password" value="" class="form-control" id="password">
                    <span class="text-danger">@error('confirm_password'){{$message}}@enderror</span>
                </div>
                <div class="mt-3">
                <input type="submit" name="submit" class="btn btn-primary" value="Register">
                </div>
            </form>
         </div>
    </div>
</div>
@include ('partials.footer')