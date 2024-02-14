@extends("layouts.app")

@section("style")
<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection

@section("wrapper")
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <h6 class="mb-0 text-uppercase border-start border-5 ps-2 border-primary">User </h6>
        <hr />
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            @method('patch')

                            <div class="mb-3">
                                <label for="" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Nama" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" value="{{ old('username') ?? $user->username }}" placeholder="Username" autocomplete="off">
                                @error('username')
                                    <div class="text-danger">Username sudah digunakan</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="text" class="form-control" name="password" placeholder="Password baru" autocomplete="off">
                            </div>
                         
                            <div class="mb-3">
                                <label class="form-label">Role</label> <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role"
                                        id="role_admin" value="admin" {{ old('role') == 'admin' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="role_admin">Admin</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role"
                                        id="role_tim_data" value="tim_data" {{ old('role') == 'tim_data' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="role_tim_data">Tim Data</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role"
                                        id="role_tim_data_2" value="tim_data_2" {{ old('role') == 'tim_data_2' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="role_tim_data_2">Tim Data 2</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role"
                                        id="role_user" value="user" {{ old('role') == 'user' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="role_user">User</label>
                                </div>
                            </div>


                            <div class="text-end">
                                <a href="{{ url('user') }}" type="button" class="btn" >Back</a>
                                <button type="submit" class="btn btn-primary"><i class='bx bx-plus mx-0 p-0'></i>
                                    Save</button>
                            </div>
                    </div>

                </div>



                </form>
            </div>
        </div>

    </div>
</div>
<!--end page wrapper -->
@endsection
