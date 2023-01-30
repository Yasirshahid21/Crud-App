@include ('partials.header')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-12">

            <form class="form-outline w-50 m-auto shadow p-4 mb-5 bg-white rounded" action="{{route ('student.update', $students->id)}}" method="POST">
             <div class="text-center">
                <h4>Edit User</h4>
             </div>
            @csrf @method('PUT')
                <div class="mb-3">
                    <label for="Name" class="form-label">Name</label>
                    <input type="text" name="name" value="{{$students->name}}" class="form-control" id="Name" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" value="{{$students->email}}" class="form-control" id="email">
                </div>
                <div class="mb-3">
                    <label for="adress" class="form-label">Address</label>
                    <input type="text" name="address" value="{{$students->address}}" class="form-control" id="adress" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="adress" class="form-label">Phone</label>
                    <input type="text" name="phone" value="{{$students->phone}}" class="form-control" id="adress" aria-describedby="emailHelp">
                </div>
                <!-- <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="course" value="PHP Crash Cuorse" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        PHP Crash Cuorse
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="course" value="Laravel Crash Cuorse" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                    Laravel Crash Cuorse 
                    </label>
                </div> -->
                <div class="mt-3">
                <input type="submit" name="submit" class="btn btn-primary" value="Update">
                </div>
            </form>
         </div>
    </div>
</div>

@include('partials.footer')