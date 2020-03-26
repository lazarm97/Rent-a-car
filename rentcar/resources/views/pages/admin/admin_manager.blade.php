@extends('layouts.admin')

@section('admin_manager')
        <div class="col-lg-6 m-lg-auto pt-4 pb-5">
            <div>
                @isset($errors)
                    @foreach($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                @endisset
                @if(session()->has('message'))
                    {{ session('message') }}
                @endif
                <h2>Edit Account</h2>
                <form>
                    <input type="hidden" name="id" id="id" value="{{ $admin->id_user }}"/>
                    <input type="hidden" name="_token" value="<?php echo (csrf_token()); ?>"/>
                    <div class="form-group row">
                        <label for="fName" class="col-sm-2 col-lg-3 col-form-label">First name</label>
                        <div class="col-sm-10 col-lg-9">
                            <input type="text" readonly class="form-control-plaintext" id="fName" value="{{ $admin->first_name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lName" class="col-sm-2 col-lg-3 col-form-label">Last name</label>
                        <div class="col-sm-10 col-lg-9">
                            <input type="text" readonly class="form-control-plaintext" id="lName" value="{{ $admin->last_name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-lg-3 col-form-label">Email</label>
                        <div class="col-sm-10 col-lg-9">
                            <input type="text" class="form-control" id="email" value="{{ $admin->email }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-lg-3 col-form-label">Password</label>
                        <div class="col-sm-10 col-lg-9">
                            <input type="password" class="form-control" id="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 mr-auto">
                            <button type="button" id="btnUpdate" name="btnUpdate" class="btn btn-primary btn-block">Update</button>
                        </div>
                        <div class="col-md-6 mr-auto">
                            <a href="#" type="button" id="btnDelete" name="btnDelete" class="btn btn-danger btn-block">Delete account</a>
                        </div>
                    </div>
                </form>
            </div>

            <div>
                <h2>Create new admin</h2>
                <form>
                    <input type="hidden" name="_token" value="<?php echo (csrf_token()); ?>"/>
                    <div class="form-group row">
                        <label for="fNameNew" class="col-sm-2 col-lg-3 col-form-label">First name</label>
                        <div class="col-sm-10 col-lg-9">
                            <input type="text" class="form-control" id="fNameNew" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lNameNew" class="col-sm-2 col-lg-3 col-form-label">Last name</label>
                        <div class="col-sm-10 col-lg-9">
                            <input type="text" class="form-control" id="lNameNew" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="emailNew" class="col-sm-2 col-lg-3 col-form-label">Email</label>
                        <div class="col-sm-10 col-lg-9">
                            <input type="text" class="form-control" id="emailNew" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="passwordNew" class="col-sm-2 col-lg-3 col-form-label">Password</label>
                        <div class="col-sm-10 col-lg-9">
                            <input type="password" class="form-control" id="passwordNew" value="">
                        </div>
                    </div>
                    <div class="form-group row justify-content-between">
                        <div class="col-md-3">
                            <button type="button" id="btnInsertNew" name="btnInsertNew" class="btn btn-primary btn-block">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection

@section('adminManagerScripts')
    <script src="{{ asset('js/admin/admin_manager.js') }}"></script>
@endsection
