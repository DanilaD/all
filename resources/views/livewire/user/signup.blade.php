<div class="container">
    @if($registerForm)
        <form>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Email :</label>
                        <input type="text" wire:model.blur.live="email" class="form-control" autocomplete="on">
                        @error('email') <span class="text-danger error small">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>First Name :</label>
                        <input type="text" wire:model.blur.live="fname" class="form-control" autocomplete="on">
                        @error('fname') <span class="text-danger error small">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Last Name :</label>
                        <input type="text" wire:model.blur.live="lname" class="form-control" autocomplete="on">
                        @error('lname') <span class="text-danger error small">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Password :</label>
                        <input type="password" wire:model.blur.live="password" class="form-control" autocomplete="off">
                        @error('password') <span class="text-danger error small">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Password :</label>
                        <input type="password" wire:model.blur.live="password_confirmation" class="form-control" autocomplete="off">
                        @error('password_confirmation') <span class="text-danger error small">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <button class="btn text-white btn-success" wire:click.prevent="registerStore"><i class="fa fa-check"></i> Register</button>
                </div>
                <div class="col-md-12">
                    <a class="text-primary" wire:click.prevent="register"><strong>Login</strong></a>
                </div>
            </div>
        </form>
    @else
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    Congratulations! You've successfully registered. You can now log in.
                </div>
            </div>
            <div class="col-md-12">
                <div class="alert alert-info">
                    Sign up another account? <a class="btn btn-primary text-white" wire:click.prevent="register"><strong>Register Here</strong></a>
                </div>
            </div>
        </div>
    @endif
</div>
