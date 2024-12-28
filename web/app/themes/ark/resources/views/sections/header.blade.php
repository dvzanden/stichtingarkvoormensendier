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
    echo '<pre>';
    print_r($structured_menu);
    echo '</pre>';
@endphp

<header class="header">
    <div class="header__top">
        <div class="container">
            <p>test</p>
        </div>
    </div>
    <div class="header__nav" x-data="menu()">


    </div>
</header>

<script>
    function menu() {
        return {
            mobileOpen: false
        }
    }
</script>
