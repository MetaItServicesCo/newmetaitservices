<section class="meta-intro-section">
    <div class="container">
        <!-- Heading -->
        <h2 class="meta-heading">
            Outthinking The Digital Jungle: Sharper Insights For Real Growth
        </h2>

        <!-- Description -->
        <p class="meta-desc">
            Marketing instincts are knowing that hesitation gets you hunted. Ascertaining real digital growth comes when
            you understand how to strike precisely at the right moment. Meta IT works with the same confident intention.
            Knowing thyself equals knowing your audience, i.e, what nourishes them and what chases them away. Our sharp
            team of tacticians will help you build a base from the ground up and maneuver through the vines of brand
            identity. The stiffness in your confidence from chasing fleeting trends will fade away as Meta IT will help
            you harness b2b digital transformation strategies to showcase what your brand is really about.
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
