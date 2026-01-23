<section class="kpi-section">
    <div class="container text-center">

        <!-- Main Heading -->
        <h2 class="kpi-title">
            Improve the KPIs That Matter Most to Your Business
        </h2>

        <!-- Buttons -->
        <div class="kpi-buttons my-4">
            @foreach($kpis as $index => $kpi)
            <button class="kpi-btn {{ $index === 0 ? 'active' : '' }}" data-kpi-id="{{ $kpi->id }}" data-kpi-content='@json($kpi->content)'>{{ $kpi->tag }}</button>
            @endforeach
        </div>

    </div>

    <!-- KPI Container -->
    <div class="kpi container position-relative">

        <div class="row align-items-center">

            <!-- Left Column -->
            <div class="col-lg-6 text-white">
                <h3 class="kpi-left-title" id="kpi-title">{{ $activeKpi->content['title'] }}</h3>
                <p class="kpi-left-desc" id="kpi-subtitle">
                    {{ $activeKpi->content['subtitle'] }}
                </p>
                <a href="#" class="kpi-left-btn">Explore SEO Services <img
                        src="{{ asset('frontend/images/kips-icon.png') }}" alt=""> </a>
            </div>

            <!-- Right Column -->
            <div class="col-lg-6  text-center">
                <img src="{{ asset('frontend/images/kpi-img.png') }}" alt="KPI Image" class="kpi-right-img">

                <!-- Cards -->
                <div id="kpi-cards-container">
                    @foreach($activeKpi->content['points'] as $index => $point)
                    <div class="kpi-card card{{ $index + 1 }}">
                        <h4>{{ $point }}</h4>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>

    <script>
        document.querySelectorAll('.kpi-btn').forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                document.querySelectorAll('.kpi-btn').forEach(btn => {
                    btn.classList.remove('active');
                });
                
                // Add active class to clicked button
                this.classList.add('active');
                
                // Get content data
                const contentData = JSON.parse(this.getAttribute('data-kpi-content'));
                
                // Update title
                document.getElementById('kpi-title').textContent = contentData.title;
                
                // Update subtitle
                document.getElementById('kpi-subtitle').textContent = contentData.subtitle;
                
                // Update cards container
                const cardsContainer = document.getElementById('kpi-cards-container');
                cardsContainer.innerHTML = '';
                
                contentData.points.forEach((point, index) => {
                    const card = document.createElement('div');
                    card.className = `kpi-card card${index + 1}`;
                    card.innerHTML = `<h4>${point}</h4>`;
                    cardsContainer.appendChild(card);
                });
            });
        });
    </script>
</section>
