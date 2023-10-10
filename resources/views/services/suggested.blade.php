@extends('layouts.master')

@section('title', 'Services|Suggested')

@push('styles')
    <style>
        * {
            box-shadow: none !important;
        }

        .service-cards-container {
            display: flex;
            flex-wrap: wrap;
        }

        .service-card {
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: 450px;
            gap: 15px;
            border: 10px solid rgb(180, 180, 180);
            padding: 45px;
            margin: 0 auto 95px;
        }

        .disabled-service-card {
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: 450px;
            gap: 15px;
            border: 10px solid rgb(150, 150, 150);
            padding: 45px;
            margin: 0 auto 95px;
            opacity: 0.4;
            background-color: rgb(180, 180, 180);
        }

        .image-title {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .image-computer {
            width: 50px;
            margin-bottom: 10px;
        }

        .checkbox {
            display: flex;
            justify-content: flex-end;
        }

        @media (min-width: 768px) {
            .image-title {
                flex-direction: row;
                align-items: flex-start;
                text-align: left;
            }

            .image-computer {
                width: 50px;
                margin-right: 10px;
                margin-bottom: 0;
            }
        }
    </style>
@endpush

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="">
                <div class="service-cards-container">
                    @foreach($services as $service)
                        <div class="service-card">
                            <div class="checkbox">
                                <input type="checkbox" class="service-checkbox" name="serviceCheckbox" id="serviceCheckbox_{{ $service->id }}">
                            </div>

                            <div class="image-title">
                                <img class="image-computer" src="{{ asset('images/computer.png') }}" alt="img">

                                <h2>{{ $service->name }}</h2>
                            </div>

                            <div class="text-content">
                                <p>
                                    {{ $service->content }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let result

        $(document).ready(() => {
            axios.get('/api/disabled-services').then((data) => {
                const disabledServices = data.data.disabledServices

                const res = { }

                disabledServices.forEach(item => {
                    const serviceId = item.service_id
                    const disabledServiceId = item.disabled_service_id

                    if (!res[serviceId]) {
                        res[serviceId] = {
                            serviceId: serviceId,
                            disabledServices: [],
                        }
                    }

                    res[serviceId].disabledServices.push(disabledServiceId)
                })

                result = Object.values(res)
            }).catch((error) => {
                console.log(error)
            })
        })

        document.addEventListener('DOMContentLoaded', () => {
            document.addEventListener('change', (event) => {
                if (event.target.classList.contains('service-checkbox')) {
                    $('.service-checkbox').prop('disabled', false).each(function () {
                        if (this.checked) {
                            const serviceId = this.id.split('_')[1]

                            const disabledIds = result.find((item) => item.serviceId === +serviceId)?.disabledServices ?? []

                            disabledIds.forEach((id) => {
                                $(`.service-checkbox#serviceCheckbox_${id}`).prop('disabled', true)
                            })
                        } else {

                        }
                    })
                }
            })
        })
    </script>
@endpush
