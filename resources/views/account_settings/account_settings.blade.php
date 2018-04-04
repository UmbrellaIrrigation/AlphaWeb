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
                    <form method="POST" action="/settings/name">
                        <label for="name"><strong>Name</strong></label>
                        <div class="form-group row col-md-12">
                            <div class="col-md-8">
                                <p data-type="text" data-name="name" v-text="user.name"></p>
                                <input v-if="false" type="text" v-model="user.name">
                            </div>
                            <div class="col-md-4 text-center btn-block">
                                <button class="btn btn-primary text-white">Edit name</button>
                            </div>
                            <div v-if="false" class="col-md-4 text-center btn-block">
                                <button class="btn btn-primary text-white">Save name</button>
                            </div>
                        </div>
                        <!-- @if ($errors->has('name'))
                            <small class="form-text alert alert-danger" role="alert">{{ $errors->first('name') }}</small>
                        @endif -->
                    </form>

                    <hr>

                    <!-- change description -->
                    <form method="POST" action="/settings/description">
                        <label for="description"><strong>Description</strong></label>
                        <div class="form-group row col-md-12">
                            <div class="col-md-8">
                                <p data-type="text" data-name="description" v-text="user.description"></p>
                                <input v-if="false" type="text" v-model="user.description">
                            </div>
                            <div class="col-md-4 text-center btn-block">
                                <button class="btn btn-primary text-white">Edit description</button>
                            </div>
                            <div v-if="false" class="col-md-4 text-center btn-block">
                                <button class="btn btn-primary text-white">Save description</button>
                            </div>
                        </div>
                        <!-- @if ($errors->has('description'))
                            <small class="form-text alert alert-danger" role="alert">{{ $errors->first('description') }}</small>
                        @endif -->
                    </form>
                    
                    <hr>

                    <!-- change email -->
                    <form method="POST" action="/settings/email">
                        <label for="email"><strong>Email</strong></label>
                        <div class="form-group row col-md-12">
                            <div class="col-md-8">
                                <p data-type="text" data-name="email" v-text="user.email"></p>
                                <input v-if="false" type="text" v-model="user.email">
                            </div>
                            <div class="col-md-4 text-center btn-block">
                                <button class="btn btn-primary text-white">Edit email</button>
                            </div>
                            <div v-if="false" class="col-md-4 text-center btn-block">
                                <button class="btn btn-primary text-white">Save email</button>
                            </div>
                        </div>
                        <!-- @if ($errors->has('email'))
                            <small class="form-text alert alert-danger" role="alert">{{ $errors->first('email') }}</small>
                        @endif -->
                    </form>
                    
                    <hr>

                    <!-- change password -->
                    <form method="POST" action="/settings/password">
                    <div class="row">
                        <div class="col">
                            <strong>Password</strong>
                            <p>...</p>
                        </div>
                        <div>
                            <div class="form-group">
                                <label for="oldpassword">Password</label>
                                <p data-editable data-type="text" data-name="password">...</p>
                            </div>
                            
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <p data-editable data-type="text" data-name="password">...</p>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">Confirm New Password</label>
                                <p data-editable data-type="text" data-name="password_confirmation">...</p>
                            </div>
                        </div>

                        <div class="col text-right">
                            <button class="btn btn-primary text-white">Change password</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
@endsection

@section ('footer')
<script src="{{ asset('js/views/account_settings.js') }}"></script>
@endsection