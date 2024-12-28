<?php

namespace App\Providers;

use Roots\Acorn\Application;
use Roots\Acorn\Sage\SageServiceProvider;

class ThemeServiceProvider extends SageServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        parent::register();

        add_action('acf/init', function () {
            if (function_exists('acf_register_block')) {
                // Look into views/blocks
                $path = Application::getInstance()->resourcePath('/views/blocks/');
                $dir = new \DirectoryIterator($path);
                // Loop through found blocks
                foreach ($dir as $fileinfo) {
                    if (!$fileinfo->isDot()) {
                        $slug = str_replace('.blade.php', '', $fileinfo->getFilename());
                        // Get infos from file
                        $file_path = $path . "$slug.blade.php";
                        $file_headers = get_file_data($file_path, [
                            'title' => 'Title',
                            'description' => 'Description',
                            'category' => 'Category',
                            'icon' => 'Icon',
                            'keywords' => 'Keywords',
                            'mode' => 'Mode'
                        ]);
                        if (empty($file_headers['title'])) {
                            die(_e('This block needs a title: ' . $file_path));
                        }
                        if (empty($file_headers['category'])) {
                            die(_e('This block needs a category: ' . $file_path));
                        }
                        // Register a new block
                        $datas = [
                            'name' => $slug,
                            'title' => $file_headers['title'],
                            'description' => $file_headers['description'],
                            'category' => $file_headers['category'],
                            'icon' => $file_headers['icon'],
                            'keywords' => explode(' ', $file_headers['keywords']),
                            'mode' => $file_headers['mode'],
                            'render_callback' => array($this, 'acf_block_render_callback'),
                            'supports' => [
                                'jsx' => true
                            ]
                        ];
                        acf_register_block($datas);
                    }
                }
            }
        });
    }

    public function acf_block_render_callback($block)
    {
        $slug = str_replace('acf/', '', $block['name']);
        $block['slug'] = $slug;
        $block['classes'] = implode(' ', [$block['slug'], $block['className'] ?? '', $block['align']]);
        echo \Roots\view("blocks/$slug", ['block' => $block]);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}