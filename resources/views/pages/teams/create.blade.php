<x-default-layout>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header p-5 rounded-top">
                    <div class="d-flex w-100 justify-content-between align-items-center">
                        @if (isset($team->id) && !empty($team->id))
                            <h3 class="fw-bolder mb-0">{{ __('Edit Team') }}</h3>
                        @else
                            <h3 class="fw-bolder mb-0">{{ __('Create Team') }}</h3>
                        @endif
                        <a href="{{ route('admin.teams.list') }}" class="btn btn-light btn-md">
                            <i class="bi bi-arrow-left me-2"></i>{{ __('Back to List') }}
                        </a>
                    </div>
                </div>

                @php
                    $url = isset($team->id) ? route('admin.teams.update', $team->id) : route('admin.teams.store');
                @endphp

                <div class="card-body p-5">
                    <form action="{{ $url }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if (isset($team->id))
                            @method('PUT')
                        @endif
                        <div class="row">

                            {{-- Name --}}
                            <div class="col-lg-6 mb-4">
                                <label for="name"
                                    class="form-label fw-semibold required">{{ __('Name') }}</label>
                                <input type="text" id="name" name="name"
                                    class="form-control form-control-lg @error('name') is-invalid @enderror"
                                    value="{{ old('name', $team->name ?? '') }}" required>
                                @error('name')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- Designation --}}
                            <div class="col-lg-6 mb-4">
                                <label for="designation"
                                    class="form-label fw-semibold required">{{ __('Designation') }}</label>
                                <input type="text" id="designation" name="designation"
                                    class="form-control form-control-lg @error('designation') is-invalid @enderror"
                                    value="{{ old('designation', $team->designation ?? '') }}" required>
                                @error('designation')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Sort Order --}}
                            <div class="col-lg-3 mb-4">
                                <label for="sort_order"
                                    class="form-label fw-semibold required">{{ __('Sort Order') }}</label>
                                <input type="number" id="sort_order" name="sort_order" min="0"
                                    class="form-control form-control-lg @error('sort_order') is-invalid @enderror"
                                    value="{{ old('sort_order', $team->sort_order ?? 0) }}" required>
                                @error('sort_order')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- Active --}}
                            <div class="col-lg-3 mb-4">
                                <label for="is_active"
                                    class="form-label fw-semibold required">{{ __('Active') }}</label>
                                <select name="is_active" id="is_active"
                                    class="form-select form-select-lg @error('is_active') is-invalid @enderror"
                                    required>
                                    <option value="1"
                                        {{ old('is_active', $team->is_active ?? 1) == 1 ? 'selected' : '' }}>
                                        {{ __('Yes') }}</option>
                                    <option value="0"
                                        {{ old('is_active', $team->is_active ?? 1) == 0 ? 'selected' : '' }}>
                                        {{ __('No') }}</option>
                                </select>
                                @error('is_active')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-3 mb-4">
                                <label for="email" class="form-label fw-semibold">{{ __('Email') }}</label>
                                <input type="email" id="email" name="email"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                                    value="{{ old('email', $team->email ?? '') }}">
                                @error('email')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-3 mb-4">
                                <label for="phone" class="form-label fw-semibold">{{ __('Phone') }}</label>
                                <input type="text" id="phone" name="phone"
                                    class="form-control form-control-lg @error('phone') is-invalid @enderror"
                                    value="{{ old('phone', $team->phone ?? '') }}">
                                @error('phone')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            
                            {{-- Image --}}
                            <div class="col-lg-6 mb-4">
                                <label for="image" class="form-label fw-semibold">{{ __('Profile Image') }}</label>
                                <input type="file" id="image" name="image"
                                    class="form-control form-control-lg @error('image') is-invalid @enderror"
                                    accept="image/*">
                                @if (isset($team?->image) && $team->image)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/teams/' . $team->image) }}"
                                            alt="{{ $team->image_alt ?? 'team' }}" width="100">
                                    </div>
                                @endif
                                @error('image')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- Image Alt --}}
                            <div class="col-lg-6 mb-4">
                                <label for="image_alt" class="form-label fw-semibold">{{ __('Image Alt') }}</label>
                                <input type="text" id="image_alt" name="image_alt"
                                    class="form-control form-control-lg @error('image_alt') is-invalid @enderror"
                                    value="{{ old('image_alt', $team->image_alt ?? '') }}">
                                @error('image_alt')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- Socials --}}

                            <div class="col-lg-6 mb-4">
                                <label for="facebook_url"
                                    class="form-label fw-semibold">{{ __('Facebook URL') }}</label>
                                <input type="url" id="facebook_url" name="facebook_url"
                                    class="form-control form-control-lg @error('facebook_url') is-invalid @enderror"
                                    value="{{ old('facebook_url', $team->facebook_url ?? '') }}">
                                @error('facebook_url')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-4">
                                <label for="linkedin_url"
                                    class="form-label fw-semibold">{{ __('LinkedIn URL') }}</label>
                                <input type="url" id="linkedin_url" name="linkedin_url"
                                    class="form-control form-control-lg @error('linkedin_url') is-invalid @enderror"
                                    value="{{ old('linkedin_url', $team->linkedin_url ?? '') }}">
                                @error('linkedin_url')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col-lg-6 mb-4">
                                <label for="instagram_url"
                                    class="form-label fw-semibold">{{ __('Instagram URL') }}</label>
                                <input type="url" id="instagram_url" name="instagram_url"
                                    class="form-control form-control-lg @error('instagram_url') is-invalid @enderror"
                                    value="{{ old('instagram_url', $team->instagram_url ?? '') }}">
                                @error('instagram_url')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col-lg-6 mb-4">
                                <label for="twitter_url"
                                    class="form-label fw-semibold">{{ __('Twitter/X URL') }}</label>
                                <input type="url" id="twitter_url" name="twitter_url"
                                    class="form-control form-control-lg @error('twitter_url') is-invalid @enderror"
                                    value="{{ old('twitter_url', $team->twitter_url ?? '') }}">
                                @error('twitter_url')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- Bio --}}
                            <div class="col-lg-12 mb-4">
                                <label for="bio"
                                    class="form-label fw-semibold">{{ __('Bio / Short Intro') }}</label>
                                <textarea id="bio" name="bio" rows="4"
                                    class="form-control form-control-lg @error('bio') is-invalid @enderror"
                                    placeholder="Short description about this team member...">{{ old('bio', $team->bio ?? '') }}</textarea>
                                @error('bio')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                @include('partials/general/_button-indicator', [
                                    'label' => isset($team->id) ? 'Update' : 'Create',
                                ])
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                // image validation
                const imageInput = document.getElementById('image');
                if (imageInput) {
                    if (!document.getElementById('image_error')) {
                        let thumbError = document.createElement('div');
                        thumbError.id = 'image_error';
                        thumbError.classList.add('text-danger', 'mt-1');
                        imageInput.parentNode.appendChild(thumbError);
                    }

                    imageInput.addEventListener('change', function() {
                        validateFile(imageInput, 'image_error');
                    });
                }

            });
        </script>
    @endpush

</x-default-layout>
