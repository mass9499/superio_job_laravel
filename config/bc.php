<?php
return [
    "media"=>[
        "groups"=>[
            "default"=>[
                "ext"=>["jpg",'jpeg','png','gif','bmp'],
                "mime"=>["image/png","image/jpeg","image/gif","image/bmp"],
                "max_size"=>20000000, // In Bytes, default is 20MB,
                "max_width"=>2500,// Only for Image
                "max_height"=>2500,// Only for Image
            ],
            "image"=>[
                "ext"=>["jpg",'jpeg','png','gif','bmp'],
                "mime"=>["image/png","image/jpeg","image/gif","image/bmp"],
                "max_size"=>20000000, // In Bytes, default is 20MB,
                "max_width"=>2500,// Only for Image
                "max_height"=>2500,// Only for Image
            ],
            'cvs'=>[
                "ext"=>['ppt','pptx','pdf','docx','doc'],
                "mime"=>["application/vnd.ms-powerpoint","application/vnd.openxmlformats-officedocument.presentationml.presentation","application/pdf","application/vnd.openxmlformats-officedocument.wordprocessingml.document","application/msword"],
                "max_size" => 50000000,
            ],
            'scorm' => [
                "ext"=>['zip','rar', 'gzip'],
                "mime"=> ['application/x-gzip', 'application/zip', 'application/x-rar-compressed'],
                "max_size" => 200000000 // In Bytes, default is 200MB,
            ],
            'order_attachment' => [
                "ext"=>["jpg",'jpeg','png','gif','bmp','zip','rar', 'gzip'],
                "mime"=>["image/png","image/jpeg","image/gif","image/bmp",'application/x-gzip', 'application/zip', 'application/x-rar-compressed'],
                "max_size"=>200000000,
                "max_width"=>2500,
                "max_height"=>2500,
            ]
        ],
        "optimize_image"=>env('BC_MEDIA_OPTIMIZE_IMAGE',true),
        "preview_direct"=>env("BC_MEDIA_PREVIEW_DIRECT",true)
    ]
];
