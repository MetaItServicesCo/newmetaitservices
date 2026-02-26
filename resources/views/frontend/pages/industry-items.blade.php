@foreach ($industries as $industry)
    <div class="container-fluid industry-box">
        <div class="row align-items-center">

            <!-- Left Column -->
            <div class="col-lg-6 col-md-6 d-flex justify-content-center">
                <div class="industry-card">
                    <img src="{{ asset('storage/' . $industry->image) }}"
                        alt="{{ $industry->image_alt ?? $industry->name }}">
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-lg-6 col-md-6">
                <h4 class="indus-heading">{{ $industry->name ?? '' }}</h4>

                <p class="industry-long-desc">
                    {{ $industry->description ?? '' }}
                </p>

                <a href="{{ route('industry.detail', $industry->slug) }}" class="industry-btn">See More Detail
                </a>
            </div>

        </div>
    </div>
@endforeach
