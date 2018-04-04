@extends ('layouts.master')

@section ('nav')
    @include('components.nav')
@endsection

@section ('content')
        <div class="container" scrolling="yes" style="width: 50%;">
            <h2 class="display-3 text-center">Account Settings</h2>
            <hr>
            <div class="lead">
                <div class="form-horizontal">
                    <!-- change name -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="name"><strong>Name</strong></label>
                            <p data-editable data-type="text" data-name="name" v-text="user.name"></p>
                        </div>
                        <div class="col text-right">
                            <button class="btn btn-primary text-white" href="#editNameModal" data-toggle="modal" data-target="#editNameModal">Change name</button>
                        </div>
                    </div>

                    <hr>

                    <!-- change description -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="description"><strong>Description</strong></label>
                            <p data-editable data-type="text" data-name="description" v-text="user.description"></p>
                        </div>
                        <div class="col text-right">
                            <button class="btn btn-primary text-white" href="#editDescriptionModal" data-toggle="modal" data-target="#editDescriptionModal">Change description</button>
                        </div>
                    </div>

                    <hr>

                    <!-- change email -->
                    <div class="form-group row">
                        <div class="col">
                            <label for="email"><strong>Email</strong></label>
                            <p data-editable data-type="text" data-name="email" v-text="user.email"></p>
                        </div>
                        <div class="col text-right">
                            <button class="btn btn-primary text-white" href="#editEmailModal" data-toggle="modal" data-target="#editEmailModal">Change email</button>
                        </div>
                    </div>
                    @if ($errors->has('email'))
                            <small class="form-text alert alert-danger" role="alert">{{ $errors->first('email') }}</small>
                    @endif
                    <hr>

                    <!-- change password -->
                    <div class="row">
                        <div class="col">
                            <strong>Password</strong>
                            <p>...</p>
                        </div>
                        <!--div class="form-group">
                            <label for="oldpassword">Password</label>
                            <p data-editable data-type="text" data-name="password">...</p>
                        </div>
                        
                        <div *ngIf="edited" class="form-group">
                            <label for="password">New Password</label>
                            <p data-editable data-type="text" data-name="password">...</p>
                        </div>
                        <div *ngIf="new_edited" class="form-group">
                            <label for="password-confirm">Confirm New Password</label>
                            <p data-editable data-type="text" data-name="password_confirmation">...</p>
                        </div-->

                        <div class="col text-right">
                            <button class="btn btn-primary text-white" href="#changePasswordModal" data-toggle="modal" data-target="#changePasswordModal">Change password</button>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@section ('footer')
<script src="{{ asset('js/views/account_settings.js') }}"></script>
@endsection