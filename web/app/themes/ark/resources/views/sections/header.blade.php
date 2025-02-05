@php
    $menu = get_field('menu', 'option');
    $structured_menu = [];

    foreach ($menu as $key => $menu_item) {
        $structured_menu[$key]['main_url'] = $menu_item['menu_item'][0];
        $structured_menu[$key]['main_title'] = get_the_title(url_to_postid($menu_item['menu_item'][0]));

        foreach ($menu_item['menu_item'] as $item_key => $item_content) {
            if ($item_key > 0) {
                $structured_menu[$key]['sub_items'][] = [
                    'title' => get_the_title(url_to_postid($item_content)),
                    'url' => $item_content,
                ];
            }
        }
    }
    $socials = get_field('social_media', 'option');
@endphp
<header class="fixed z-10 w-full bg-white shadow-md">
    <div class="bg-dark py-3 text-white">
        <div class="container flex flex-row items-center justify-between">
            <h1 class='font-title'>Stichting Ark voor Mens en Dier</h1>
            <nav>
                <ul class="flex flex-row gap-4">
                    @foreach ($socials as $item)
                        <li class="transition-all duration-200 hover:scale-110">
                            <a
                                href="{{ isset($item['icoon']) && $item['icoon'] === 'Email' ? 'mailto:' . $item['link'] : $item['link'] }}">
                                <i
                                    class='{{ isset($item['icoon']) && $item['icoon'] === 'Facebook' ? 'fab fa-facebook' : 'fa-solid fa-envelope' }}'></i>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>

    <div x-data="menu()" class="container flex items-center justify-between">
        {{-- main menu --}}
        <a href="{{ home_url('/') }}"
            class='animate__heartBeat animate__infinite w-[100px] transition-all duration-200 hover:scale-125'>
            {!! file_get_contents(get_template_directory() . '/resources/images/logo.svg') !!}
        </a>
        <nav class="font-title flex flex-row gap-20">
            <nav class="flex flex-row gap-20">
                <div class="flex flex-row gap-10">
                    @foreach ($structured_menu as $item)
                        @if (!empty($item['sub_items']))
                            <div x-data="{ isOpen: false }" class="relative" @mouseover="isOpen = true"
                                @mouseleave="isOpen = false">
                                <a href='{{ $item['main_url'] }}' class='nav-link'>
                                    {{ $item['main_title'] }}
                                </a>
                                <ul x-show="isOpen" class="absolute bg-white p-4 shadow-md">
                                    @foreach ($item['sub_items'] as $sub_item)
                                        <li>
                                            <a href='{{ $sub_item['url'] }}'>{{ $sub_item['title'] }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            <a href='{{ $item['main_url'] }}' class='nav-link'>{{ $item['main_title'] }}</a>
                        @endif
                    @endforeach
                </div>
            </nav>

            {{-- Winkelwagen --}}
            <div class="flex flex-row">
                <ul>
                    <li>
                        <i class="fa fa-shopping-cart text-primary"></i>
                        <span>
                            {{ WC()->cart->get_cart_contents_count() }}
                        </span>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<script>
    function menu() {
        return {
            mobileOpen: false,
            subOpen: false,
        }
    }
</script>
