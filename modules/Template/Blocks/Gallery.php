<?php
namespace Modules\Template\Blocks;

use Modules\Media\Helpers\FileHelper;
use Modules\Template\Blocks\BaseBlock;

class Gallery extends BaseBlock
{
    function __construct()
    {
        $this->setOptions([
            'settings' => [
                [
                    'id'          => 'list_item',
                    'type'        => 'listItem',
                    'label'       => __('List Item(s)'),
                    'title_field' => 'title',
                    'settings'    => [
                        [
                            'id'    => 'image_id',
                            'type'  => 'uploader',
                            'label' => __('Gallery Image')
                        ]
                    ]
                ],
                [
                    'id'            => 'style',
                    'type'          => 'radios',
                    'label'         => __('Style Background'),
                    'values'        => [
                        [
                            'value'   => 'style_1',
                            'name' => __("Style 1")
                        ]
                    ]
                ]
            ],
            'category'=>__("Other Block")
        ]);
    }

    public function getName()
    {
        return __('Gallery');
    }

    public function content($model = [])
    {
        $style = (!empty($model['style'])) ? $model['style'] : 'style_1';
        if ($style == 'style_1'){
            $items = $itemFirst = $itemCenter = $itemLast = [];
            if (!empty($model['list_item'])){
                foreach ($model['list_item'] as $k => $item){
                    if ($k > 5) continue;
                    if ($k == 0){
                        $itemFirst[] = $item;
                    } elseif ($k == 5){
                        $itemLast[] = $item;
                    } else {
                        $itemCenter[] = $item;
                    }
                }
                $itemCenter = array_chunk($itemCenter,2);
                $items = [$itemFirst,$itemCenter[0],$itemCenter[1],$itemLast];
            }
            $model['list_item'] = array_values($items);
        }
        return view('Template::frontend.blocks.gallery.'.$style, $model);
    }
}
