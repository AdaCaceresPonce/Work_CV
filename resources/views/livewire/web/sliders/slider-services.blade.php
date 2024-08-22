<div class="flex justify-center align-middle w-full mb-5 mx-auto" >

<div class="card__container swiper pb-8 px-0 w-full min-[768px]:px-10" x-init="let swiperCards = new Swiper('.card__content', {
    // Optional parameters
    loop: true,
    spaceBetween: 25,
    grabCursor: true,
    // If we need pagination
    pagination: {
        el: '.service-pagination',
        clickable: true,
    },

    autoplay: {
        delay: 6500,
        disableOnInteraction: false
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    breakpoints: {
        600: {
            slidesPerView: 2,
        },
        968: {
            slidesPerView: 3,
        },
    },
});">
    <div class="card__content px-3 pb-8 rounded-xl">
        <div class="swiper-wrapper ">
            @foreach ($services as $service)
                <article class="card__article swiper-slide border-[3px] rounded-xl">

                    <div class="card__image w-full flex justify-center items-center rounded-lg overflow-hidden">
                        
                        <img src="{{ Storage::url($service->card_img_path) }}" alt="image"
                            class="card__img aspect-[4/3] object-cover object-center w-full brightness-75">
                    </div>

                    <div class="card__data space-y-6 mt-3">
                        <h3 class="service__name text-lg font-medium w-full">
                            {{ $service->name ?? 'Nombre del servicio' }}
                        </h3>
                        <div class="flex justify-start">
                            <a href="{{ route('our_services.show_service', $service) }}"
                                class="items-center font-medium text-secondary-contrast-1 bg-secondary border-2 border-secondary-border py-2 px-8 rounded-lg">
                                Ver más
                            </a>
                        </div>

                    </div>
                </article>
            @endforeach
        </div>
    </div>
    {{-- Botones de navegacion --}}
    <div class="swiper-button-prev">
        <i class="fa-solid fa-angle-left"></i>
    </div>
    <div class="swiper-button-next">
        <i class="fa-solid fa-angle-right"></i>
    </div>

    {{-- Paginacion --}}
    <div class="swiper-pagination service-pagination"></div>
</div>
    

    <style>
        .card__content {
            overflow: hidden;
        }

        .card__article {
            width: 250px;
            overflow: hidden;
            padding: 0.5rem 0.5rem;
        }


        .card__data {
            /* padding: 1.2rem 1.2rem; */
        }

        /* Swiper class */
        .swiper-button-prev:after,
        .swiper-button-next:after {
            content: "";
        }

        .swiper-button-prev,
        .swiper-button-next {
            width: initial;
            height: initial;
            font-size: 3rem;
            color: #0ad3ff;
            display: none;
        }

        .swiper-button-prev {
            left: 0;
        }

        .swiper-button-next {
            right: 0;
        }

        .swiper-pagination-bullet {
            background-color: #0ad3ff;
        }

        @media screen and (max-width: 320px) {
            .card__data {
                padding: 1rem;
            }
        }

        @media screen and (min-width: 768px) {
            .card__content {
                margin__inline: 3rem;
            }

            .swiper-button-prev,
            .swiper-button-next {
                display: block;
            }
        }

        @media screen and(min-width: 1120px) {
            .card__container {}

            .swiper-button-next {
                right: -1rem;
            }

            .swiper-button-prev {
                left: -1rem;
            }
        }
    </style>
</div>
