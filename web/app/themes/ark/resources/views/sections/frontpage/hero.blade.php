<section class="w-full lg:h-[600] xl:h-[800px]">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach ($slider as $slide)
                <div class="swiper-slide relative">
                    @if (isset($slide['img']))
                        <img src='{{ $slide['img'] }}' alt='{{ $slide['titel'] }}' />
                        <header class="slider-text absolute left-[10%] flex flex-col text-left md:left-[30%]">
                            <h2 class="font-title text-[24px] font-bold text-white md:text-[53px]">
                                {{ $slide['titel'] }}</h2>
                            <h3 class="font-body pl-10 text-[18px] font-medium text-white md:text-[23px]">
                                {{ $slide['onderschrift'] }}
                            </h3>
                        </header>
                    @endif
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        direction: "horizontal",
        loop: true, // Enable looping
        autoplay: {
            delay: 8000,
            disableOnInteraction: false, // Continue autoplay after interactions
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
</script>
