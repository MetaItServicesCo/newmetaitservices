@foreach ($industries as $industry)
    <div class="container-fluid industry-box">
        <div class="row align-items-center">

            <!-- Left Column -->
            <div class="col-lg-6 col-md-6 d-flex justify-content-center">
                <div class="industry-card">
                    <img src="{{ asset('storage/' . $industry->image) }}" alt="{{ $industry->image_alt ?? $industry->name }}">
                    <h4>{{ $industry->name ?? ''}}</h4>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-lg-6 col-md-6">
                <p class="industry-long-desc">
                    {{ $industry->description ?? '' }}
                </p>

                <a href="{{ route('industry.detail', $industry->slug) }}" class="industry-btn">View Full Detail</a>
            </div>

        </div>
    </div>
@endforeach
