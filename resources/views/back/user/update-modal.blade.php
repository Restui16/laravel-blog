@foreach ($users as $user)
<div class="modal fade" id="modalUpdate{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Update User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ url('users/'. $user->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="mb-2">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name)}}">

                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email)}}">

                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                @if (auth()->user()->role == 1)
                    <div class="mb-2">
                        <label for="role">Role</label>
                            <select name="role" id="role" class="form-control">
                                <option value="" hidden>-- choose --</option>
                                <option value="1" @if($user->role == 1) selected @endif>Admin</option>
                                <option value="2" @if($user->role == 2) selected @endif>Penulis</option>
                            </select>

                        @error('role')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                @endif

                <div class="mb-2">
                    <label for="password">password</label>
                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password')}}">

                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" value="{{ old('password')}}">

                    @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                </div>
            </form>
        </div>

      </div>
    </div>
</div>
@endforeach
