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
                        <label for="name"><strong>Name</strong></label>
                        <div class="form-group">
                            <div v-if="!editingName" class="row col-md-12">
                                <div class="col-md-8">
                                    <p data-type="text" data-name="name" v-text="user.name"></p>
                                </div>
                                <div class="col-md-4 text-center btn-block">
                                    <button type="button" @click="editName(true)" class="btn btn-primary text-white">Edit name</button>
                                </div>
                            </div>
                            <div v-if="editingName">
                                <form method="POST" action="/settings/name" @submit.prevent="onSubmitName" class="row col-md-12">
                                    <div class="col-md-8">
                                        <input type="text" v-model="user.name">
                                    </div>
                                    <div class="col-md-4 text-center btn-block">
                                        <button type="submit" @click="editName(true)" class="btn btn-primary text-white">Save name</button>
                                    </div>
                                    <div class="col-md-4 text-center btn-block">
                                        <button type="button" @click="editName(false)" class="btn btn-primary text-white">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <span class="help text-danger" v-text="errors.get('name')"></span>

                    <hr>

                    <!-- change description -->
                        <label for="description"><strong>Description</strong></label>
                        <div class="form-group">
                            <div v-if="!editingDescription" class="row col-md-12">
                                <div class="col-md-8">
                                    <p data-type="text" data-name="description" v-text="user.description"></p>
                                </div>
                                <div class="col-md-4 text-center btn-block">
                                    <button type="button" @click="editDescription(true)" class="btn btn-primary text-white">Edit Description</button>
                                </div>
                            </div>
                            <div v-if="editingDescription">
                                <form method="POST" action="/settings/description" @submit.prevent="onSubmitDescription" class="row col-md-12">
                                    <div class="col-md-8">
                                        <input type="text" v-model="user.description">
                                    </div>
                                    <div class="col-md-4 text-center btn-block">
                                        <button type="submit" @click="editDescription(true)" class="btn btn-primary text-white">Save Description</button>
                                    </div>
                                    <div class="col-md-4 text-center btn-block">
                                        <button type="button" @click="editDescription(false)" class="btn btn-primary text-white">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <span class="help text-danger" v-text="errors.get('description')"></span>

                    <hr>

                    <!-- change email -->
                        <label for="email"><strong>Email</strong></label>
                        <div class="form-group">
                            <div v-if="!editingEmail" class="row col-md-12">
                                <div class="col-md-8">
                                    <p data-type="text" data-name="email" v-text="user.email"></p>
                                </div>
                                <div class="col-md-4 text-center btn-block">
                                    <button type="button" @click="editEmail(true)" class="btn btn-primary text-white">Edit Email</button>
                                </div>
                            </div>
                            <div v-if="editingEmail">
                                <form method="POST" action="/settings/email" @submit.prevent="onSubmitEmail" class="row col-md-12">
                                    <div class="col-md-8">
                                        <input type="text" v-model="user.email">
                                    </div>
                                    <div class="col-md-4 text-center btn-block">
                                        <button type="submit" @click="editEmail(true)" class="btn btn-primary text-white">Save Email</button>
                                    </div>
                                    <div class="col-md-4 text-center btn-block">
                                        <button type="button" @click="editEmail(false)" class="btn btn-primary text-white">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <span class="help text-danger" v-text="errors.get('email')"></span>
                    <hr>

                    <!-- change password -->
                    <div class="form-group" v-if="!editingPassword">
                        <label for="password"><strong>Password</strong></label>
                        <div class="row col-md-12">
                            <div class="col-md-8">...</div>
                            <div class="col-md-4 text-center btn-block">
                                <button type="button" @click="editPassword(true)" class="btn btn-primary text-white">Edit Password</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" v-if="editingPassword">
                        <div v-if="edit_old" class="row col-md-12">
                            <div class="col-md-4">
                                <label for="name"><strong>Old Password</strong></label>
                            </div>
                            <div class="col-md-3">
                                <input>
                            </div>
                            <div v-if="!edit_new" class="col-md-5 text-right">
                                <button type="button" @click="editNewPassword(true)" class="btn btn-primary text-white">Next</button>
                                <button type="button" @click="editPassword(false)" class="btn btn-primary text-white">Cancel</button>
                            </div>
                        </div>
                        <div v-if="edit_new" class="row col-md-12">
                            <div class="col-md-4">
                                <label for="name"><strong>New Password</strong></label>
                            </div>
                            <div class="col-md-3">
                                <input>
                            </div>
                            <div v-if="!edit_confirm" class="col-md-5 text-right">
                                <button type="button" @click="editConfirmPassword(true)" class="btn btn-primary text-white">Next</button>
                                <button type="button" @click="editPassword(false)" class="btn btn-primary text-white">Cancel</button>
                            </div>
                        </div>
                        <div v-if="edit_confirm" class="row col-md-12">
                            <div class="col-md-4">
                                <label for="name"><strong>Confirm New Password</strong></label>
                            </div>
                            <div class="col-md-3">
                                <input>
                            </div>
                            <div class="col-md-5 text-right">
                                <button type="button" @click="onSubmitPassword(true)" class="btn btn-primary text-white">Save Password</button>
                                <button type="button" @click="editPassword(false)" class="btn btn-primary text-white">Cancel</button>
                            </div>
                        </div>
                    </div>
                    <!--
                        <div class="row col-md-12">
                            <div class="col-md-8">
                                <div>
                                    <strong>Password</strong>
                                </div>
                                <div>...</div>
                            </div>
                            <div class="col-md-4 text-right">
                                <button type="button" class="btn btn-primary text-white">Change password</button>
                            </div>
                        </div>
                        <form method="POST" action="/settings/password">
                        <div class="row">
                            <div class="form-group">
                                <label for="oldpassword">Password</label>
                                <input type="text" data-name="oldpassword" v-model="oldpassword">
                            </div>
                            
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="text" data-name="password" v-model="newpassword">
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">Confirm New Password</label>
                                <input type="text" data-name="password_confirmation" v-model="confirmnewpassword">
                            </div>

                            <div class="col text-right">
                                <button type="submit" class="btn btn-primary text-white">Change password</button>
                            </div>
                        </div>
                        </form>
                        -->
                </div>
            </div>
@endsection

@section ('footer')
<script src="{{ asset('js/views/account_settings.js') }}"></script>
@endsection