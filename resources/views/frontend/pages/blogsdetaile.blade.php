@extends('frontend.layouts.frontend')

{{-- @section('title', 'Home') --}}
@section('meta_title', $data->meta_title ?? 'Meta IT Services')
@section('meta_keywords', $data->meta_keywords ?? '')
@section('meta_description', $data->meta_description ?? '')

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
        <div class="container section-container"
            style="background-image: url('{{ asset('frontend/images/blog/blogdetail.png') }}');">

            <!-- CARD -->
            <div class="info-card">
                <button class="category-btn">Mobile App Development</button>

                <h2 class="card-heading">
                    Signs you Need to Switch to a Custom Mobile APP Development Company
                </h2>

                <p class="card-date">Nov 24, 2025</p>
            </div>

        </div>

        <div class="container content-container">

            <h2 class="main-heading">
                Heading Heading Heading
            </h2>

            <p class="main-desc">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo libero tempore provident vero est eligendi
                nulla quaerat ipsa facilis ab minima quos eos accusamus molestias quibusdam assumenda, natus soluta
                accusantium?
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo libero tempore provident vero est eligendi
                nulla quaerat ipsa facilis ab minima quos eos accusamus molestias quibusdam assumenda, natus soluta
                accusantium?
            </p>

            <h2 class="sub-heading">
                Heading
            </h2>
            <p class="main-desc">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo libero tempore provident vero est eligendi
                nulla quaerat ipsa facilis ab minima quos eos accusamus molestias quibusdam assumenda, natus soluta
                accusantium?
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo libero tempore provident vero est eligendi
                nulla quaerat ipsa facilis ab minima quos eos accusamus molestias quibusdam assumenda, natus soluta
                accusantium?
            </p>
            <ul class="content-list">
                <li>First point goes here</li>
                <li>Second point goes here</li>
                <li>Third point goes here</li>
                <li>Fourth point goes here</li>
                <li>Fifth point goes here</li>
                <li>Sixth point goes here</li>
                <li>Seventh point goes here</li>
                <li>Eighth point goes here</li>
                <li>Ninth point goes here</li>
                <li>Tenth point goes here</li>
            </ul>


            <h2 class="main-heading">
                Heading Heading Heading
            </h2>

            <p class="main-desc">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo libero tempore provident vero est eligendi
                nulla quaerat ipsa facilis ab minima quos eos accusamus molestias quibusdam assumenda, natus soluta
                accusantium?
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo libero tempore provident vero est eligendi
                nulla quaerat ipsa facilis ab minima quos eos accusamus molestias quibusdam assumenda, natus soluta
                accusantium?
            </p>
        </div>

    </section>








@endsection


@push('frontend-scripts')
@endpush
