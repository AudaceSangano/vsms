<div class="modal fade" id="CreateUser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content text-start">
        <div class="modal-body custom_scroll p-lg-5">
        <button type="button" class="btn-close position-absolute top-0 end-0 mt-3 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
        <h4 class="modal-title">Create User</h4>
        <p class="text-muted">All field are required to create User, use below form</p>
        <div class="row g-2 mt-3">
            <form action="{{route('user.create')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                <label class="form-label">User Names</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="User Name">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12">
                <label class="form-label">User Email</label>
                <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="Email">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12">
                <label class="form-label">User Telephone</label>
                <input type="text" name="phone" value="{{old('phone')}}" class="form-control" placeholder="telephone">
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12">
                <label class="form-label">User Profile</label>
                <input type="file" value="{{old('profile')}}" name="profile" class="form-control">
                @error('profile')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-md-12">
                <label class="form-label">User Role</label>
                <select class="form-control" name="role">
                    <option value="" hidden selected> Select User Role</option>
                    <option value="supervisor"  {{old('role')=='supervisor'?'selected':''}}>Supervisor</option>
                    <option value="employee"  {{old('role')=='employee'?'selected':''}}>Employee</option>
                    <option value="driver"  {{old('role')=='driver'?'selected':''}}>Driver</option>
                </select>
                @error('role')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-md-6">
                <label class="form-label">Sex</label>
                <select class="form-control" name="gender">
                    <option value="" hidden selected> Select Gender.</option>
                    <option value="male" {{old('gender')=='male'?'selected':''}}>Male</option>
                    <option value="female" {{old('gender')=='female'?'selected':''}}>Female</option>
                </select>
                @error('gender')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-md-6">
                <label class="form-label">Status</label>
                <select class="form-control" name="status">
                    <option value="" hidden selected> Select Status</option>
                    <option value="1" {{old('status')=='1'?'selected':''}}>Active</option>
                    <option value="0" {{old('status')=='0'?'selected':''}}>Inactive</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12 mt-3">
                <button class="btn btn-lg btn-secondary text-uppercase" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-lg btn-primary text-uppercase" type="submit">Submit</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>

<div class="modal fade" id="EditUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content text-start">
        <div class="modal-body custom_scroll p-lg-5">
        <button type="button" class="btn-close position-absolute top-0 end-0 mt-3 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
        <h4 class="modal-title">Update User</h4>
        <p class="text-muted">All field are required to update User, use below form</p>
        <div class="row g-2 mt-3">
            <form action="{{route('user.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="editUserId">
                <div class="col-12">
                <label class="form-label">User Names</label>
                <input type="text" id="editUserName" name="name" value="{{old('name')}}" class="form-control" placeholder="User Name">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12">
                <label class="form-label">User Email</label>
                <input type="text" id="editUserEmail" name="email" value="{{old('email')}}" class="form-control" placeholder="Email">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12">
                <label class="form-label">User Telephone</label>
                <input type="text" id="editUserPhone" name="phone" value="{{old('phone')}}" class="form-control" placeholder="telephone">
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-md-12">
                <label class="form-label">User Role</label>
                <select class="form-control" id="editUserRole" name="role">
                    <option value="" hidden selected> Select User Role</option>
                    <option value="supervisor"  {{old('role')=='supervisor'?'selected':''}}>Supervisor</option>
                    <option value="employee"  {{old('role')=='employee'?'selected':''}}>Employee</option>
                    <option value="driver"  {{old('role')=='driver'?'selected':''}}>Driver</option>
                </select>
                @error('role')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-md-6">
                <label class="form-label">Sex</label>
                <select class="form-control" id="editUserGender" name="gender">
                    <option value="" hidden selected> Select Gender.</option>
                    <option value="male" {{old('gender')=='male'?'selected':''}}>Male</option>
                    <option value="female" {{old('gender')=='female'?'selected':''}}>Female</option>
                </select>
                @error('gender')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-md-6">
                <label class="form-label">Status</label>
                <select class="form-control" id="editUserStatus" name="status">
                    <option value="" hidden selected> Select Status</option>
                    <option value="1" {{old('status')=='1'?'selected':''}}>Active</option>
                    <option value="0" {{old('status')=='0'?'selected':''}}>Inactive</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12 mt-3">
                <button class="btn btn-lg btn-secondary text-uppercase" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-lg btn-primary text-uppercase" type="submit">Submit</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>

<div class="modal fade" id="CreateCar" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content text-start">
        <div class="modal-body custom_scroll p-lg-5">
        <button type="button" class="btn-close position-absolute top-0 end-0 mt-3 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
        <h4 class="modal-title">Add New Car In System</h4>
        <p class="text-muted">All field are required to create Car, use below form</p>
        <div class="row g-2 mt-3">
            <form action="{{ route('car.create') }}" method="post">
                @csrf
                <div class="col-12">
                <label class="form-label">Car Model : </label>
                <input type="text" name="car_model" value="{{old('car_model')}}" class="form-control" placeholder="Car Model">
                @error('car_model')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12">
                <label class="form-label">Car Registration Number (Plate number) :</label>
                <input type="text" name="car_registration_number" value="{{old('car_registration_number')}}" class="form-control" placeholder="Car Registration Number">
                @error('car_registration_number')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12">
                <label class="form-label">Car Color :</label>
                <input type="text" name="car_color" value="{{old('car_color')}}" class="form-control" placeholder="Car Color">
                @error('car_color')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12">
                <label class="form-label">Car Capacity :</label>
                <input type="text" name="car_capacity" value="{{old('car_capacity')}}" class="form-control" placeholder="Car seating number">
                @error('car_capacity')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-md-12">
                <label class="form-label">Status</label>
                <select class="form-control" name="is_active">
                    <option value="" hidden selected> Select Car Status</option>
                    <option value="1" {{old('is_active')=='1'?'selected':''}}>Active</option>
                    <option value="0" {{old('is_active')=='0'?'selected':''}}>Inactive</option>
                </select>
                @error('is_active')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12 mt-3">
                <button class="btn btn-lg btn-secondary text-uppercase" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-lg btn-primary text-uppercase" type="submit">Submit</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>

<div class="modal fade" id="EditCarModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content text-start">
        <div class="modal-body custom_scroll p-lg-5">
        <button type="button" class="btn-close position-absolute top-0 end-0 mt-3 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
        <h4 class="modal-title">Modify Car Information</h4>
        <p class="text-muted">All field are required to modify Car, use below form</p>
        <div class="row g-2 mt-3">
            <form action="{{ route('car.update') }}" method="post">
                @csrf
                <input type="hidden" name="car_id" value="{{ old('car_id') }}" id="editCarId">
                <div class="col-12">
                <label class="form-label">Car Model : </label>
                <input type="text" id="editCarModel" name="car_model" value="{{old('car_model')}}" class="form-control" placeholder="Car Model">
                @error('car_model')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12">
                <label class="form-label">Car Registration Number (Plate number) :</label>
                <input type="text" id="editCarregistration" name="car_registration_number" value="{{old('car_registration_number')}}" class="form-control" placeholder="Car Registration Number">
                @error('car_registration_number')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12">
                <label class="form-label">Car Color :</label>
                <input type="text" id="editCarColor" name="car_color" value="{{old('car_color')}}" class="form-control" placeholder="Car Color">
                @error('car_color')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12">
                <label class="form-label">Car Capacity :</label>
                <input type="text" id="editCarCapacity" name="car_capacity" value="{{old('car_capacity')}}" class="form-control" placeholder="Car seating number">
                @error('car_capacity')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-md-12">
                <label class="form-label">Status</label>
                <select class="form-control" id="editCarStatus" name="is_active">
                    <option value="" hidden selected> Select Car Status</option>
                    <option value="1" {{old('is_active')=='1'?'selected':''}}>Active</option>
                    <option value="0" {{old('is_active')=='0'?'selected':''}}>Inactive</option>
                </select>
                @error('is_active')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12 mt-3">
                <button class="btn btn-lg btn-secondary text-uppercase" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-lg btn-primary text-uppercase" type="submit">Save Change</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>

<div class="modal fade" id="Car2Driver" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content text-start">
        <div class="modal-body custom_scroll p-lg-5">
        <button type="button" class="btn-close position-absolute top-0 end-0 mt-3 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
        <h4 class="modal-title">Assign Car To Driver</h4>
        <p class="text-muted">All field are required to allocate car, use below form</p>
        <div class="row g-2 mt-3">
            <form action="{{ route('car.assign.create') }}" method="post">
                @csrf
                <div class="col-md-12">
                <label class="form-label">Car</label>
                <select class="form-control" name="car">
                    <option value="" hidden selected> Select Car</option>
                    <option value="none"> None</option>
                    @php
                        $cars = DB::table('cars')->get();
                    @endphp
                    @foreach ($cars as $car)
                    <option value="{{$car->car_id}}">{{$car->car_model}} -> {{$car->car_registration_number}}</option>
                    @endforeach
                </select>
                @error('car')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-md-12">
                <label class="form-label">Driver</label>
                <select class="form-control" name="driver">
                    <option value="" hidden selected> Select Driver</option>
                    <option value="none"> None</option>
                    @php
                        $drivers = DB::table('users')->where('role', 'driver')->get();
                    @endphp
                    @foreach ($drivers as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
                @error('driver')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12 mt-3">
                <button class="btn btn-lg btn-secondary text-uppercase" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-lg btn-primary text-uppercase" type="submit">Submit</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>

<div class="modal fade" id="EditSchedule" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content text-start">
        <div class="modal-body custom_scroll p-lg-5">
        <button type="button" class="btn-close position-absolute top-0 end-0 mt-3 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
        <h4 class="modal-title">Modify Schedule</h4>
        <div class="row g-2 mt-3">
            <form action="{{ route('schedule.create') }}" method="post">
                @csrf
                <input type="hidden" name="user" value="{{ old('user') }}" id="editUserSchedule">
                <div class="col-12">
                <label class="form-label">Pick up :</label>
                <input type="time" id="editPickUp" name="pickup" value="{{old('pickup')}}" class="form-control" placeholder="Email">
                @error('pickup')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12">
                <label class="form-label">Drop Off :</label>
                <input type="time" id="editDropoff" name="dropoff" value="{{old('dropoff')}}" class="form-control" placeholder="Email">
                @error('dropoff')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12 mt-3">
                <button class="btn btn-lg btn-secondary text-uppercase" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-lg btn-primary text-uppercase" type="submit">Submit</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>

<div class="modal fade" id="Car2Employee" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content text-start">
        <div class="modal-body custom_scroll p-lg-5">
        <button type="button" class="btn-close position-absolute top-0 end-0 mt-3 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
        <h4 class="modal-title">Assign Car To Employee</h4>
        <p class="text-muted">All field are required to allocate car, use below form</p>
        <div class="row g-2 mt-3">
            <form action="{{ route('car.assign2.create') }}" method="post">
                @csrf
                <div class="col-md-12">
                <label class="form-label">Car</label>
                <select class="form-control" name="car">
                    <option value="" hidden selected> Select Car</option>
                    <option value="none"> None</option>
                    @php
                        $cars = DB::table('cars')->get();
                    @endphp
                    @foreach ($cars as $car)
                    <option value="{{$car->car_id}}">{{$car->car_model}} -> {{$car->car_registration_number}}</option>
                    @endforeach
                </select>
                @error('car')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-md-12">
                <label class="form-label">Employee</label>
                <select class="form-control" name="employee">
                    <option value="" hidden selected> Select Employee</option>
                    <option value="none"> None</option>
                    @php
                        $drivers = DB::table('users')->where('role', 'employee')->get();
                    @endphp
                    @foreach ($drivers as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
                @error('employee')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12 mt-3">
                <button class="btn btn-lg btn-secondary text-uppercase" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-lg btn-primary text-uppercase" type="submit">Submit</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@error('create_user_status')
    @if ($message)
    <script>
        Swal.fire('Confirmed!', "successful User Saved!", 'success');
    </script>
    @else
    <script>
        Swal.fire('Cancelled', 'Fail to Save User!', 'info');
    </script>
    @endif
@enderror

@error('update_user_status')
    @if ($message)
    <script>
        Swal.fire('Cancelled!', "Fail to Update!", 'info');
    </script>
    @else
    <script>
        Swal.fire('Confirmed!', "successful User Updated!", 'success');
    </script>
    @endif
@enderror

@error('remove_user_status')
    @if ($message)
    <script>
        Swal.fire('Confirmed!', "successful User Removed!", 'success').then((result) => {
            if (result.isConfirmed) {
                location.reload();
            };
        })
    </script>
    @else
    <script>
        Swal.fire('Cancelled', 'Fail to Remove User!', 'info');
    </script>
    @endif
@enderror

@error('create_car_status')
    @if ($message)
    <script>
        Swal.fire('Confirmed!', "successful Car Saved!", 'success');
    </script>
    @else
    <script>
        Swal.fire('Cancelled', 'Fail to Save Car!', 'info');
    </script>
    @endif
@enderror

@error('lock_car_status')
    @if ($message)
    <script>
        Swal.fire('Confirmed!', "successful Car Locked!", 'success').then((result) => {
            if (result.isConfirmed) {
                location.reload();
            };
        })
    </script>
    @else
    <script>
        Swal.fire('Cancelled', 'Fail to Lock Car!', 'info');
    </script>
    @endif
@enderror

@error('unlock_car_status')
    @if ($message)
    <script>
        Swal.fire('Confirmed!', "successful Car Unlock!", 'success').then((result) => {
            if (result.isConfirmed) {
                location.reload();
            };
        })
    </script>
    @else
    <script>
        Swal.fire('Cancelled', 'Fail to Unlock Car!', 'info');
    </script>
    @endif
@enderror

@error('remove_car_status')
    @if ($message)
    <script>
        Swal.fire('Confirmed!', "successful Car Removed!", 'success').then((result) => {
            if (result.isConfirmed) {
                location.reload();
            };
        })
    </script>
    @else
    <script>
        Swal.fire('Cancelled', 'Fail to Remove Car!', 'info');
    </script>
    @endif
@enderror

@error('update_car_status')
    @if ($message)
    <script>
        Swal.fire('Cancelled!', "Fail to Update!", 'info');
    </script>
    @else
    <script>
        Swal.fire('Confirmed!', "successful Car Updated!", 'success');
    </script>
    @endif
@enderror

@error('assign_car_status')
    @if ($message)
    <script>
        Swal.fire('Confirmed!', "successful Assigning Saved!", 'success');
    </script>
    @else
    <script>
        Swal.fire('Cancelled', 'Fail to Save Action!', 'info');
    </script>
    @endif
@enderror

@error('schedule_status')
    @if ($message)
    <script>
        Swal.fire('Confirmed!', "successful Schedule Saved!", 'success');
    </script>
    @else
    <script>
        Swal.fire('Cancelled', 'Fail to Save Schedule!', 'info');
    </script>
    @endif
@enderror

@error('address_status')
    @if ($message)
    <script>
        Swal.fire('Confirmed!', "successful Address Saved!", 'success');
    </script>
    @else
    <script>
        Swal.fire('Cancelled', 'Fail to Save Address!', 'info');
    </script>
    @endif
@enderror

<script>
    @if(session('modal'))
        document.addEventListener('DOMContentLoaded', function () {
            const modalId = '{{ session('modal') }}';
            const modalElement = new bootstrap.Modal(document.getElementById(modalId));
            modalElement.show();
        });
    @endif



    function editUser(id, name, email, role, phone, gender, isActive) {
        console.log(id);
        document.getElementById('editUserId').value = id;
        document.getElementById('editUserEmail').value = email;
        document.getElementById('editUserName').value = name;
        document.getElementById('editUserRole').value = role;
        document.getElementById('editUserPhone').value = phone;
        document.getElementById('editUserGender').value = gender;
        document.getElementById('editUserStatus').value = isActive;

        // Show the modal
        const editModal = new bootstrap.Modal(document.getElementById('EditUserModal'));
        editModal.show();
    }


    document.querySelectorAll('.delete-link').forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent default action

            Swal.fire({
                title: "Are you sure?",
                text: "This action cannot be undone!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = this.href; // Proceed to the delete link
                }
            });
        });
    });

    function editCar(id, model, car_registration_number, color, capacity, isActive) {
        console.log(id);
        document.getElementById('editCarId').value = id;
        document.getElementById('editCarModel').value = model;
        document.getElementById('editCarregistration').value = car_registration_number;
        document.getElementById('editCarColor').value = color;
        document.getElementById('editCarCapacity').value = capacity;
        document.getElementById('editCarStatus').value = isActive;

        // Show the modal
        const editModal = new bootstrap.Modal(document.getElementById('EditCarModal'));
        editModal.show();
    }

    document.querySelectorAll('.delete-car').forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent default action

            Swal.fire({
                title: "Are you sure?",
                text: "This action cannot be undone!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = this.href; // Proceed to the delete link
                }
            });
        });
    });

    function editSchedule(id, pickup, dropoff) {
        document.getElementById('editUserSchedule').value = id;
        document.getElementById('editPickUp').value = pickup;
        document.getElementById('editDropoff').value = dropoff;

        // Show the modal
        const editModal = new bootstrap.Modal(document.getElementById('EditSchedule'));
        editModal.show();
    }
</script>


{{--
<div class="modal fade" id="CreateModule" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content text-start">
        <div class="modal-body custom_scroll p-lg-5">
        <button type="button" class="btn-close position-absolute top-0 end-0 mt-3 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
        <h4 class="modal-title">Create Module</h4>
        <p class="text-muted">All field are required to create Module, use below form</p>
        <div class="row g-2 mt-3">
            <form action="{{route('module.create')}}" method="post">
                @csrf
                <div class="col-12">
                <label class="form-label">Module Name</label>
                <input type="text" name="name" class="form-control" placeholder="Module Name">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12">
                <label class="form-label">Module Code</label>
                <input type="text" name="code" class="form-control" placeholder="Module Code">
                @error('code')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-md-12">
                <label class="form-label">Department</label>
                <select class="form-control" name="department">
                    <option value="" hidden selected> Select Module Dept.</option>
                    @php
                        $departments = DB::table('departments')->get();
                    @endphp
                    @foreach ($departments as $department)
                    <option value="{{$department->id}}">{{$department->name}}</option>
                    @endforeach
                </select>
                @error('department')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12">
                <label class="form-label">Module description</label>
                <textarea class="form-control" name="description" rows="3"></textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-md-12">
                <label class="form-label">Status</label>
                <select class="form-control" name="status">
                    <option value="" hidden selected> Select Module Status</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12 mt-3">
                <button class="btn btn-lg btn-secondary text-uppercase" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-lg btn-primary text-uppercase" type="submit">Submit</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>

<div class="modal fade" id="CreateAttendance" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content text-start">
        <div class="modal-body custom_scroll p-lg-5">
        <button type="button" class="btn-close position-absolute top-0 end-0 mt-3 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
        <h4 class="modal-title">Create Attendance</h4>
        <p class="text-muted">All field are required to create Module Attendance, use below form</p>
        <div class="row g-2 mt-3">
            <form action="{{ route('attendance') }}" method="post">
                @csrf
                <div class="col-md-12">
                    <label class="form-label">Department</label>
                    <select class="form-control" id="department" name="department" required>
                        <option value="" hidden selected>Select Department</option>
                        @php
                        $departments = DB::table('departments')->get();
                        @endphp
                        @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-12 mt-3" id="module-container" style="display: none;">
                    <label class="form-label">Module</label>
                    <select class="form-control" id="module" name="module" required>
                        <option value="" hidden selected>Select Module</option>
                    </select>
                </div>

                <div class="col-12 mt-3">
                    <button class="btn btn-lg btn-secondary text-uppercase" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-lg btn-primary text-uppercase" type="submit">Continue</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>

<div class="modal fade" id="CreateStudent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content text-start">
        <div class="modal-body custom_scroll p-lg-5">
        <button type="button" class="btn-close position-absolute top-0 end-0 mt-3 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
        <h4 class="modal-title">Create Student</h4>
        <p class="text-muted">All field are required to create Student, use below form</p>
        <div class="row g-2 mt-3">
            <form action="{{route('student.create')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                <label class="form-label">Student Names</label>
                <input type="text" name="name" class="form-control" placeholder="Student Name">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12">
                <label class="form-label">Student Reg. Number</label>
                <input type="text" name="registration" class="form-control" placeholder="Student Code">
                @error('registration')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12">
                <label class="form-label">Student Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12">
                <label class="form-label">Student Telephone</label>
                <input type="text" name="phone" class="form-control" placeholder="telephone">
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12">
                <label class="form-label">Student Profile</label>
                <input type="file" name="profile" class="form-control">
                @error('profile')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-md-12">
                <label class="form-label">Department</label>
                <select class="form-control" name="department">
                    <option value="" hidden selected> Select Module Dept.</option>
                    @php
                        $departments = DB::table('departments')->get();
                    @endphp
                    @foreach ($departments as $department)
                    <option value="{{$department->id}}">{{$department->name}}</option>
                    @endforeach
                </select>
                @error('department')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-md-6">
                <label class="form-label">Sex</label>
                <select class="form-control" name="gender">
                    <option value="" hidden selected> Select Gender.</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                @error('gender')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-md-6">
                <label class="form-label">Status</label>
                <select class="form-control" name="status">
                    <option value="" hidden selected> Select Status</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12 mt-3">
                <button class="btn btn-lg btn-secondary text-uppercase" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-lg btn-primary text-uppercase" type="submit">Submit</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content text-start">
        <div class="modal-body custom_scroll p-lg-5">
        <button type="button" class="btn-close position-absolute top-0 end-0 mt-3 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
        <h4 class="modal-title">Update Module</h4>
        <p class="text-muted">All field are required to create Module, use below form</p>
        <div class="row g-2 mt-3">
            <form action="{{route('module.update')}}" method="POST">
                @csrf
                <input type="hidden" id="edit-id" name="id">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit-name" class="form-label">Module Name</label>
                        <input type="text" class="form-control" id="edit-name" name="name">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="edit-code" class="form-label">Module Code</label>
                        <input type="text" class="form-control" id="edit-code" name="code">
                        @error('code')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="edit-department" class="form-label">Department</label>
                        <select name="department" class="form-control" id="edit-department">
                        @php
                            $departments = DB::table('departments')->get();
                        @endphp
                        @foreach ($departments as $department)
                        <option value="{{$department->id}}">{{$department->name}}</option>
                        @endforeach
                        </select>

                        @error('department')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="edit-status" class="form-label">Status</label>
                        <select class="form-select" id="edit-status" name="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>

<div class="modal fade" id="editModal1" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content text-start">
        <div class="modal-body custom_scroll p-lg-5">
        <button type="button" class="btn-close position-absolute top-0 end-0 mt-3 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
        <h4 class="modal-title">Update Department</h4>
        <p class="text-muted">All field are required to create Module, use below form</p>
        <div class="row g-2 mt-3">
            <form action="{{route('department.update')}}" method="post">
                @csrf
                <input type="hidden" name="id" id="module-id">
                <div class="col-12">
                <label class="form-label">Department Name</label>
                <input type="text" name="name" value="{{old('name')}}" id="module-name" class="form-control" placeholder="Dept. name">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-md-12">
                <label class="form-label">Status</label>
                <select class="form-control" name="status" id="module-status">
                    <option value="" hidden selected> Select Department Status</option>
                    <option value="1" {{old('status')=='1'?'selected':''}}>Active</option>
                    <option value="0" {{old('status')=='0'?'selected':''}}>Inactive</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12 mt-3">
                <button class="btn btn-lg btn-secondary text-uppercase" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-lg btn-primary text-uppercase" type="submit">Submit</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>

<div class="modal fade" id="CreateUser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content text-start">
        <div class="modal-body custom_scroll p-lg-5">
        <button type="button" class="btn-close position-absolute top-0 end-0 mt-3 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
        <h4 class="modal-title">Create User</h4>
        <p class="text-muted">All field are required to create User, use below form</p>
        <div class="row g-2 mt-3">
            <form action="{{route('user.create')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                <label class="form-label">User Names</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="User Name">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12">
                <label class="form-label">User Email</label>
                <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="Email">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12">
                <label class="form-label">User Telephone</label>
                <input type="text" name="phone" value="{{old('phone')}}" class="form-control" placeholder="telephone">
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12">
                <label class="form-label">User Profile</label>
                <input type="file" value="{{old('profile')}}" name="profile" class="form-control">
                @error('profile')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-md-12">
                <label class="form-label">User Role</label>
                <select class="form-control" name="role">
                    <option value="" hidden selected> Select User Role</option>
                    <option value="gate"  {{old('role')=='gate'?'selected':''}}>Gate</option>
                    <option value="teacher" {{old('role')=='teacher'?'selected':''}}>Teacher</option>
                </select>
                @error('role')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-md-6">
                <label class="form-label">Sex</label>
                <select class="form-control" name="gender">
                    <option value="" hidden selected> Select Gender.</option>
                    <option value="male" {{old('gender')=='male'?'selected':''}}>Male</option>
                    <option value="female" {{old('gender')=='female'?'selected':''}}>Female</option>
                </select>
                @error('gender')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-md-6">
                <label class="form-label">Status</label>
                <select class="form-control" name="status">
                    <option value="" hidden selected> Select Status</option>
                    <option value="1" {{old('status')=='1'?'selected':''}}>Active</option>
                    <option value="0" {{old('status')=='0'?'selected':''}}>Inactive</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12 mt-3">
                <button class="btn btn-lg btn-secondary text-uppercase" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-lg btn-primary text-uppercase" type="submit">Submit</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>

<div class="modal fade" id="EditUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content text-start">
        <div class="modal-body custom_scroll p-lg-5">
        <button type="button" class="btn-close position-absolute top-0 end-0 mt-3 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
        <h4 class="modal-title">Update User</h4>
        <p class="text-muted">All field are required to update User, use below form</p>
        <div class="row g-2 mt-3">
            <form action="{{route('user.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="editUserId">
                <div class="col-12">
                <label class="form-label">User Names</label>
                <input type="text" id="editUserName" name="name" value="{{old('name')}}" class="form-control" placeholder="User Name">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12">
                <label class="form-label">User Email</label>
                <input type="text" id="editUserEmail" name="email" value="{{old('email')}}" class="form-control" placeholder="Email">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12">
                <label class="form-label">User Telephone</label>
                <input type="text" id="editUserPhone" name="phone" value="{{old('phone')}}" class="form-control" placeholder="telephone">
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-md-12">
                <label class="form-label">User Role</label>
                <select class="form-control" id="editUserRole" name="role">
                    <option value="" hidden selected> Select User Role</option>
                    <option value="gate"  {{old('role')=='gate'?'selected':''}}>Gate</option>
                    <option value="teacher" {{old('role')=='teacher'?'selected':''}}>Teacher</option>
                </select>
                @error('role')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-md-6">
                <label class="form-label">Sex</label>
                <select class="form-control" id="editUserGender" name="gender">
                    <option value="" hidden selected> Select Gender.</option>
                    <option value="male" {{old('gender')=='male'?'selected':''}}>Male</option>
                    <option value="female" {{old('gender')=='female'?'selected':''}}>Female</option>
                </select>
                @error('gender')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-md-6">
                <label class="form-label">Status</label>
                <select class="form-control" id="editUserStatus" name="status">
                    <option value="" hidden selected> Select Status</option>
                    <option value="1" {{old('status')=='1'?'selected':''}}>Active</option>
                    <option value="0" {{old('status')=='0'?'selected':''}}>Inactive</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12 mt-3">
                <button class="btn btn-lg btn-secondary text-uppercase" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-lg btn-primary text-uppercase" type="submit">Submit</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>

<div class="modal fade" id="EditStudentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content text-start">
        <div class="modal-body custom_scroll p-lg-5">
        <button type="button" class="btn-close position-absolute top-0 end-0 mt-3 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
        <h4 class="modal-title">Update User</h4>
        <p class="text-muted">All field are required to update User, use below form</p>
        <div class="row g-2 mt-3">
            <form action="{{route('student.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="editStudentId">
                <div class="col-12">
                <label class="form-label">Student Names</label>
                <input type="text" id="editStudentName" name="name" class="form-control" placeholder="Student Name">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12">
                <label class="form-label">Student Reg. Number</label>
                <input type="text" id="editStudentReg" name="registration" class="form-control" placeholder="Student Code">
                @error('registration')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12">
                <label class="form-label">Student Email</label>
                <input type="text" id="editStudentEmail" name="email" class="form-control" placeholder="Email">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12">
                <label class="form-label">Student Telephone</label>
                <input type="text" id="editStudentPhone" name="phone" class="form-control" placeholder="telephone">
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-md-12">
                <label class="form-label">Department</label>
                <select class="form-control" id="editStudentDept" name="department">
                    <option value="" hidden selected> Select Module Dept.</option>
                    @php
                        $departments = DB::table('departments')->get();
                    @endphp
                    @foreach ($departments as $department)
                    <option value="{{$department->id}}">{{$department->name}}</option>
                    @endforeach
                </select>
                @error('department')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-md-6">
                <label class="form-label">Sex</label>
                <select class="form-control" id="editStudentGender" name="gender">
                    <option value="" hidden selected> Select Gender.</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                @error('gender')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-md-6">
                <label class="form-label">Status</label>
                <select class="form-control" id="editStudentStatus" name="status">
                    <option value="" hidden selected> Select Status</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-12 mt-3">
                <button class="btn btn-lg btn-secondary text-uppercase" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-lg btn-primary text-uppercase" type="submit">Submit</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>

<div class="modal fade" id="CreateList" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content text-start">
        <div class="modal-body custom_scroll p-lg-5">
        <button type="button" class="btn-close position-absolute top-0 end-0 mt-3 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
        <h4 class="modal-title">Create Attendance</h4>
        <p class="text-muted">All field are required to create Module Attendance, use below form</p>
        <div class="row g-2 mt-3">
            <form action="{{ route('student.list') }}" method="post">
                @csrf
                <div class="col-md-12">
                    <label class="form-label">Department</label>
                    <select class="form-control" name="department" required>
                        <option value="" hidden selected>Select Department</option>
                        @php
                        $departments = DB::table('departments')->get();
                        @endphp
                        @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12 mt-3">
                    <button class="btn btn-lg btn-secondary text-uppercase" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-lg btn-primary text-uppercase" type="submit">Continue</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@error('save_department_status')
    @if ($message)
    <script>
        Swal.fire('Confirmed!', "successful Department Saved!", 'success').then((result) => {
            if (result.isConfirmed) {
                location.reload();
            };
        })
    </script>
    @else
    <script>
        Swal.fire('Cancelled', 'Fail to Save Department!', 'info');
    </script>
    @endif
@enderror


@error('remove_department_status')
    @if ($message)
    <script>
        Swal.fire('Confirmed!', "successful Department Removed!", 'success').then((result) => {
            if (result.isConfirmed) {
                location.reload();
            };
        })
    </script>
    @else
    <script>
        Swal.fire('Cancelled', 'Fail to Remove Department!', 'info');
    </script>
    @endif
@enderror

@error('lock_department_status')
    @if ($message)
    <script>
        Swal.fire('Confirmed!', "successful Department Locked!", 'success').then((result) => {
            if (result.isConfirmed) {
                location.reload();
            };
        })
    </script>
    @else
    <script>
        Swal.fire('Cancelled', 'Fail to Lock Department!', 'info');
    </script>
    @endif
@enderror

@error('unlock_department_status')
    @if ($message)
    <script>
        Swal.fire('Confirmed!', "successful Department Unlock!", 'success').then((result) => {
            if (result.isConfirmed) {
                location.reload();
            };
        })
    </script>
    @else
    <script>
        Swal.fire('Cancelled', 'Fail to Unlock Department!', 'info');
    </script>
    @endif
@enderror

@error('save_module_status')
    @if ($message)
    <script>
        Swal.fire('Confirmed!', "successful Module Saved!", 'success').then((result) => {
            if (result.isConfirmed) {
                location.reload();
            };
        })
    </script>
    @else
    <script>
        Swal.fire('Cancelled', 'Fail to Save Module!', 'info');
    </script>
    @endif
@enderror

@error('remove_module_status')
    @if ($message)
    <script>
        Swal.fire('Confirmed!', "successful Module Removed!", 'success').then((result) => {
            if (result.isConfirmed) {
                location.reload();
            };
        })
    </script>
    @else
    <script>
        Swal.fire('Cancelled', 'Fail to Remove Module!', 'info');
    </script>
    @endif
@enderror

@error('save_student_status')
    @if ($message)
    <script>
        Swal.fire('Confirmed!', "successful Student Saved!", 'success').then((result) => {
            if (result.isConfirmed) {
                location.reload();
            };
        })
    </script>
    @else
    <script>
        Swal.fire('Cancelled', 'Fail to Save Student!', 'info');
    </script>
    @endif
@enderror

@error('lock_student_status')
    @if ($message)
    <script>
        Swal.fire('Confirmed!', "successful Student Locked!", 'success').then((result) => {
            if (result.isConfirmed) {
                location.reload();
            };
        })
    </script>
    @else
    <script>
        Swal.fire('Cancelled', 'Fail to Lock Student!', 'info');
    </script>
    @endif
@enderror

@error('unlock_student_status')
    @if ($message)
    <script>
        Swal.fire('Confirmed!', "successful Student Unlock!", 'success').then((result) => {
            if (result.isConfirmed) {
                location.reload();
            };
        })
    </script>
    @else
    <script>
        Swal.fire('Cancelled', 'Fail to Unlock Student!', 'info');
    </script>
    @endif
@enderror

@error('update_module_status')
    @if ($message)
    <script>
        Swal.fire('Cancelled!', "Fail to Update!", 'info');
    </script>
    @else
    <script>
        Swal.fire('Confirmed!', "successful MOdule Updated!", 'success');
    </script>
    @endif
@enderror

@error('update_department_status')
    @if ($message)
    <script>
        Swal.fire('Cancelled!', "Fail to Update!", 'info');
    </script>
    @else
    <script>
        Swal.fire('Confirmed!', "successful Department Updated!", 'success');
    </script>
    @endif
@enderror

@error('create_user_status')
    @if ($message)
    <script>
        Swal.fire('Confirmed!', "successful User Saved!", 'success');
    </script>
    @else
    <script>
        Swal.fire('Cancelled', 'Fail to Save User!', 'info');
    </script>
    @endif
@enderror

@error('update_user_status')
    @if ($message)
    <script>
        Swal.fire('Cancelled!', "Fail to Update!", 'info');
    </script>
    @else
    <script>
        Swal.fire('Confirmed!', "successful User Updated!", 'success');
    </script>
    @endif
@enderror

@error('update_student_status')
    @if (!$message)
    <script>
        Swal.fire('Cancelled!', "Fail to Update!", 'info');
    </script>
    @else
    <script>
        Swal.fire('Confirmed!', "successful Student Updated!", 'success');
    </script>
    @endif
@enderror

@error('register_card_status')
    @if ($message)
    <script>
        Swal.fire('Confirmed!', "successful Card Assigned to Student!", 'success').then((result) => {
            if (result.isConfirmed) {
                location.reload();
            };
        })
    </script>
    @else
    <script>
        Swal.fire('Cancelled', 'Fail to Save Card!', 'info');
    </script>
    @endif
@enderror

@error('swap_card_status')
    @if ($message)
    <script>
        Swal.fire('Confirmed!', "successful Card Swap!", 'success').then((result) => {
            if (result.isConfirmed) {
                location.reload();
            };
        })
    </script>
    @else
    <script>
        Swal.fire('Cancelled', 'Fail to Swap Card!', 'info');
    </script>
    @endif
@enderror

<script>
    @if(session('modal'))
        document.addEventListener('DOMContentLoaded', function () {
            const modalId = '{{ session('modal') }}';
            const modalElement = new bootstrap.Modal(document.getElementById(modalId));
            modalElement.show();
        });
    @endif

    document.addEventListener('DOMContentLoaded', () => {
        const editButtons = document.querySelectorAll('.edit-btn');

        editButtons.forEach(button => {
            button.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');
                const code = this.getAttribute('data-code');
                const department = this.getAttribute('data-department');
                const status = this.getAttribute('data-status');

                document.getElementById('edit-id').value = id;
                document.getElementById('edit-name').value = name;
                document.getElementById('edit-code').value = code;
                document.getElementById('edit-department').value = department;
                document.getElementById('edit-status').value = status;

                const editModal = new bootstrap.Modal(document.getElementById('editModal'));
                editModal.show();
            });
        });
    });

    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.edit-department-btn').forEach(button => {
            button.addEventListener('click', function () {

                document.getElementById('module-id').value = this.getAttribute('data-id');
                document.getElementById('module-name').value = this.getAttribute('data-name');
                document.getElementById('module-status').value = this.getAttribute('data-status');

                const modal = new bootstrap.Modal(document.getElementById('editModal1'));
                modal.show();
            });
        });
    });

    function editStudent(id, name, email, phone, gender, dept, reg, isActive) {
        console.log(reg);
        document.getElementById('editStudentId').value = id;
        document.getElementById('editStudentEmail').value = email;
        document.getElementById('editStudentName').value = name;
        document.getElementById('editStudentPhone').value = phone;
        document.getElementById('editStudentGender').value = gender;
        document.getElementById('editStudentDept').value = dept;
        document.getElementById('editStudentReg').value = reg;
        document.getElementById('editStudentStatus').value = isActive;

        // Show the modal
        const editModal = new bootstrap.Modal(document.getElementById('EditStudentModal'));
        editModal.show();
    }

</script>

<script>
    $(document).ready(function () {
        $('#department').change(function () {
            var departmentId = $(this).val();

            if (departmentId) {
                $('#module-container').show(); // Show module dropdown

                // Fetch modules based on department ID
                $.ajax({
                    url: "{{ route('getModules') }}",
                    type: "GET",
                    data: { department_id: departmentId },
                    success: function (data) {
                        $('#module').empty().append('<option value="" hidden selected>Select Module</option>');
                        $.each(data, function (key, module) {
                            $('#module').append('<option value="' + module.id + '">' + module.name + ' || ' + module.code + '</option>');
                        });
                    }
                });
            } else {
                $('#module-container').hide(); // Hide if no department selected
                $('#module').empty().append('<option value="" hidden selected>Select Module</option>');
            }
        });
    });
</script> --}}
