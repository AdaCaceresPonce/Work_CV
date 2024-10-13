<div class="flex justify-center align-middle w-full mb-5 mx-auto" >

    <div class="card__container swiper pb-8 px-0 w-full min-[768px]:px-10" x-init="let swiperCards = new Swiper('.card__content', {
        // Optional parameters
        loop: true,
        spaceBetween: 25,
        grabCursor: true,
        // If we need pagination
        pagination: {
            el: '.training-pagination',
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
        
    });
    
    let observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                swiperCards.autoplay.start();
            } else {
                swiperCards.autoplay.stop();
            }
        });
    });

    observer.observe(document.querySelector('.card__container'));
    ">
        <div class="card__content px-3 pb-8 rounded-xl">
            <div class="swiper-wrapper ">
                @foreach ($trainings as $training)
                    <article class="card__article swiper-slide rounded-xl">
    
                        <div class="card__image w-full border-[1px] flex justify-center items-center rounded-lg overflow-hidden">
                            
                            <img src="{{ Storage::url($training->card_img_path) }}" alt="image"
                                class="card__img aspect-[4/3] object-cover object-center w-full" loading="lazy">
                        </div>
    
                        <div class="card__data space-y-8 mt-4">
                            <h3 class="training__name text-base font-bold w-full">
                                {{ $training->name ?? 'Nombre del servicio' }}
                            </h3>
                            <div class="flex justify-start">
                                <a href="{{ route('our_trainings.show_training', $training) }}"
                                    class="items-center text-base font-bold text-secondary-contrast-1 bg-secondary border-2 border-secondary-border py-1.5 px-6 rounded-lg">
                                    Ver más
                                </a>
                            </div>
    
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
        {{-- Botones de navegacion --}}
        <div class="swiper-button-prev text-primary">
            <i class="fa-solid fa-angle-left"></i>
        </div>
        <div class="swiper-button-next text-primary">
            <i class="fa-solid fa-angle-right"></i>
        </div>
    
        {{-- Paginacion --}}
        <div class="swiper-pagination training-pagination"></div>
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
                display: none;
            }
    
            .swiper-button-prev {
                left: 0;
            }
    
            .swiper-button-next {
                right: 0;
            }
    
            /* .swiper-pagination-bullet {

                background-color: #689F38;
            } */
    
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
    
            /* @media screen and (min-width: 1120px) {
                .card__container {}
    
                .swiper-button-next {
                    right: -1rem;
                }
    
                .swiper-button-prev {
                    left: -1rem;
                }
            } */
        </style>
    </div>
    