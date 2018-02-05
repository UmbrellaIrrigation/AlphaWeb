@extends ('layouts.master')

@section ('nav')
    @include('components.nav')
@endsection

@section ('content')        
            <div class="container" style="width: 50%;">
                <h2 class="display-3 text-center">Account Settings</h2>
                <hr>
                <div class="lead">
                <form class="form-horizontal" method="POST" action="">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <p data-editable data-type="text" data-name="name">{{ $user->name }}</p>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <p data-editable data-type="text" data-name="description">{{ $user->description }}</p>
                    </div>
                    
                    <hr>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <p data-editable data-type="text" data-name="email">{{ $user->email }}</p>
                    </div>
                    
                    <hr>

                    <div class="form-group">
                        <label for="oldpassword">Password</label>
                        <p data-editable data-type="text" data-name="password">{{ $user->password }}</p>
                    </div>
                    
                    <div *ngIf="edited" class="form-group">
                        <label for="password">New Password</label>
                        <p data-editable data-type="text" data-name="password">{{ $user->password }}</p>
                    </div>

                    <div *ngIf="new_edited" class="form-group">
                        <label for="password-confirm">Confirm New Password</label>
                        <p data-editable data-type="text" data-name="password_confirmation">{{ $user->password }}</p>
                    </div>
                </form>
            </div>
@endsection