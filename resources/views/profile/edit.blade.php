@extends('layouts.layout')

@section('title','Edit Profile')

@section('content')
    <!-- Page Header -->
    <div class="hk-pg-header pt-7 pb-4">
        <h1 class="pg-title">Edit Profile</h1>
        <p>The Avatar component is used to represent a user, and displays the profile picture, initials or fallback icon.</p>
    </div>

    @if (session('status') === 'profile-updated')
        <div class="alert alert-success">
            Profile updated successfully.
        </div>
    @endif

    <!-- Page Body -->
    <div class="hk-pg-body">
        <div class="row edit-profile-wrap">
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="nav-profile mt-4">
                    <div class="nav-header">
                        <span>Account</span>
                    </div>
                    <ul class="nav nav-light nav-vertical nav-tabs">
                        <li class="nav-item">
                            <a data-bs-toggle="tab" href="#tab_block_1" class="nav-link active">
                                <span class="nav-link-text">Public Profile</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="tab" href="#tab_block_2" class="nav-link">
                                <span class="nav-link-text">Account Settings</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="tab" href="#tab_block_3" class="nav-link">
                                <span class="nav-link-text">Privacy Settings</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="tab" href="#tab_block_4" class="nav-link">
                                <span class="nav-link-text">Login & Security</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span class="nav-link-text">Notifications</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-scroll="" href="#" class="nav-link">
                                <span class="nav-link-text">Connections</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-scroll="" href="#" class="nav-link">
                                <span class="nav-link-text">Billing Info</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            @php
                $profilePhotoUrl = $user->profile_photo_path
                    ? asset('storage/' . $user->profile_photo_path)
                    : asset('dist/img/avatar3.jpg');
            @endphp

            <div class="col-lg-10 col-sm-9 col-8">
                <div class="tab-content">
                    {{-- Public Profile --}}
                    <div class="tab-pane fade show active" id="tab_block_1">
                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <div class="row gx-3">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="media align-items-center">
                                            <div class="media-head me-5">
                                                <div class="avatar avatar-rounded avatar-xxl">
                                                    <img id="profile-photo-preview"
                                                         src="{{ $profilePhotoUrl }}"
                                                         alt="{{ $user->full_name }}"
                                                         class="avatar-img profile-avatar-lg">
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <label class="btn btn-soft-primary mb-1">
                                                    Upload Photo
                                                    <input type="file" name="profile_photo" id="profile-photo-input" class="d-none" accept="image/*">
                                                </label>
                                                <div class="form-text text-muted">
                                                    For better preview recommended size is 450px x 450px. Max size 5mb.
                                                </div>
                                                @error('profile_photo')
                                                    <div class="text-danger small">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="title title-xs title-wth-divider text-primary text-uppercase my-4">
                                <span>Personal Info</span>
                            </div>

                            <div class="row gx-3">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">First Name</label>
                                        <input class="form-control" type="text" name="first_name"
                                               value="{{ old('first_name', $user->first_name) }}"/>
                                        @error('first_name')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Last Name</label>
                                        <input class="form-control" type="text" name="last_name"
                                               value="{{ old('last_name', $user->last_name) }}"/>
                                        @error('last_name')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row gx-3">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Location</label>
                                        <input class="form-control" type="text" name="location"
                                               value="{{ old('location', $user->location) }}"/>
                                        @error('location')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row gx-3">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label">Bio</label>
                                        </div>
                                        <textarea class="form-control" rows="8" name="bio"
                                                  placeholder="Write an internal note">{{ old('bio', $user->bio) }}</textarea>
                                        <small class="form-text text-muted">
                                            Brief bio about yourself. This will be displayed on your profile page.
                                        </small>
                                        @error('bio')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="title title-xs title-wth-divider text-primary text-uppercase my-4">
                                <span>Additional Info</span>
                            </div>

                            <div class="row gx-3">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Personal Website</label>
                                        <input class="form-control" type="text" name="website"
                                               value="{{ old('website', $user->website) }}"/>
                                        @error('website')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Phone</label>
                                        <input class="form-control" type="text" name="phone"
                                               value="{{ old('phone', $user->phone) }}"/>
                                        @error('phone')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="phone_private"
                                               name="phone_private" {{ old('phone_private', $user->phone_private) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="phone_private">
                                            Keep my number private
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-5">Save Changes</button>
                        </form>
                    </div>

                    {{-- Account Settings (abhi backend se bind nahi kiya, UI same rakha) --}}
                    <div class="tab-pane fade" id="tab_block_2">
                        <div class="title-lg fs-4"><span>Account Settings</span></div>
                        <p class="mb-4">The Avatar component is used to represent a user, and displays the profile picture, initials or fallback icon.</p>
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('patch')

                            <div class="row gx-3">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Username</label>
                                        <input class="form-control" type="text" name="name"
                                               value="{{ old('name', $user->name) }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row gx-3">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input class="form-control" type="email" name="email"
                                               value="{{ old('email', $user->email) }}"/>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-5">Save Changes</button>
                        </form>
                    </div>

                    {{-- Privacy Settings - sirf UI, backend aap baad me chahe to add kar lena --}}
                    <div class="tab-pane fade" id="tab_block_3">
                        <div class="title-lg fs-4 mb-4"><span>Privacy Settings</span></div>
                        <form>
                            <div class="row gx-3">
                                <div class="col-sm-12">
                                    <div class="form-check form-check-lg">
                                        <input type="checkbox" class="form-check-input" id="customChecks1">
                                        <label class="form-check-label mt-0" for="customChecks1">let others find me by email address</label>
                                        <small class="form-text text-muted d-block">People who have your email address will be able to connect you by Jampack</small>
                                    </div>
                                    <div class="separator"></div>
                                    <div class="form-check form-check-lg">
                                        <input type="checkbox" class="form-check-input" id="customChecks2">
                                        <label class="form-check-label mt-0" for="customChecks2">Keep my phone number private</label>
                                        <small class="form-text text-muted d-block">No one can find you by your phone number. Your phone number will not be shared with your contact anymore.</small>
                                    </div>
                                    <div class="separator"></div>
                                    <div class="form-check form-check-lg">
                                        <input type="checkbox" class="form-check-input" id="customChecks3">
                                        <label class="form-check-label mt-0" for="customChecks3">All Keep my location sharing on</label>
                                        <small class="form-text text-muted d-block">Jmapack webapp shares your location wherever you go</small>
                                    </div>
                                    <div class="separator"></div>
                                    <div class="form-check form-check-lg">
                                        <input type="checkbox" class="form-check-input" id="customChecks4">
                                        <label class="form-check-label mt-0" for="customChecks4">Share data through select partnerships</label>
                                        <small class="form-text text-muted d-block">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</small>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary mt-5">Save Changes</button>
                        </form>
                    </div>

                    {{-- Login & Security - bhi abhi UI only --}}
                    <div class="tab-pane fade" id="tab_block_4">
                        <div class="title-lg fs-4"><span>Login & Security</span></div>
                        <p class="mb-4">The Avatar component is used to represent a user, and displays the profile picture, initials or fallback icon.</p>
                        <form>
                            <div class="title title-xs title-wth-divider text-primary text-uppercase my-4">
                                <span>Password Settings</span>
                            </div>
                            <div class="row gx-3">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Password</label>
                                        <input class="form-control" type="password" value="********"/>
                                        <button type="button" class="btn btn-primary mt-3">Change password</button>
                                    </div>
                                </div>
                            </div>

                            <div class="title title-xs title-wth-divider text-primary text-uppercase my-4"><span>Additional Security</span></div>
                            <div class="row gx-3">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label ">2-Step Verification (2FA)</label>
                                        <small class="form-text text-muted d-block">
                                            2-step verification drastically reduces the chances of having the personal information in your account stolen.
                                        </small>
                                        <button type="button" class="btn btn-primary mt-3">Add Authentication</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /Page Body -->
@endsection

@push('scripts')
<script>
    document.getElementById('profile-photo-input')?.addEventListener('change', function (e) {
        const [file] = e.target.files;
        if (file) {
            const preview = document.getElementById('profile-photo-preview');
            preview.src = URL.createObjectURL(file);
        }
    });
</script>
@endpush
