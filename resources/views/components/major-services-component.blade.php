<section class="meta-intro-section">
    <div class="container">
        <!-- Heading -->
        <h2 class="meta-heading">
            Welcome to Meta IT web company, your trusted partner for Building
            a powerful online presence.
        </h2>

        <!-- Description -->
        <p class="meta-desc">
            We help businesses grow by creating visually stunning, user-friendly, and
            high-performance websites tailored to their unique goals. Our expert team
            focuses on modern design trends, responsive layouts, and scalable solutions
            that ensure your brand stands out in the digital world.
        </p>

        <!-- Card -->
        @if (isset($majorServices) && $majorServices->isNotEmpty())
            @foreach ($majorServices as $service)
                <div class="meta-card">
                    <div class="row align-items-center">
                        <!-- Left Image -->
                        <div class="col-lg-4">
                            <img src="{{ $service->thumbnail ? asset('storage/' . $service->thumbnail) : asset('frontend/images/services/meta-img.png') }}"
                                alt="{{ $service->thumbnail_alt ?? 'Meta IT Service Image' }}" class="meta-card-img">
                        </div>

                        <!-- Right Content -->
                        <div class="col-lg-8">
                            <h3 class="meta-card-title">{{ $service->title ?? '' }}</h3>
                            <p class="meta-card-desc">
                                {{ \Illuminate\Support\Str::limit($service->short_description ?? '', 200) }}
                            </p>
                            <a href="{{ route('service', $service->slug) }}" class="meta-btn">Design my Site</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            {{-- Optional Empty State --}}
            <p class="text-muted text-center">
                No services available at the moment.
            </p>
        @endif

    </div>
</section>
