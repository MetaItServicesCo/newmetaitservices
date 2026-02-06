@extends('frontend.layouts.frontend')

{{-- @section('title', 'Home') --}}
@section('meta_title', $blog->meta_title ?? 'Meta IT Services')
@section('meta_keywords', $blog->meta_keywords ?? '')
@section('meta_description', $blog->meta_description ?? '')

@push('frontend-styles')
    <style>
        .custom-section {
            padding: 40px 0;
            font-family: Inter;
        }

        .section-container {
            position: relative;
            min-height: 600px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border-radius: 12px;
        }

        /* CARD */
        .info-card {
            position: absolute;
            left: 50%;
            bottom: 50px;
            transform: translateX(-50%);
            background: #FFFFFF;
            width: 100%;
            max-width: 1215px;
            height: 256px;
            border-radius: 10px;
            padding: 30px 40px;
        }

        /* BUTTON */
        .category-btn {
            background: #F38B5C;
            width: 286px;
            height: 45px;
            border-radius: 21px;
            border: none;
            font-size: 18px;
            font-weight: 700;
            line-height: 124%;
            color: #ffffff;
            cursor: pointer;
            transition: all 0.3s ease;

        }

        .category-btn:hover {
            background-color: #e77b4d;
            /* slightly darker shade */
            transform: translateY(-2px);
            box-shadow: 0px -4px 0 #404959;
        }


        /* HEADING */
        .card-heading {
            margin-top: 20px;
            font-size: 50px;
            font-weight: 700;
            line-height: 60px;
            color: #000000;
            max-width: 1105px;
        }

        /* DATE */
        .card-date {
            margin-top: 12px;
            font-size: 16px;
            color: #000000;
        }

        .content-container {
            padding: 40px 0;
        }

        /* MAIN HEADING */
        .main-heading {
            font-size: 55px;
            font-weight: 700;
            font-family: 'Saira', sans-serif;
            line-height: 160%;
            letter-spacing: 0;
            color: #000000;
        }

        /* DESCRIPTION */
        .main-desc {
            /* margin-top: 10px; */
            font-size: 25px;
            font-weight: 400;
            line-height: 160%;
            letter-spacing: 0;
            color: #000000;
            max-width: 1575px;
        }

        /* SUB HEADING */
        .sub-heading {
            margin-top: 40px;
            font-size: 55px;
            font-weight: 700;
            font-family: 'Saira', sans-serif;
            line-height: 160%;
        }

        /* LIST */
        .content-list {
            margin-top: 20px;
            /* padding-left: 22px; */
        }

        .content-list li {
            font-size: 25px;
            font-weight: 400;
            line-height: 160%;
            letter-spacing: 0;
            color: #000000;
            margin-bottom: 20px;
        }

        @media(max-width:768px) {
            .info-card {

                width: 90%;
                max-width: 1215px;
                height: auto;
                padding: 30px 30px;
            }

            .card-heading {
                font-size: 25px;
                line-height: 35px;

            }

            .main-heading {
                font-size: 30px;
                text-align: center;
            }

            .main-desc {
                /* margin-top: 10px; */
                font-size: 16px;
                text-align: center;
            }

            .sub-heading {
                font-size: 30px;
                text-align: center;

            }

            .content-list li {
                font-size: 16px;

                margin-bottom: 10px;
            }
        }
    </style>
@endpush



@section('frontend-content')

    <section class="custom-section">
        <div class="container section-container" role="img" aria-label="{{ $blog->image_alt_text ?? $blog->title }}"
            style="background-image: url('{{ asset('storage/blog/images/' . $blog->image) }}');">

            <!-- CARD -->
            <div class="info-card">
                <button class="category-btn">{{ $blog->category?->name ?? '' }}</button>

                <h2 class="card-heading">
                    {{ $blog->title ?? '' }}
                </h2>

                <p class="card-date">{{ $blog->created_at->format('M d, Y') }}</p>
            </div>

        </div>

        <div class="container content-container">
            {!! $blog->description ?? '' !!}
        </div>

    </section>
@endsection


@push('frontend-scripts')
@endpush
