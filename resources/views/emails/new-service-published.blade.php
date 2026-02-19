@php
    $serviceUrl = route('service', $service->slug);
@endphp

<p>Hello,</p>
<p>We just published a new service:</p>
<p><strong>{{ $service->title }}</strong></p>
@if (!empty($service->short_description))
    <p>{{ $service->short_description }}</p>
@endif
<p><a href="{{ $serviceUrl }}">View the service</a></p>
