<?php
namespace Modules\Template\Blocks;

use Modules\Candidate\Models\Category;
use Modules\Location\Models\Location;
use Modules\Media\Helpers\FileHelper;

class HeroBanner extends BaseBlock
{
    function __construct()
    {
        $this->setOptions([
            'settings' => [
                [
                    'id'    => 'style',
                    'type'  => 'radios',
                    'label' => __('Style'),
                    'value' => 'style_1',
                    'values' => [
                        [
                            'value'   => 'style_1',
                            'name' => __("Style 1")
                        ],
                        [
                            'value'   => 'style_2',
                            'name' => __("Style 2")
                        ],
                        [
                            'value'   => 'style_3',
                            'name' => __("Style 3")
                        ],
                        [
                            'value'   => 'style_4',
                            'name' => __("Style 4")
                        ],
                        [
                            'value'   => 'style_5',
                            'name' => __("Style 5")
                        ],
                        [
                            'value'   => 'style_6',
                            'name' => __("Style 6")
                        ]
                    ],
                ],
                [
                    'id'        => 'title',
                    'type'      => 'input',
                    'inputType' => 'text',
                    'label'     => __('Title')
                ],
                [
                    'id'        => 'sub_title',
                    'type'      => 'input',
                    'inputType' => 'text',
                    'label'     => __('Sub Title')
                ],
                [
                    'id'        => 'popular_searches',
                    'type'      => 'input',
                    'inputType' => 'text',
                    'label'     => __('Popular Searches')
                ],
                [
                    'id'        => 'upload_cv_url',
                    'type'      => 'input',
                    'inputType' => 'text',
                    'label'     => __('Upload Cv Url'),
                    'conditions' => ['style' => 'style_2']
                ],
                [
                    'id' => 'banner_image',
                    'type' => 'uploader',
                    'label' => __("Banner Image")
                ],
                [
                    'id' => 'banner_image_2',
                    'type' => 'uploader',
                    'label' => __("Banner Image 2"),
                    'conditions' => ['style' => 'style_2']
                ],
                [
                    'id' => 'style_5_banner_image_2',
                    'type' => 'uploader',
                    'label' => __("Banner Image 2"),
                    'conditions' => ['style' => 'style_5']
                ],
                [
                    'id' => 'style_5_banner_image_3',
                    'type' => 'uploader',
                    'label' => __("Banner Image 3"),
                    'conditions' => ['style' => 'style_5']
                ],
                [
                    'id'          => 'list_images',
                    'type'        => 'listItem',
                    'label'       => __('Images List (maximum:4)'),
                    'settings'    => [
                        [
                            'id'    => 'image_id',
                            'type'  => 'uploader',
                            'label' => __('Image')
                        ],
                        [
                            'id'        => 'url',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'label'     => __('Url')
                        ],
                    ],
                    'conditions' => ['style' => 'style_1']
                ],
                [
                    'id'          => 'style_5_list_images',
                    'type'        => 'listItem',
                    'label'       => __('Images List (maximum:4)'),
                    'settings'    => [
                        [
                            'id'    => 'image_id',
                            'type'  => 'uploader',
                            'label' => __('Image')
                        ],
                        [
                            'id'        => 'url',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'label'     => __('Url')
                        ],
                    ],
                    'conditions' => ['style' => 'style_5']
                ],
                [
                    'id'          => 'style_6_list_images',
                    'type'        => 'listItem',
                    'label'       => __('Images List (maximum:4)'),
                    'settings'    => [
                        [
                            'id'    => 'image_id',
                            'type'  => 'uploader',
                            'label' => __('Image')
                        ],
                        [
                            'id'        => 'url',
                            'type'      => 'input',
                            'inputType' => 'text',
                            'label'     => __('Url')
                        ],
                    ],
                    'conditions' => ['style' => 'style_6']
                ],
            ],
            'category'=>__("Other Block")
        ]);
    }

    public function getName()
    {
        return __('Hero Banner');
    }

    public function content($model = [])
    {
        $model = block_attrs([
            'style' => 'style_1',
            'title' => '',
            'sub_title' => '',
            'popular_searches' => '',
            'upload_cv_url' => '',
            'list_images' => '',
            'banner_image' => '',
            'banner_image_2' => '',
            'style_5_banner_image_2' => '',
            'style_5_banner_image_3' => '',
            'style_5_list_images' => '',
            'style_6_list_images' => '',
            'banner_image_url' => !empty($model['banner_image']) ? FileHelper::url($model['banner_image'], 'full') : '',
            'list_locations'      => Location::where('status', 'publish')->limit(10)->get()->toTree(),
        ], $model);
        $style = (!empty($model['style'])) ? $model['style'] : 'style_1';
        if(!empty($model['popular_searches'])){
            $model['popular_searches'] = explode(',', $model['popular_searches']);
        }
        $model['list_categories'] = Category::where('status', 'publish')->get()->toTree();
        return view("Template::frontend.blocks.hero-banner.{$style}", $model);
    }

    public function contentAPI($model = []){

    }
}
