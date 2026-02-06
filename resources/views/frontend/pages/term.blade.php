@extends('frontend.layouts.frontend')

{{-- @section('title', 'Home') --}}
@section('meta_title', $seoMeta->meta_title ?? 'Meta IT Services')
@section('meta_keywords', $seoMeta->meta_keywords ?? '')
@section('meta_description', $seoMeta->meta_description ?? '')

@push('frontend-styles')
    <style>
        .privacy-hero {
            background: linear-gradient(135deg, #F38B5C 40%, #404959 100%);
            padding: 50px 0;
        }

        .privacy-content h1 {
            font-size: 50px;
            font-weight: 700;
            line-height: 120%;
            font-family: Inter;
            color: #000000;
            margin-bottom: 15px;
        }

        .privacy-content p {
            font-size: 25px;
            line-height: 160%;
            color: #FFFFFF;
            font-family: Arial;
            max-width: 732px;
            margin: 0 auto 20px;
        }

        .breadcrumb-custom {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            color: #ffffff;
            font-size: 16px;
        }

        .breadcrumb-custom a {
            color: #000000;
            text-decoration: none;
            font-size: 20px;
            font-weight: 400;
            line-height: 160%;
            font-family: Inter;
        }

        .breadcrumb-custom span {
            color: #ffffff;
            text-decoration: none;
            font-size: 20px;
            font-weight: 400;
            line-height: 160%;
            font-family: Inter;
        }

        .breadcrumb-custom a:hover {
            text-decoration: underline;
        }
    </style>
@endpush
@section('frontend-content')

    <section class="privacy-hero">
        <div class="container">
            <div class="privacy-content text-center">
                <h1>{{ $data->hero_title ?? '' }}</h1>

                <p>
                    {{ $data->hero_subtitle ?? '' }}
                </p>

                <div class="breadcrumb-custom">
                    <a href="#">Home</a>
                    <span>|</span>
                    <span>Terms & Condition</span>
                </div>
            </div>
        </div>
    </section>

    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                {!! $data->content !!}
            </div>
        </div>

    </div>

@endsection

@push('frontend-scripts')
@endpush
