<?php
namespace Database\Seeders;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Media\Models\MediaFile;

class General extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Setting header,footer
        //Menu English
        $menu_items_en = array(
            array(
                'name'       => 'Home',
                'url'        => '/',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'Home Page 01',
                        'url'        => '/',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Home Page 02',
                        'url'        => '/page/home-page-2',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Home Page 03',
                        'url'        => '/page/home-page-3',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Home Page 04',
                        'url'        => '/page/home-page-4',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Home Page 05',
                        'url'        => '/page/home-page-5',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Home Page 06',
                        'url'        => '/page/home-page-6',
                        'item_model' => 'custom',
                        'children'   => array(),
                    )
                ),
            ),
            array(
                'name'       => 'GIG [NEW]',
                'url'        => '/gig',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'Category Level 1',
                        'url'        => '/gig-cat/graphics-design',
                        'item_model' => 'custom',
                    ),
                    array(
                        'name'       => 'Category Level 2',
                        'url'        => '/gig-cat/logo-design',
                        'item_model' => 'custom',
                    ),
                    array(
                        'name'       => 'Gigs Listing',
                        'url'        => '/gig',
                        'item_model' => 'custom'
                    ),
                    array(
                        'name'       => 'Gig Single',
                        'url'        => '/gig/i-will-quod-corrupti-veritatis',
                        'item_model' => 'custom'
                    )
                ),
            ),
            array(
                'name'       => 'Find Jobs',
                'url'        => '/',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'Jobs Listing',
                        'url'        => '/job',
                        'item_model' => 'custom',
                        'children'   => [
                            [
                                'name'       => 'Jobs Listing V1',
                                'url'        => '/job',
                                'item_model' => 'custom',
                            ],
                            [
                                'name'       => 'Jobs Listing V2',
                                'url'        => '/job?_layout=v2',
                                'item_model' => 'custom',
                            ],
                            [
                                'name'       => 'Jobs Listing V3',
                                'url'        => '/job?_layout=v3',
                                'item_model' => 'custom',
                            ]
                        ]
                    ),
                    array(
                        'name'       => 'Jobs Single',
                        'url'        => '/job/product-designer-ui-designer',
                        'item_model' => 'custom',
                        'children'   => [
                            [
                                'name'       => 'Jobs Single V1',
                                'url'        => '/job/product-designer-ui-designer',
                                'item_model' => 'custom',
                            ],
                            [
                                'name'       => 'Jobs Single V2',
                                'url'        => '/job/product-designer-ui-designer?_layout=v2',
                                'item_model' => 'custom',
                            ],
                        ]
                    )
                ),
            ),
            array(
                'name'       => 'Employers',
                'url'        => '/',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'Employers List',
                        'url'        => '/companies',
                        'item_model' => 'custom',
                        'children'   => [
                            [
                                'name'       => 'Employers Listing V1',
                                'url'        => '/companies?_layout=v1',
                                'item_model' => 'custom',
                            ],
                            [
                                'name'       => 'Employers Listing V2',
                                'url'        => '/companies?_layout=v2',
                                'item_model' => 'custom',
                            ],
                            [
                                'name'       => 'Employers Listing V3',
                                'url'        => '/companies?_layout=v3',
                                'item_model' => 'custom',
                            ]
                        ]
                    ),
                    array(
                        'name'       => 'Employers Single',
                        'url'        => '/companies/netflix',
                        'item_model' => 'custom',
                        'children'   => [
                            [
                                'name'       => 'Employers Single V1',
                                'url'        => '/companies/netflix?_layout=v1',
                                'item_model' => 'custom',
                            ],
                            [
                                'name'       => 'Employers Single V2',
                                'url'        => '/companies/netflix?_layout=v2',
                                'item_model' => 'custom',
                            ]
                        ]
                    )
                ),
            ),
            array(
                'name'       => 'Candidates',
                'url'        => '/',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'Candidates List',
                        'url'        => '/candidate',
                        'item_model' => 'custom',
                        'children'   => [
                            [
                                'name'       => 'Candidates Listing V1',
                                'url'        => '/candidate?_layout=v1',
                                'item_model' => 'custom',
                            ],
                            [
                                'name'       => 'Candidates Listing V2',
                                'url'        => '/candidate?_layout=v2',
                                'item_model' => 'custom',
                            ],
                            [
                                'name'       => 'Candidates Listing V3',
                                'url'        => '/candidate?_layout=v3',
                                'item_model' => 'custom',
                            ]
                        ]
                    ),
                    array(
                        'name'       => 'Candidates Single',
                        'url'        => '/candidate/ui-designer-at-invision-1',
                        'item_model' => 'custom'
                    )
                ),
            ),
            array(
                'name'       => 'Pages',
                'url'        => '/',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'Blog List',
                        'url'        => '/news',
                        'item_model' => 'custom',
                    ),
                    array(
                        'name'       => 'Blog Single',
                        'url'        => '/news/5-tips-for-your-job-interviews',
                        'item_model' => 'custom'
                    ),
                    array(
                        'name'       => 'About',
                        'url'        => '/page/about',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'FAQ\'s',
                        'url'        => '/page/faqs',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Terms',
                        'url'        => '/page/terms-and-conditions',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Contact',
                        'url'        => '/contact',
                        'item_model' => 'custom',
                        'children'   => array(),
                    )
                ),
            ),
        );
        DB::table('core_menus')->insert([
            'name'        => 'Main Menu',
            'items'       => json_encode($menu_items_en),
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);

        //Menu Japan
        $menu_items_ja = array(
            array(
                'name'       => 'Home',
                'url'        => '/ja',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'Home Page 01',
                        'url'        => '/ja',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Home Page 02',
                        'url'        => '/ja/page/home-page-2',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Home Page 03',
                        'url'        => '/ja/page/home-page-3',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Home Page 04',
                        'url'        => '/ja/page/home-page-4',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Home Page 05',
                        'url'        => '/ja/page/home-page-5',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Home Page 06',
                        'url'        => '/ja/page/home-page-6',
                        'item_model' => 'custom',
                        'children'   => array(),
                    )
                ),
            ),
            array(
                'name'       => 'Find Jobs',
                'url'        => '/',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'Jobs Listing',
                        'url'        => '/ja/job',
                        'item_model' => 'custom'
                    ),
                    array(
                        'name'       => 'Jobs Single',
                        'url'        => '/ja/job/product-designer-ui-designer',
                        'item_model' => 'custom'
                    )
                ),
            ),
            array(
                'name'       => 'Employers',
                'url'        => '/',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'Employers List',
                        'url'        => '/ja/companies',
                        'item_model' => 'custom'
                    ),
                    array(
                        'name'       => 'Employers Single',
                        'url'        => '/ja/companies/netflix',
                        'item_model' => 'custom'
                    )
                ),
            ),
            array(
                'name'       => 'Candidates',
                'url'        => '/',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'Candidates List',
                        'url'        => '/ja/candidate',
                        'item_model' => 'custom'
                    ),
                    array(
                        'name'       => 'Candidates Single',
                        'url'        => '/ja/candidate/ui-designer-at-invision-1',
                        'item_model' => 'custom',
                    )
                ),
            ),
            array(
                'name'       => 'Pages',
                'url'        => '/',
                'item_model' => 'custom',
                'model_name' => 'Custom',
                'children'   => array(
                    array(
                        'name'       => 'Blog List',
                        'url'        => '/ja/news',
                        'item_model' => 'custom',
                    ),
                    array(
                        'name'       => 'Blog Single',
                        'url'        => '/ja/news/5-tips-for-your-job-interviews',
                        'item_model' => 'custom'
                    ),
                    array(
                        'name'       => 'About',
                        'url'        => '/ja/page/about',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'FAQ\'s',
                        'url'        => '/ja/page/faqs',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Terms',
                        'url'        => '/ja/page/terms-and-conditions',
                        'item_model' => 'custom',
                        'children'   => array(),
                    ),
                    array(
                        'name'       => 'Contact',
                        'url'        => '/ja/contact',
                        'item_model' => 'custom',
                        'children'   => array(),
                    )
                ),
            ),
        );
        DB::table('core_menu_translations')->insert([
            'origin_id'   => '1',
            'locale'      => 'ja',
            'items'       =>json_encode($menu_items_ja),
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);

        DB::table('core_settings')->insert(
            [
                [
                    'name'  => 'menu_locations',
                    'val'   => '{"primary":1}',
                    'group' => "general",
                ],
                [
                    'name'  => 'admin_email',
                    'val'   => 'support@superio.com',
                    'group' => "general",
                ], [
                    'name'  => 'email_from_name',
                    'val'   => 'Superio',
                    'group' => "general",
                ], [
                    'name'  => 'email_from_address',
                    'val'   => 'support@superio.com',
                    'group' => "general",
                ],
                [
                    'name'  => 'phone_contact',
                    'val'   => '(+84) 666-888-999',
                    'group' => "general",
                ],
                [
                    'name'  => 'logo_id',
                    'val'   => MediaFile::findMediaByName("logo")->id,
                    'group' => "general",
                ],
                [
                    'name'  => 'logo_white_id',
                    'val'   => MediaFile::findMediaByName("logo-white")->id,
                    'group' => "general",
                ],
                [
                    'name'  => 'site_favicon',
                    'val'   => MediaFile::findMediaByName("favicon")->id,
                    'group' => "general",
                ],
                [
                    'name'  => 'footer_style',
                    'val'   => 'style_1',
                    'group' => "general",
                ],
                [
                    'name'  => 'footer_info_text',
                    'val'   => '<p class="phone-num"><span>Call us </span><a href="tel:123 456 7890">123 456 7890</a></p>
                                <p class="address">329 Queensberry Street, North Melbourne VIC<br> 3051, Australia. <br>
                                    <a href="mailto:support@superio.com" class="email">support@superio.com</a>
                                </p>',
                    'group' => "general",
                ],
                [
                    'name'  => 'copyright',
                    'val'   => '© 2021 <a href="/">Superio</a>. All Right Reserved.',
                    'group' => "general",
                ],
                [
                    'name'  => 'footer_socials',
                    'val'   => '<a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>',
                    'group' => "general",
                ],
                [
                    'name'  => 'list_widget_footer',
                    'val'   => '[{"title":"For Candidates","size":"3","content":"<ul class=\"list\">\r\n                                            <li><a href=\"#\">Browse Jobs<\/a><\/li>\r\n                                            <li><a href=\"#\">Browse Categories<\/a><\/li>\r\n                                            <li><a href=\"#\">Candidate Dashboard<\/a><\/li>\r\n                                            <li><a href=\"#\">Job Alerts<\/a><\/li>\r\n                                            <li><a href=\"#\">My Bookmarks<\/a><\/li>\r\n                                        <\/ul>"},{"title":"For Employers","size":"3","content":"<ul class=\"list\">\r\n                                            <li><a href=\"#\">Browse Candidates<\/a><\/li>\r\n                                            <li><a href=\"#\">Employer Dashboard<\/a><\/li>\r\n                                            <li><a href=\"#\">Add Job<\/a><\/li>\r\n                                            <li><a href=\"#\">Job Packages<\/a><\/li>\r\n                                        <\/ul>"},{"title":"About Us","size":"3","content":"<ul class=\"list\">\r\n                                            <li><a href=\"#\">Job Page<\/a><\/li>\r\n                                            <li><a href=\"#\">Job Page Alternative<\/a><\/li>\r\n                                            <li><a href=\"#\">Resume Page<\/a><\/li>\r\n                                            <li><a href=\"#\">Blog<\/a><\/li>\r\n                                            <li><a href=\"#\">Contact<\/a><\/li>\r\n                                        <\/ul>"},{"title":"Helpful Resources","size":"3","content":"<ul class=\"list\">\r\n                                            <li><a href=\"#\">Site Map<\/a><\/li>\r\n                                            <li><a href=\"#\">Terms of Use<\/a><\/li>\r\n                                            <li><a href=\"#\">Privacy Center<\/a><\/li>\r\n                                            <li><a href=\"#\">Security Center<\/a><\/li>\r\n                                            <li><a href=\"#\">Accessibility Center<\/a><\/li>\r\n                                        <\/ul>"}]',
                    'group' => "general",
                ],
                [
                    'name'  => 'list_widget_footer_ja',
                    'val'   => '[{"title":"\u5019\u88dc\u8005\u5411\u3051","size":"3","content":"<ul class=\"list\">\r\n                                            <li><a href=\"#\">\u6c42\u4eba\u3092\u95b2\u89a7\u3059\u308b\r\n<\/a><\/li>\r\n                                            <li><a href=\"#\">\u30ab\u30c6\u30b4\u30ea\u3092\u95b2\u89a7\u3059\u308b\r\n<\/a><\/li>\r\n                                            <li><a href=\"#\">\u5019\u88dc\u30c0\u30c3\u30b7\u30e5\u30dc\u30fc\u30c9\r\n<\/a><\/li>\r\n                                            <li><a href=\"#\">\u30b8\u30e7\u30d6\u30a2\u30e9\u30fc\u30c8<\/a><\/li>\r\n                                            <li><a href=\"#\">\u30de\u30a4\u30d6\u30c3\u30af\u30de\u30fc\u30af\r\n<\/a><\/li>\r\n                                        <\/ul>"},{"title":"\u96c7\u7528\u4e3b\u306e\u305f\u3081\u306b","size":"3","content":"<ul class=\"list\">\r\n                                            <li><a href=\"#\">\u5019\u88dc\u8005\u3092\u95b2\u89a7\u3059\u308b\r\n<\/a><\/li>\r\n                                            <li><a href=\"#\">\u96c7\u7528\u8005\u30c0\u30c3\u30b7\u30e5\u30dc\u30fc\u30c9\r\n<\/a><\/li>\r\n                                            <li><a href=\"#\">\u30b8\u30e7\u30d6\u3092\u8ffd\u52a0\r\n<\/a><\/li>\r\n                                            <li><a href=\"#\">\u30b8\u30e7\u30d6\u30d1\u30c3\u30b1\u30fc\u30b8\r\n<\/a><\/li>\r\n                                        <\/ul>"},{"title":"\u79c1\u305f\u3061\u306b\u95a2\u3057\u3066\u306f","size":"3","content":"<ul class=\"list\">\r\n                                            <li><a href=\"#\">\u6c42\u4eba\u30da\u30fc\u30b8\r\n<\/a><\/li>\r\n                                            <li><a href=\"#\">\u6c42\u4eba\u30da\u30fc\u30b8\u306e\u4ee3\u66ff\r\n<\/a><\/li>\r\n                                            <li><a href=\"#\">\u5c65\u6b74\u66f8\u30da\u30fc\u30b8\r\n<\/a><\/li>\r\n                                            <li><a href=\"#\">\u30d6\u30ed\u30b0<\/a><\/li>\r\n                                            <li><a href=\"#\">\u30b3\u30f3\u30bf\u30af\u30c8\r\n<\/a><\/li>\r\n                                        <\/ul>"},{"title":"\u5f79\u7acb\u3064\u30ea\u30bd\u30fc\u30b9","size":"3","content":"<ul class=\"list\">\r\n                                            <li><a href=\"#\">\u30b5\u30a4\u30c8\u30de\u30c3\u30d7\r\n<\/a><\/li>\r\n                                            <li><a href=\"#\">\u5229\u7528\u898f\u7d04\r\n<\/a><\/li>\r\n                                            <li><a href=\"#\">\u30d7\u30e9\u30a4\u30d0\u30b7\u30fc\u30bb\u30f3\u30bf\u30fc\r\n<\/a><\/li>\r\n                                            <li><a href=\"#\">\u30bb\u30ad\u30e5\u30ea\u30c6\u30a3\u30bb\u30f3\u30bf\u30fc\r\n<\/a><\/li>\r\n                                            <li><a href=\"#\">\u30a2\u30af\u30bb\u30b7\u30d3\u30ea\u30c6\u30a3\u30bb\u30f3\u30bf\u30fc\r\n<\/a><\/li>\r\n                                        <\/ul>"}]',
                    'group' => "general",
                ]
            ]
        );

        // Setting page About
        $about_images = [
            'img_1' => DB::table('media_files')->insertGetId(['file_name' => 'about-img-1', 'file_path' => 'demo/general/about-img-1.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg']),
            'img_2' => DB::table('media_files')->insertGetId(['file_name' => 'about-img-2', 'file_path' => 'demo/general/about-img-2.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg']),
            'img_3' => DB::table('media_files')->insertGetId(['file_name' => 'about-img-3', 'file_path' => 'demo/general/about-img-3.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg']),
            'img_4' => DB::table('media_files')->insertGetId(['file_name' => 'about-img-4', 'file_path' => 'demo/general/about-img-4.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg']),
            'img_5' => DB::table('media_files')->insertGetId(['file_name' => 'about-img-5', 'file_path' => 'demo/general/about-img-5.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg']),
            'img_6' => DB::table('media_files')->insertGetId(['file_name' => 'about-img-6', 'file_path' => 'demo/general/about-img-6.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg']),
            'img_7' => DB::table('media_files')->insertGetId(['file_name' => 'call-to-action-bg-1', 'file_path' => 'demo/general/call-to-action-bg-1.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg']),
            'img_8' => DB::table('media_files')->insertGetId(['file_name' => 'testi-thumb-1', 'file_path' => 'demo/general/testi-thumb-1.png', 'file_type' => 'image/png', 'file_extension' => 'png']),
            'img_9' => DB::table('media_files')->insertGetId(['file_name' => 'how-it-work-1', 'file_path' => 'demo/general/how-it-work-1.png', 'file_type' => 'image/png', 'file_extension' => 'png']),
            'img_10' => DB::table('media_files')->insertGetId(['file_name' => 'how-it-work-2', 'file_path' => 'demo/general/how-it-work-2.png', 'file_type' => 'image/png', 'file_extension' => 'png']),
            'img_11' => DB::table('media_files')->insertGetId(['file_name' => 'how-it-work-3', 'file_path' => 'demo/general/how-it-work-3.png', 'file_type' => 'image/png', 'file_extension' => 'png']),
            'img_12' => DB::table('media_files')->insertGetId(['file_name' => 'brand-1', 'file_path' => 'demo/general/brand-1.png', 'file_type' => 'image/png', 'file_extension' => 'png']),
            'img_13' => DB::table('media_files')->insertGetId(['file_name' => 'brand-2', 'file_path' => 'demo/general/brand-2.png', 'file_type' => 'image/png', 'file_extension' => 'png']),
            'img_14' => DB::table('media_files')->insertGetId(['file_name' => 'brand-3', 'file_path' => 'demo/general/brand-3.png', 'file_type' => 'image/png', 'file_extension' => 'png']),
            'img_15' => DB::table('media_files')->insertGetId(['file_name' => 'brand-4', 'file_path' => 'demo/general/brand-4.png', 'file_type' => 'image/png', 'file_extension' => 'png']),
            'img_16' => DB::table('media_files')->insertGetId(['file_name' => 'brand-5', 'file_path' => 'demo/general/brand-5.png', 'file_type' => 'image/png', 'file_extension' => 'png']),
            'img_17' => DB::table('media_files')->insertGetId(['file_name' => 'brand-6', 'file_path' => 'demo/general/brand-6.png', 'file_type' => 'image/png', 'file_extension' => 'png']),
            'img_18' => DB::table('media_files')->insertGetId(['file_name' => 'brand-7', 'file_path' => 'demo/general/brand-7.png', 'file_type' => 'image/png', 'file_extension' => 'png']),
            'img_19' => DB::table('media_files')->insertGetId(['file_name' => 'testi-thumb-2', 'file_path' => 'demo/general/testi-thumb-2.png', 'file_type' => 'image/png', 'file_extension' => 'png']),
            'img_20' => DB::table('media_files')->insertGetId(['file_name' => 'testi-thumb-3', 'file_path' => 'demo/general/testi-thumb-3.png', 'file_type' => 'image/png', 'file_extension' => 'png']),
        ];
        $contact_image = [
            'img_1' => DB::table('media_files')->insertGetId(['file_name' => 'placeholder', 'file_path' => 'demo/general/placeholder.svg', 'file_type' => 'image/svg+xml', 'file_extension' => 'svg']),
            'img_2' => DB::table('media_files')->insertGetId(['file_name' => 'smartphone', 'file_path' => 'demo/general/smartphone.svg', 'file_type' => 'image/svg+xml', 'file_extension' => 'svg']),
            'img_3' => DB::table('media_files')->insertGetId(['file_name' => 'letter', 'file_path' => 'demo/general/letter.svg', 'file_type' => 'image/svg+xml', 'file_extension' => 'svg']),
            'img_4' => DB::table('media_files')->insertGetId(['file_name' => 'contact-call-to-action', 'file_path' => 'demo/general/contact-call-to-action.png', 'file_type' => 'image/png', 'file_extension' => 'png']),
        ];


        DB::table('core_templates')->insert([
            'title'       => 'About',
            'content'     => '[{"type":"breadcrumb_section","name":"Breadcrumb Section","model":{"title":"About Us","sub_title":"About Us","bg_image":"","bg_color":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"gallery","name":"Gallery","model":{"list_item":[{"_active":true,"image_id":'.$about_images['img_1'].'},{"_active":true,"image_id":'.$about_images['img_2'].'},{"_active":true,"image_id":'.$about_images['img_3'].'},{"_active":true,"image_id":'.$about_images['img_4'].'},{"_active":true,"image_id":'.$about_images['img_5'].'},{"_active":true,"image_id":'.$about_images['img_6'].'}],"style":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"BlockCounter","name":"Block Counter","model":{"list_item":[{"_active":true,"number":"4","symbol":"M","desc":"4 million daily active users"},{"_active":true,"number":"12","symbol":"k","desc":"Over 12k open job positions"},{"_active":true,"number":"20","symbol":"M","desc":"Over 20 million stories shared"}]},"component":"RegularBlock","open":true,"is_container":false},{"type":"text","name":"Text","model":{"content":"<h4>About Superio</h4>\n<p>Far much that one rank beheld bluebird after outside ignobly allegedly more when oh arrogantly vehement irresistibly fussy penguin insect additionally wow absolutely crud meretriciously hastily dalmatian a glowered inset one echidna cassowary some parrot and much as goodness some froze the sullen much connected bat wonderfully on instantaneously eel valiantly petted this along across highhandedly much.</p>\n<p>Repeatedly dreamed alas opossum but dramatically despite expeditiously that jeepers loosely yikes that as or eel underneath kept and slept compactly far purred sure abidingly up above fitting to strident wiped set waywardly far the and pangolin horse approving paid chuckled cassowary oh above a much opposite far much hypnotically more therefore wasp less that hey apart well like while superbly orca and far hence one.Far much that one rank beheld bluebird after outside ignobly allegedly more when oh arrogantly vehement irresistibly fussy.</p>","class":"about-section-three"},"component":"RegularBlock","open":true,"is_container":false},{"type":"call_to_action","name":"Call To Action","model":{"title":"Your Dream Jobs Are Waiting","sub_title":"Over 1 million interactions, 50,000 success stories Make yours now.","link_title":"Search Job","link_more":"#","style":"","bg_image":'.$about_images['img_7'].',"bg_gradient":"","link_search":"Search Job","url_search":"#","link_apply":"Apply Job Now","url_apply":"#"},"component":"RegularBlock","open":true,"is_container":false},{"type":"testimonial","name":"List Testimonial","model":{"title":"Testimonials From Our Customers","sub_title":"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor","list_item":[{"_active":true,"title":"Great quality!","desc":"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality","info_name":"Brooklyn Simmons","info_desc":"Web Developer","position":null,"avatar":'.$about_images['img_8'].'},{"_active":true,"title":"Great quality!","desc":"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality","info_name":"Brooklyn Simmons","info_desc":"Web Developer","position":null,"avatar":'.$about_images['img_8'].'},{"_active":true,"title":"Great quality!","desc":"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality","info_name":"Brooklyn Simmons","info_desc":"Web Developer","position":null,"avatar":'.$about_images['img_8'].'}],"style":"index"},"component":"RegularBlock","open":true,"is_container":false},{"type":"HowItWork","name":"How It Works","model":{"style":"style_2","title":"How It Works?","list_item":[{"_active":true,"title":"Free Resume Assessments","sub_title":"Employers on average spend 31 seconds scanning resumes to identify potential matches.","icon_image":'.$about_images['img_9'].',"order":null},{"_active":true,"title":"Job Fit Scoring","sub_title":"Employers on average spend 31 seconds scanning resumes to identify potential matches.","icon_image":'.$about_images['img_10'].',"order":null},{"_active":true,"title":"Help Every Step of the Way","sub_title":"Employers on average spend 31 seconds scanning resumes to identify potential matches.","icon_image":'.$about_images['img_11'].',"order":null}],"background_image":"","sub_title":"Job for anyone, anywhere"},"component":"RegularBlock","open":true,"is_container":false},{"type":"brands_list","name":"Brands List","model":{"list_item":[{"_active":true,"title":"Invision","image_id":'.$about_images['img_12'].',"brand_link":"#"},{"_active":true,"title":"figma","image_id":'.$about_images['img_13'].',"brand_link":"#"},{"_active":true,"title":"amazon","image_id":'.$about_images['img_14'].',"brand_link":"#"},{"_active":true,"title":"airbnb","image_id":'.$about_images['img_15'].',"brand_link":"#"},{"_active":true,"title":"spotify","image_id":'.$about_images['img_16'].',"brand_link":"#"},{"_active":true,"title":"slack","image_id":'.$about_images['img_17'].',"brand_link":"#"},{"_active":true,"title":"paypal","image_id":'.$about_images['img_18'].',"brand_link":"#"}]},"component":"RegularBlock","open":true,"is_container":false}]',
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);
        DB::table('core_templates')->insert([
            'title'       => 'FAQ',
            'content'     => '[{"type":"breadcrumb_section","name":"Breadcrumb Section","model":{"title":"Frequently Asked Questions","sub_title":"faq","bg_color":"transparent"},"component":"RegularBlock","open":true},{"type":"FaqList","name":"FAQ\'s List","model":{"title":"Payments","list_item":[{"_active":false,"title":"Why won\'t my payment go through?","sub_title":"<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>\n<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus.</p>"},{"_active":false,"title":"How do I get a refund?","sub_title":"<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>\n<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus.</p>"},{"_active":false,"title":"How do I redeem a coupon?","sub_title":"<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>\n<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus.</p>"},{"_active":true,"title":"Changing account name","sub_title":"<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>\n<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus.</p>"}]},"component":"RegularBlock","open":true},{"type":"FaqList","name":"FAQ\'s List","model":{"title":"Suggestions","list_item":[{"_active":false,"title":"Why won\'t my payment go through?","sub_title":"<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>\n<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus.</p>"},{"_active":false,"title":"How do I get a refund?","sub_title":"<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>\n<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus.</p>"},{"_active":false,"title":"How do I redeem a coupon?","sub_title":"<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>\n<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus.</p>"},{"_active":true,"title":"Changing account name","sub_title":"<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>\n<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus.</p>"}]},"component":"RegularBlock","open":true}]',
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);

        //Home Page 1 Template
        $home_page_1 = [
            [
                'type' => 'hero_banner',
                'name' => 'Hero Banner',
                'model' =>[
                    'style' => 'style_1',
                    'title' => 'There Are <span class="colored">93,178</span> Postings Here<br> For you!',
                    'sub_title' => 'Find Jobs, Employment & Career Opportunities',
                    'popular_searches' => 'Designer,Developer,Web,IOS,PHP,Senior,Engineer',
                    'list_images' => [
                        [
                            '_active' => false,
                            'image_id' => MediaFile::findMediaByName('banner-1-1')->id,
                        ],
                        [
                            '_active' => false,
                            'image_id' => MediaFile::findMediaByName('banner-1-2')->id
                        ],
                        [
                            '_active' => false,
                            'image_id' => MediaFile::findMediaByName('banner-1-3')->id
                        ],
                        [
                            '_active' => false,
                            'image_id' => MediaFile::findMediaByName('banner-1-4')->id
                        ]
                    ],
                    'banner_image' => MediaFile::findMediaByName('banner-img-1')->id
                ],
                'component' => 'RegularBlock',
                'open' => true,
                'is_container' => false,
            ],
            [
                'type' => 'job_categories',
                'name' => 'Job Categories',
                'model' =>[
                    'style' => 'style_1',
                    'title' => "Popular Job Categories",
                    'sub_title' => "2020 jobs live - 293 added today.",
                    'job_categories' => [
                        "6", "7", "8", "1", "2", "3", "4", "5", "9"
                    ]
                ],
                'component' => 'RegularBlock',
                'open' => true,
                'is_container' => false,
            ],
            [
                'type' => 'jobs_list',
                'name' => 'Jobs List',
                'model' =>[
                    'style' => 'style_1',
                    'title' => "Featured Jobs",
                    'sub_title' => "Know your worth and find the job that qualify your life",
                    'number' => 6,
                    'job_categories' => '',
                    'order' => 'is_featured',
                    'order_by' => 'desc',
                    'load_more_url' => '/job'
                ],
                'component' => 'RegularBlock',
                'open' => true,
                'is_container' => false,
            ],
            [
                'type' => 'testimonial',
                'name' => 'List Testimonial',
                'model' => [
                    'style' => 'style_2',
                    'title' => 'Testimonials From Our Customers',
                    'sub_title' => 'Lorem ipsum dolor sit amet elit, sed do eiusmod tempor',
                    'list_item' =>[
                        [
                            '_active' => false,
                            'title' => 'Good theme',
                            'desc' => 'Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality',
                            'info_name' => 'Nicole Wells',
                            'info_desc' => '',
                            'position' => 'Web Developer',
                            'avatar' => MediaFile::findMediaByName('testi-thumb-1')->id,
                        ],
                        [
                            '_active' => false,
                            'title' => 'Great quality!',
                            'desc' => 'Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality',
                            'info_name' => 'Gabriel Nolan',
                            'position' => 'Consultant',
                            'avatar' => MediaFile::findMediaByName('testi-thumb-2')->id,
                        ],
                        [
                            '_active' => true,
                            'title' => 'Awesome Design',
                            'desc' => 'Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality',
                            'info_name' => 'Ashley Jenkins',
                            'position' => 'Designer',
                            'avatar' => MediaFile::findMediaByName('testi-thumb-3')->id,
                        ]
                    ]
                ],
                'component' => 'RegularBlock',
                'open' => true,
                'is_container' => false,
            ],
            [
                'type' => 'brands_list',
                'name' => 'Brands List',
                'model' =>[
                    'list_item' =>[
                        [
                            '_active' => false,
                            'title' => 'Invision',
                            'image_id' => MediaFile::findMediaByName('brand-1')->id,
                            'brand_link' => '#',
                        ],
                        [
                            '_active' => false,
                            'title' => 'Figma',
                            'image_id' => MediaFile::findMediaByName('brand-2')->id,
                            'brand_link' => NULL,
                        ],
                        [
                            '_active' => false,
                            'title' => 'Amazon',
                            'image_id' => MediaFile::findMediaByName('brand-3')->id,
                            'brand_link' => NULL,
                        ],
                        [
                            '_active' => false,
                            'title' => 'Airbnb',
                            'image_id' => MediaFile::findMediaByName('brand-4')->id,
                            'brand_link' => NULL,
                        ],
                        [
                            '_active' => false,
                            'title' => 'Spotify',
                            'image_id' => MediaFile::findMediaByName('brand-5')->id,
                            'brand_link' => NULL,
                        ],
                        [
                            '_active' => false,
                            'title' => 'Slack',
                            'image_id' => MediaFile::findMediaByName('brand-6')->id,
                            'brand_link' => NULL,
                        ],
                        [
                            '_active' => false,
                            'title' => 'Paypal',
                            'image_id' => MediaFile::findMediaByName('brand-7')->id,
                            'brand_link' => NULL,
                        ]
                    ],
                    'style' => 'style_1',
                ],
                'component' => 'RegularBlock',
                'open' => true,
                'is_container' => false,
            ],
            [
                'type' => 'about',
                'name' => 'About Us Block',
                'model' =>[
                    'style' => 'style_1',
                    'title' => 'Millions of Jobs. Find the one that suits you.',
                    'content' => '<p>Search all the open positions on the web. Get your own personalized salary estimate. Read reviews on over 600,000 companies worldwide.</p>
                                    <ul class="list-style-one">
                                    <li>Bring to the table win-win survival</li>
                                    <li>Capitalize on low hanging fruit to identify</li>
                                    <li>But I must explain to you how all this</li>
                                    </ul>',
                    'button_name' => 'Get Started',
                    'button_url' => '#',
                    'button_target' => 0,
                    'featured_image' => MediaFile::findMediaByName('image-2')->id,
                    'image_2' => MediaFile::findMediaByName('count-employers')->id
                ],
                'component' => 'RegularBlock',
                'open' => true,
                'is_container' => false,
            ],
            [
                'type' => 'BlockCounter',
                'name' => 'Block Counter',
                'model' =>[
                    'list_item' =>[
                        [
                            '_active' => false,
                            'number' => '4',
                            'symbol' => 'M',
                            'desc' => '4 million daily active users',
                        ],
                        [
                            '_active' => false,
                            'number' => '12',
                            'symbol' => 'k',
                            'desc' => 'Over 12k open job positions',
                        ],
                        [
                            '_active' => false,
                            'number' => '20',
                            'symbol' => 'M',
                            'desc' => 'Over 20 million stories shared',
                        ]
                    ],
                    'max_width' => 1310,
                    'style' => 'style_2',
                ],
                'component' => 'RegularBlock',
                'open' => true,
                'is_container' => false,
            ],
            [
                'type' => 'list_news',
                'name' => 'News: List Items',
                'model' =>[
                    'style' => 'style_1',
                    'title' => 'Recent News Articles',
                    'number' => 3,
                    'category_id' => '',
                    'order' => '',
                    'order_by' => '',
                    'sub_title' => 'Fresh job related news content posted each day.',
                ],
                'component' => 'RegularBlock',
                'open' => true,
                'is_container' => false,
            ],
            [
                'type' => 'app_download',
                'name' => 'App Download',
                'model' =>[
                    'title' => 'Get the Superio Job <br>Search App',
                    'sub_title' => 'DOWNLOAD & ENJOY',
                    'desc' => 'Search through millions of jobs and find the right fit. Simply <br>swipe right to apply.',
                    'button_image_1' => MediaFile::findMediaByName('apple')->id,
                    'button_url_1' => '#',
                    'button_image_2' => MediaFile::findMediaByName('google')->id,
                    'button_url_2' => '#',
                    'featured_image' => MediaFile::findMediaByName('mobile-app')->id
                ],
                'component' => 'RegularBlock',
                'open' => true,
                'is_container' => false,
            ],
            [
                'type' => 'call_to_action',
                'name' => 'Call To Action',
                'model' =>[
                    'style' => 'style_2',
                    'title' => 'Recruiting?',
                    'sub_title' => 'Advertise your jobs to millions of monthly users and search 15.8 million <br>CVs in our database.',
                    'link_search' => 'Start Recruiting Now',
                    'url_search' => '#',
                    'bg_image' => MediaFile::findMediaByName('image-1')->id
                ],
                'component' => 'RegularBlock',
                'open' => true,
                'is_container' => false,
            ]
        ];
        DB::table('core_templates')->insert([
            'title'       => 'Home Page 1',
            'content'     => json_encode($home_page_1),
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);

        //Home Page 2 Template
        $home_page_2 = [
            [
                'type' => 'hero_banner',
                'name' => 'Hero Banner',
                'model' =>[
                    'style' => 'style_2',
                    'title' => 'Find Your Perfect Job <br>Match',
                    'sub_title' => 'Find Jobs, Employment & Career Opportunities',
                    'popular_searches' => 'Designer,Developer,Web,IOS,PHP,Senior,Engineer' ,
                    'banner_image' => MediaFile::findMediaByName('banner-img-2')->id,
                    'banner_image_2' => MediaFile::findMediaByName('banner-2-1')->id,
                    'upload_cv_url' => '#'
                ],
                'component' => 'RegularBlock',
                'open' => true,
                'is_container' => false,
            ],
            [
                'type' => 'HowItWork',
                'name' => 'How It Works',
                'model' =>[
                    'title' => "How It Works?",
                    'sub_title' => "Job for anyone, anywhere",
                    'list_item' => [
                        [
                            '_active' => false,
                            'title' => 'Free Resume Assessments',
                            'sub_title' => 'Employers on average spend 31 seconds scanning resumes to identify potential matches.',
                            'icon_image' => MediaFile::findMediaByName('how-it-work-1')->id
                        ],
                        [
                            '_active' => false,
                            'title' => 'Job Fit Scoring',
                            'sub_title' => 'Employers on average spend 31 seconds scanning resumes to identify potential matches.',
                            'icon_image' => MediaFile::findMediaByName('how-it-work-2')->id
                        ],
                        [
                            '_active' => false,
                            'title' => 'Help Every Step of the Way',
                            'sub_title' => 'Employers on average spend 31 seconds scanning resumes to identify potential matches.',
                            'icon_image' => MediaFile::findMediaByName('how-it-work-3')->id
                        ]
                    ]
                ],
                'component' => 'RegularBlock',
                'open' => true,
                'is_container' => false,
            ],
            [
                'type' => 'jobs_list',
                'name' => 'Jobs List',
                'model' =>[
                    'style' => 'style_2',
                    'title' => "Featured Jobs",
                    'sub_title' => "Know your worth and find the job that qualify your life",
                    'number' => 5,
                    'job_categories' => '',
                    'order' => 'is_featured',
                    'order_by' => 'desc',
                    'load_more_url' => '/job'
                ],
                'component' => 'RegularBlock',
                'open' => true,
                'is_container' => false,
            ],
            [
                'type' => 'list_locations',
                'name' => 'List Locations',
                'model' =>[
                    'title' => "Featured Cities",
                    'sub_title' => "Lorem ipsum dolor sit amet elit, sed do eiusmod tempor",
                    'number' => 5,
                    'order' => 'id',
                    'order_by' => 'asc'
                ],
                'component' => 'RegularBlock',
                'open' => true,
                'is_container' => false,
            ],
            [
                'type' => 'call_to_action',
                'name' => 'Call To Action',
                'model' =>[
                    'style' => 'style_1',
                    'title' => "Your Dream Jobs Are Waiting",
                    'sub_title' => "Over 1 million interactions, 50,000 success stories Make yours now.",
                    'link_search' => 'Search Job',
                    'url_search' => '/job',
                    'link_apply' => 'Apply Job Now',
                    'url_apply' => '#',
                    'bg_image' => MediaFile::findMediaByName('bg-1')->id
                ],
                'component' => 'RegularBlock',
                'open' => true,
                'is_container' => false,
            ],
            [
                'type' => 'list_candidates',
                'name' => 'Candidates Blocks',
                'model' =>[
                    'title' => "Featured Candidates",
                    'desc' => "Lorem ipsum dolor sit amet elit, sed do eiusmod tempor",
                    'number' => 10,
                    'category_id' => '',
                    'order' => 'title',
                    'order_by' => 'desc',
                ],
                'component' => 'RegularBlock',
                'open' => true,
                'is_container' => false,
            ],
            [
                'type' => 'list_news',
                'name' => 'News: List Items',
                'model' =>[
                    'style' => 'style_2',
                    'title' => 'Recent News Articles',
                    'number' => 3,
                    'category_id' => '',
                    'order' => '',
                    'order_by' => '',
                    'sub_title' => 'Fresh job related news content posted each day.',
                ],
                'component' => 'RegularBlock',
                'open' => true,
                'is_container' => false,
            ],
            [
                'type' => 'call_to_action',
                'name' => 'Call To Action',
                'model' =>[
                    'style' => 'style_3',
                    'title' => 'Let employers find you',
                    'sub_title' => 'Advertise your jobs to millions of monthly users and search 15.8 million CVs in our database.',
                    'link_search' => 'Search Job',
                    'url_search' => '/job'
                ],
                'component' => 'RegularBlock',
                'open' => true,
                'is_container' => false,
            ]
        ];
        DB::table('core_templates')->insert([
            'title'       => 'Home Page 2',
            'content'     => json_encode($home_page_2),
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);
        //Home Page 3 Template

        $home_page_3 = [
            [
                'type' => 'hero_banner',
                'name' => 'Hero Banner',
                'model' =>[
                    'style' => 'style_3',
                    'title' => 'Join us &amp; Explore Thousands <br> of Jobs',
                    'sub_title' => 'Find Jobs, Employment & Career Opportunities',
                    'popular_searches' => 'Designer,Developer,Web,IOS,PHP,Senior,Engineer',
                    'banner_image' => MediaFile::findMediaByName('banner-img-3')->id
                ],
                'component' => 'RegularBlock',
                'open' => true,
                'is_container' => false,
            ],
            [
                'type' => 'brands_list',
                'name' => 'Brands List',
                'model' =>[
                    'list_item' =>[
                        [
                            '_active' => false,
                            'title' => 'Invision',
                            'image_id' => MediaFile::findMediaByName('brand-1')->id,
                            'brand_link' => '#',
                        ],
                        [
                            '_active' => false,
                            'title' => 'Figma',
                            'image_id' => MediaFile::findMediaByName('brand-2')->id,
                            'brand_link' => NULL,
                        ],
                        [
                            '_active' => false,
                            'title' => 'Amazon',
                            'image_id' => MediaFile::findMediaByName('brand-3')->id,
                            'brand_link' => NULL,
                        ],
                        [
                            '_active' => false,
                            'title' => 'Airbnb',
                            'image_id' => MediaFile::findMediaByName('brand-4')->id,
                            'brand_link' => NULL,
                        ],
                        [
                            '_active' => false,
                            'title' => 'Spotify',
                            'image_id' => MediaFile::findMediaByName('brand-5')->id,
                            'brand_link' => NULL,
                        ],
                        [
                            '_active' => false,
                            'title' => 'Slack',
                            'image_id' => MediaFile::findMediaByName('brand-6')->id,
                            'brand_link' => NULL,
                        ],
                        [
                            '_active' => false,
                            'title' => 'Paypal',
                            'image_id' => MediaFile::findMediaByName('brand-7')->id,
                            'brand_link' => NULL,
                        ]
                    ],
                    'style' => 'style_2',
                ],
                'component' => 'RegularBlock',
                'open' => true,
                'is_container' => false,
            ],
            [
                'type' => 'job_categories',
                'name' => 'Job Categories',
                'model' =>[
                    'style' => 'style_2',
                    'title' => "Popular Job Categories",
                    'sub_title' => "2020 jobs live - 293 added today.",
                    'job_categories' => [
                        "6", "7", "8", "1", "3", "4", "5", "9"
                    ]
                ],
                'component' => 'RegularBlock',
                'open' => true,
                'is_container' => false,
            ],
            [
                'type' => 'jobs_list',
                'name' => 'Jobs List',
                'model' =>[
                    'style' => 'style_3',
                    'title' => "Featured Jobs",
                    'sub_title' => "Know your worth and find the job that qualify your life",
                    'number' => 9,
                    'job_categories' => '',
                    'order' => 'is_featured',
                    'order_by' => 'desc',
                    'load_more_url' => '/job'
                ],
                'component' => 'RegularBlock',
                'open' => true,
                'is_container' => false,
            ],
            [
                'type' => 'testimonial',
                'name' => 'List Testimonial',
                'model' => [
                    'style' => 'index',
                    'title' => 'Testimonials From Our Customers',
                    'sub_title' => 'Lorem ipsum dolor sit amet elit, sed do eiusmod tempor',
                    'list_item' =>[
                        [
                            '_active' => false,
                            'title' => 'Good theme',
                            'desc' => 'Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality',
                            'info_name' => 'Nicole Wells',
                            'info_desc' => '',
                            'position' => 'Web Developer',
                            'avatar' => MediaFile::findMediaByName('testi-thumb-1')->id,
                        ],
                        [
                            '_active' => false,
                            'title' => 'Great quality!',
                            'desc' => 'Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality',
                            'info_name' => 'Gabriel Nolan',
                            'position' => 'Consultant',
                            'avatar' => MediaFile::findMediaByName('testi-thumb-2')->id,
                        ],
                        [
                            '_active' => true,
                            'title' => 'Awesome Design',
                            'desc' => 'Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality',
                            'info_name' => 'Ashley Jenkins',
                            'position' => 'Designer',
                            'avatar' => MediaFile::findMediaByName('testi-thumb-3')->id,
                        ]
                    ]
                ],
                'component' => 'RegularBlock',
                'open' => true,
                'is_container' => false,
            ],
            [
                'type' => 'list_company',
                'name' => 'Company: List Items',
                'model' =>[
                    'title' => 'Top Company Registered',
                    'sub_title' => 'Some of the companies we\'ve helped recruit excellent applicants over the years.',
                    'number' => 10,
                    'category_id' => '',
                    'order' => 'name',
                    'order_by' => 'asc'
                ],
                'component' => 'RegularBlock',
                'open' => true,
                'is_container' => false,
            ],
            [
                'type' => 'about',
                'name' => 'About Us Block',
                'model' =>[
                    'style' => 'style_2',
                    'title' => 'Get applications from the world best talents.',
                    'content' => '<p>Search all the open positions on the web. Get your own personalized salary estimate. Read reviews on over 600,000 companies worldwide.</p>
                                    <ul class="list-style-one">
                                    <li>Bring to the table win-win survival</li>
                                    <li>Capitalize on low hanging fruit to identify</li>
                                    <li>But I must explain to you how all this</li>
                                    </ul>',
                    'button_name' => 'Post a Job',
                    'button_url' => '#',
                    'button_target' => 0,
                    'featured_image' => MediaFile::findMediaByName('image-3')->id,
                    'image_2' => MediaFile::findMediaByName('app-list')->id
                ],
                'component' => 'RegularBlock',
                'open' => true,
                'is_container' => false,
            ],
            [
                'type' => 'table_price',
                'name' => 'Table Pricing',
                'model' => [
                    'title' => 'Pricing Packages',
                    'sub_title' => 'Lorem ipsum dolor sit amet elit, sed do eiusmod tempor.',
                    'sale_off_text' => 'Save up to 10%',
                    'monthly_title' => 'Monthly',
                    'annual_title' => 'AnnualSave',
                    'monthly_list' =>[
                        [
                            '_active' => false,
                            'title' => 'Basic',
                            'price' => '$199',
                            'unit' => 'monthly',
                            'featured' => '<ul>
                                                <li><span>1 job posting</span></li>
                                                <li><span>0 featured job</span></li>
                                                <li><span>Job displayed for 20 days</span></li>
                                                <li><span>Premium Support 24/7 </span></li>
                                            </ul>',
                            'button_name' => 'View Profile',
                            'button_url' => '#'
                        ],
                        [
                            '_active' => false,
                            'title' => 'Standard',
                            'price' => '$499',
                            'unit' => 'monthly',
                            'featured' => '<ul>
                                                <li><span>1 job posting</span></li>
                                                <li><span>0 featured job</span></li>
                                                <li><span>Job displayed for 20 days</span></li>
                                                <li><span>Premium Support 24/7 </span></li>
                                            </ul>',
                            'button_name' => 'View Profile',
                            'button_url' => '#',
                            'is_recommended' => 1
                        ],
                        [
                            '_active' => false,
                            'title' => 'Extended',
                            'price' => '$799',
                            'unit' => 'monthly',
                            'featured' => '<ul>
                                                <li><span>1 job posting</span></li>
                                                <li><span>0 featured job</span></li>
                                                <li><span>Job displayed for 20 days</span></li>
                                                <li><span>Premium Support 24/7 </span></li>
                                            </ul>',
                            'button_name' => 'View Profile',
                            'button_url' => '#'
                        ]
                    ],
                    'annual_list' =>[
                        [
                            '_active' => false,
                            'title' => 'Basic',
                            'price' => '$1199',
                            'unit' => 'Annual',
                            'featured' => '<ul>
                                                <li><span>1 job posting</span></li>
                                                <li><span>0 featured job</span></li>
                                                <li><span>Job displayed for 20 days</span></li>
                                                <li><span>Premium Support 24/7 </span></li>
                                            </ul>',
                            'button_name' => 'View Profile',
                            'button_url' => '#'
                        ],
                        [
                            '_active' => false,
                            'title' => 'Standard',
                            'price' => '$1499',
                            'unit' => 'Annual',
                            'featured' => '<ul>
                                                <li><span>1 job posting</span></li>
                                                <li><span>0 featured job</span></li>
                                                <li><span>Job displayed for 20 days</span></li>
                                                <li><span>Premium Support 24/7 </span></li>
                                            </ul>',
                            'button_name' => 'View Profile',
                            'button_url' => '#',
                            'is_recommended' => 1
                        ],
                        [
                            '_active' => false,
                            'title' => 'Extended',
                            'price' => '$1799',
                            'unit' => 'Annual',
                            'featured' => '<ul>
                                                <li><span>1 job posting</span></li>
                                                <li><span>0 featured job</span></li>
                                                <li><span>Job displayed for 20 days</span></li>
                                                <li><span>Premium Support 24/7 </span></li>
                                            </ul>',
                            'button_name' => 'View Profile',
                            'button_url' => '#'
                        ]
                    ]
                ],
                'component' => 'RegularBlock',
                'open' => true,
                'is_container' => false,
            ],
        ];
        DB::table('core_templates')->insert([
            'title'       => 'Home Page 3',
            'content'     => json_encode($home_page_3),
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);

        //home page 4
        DB::table('core_templates')->insert([
            'title'       => 'Home Page 4',
            'content'     => '[{"type":"hero_banner","name":"Hero Banner","model":{"style":"style_4","title":"The Easiest Way to Get Your New Job","sub_title":"","popular_searches":"Designer, Developer, Web, IOS, PHP, Senior, Engineer,","banner_image":'.MediaFile::findMediaByName('homepage-4-banner')->id.',"upload_cv_url":"","banner_image_2":"","list_images":[]},"component":"RegularBlock","open":true,"is_container":false},{"type":"jobs_list","name":"Jobs List","model":{"style":"style_4","title":"Most Popular Jobs","sub_title":"Know your worth and find the job that qualify your life","number":6,"job_categories":["2","3","4","9"],"order":"is_featured","order_by":"desc","load_more_url":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"HowItWork","name":"How It Works","model":{"title":"How It Works?","sub_title":"Job for anyone, anywhere","list_item":[{"_active":true,"title":"Register an account <br> to start","sub_title":"","icon_image":'.MediaFile::findMediaByName('process-1')->id.'},{"_active":true,"title":"Explore over thousands <br> of resumes","sub_title":"","icon_image":'.MediaFile::findMediaByName('process-2')->id.'},{"_active":true,"title":"Find the most suitable <br> candidate","sub_title":"","icon_image":'.MediaFile::findMediaByName('process-3')->id.'}],"style":"style_3"},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_company","name":"Company: List Items","model":{"title":"Top Company Registered","sub_title":"Some of the companies we\'ve helped recruit excellent applicants over the years.","number":10,"category_id":"","order":"name","order_by":"asc","style":"style_2"},"component":"RegularBlock","open":true,"is_container":false},{"type":"job_categories","name":"Job Categories","model":{"style":"style_1","title":"Popular Job Categories","sub_title":"2020 jobs live - 293 added today.","job_categories":["6","7","8","1","2","3","4","5","9"]},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_news","name":"News: List Items","model":{"style":"style_3","title":"Recent News Articles","number":3,"category_id":"","order":"","order_by":"","sub_title":"Fresh job related news content posted each day."},"component":"RegularBlock","open":true,"is_container":false},{"type":"brands_list","name":"Brands List","model":{"list_item":[{"_active":false,"title":"Invision","image_id":'.$about_images['img_12'].',"brand_link":"#"},{"_active":false,"title":"Figma","image_id":'.$about_images['img_13'].',"brand_link":null},{"_active":false,"title":"Amazon","image_id":'.$about_images['img_14'].',"brand_link":null},{"_active":false,"title":"Airbnb","image_id":'.$about_images['img_15'].',"brand_link":null},{"_active":false,"title":"Spotify","image_id":'.$about_images['img_16'].',"brand_link":null},{"_active":false,"title":"Slack","image_id":'.$about_images['img_17'].',"brand_link":null},{"_active":false,"title":"Paypal","image_id":'.$about_images['img_18'].',"brand_link":null}],"style":"style_1"},"component":"RegularBlock","open":true,"is_container":false}]',
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);

        //home page 5
        $home_page_5 = [
            'img_1' => DB::table('media_files')->insertGetId(['file_name' => 'home5-banner-1', 'file_path' => 'demo/general/home5-banner-1.png', 'file_type' => 'image/png', 'file_extension' => 'png']),
            'img_2' => DB::table('media_files')->insertGetId(['file_name' => 'home5-banner-2', 'file_path' => 'demo/general/home5-banner-2.png', 'file_type' => 'image/png', 'file_extension' => 'png']),
            'img_3' => DB::table('media_files')->insertGetId(['file_name' => 'home5-banner-3', 'file_path' => 'demo/general/home5-banner-3.png', 'file_type' => 'image/png', 'file_extension' => 'png']),
            'img_4' => DB::table('media_files')->insertGetId(['file_name' => 'home5-image-4', 'file_path' => 'demo/general/home5-image-4.png', 'file_type' => 'image/png', 'file_extension' => 'png']),
            'img_5' => DB::table('media_files')->insertGetId(['file_name' => 'app-list-2', 'file_path' => 'demo/general/app-list-2.png', 'file_type' => 'image/png', 'file_extension' => 'png']),
            'img_6' => DB::table('media_files')->insertGetId(['file_name' => 'home5-testimonial-image', 'file_path' => 'demo/general/home5-testimonial-image.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg'])
        ];
        DB::table('core_templates')->insert([
            'title'       => 'Home Page 5',
            'content'     => '[{"type":"hero_banner","name":"Hero Banner","model":{"style":"style_5","title":"There Are <span class=\"colored\">93,178</span> Postings Here<br> For you!","sub_title":"Find Jobs, Employment & Career Opportunities","popular_searches":"Designer, Developer, Web, IOS, PHP, Senior, Engineer,","list_images":[{"_active":true,"image_id":50},{"_active":true,"image_id":51}],"banner_image":'.$home_page_5['img_1'].',"upload_cv_url":"","banner_image_2":134,"banner_image_3":135,"style_5_banner_image_2":'.$home_page_5['img_2'].',"style_5_banner_image_3":'.$home_page_5['img_3'].',"style_5_list_images":[{"_active":false,"image_id":50,"url":null},{"_active":false,"image_id":51,"url":null}],"style_6_list_images":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"jobs_list","name":"Jobs List","model":{"style":"style_5","title":"Featured Jobs","sub_title":"Know your worth and find the job that qualify your life","number":6,"job_categories":"","order":"is_featured","order_by":"desc","load_more_url":"/job"},"component":"RegularBlock","open":true,"is_container":false},{"type":"job_categories","name":"Job Categories","model":{"style":"style_5","title":"Popular Job Categories","sub_title":"2020 jobs live - 293 added today.","job_categories":["1","3","4","5","6","7","8","9"]},"component":"RegularBlock","open":true,"is_container":false},{"type":"about","name":"About Us Block","model":{"style":"style_3","title":"Get applications from the world best talents.","content":"<p>Search all the open positions on the web. Get your own personalized salary estimate. Read reviews on over 600,000 companies worldwide.</p>\n                                    <ul class=\"list-style-one\">\n                                    <li>Bring to the table win-win survival</li>\n                                    <li>Capitalize on low hanging fruit to identify</li>\n                                    <li>But I must explain to you how all this</li>\n                                    </ul>","button_name":"Post a Job","button_url":"#","button_target":0,"featured_image":'.$home_page_5['img_4'].',"image_2":'.$home_page_5['img_5'].',"button_color":""},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_news","name":"News: List Items","model":{"style":"style_2","title":"Recent News Articles","number":3,"category_id":"","order":"","order_by":"","sub_title":"Fresh job related news content posted each day."},"component":"RegularBlock","open":true,"is_container":false},{"type":"testimonial","name":"List Testimonial","model":{"style":"style_4","title":"Testimonials From Our Customers","sub_title":"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor","list_item":[{"_active":true,"title":"Good theme","desc":"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality","info_name":"Nicole Wells","info_desc":"","position":"Web Developer","avatar":'.$home_page_5['img_6'].'},{"_active":true,"title":"Great quality!","desc":"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality","info_name":"Gabriel Nolan","position":"Consultant","avatar":'.$home_page_5['img_6'].'},{"_active":true,"title":"Awesome Design","desc":"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality","info_name":"Ashley Jenkins","position":"Designer","avatar":'.$home_page_5['img_6'].'}]},"component":"RegularBlock","open":true,"is_container":false},{"type":"brands_list","name":"Brands List","model":{"list_item":[{"_active":false,"title":"Invision","image_id":'.$about_images['img_12'].',"brand_link":"#"},{"_active":false,"title":"Figma","image_id":'.$about_images['img_13'].',"brand_link":null},{"_active":false,"title":"Amazon","image_id":'.$about_images['img_14'].',"brand_link":null},{"_active":false,"title":"Airbnb","image_id":'.$about_images['img_15'].',"brand_link":null},{"_active":false,"title":"Spotify","image_id":'.$about_images['img_16'].',"brand_link":null},{"_active":false,"title":"Slack","image_id":'.$about_images['img_17'].',"brand_link":null},{"_active":false,"title":"Paypal","image_id":'.$about_images['img_18'].',"brand_link":null}],"style":"style_2"},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_company","name":"Company: List Items","model":{"title":"Top Company Registered","sub_title":"Some of the companies we\'ve helped recruit excellent applicants over the years.","number":10,"category_id":"","order":"name","order_by":"asc","style":"style_3"},"component":"RegularBlock","open":true,"is_container":false}]',
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);

        //home page 6
        $home_page_6 = [
            'img_1' => DB::table('media_files')->insertGetId(['file_name' => 'home-6-banner', 'file_path' => 'demo/general/home-6-banner.png', 'file_type' => 'image/png', 'file_extension' => 'png']),
            'img_2' => DB::table('media_files')->insertGetId(['file_name' => 'call-to-action-2', 'file_path' => 'demo/general/call-to-action-2.jpg', 'file_type' => 'image/jpeg', 'file_extension' => 'jpg']),
        ];
        DB::table('core_templates')->insert([
            'title'       => 'Home Page 6',
            'content'     => '[{"type":"hero_banner","name":"Hero Banner","model":{"style":"style_6","title":"Find a Perfect <br>Candidate","sub_title":"Find Jobs, Employment & Career Opportunities","popular_searches":"Designer, Developer, Web, IOS, PHP, Senior, Engineer,","upload_cv_url":"","banner_image":'.$home_page_6['img_1'].',"banner_image_2":"","style_6_list_images":[{"_active":false,"image_id":'. MediaFile::findMediaByName('banner-1-1')->id.'},{"_active":false,"image_id":'. MediaFile::findMediaByName('banner-1-2')->id.'},{"_active":false,"image_id":'. MediaFile::findMediaByName('banner-1-3')->id.'},{"_active":false,"image_id":'. MediaFile::findMediaByName('banner-1-4')->id.'}]},"component":"RegularBlock","open":true,"is_container":false},{"type":"job_categories","name":"Job Categories","model":{"style":"style_3","title":"Popular Job Categories","sub_title":"2020 jobs live - 293 added today.","job_categories":["1","2","3","4","5","6","7","8"]},"component":"RegularBlock","open":true,"is_container":false},{"type":"jobs_list","name":"Jobs List","model":{"style":"style_6","title":"Featured Jobs","sub_title":"Know your worth and find the job that qualify your life","number":5,"job_categories":"","order":"is_featured","order_by":"desc","load_more_url":"/job"},"component":"RegularBlock","open":true,"is_container":false},{"type":"call_to_action","name":"Call To Action","model":{"style":"style_1","title":"Make a Difference with Your Online Resume!","sub_title":"Your resume in minutes with JobHunt resume assistant is ready!","link_search":"Create an Account","url_search":"/register","link_apply":"","url_apply":"","bg_image":'.$home_page_6['img_2'].'},"component":"RegularBlock","open":true,"is_container":false},{"type":"testimonial","name":"List Testimonial","model":{"style":"style_3","title":"Testimonials From Our Customers","sub_title":"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor","list_item":[{"_active":false,"title":"Good theme","desc":"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality","info_name":"Nicole Wells","info_desc":"","position":"Web Developer","avatar":'.MediaFile::findMediaByName('testi-thumb-1')->id.'},{"_active":false,"title":"Great quality!","desc":"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality","info_name":"Gabriel Nolan","position":"Consultant","avatar":'.MediaFile::findMediaByName('testi-thumb-2')->id.'},{"_active":true,"title":"Awesome Design","desc":"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality","info_name":"Ashley Jenkins","position":"Designer","avatar":'.MediaFile::findMediaByName('testi-thumb-3')->id.'}]},"component":"RegularBlock","open":true,"is_container":false},{"type":"brands_list","name":"Brands List","model":{"list_item":[{"_active":true,"title":"Invision","image_id":'.$about_images['img_12'].',"brand_link":"#"},{"_active":true,"title":"figma","image_id":'.$about_images['img_13'].',"brand_link":"#"},{"_active":true,"title":"amazon","image_id":'.$about_images['img_14'].',"brand_link":"#"},{"_active":true,"title":"airbnb","image_id":'.$about_images['img_15'].',"brand_link":"#"},{"_active":true,"title":"spotify","image_id":'.$about_images['img_16'].',"brand_link":"#"},{"_active":true,"title":"slack","image_id":'.$about_images['img_17'].',"brand_link":"#"},{"_active":true,"title":"paypal","image_id":'.$about_images['img_18'].',"brand_link":"#"}],"style":"style_1"},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_news","name":"News: List Items","model":{"style":"style_4","title":"Recent News Articles","number":4,"category_id":"","order":"","order_by":"","sub_title":"Fresh job related news content posted each day."},"component":"RegularBlock","open":true,"is_container":false},{"type":"list_candidates","name":"Candidates Blocks","model":{"title":"Featured Candidates","desc":"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor","number":10,"category_id":"","order":"title","order_by":"desc"},"component":"RegularBlock","open":true,"is_container":false}]',
            'create_user' => '1',
            'created_at'  => date("Y-m-d H:i:s")
        ]);


        DB::table('core_pages')->insert([
            'title'       => 'About',
            'slug'        => 'about',
            'template_id' => '1',
            'create_user' => '1',
            'status'      => 'publish',
            'created_at'  => date("Y-m-d H:i:s")
        ]);
        DB::table('core_pages')->insert([
            'title'       => 'Terms and Conditions',
            'slug'        => 'terms-and-conditions',
            'create_user' => '1',
            'status'      => 'publish',
            'created_at'  => date("Y-m-d H:i:s"),
            'content'     => '
                <h3>1. Terms</h3>
<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>
<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus. Nisl malesuada tortor, ligula aliquet felis vitae enim. Mi augue aliquet mauris non elementum tincidunt eget facilisi. Pellentesque massa ipsum tempus vel aliquam massa eu pulvinar eget.</p>
<p>&nbsp;</p>
<h3>2. Limitations</h3>
<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>
<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus. Nisl malesuada tortor, ligula aliquet felis vitae enim. Mi augue aliquet mauris non elementum tincidunt eget facilisi. Pellentesque massa ipsum tempus vel aliquam massa eu pulvinar eget.</p>
<p>&nbsp;</p>
<h3>3. Revisions and Errata</h3>
<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>
<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus. Nisl malesuada tortor, ligula aliquet felis vitae enim. Mi augue aliquet mauris non elementum tincidunt eget facilisi. Pellentesque massa ipsum tempus vel aliquam massa eu pulvinar eget.</p>
<p>&nbsp;</p>
<h3>4. Site Terms of Use Modifications</h3>
<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>
<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus. Nisl malesuada tortor, ligula aliquet felis vitae enim. Mi augue aliquet mauris non elementum tincidunt eget facilisi. Pellentesque massa ipsum tempus vel aliquam massa eu pulvinar eget.</p>
            '
        ]);
        DB::table('core_pages')->insert([
            'title'       => 'FAQ\'s',
            'slug'        => 'faqs',
            'template_id' => '2',
            'create_user' => '1',
            'status'      => 'publish',
            'created_at'  => date("Y-m-d H:i:s")
        ]);

        DB::table('core_pages')->insert([
            'title'       => 'Home Page 1',
            'slug'        => 'home-page-1',
            'template_id' => '3',
            'header_style' => 'transparent',
            'footer_style' => 'style_1',
            'create_user' => '1',
            'status'      => 'publish',
            'created_at'  => date("Y-m-d H:i:s")
        ]);

        DB::table('core_pages')->insert([
            'title'       => 'Home Page 2',
            'slug'        => 'home-page-2',
            'template_id' => '4',
            'header_style' => 'header-style-two',
            'footer_style' => 'style-two',
            'create_user' => '1',
            'status'      => 'publish',
            'created_at'  => date("Y-m-d H:i:s")
        ]);

        DB::table('core_pages')->insert([
            'title'       => 'Home Page 3',
            'slug'        => 'home-page-3',
            'template_id' => '5',
            'header_style' => 'transparent',
            'footer_style' => 'alternate',
            'create_user' => '1',
            'status'      => 'publish',
            'created_at'  => date("Y-m-d H:i:s")
        ]);

        DB::table('core_pages')->insert([
            'title'       => 'Home Page 4',
            'slug'        => 'home-page-4',
            'template_id' => '6',
            'header_style' => 'header-style-two',
            'footer_style' => 'style-two',
            'create_user' => '1',
            'status'      => 'publish',
            'created_at'  => date("Y-m-d H:i:s")
        ]);

        DB::table('core_pages')->insert([
            'title'       => 'Home Page 5',
            'slug'        => 'home-page-5',
            'template_id' => '7',
            'header_style' => 'normal',
            'footer_style' => 'style_1',
            'create_user' => '1',
            'status'      => 'publish',
            'created_at'  => date("Y-m-d H:i:s")
        ]);

        DB::table('core_pages')->insert([
            'title'       => 'Home Page 6',
            'slug'        => 'home-page-6',
            'template_id' => '8',
            'header_style' => 'normal',
            'footer_style' => 'style_1',
            'create_user' => '1',
            'status'      => 'publish',
            'created_at'  => date("Y-m-d H:i:s")
        ]);

        $a = new \Modules\Page\Models\Page();
        $a->title = "Privacy policy";
        $a->create_user = 1;
        $a->status = 'publish';
        $a->created_at = date("Y-m-d H:i:s");
        $a->content = '<h1>Privacy policy</h1>
<p> This privacy policy (&quot;Policy&quot;) describes how the personally identifiable information (&quot;Personal Information&quot;) you may provide on the <a target="_blank" rel="nofollow" href="http://superio.test">superio.test</a> website (&quot;Website&quot; or &quot;Service&quot;) and any of its related products and services (collectively, &quot;Services&quot;) is collected, protected and used. It also describes the choices available to you regarding our use of your Personal Information and how you can access and update this information. This Policy is a legally binding agreement between you (&quot;User&quot;, &quot;you&quot; or &quot;your&quot;) and this Website operator (&quot;Operator&quot;, &quot;we&quot;, &quot;us&quot; or &quot;our&quot;). By accessing and using the Website and Services, you acknowledge that you have read, understood, and agree to be bound by the terms of this Agreement. This Policy does not apply to the practices of companies that we do not own or control, or to individuals that we do not employ or manage.</p>
<h2>Automatic collection of information</h2>
<p>When you open the Website, our servers automatically record information that your browser sends. This data may include information such as your device\'s IP address, browser type and version, operating system type and version, language preferences or the webpage you were visiting before you came to the Website and Services, pages of the Website and Services that you visit, the time spent on those pages, information you search for on the Website, access times and dates, and other statistics.</p>
<p>Information collected automatically is used only to identify potential cases of abuse and establish statistical information regarding the usage and traffic of the Website and Services. This statistical information is not otherwise aggregated in such a way that would identify any particular user of the system.</p>
<h2>Collection of personal information</h2>
<p>You can access and use the Website and Services without telling us who you are or revealing any information by which someone could identify you as a specific, identifiable individual. If, however, you wish to use some of the features on the Website, you may be asked to provide certain Personal Information (for example, your name and e-mail address). We receive and store any information you knowingly provide to us when you create an account, publish content,  or fill any online forms on the Website. When required, this information may include the following:</p>
<ul>
<li>Personal details such as name, country of residence, etc.</li>
<li>Contact information such as email address, address, etc.</li>
<li>Account details such as user name, unique user ID, password, etc.</li>
<li>Information about other individuals such as your family members, friends, etc.</li>
</ul>
<p>Some of the information we collect is directly from you via the Website and Services. However, we may also collect Personal Information about you from other sources such as public databases and our joint marketing partners. You can choose not to provide us with your Personal Information, but then you may not be able to take advantage of some of the features on the Website. Users who are uncertain about what information is mandatory are welcome to contact us.</p>
<h2>Use and processing of collected information</h2>
<p>In order to make the Website and Services available to you, or to meet a legal obligation, we need to collect and use certain Personal Information. If you do not provide the information that we request, we may not be able to provide you with the requested products or services. Any of the information we collect from you may be used for the following purposes:</p>
<ul>
<li>Create and manage user accounts</li>
<li>Send administrative information</li>
<li>Request user feedback</li>
<li>Improve user experience</li>
<li>Enforce terms and conditions and policies</li>
<li>Run and operate the Website and Services</li>
</ul>
<p>Processing your Personal Information depends on how you interact with the Website and Services, where you are located in the world and if one of the following applies: (i) you have given your consent for one or more specific purposes; this, however, does not apply, whenever the processing of Personal Information is subject to European data protection law; (ii) provision of information is necessary for the performance of an agreement with you and/or for any pre-contractual obligations thereof; (iii) processing is necessary for compliance with a legal obligation to which you are subject; (iv) processing is related to a task that is carried out in the public interest or in the exercise of official authority vested in us; (v) processing is necessary for the purposes of the legitimate interests pursued by us or by a third party.</p>
<p> Note that under some legislations we may be allowed to process information until you object to such processing (by opting out), without having to rely on consent or any other of the following legal bases below. In any case, we will be happy to clarify the specific legal basis that applies to the processing, and in particular whether the provision of Personal Information is a statutory or contractual requirement, or a requirement necessary to enter into a contract.</p>
<h2>Managing information</h2>
<p>You are able to delete certain Personal Information we have about you. The Personal Information you can delete may change as the Website and Services change. When you delete Personal Information, however, we may maintain a copy of the unrevised Personal Information in our records for the duration necessary to comply with our obligations to our affiliates and partners, and for the purposes described below. If you would like to delete your Personal Information or permanently delete your account, you can do so by contacting us.</p>
<h2>Disclosure of information</h2>
<p> Depending on the requested Services or as necessary to complete any transaction or provide any service you have requested, we may share your information with your consent with our trusted third parties that work with us, any other affiliates and subsidiaries we rely upon to assist in the operation of the Website and Services available to you. We do not share Personal Information with unaffiliated third parties. These service providers are not authorized to use or disclose your information except as necessary to perform services on our behalf or comply with legal requirements. We may share your Personal Information for these purposes only with third parties whose privacy policies are consistent with ours or who agree to abide by our policies with respect to Personal Information. These third parties are given Personal Information they need only in order to perform their designated functions, and we do not authorize them to use or disclose Personal Information for their own marketing or other purposes.</p>
<p>We will disclose any Personal Information we collect, use or receive if required or permitted by law, such as to comply with a subpoena, or similar legal process, and when we believe in good faith that disclosure is necessary to protect our rights, protect your safety or the safety of others, investigate fraud, or respond to a government request.</p>
<h2>Retention of information</h2>
<p>We will retain and use your Personal Information for the period necessary to comply with our legal obligations, resolve disputes, and enforce our agreements unless a longer retention period is required or permitted by law. We may use any aggregated data derived from or incorporating your Personal Information after you update or delete it, but not in a manner that would identify you personally. Once the retention period expires, Personal Information shall be deleted. Therefore, the right to access, the right to erasure, the right to rectification and the right to data portability cannot be enforced after the expiration of the retention period.</p>
<h2>The rights of users</h2>
<p>You may exercise certain rights regarding your information processed by us. In particular, you have the right to do the following: (i) you have the right to withdraw consent where you have previously given your consent to the processing of your information; (ii) you have the right to object to the processing of your information if the processing is carried out on a legal basis other than consent; (iii) you have the right to learn if information is being processed by us, obtain disclosure regarding certain aspects of the processing and obtain a copy of the information undergoing processing; (iv) you have the right to verify the accuracy of your information and ask for it to be updated or corrected; (v) you have the right, under certain circumstances, to restrict the processing of your information, in which case, we will not process your information for any purpose other than storing it; (vi) you have the right, under certain circumstances, to obtain the erasure of your Personal Information from us; (vii) you have the right to receive your information in a structured, commonly used and machine readable format and, if technically feasible, to have it transmitted to another controller without any hindrance. This provision is applicable provided that your information is processed by automated means and that the processing is based on your consent, on a contract which you are part of or on pre-contractual obligations thereof.</p>
<h2>Privacy of children</h2>
<p>We do not knowingly collect any Personal Information from children under the age of 18. If you are under the age of 18, please do not submit any Personal Information through the Website and Services. We encourage parents and legal guardians to monitor their children\'s Internet usage and to help enforce this Policy by instructing their children never to provide Personal Information through the Website and Services without their permission. If you have reason to believe that a child under the age of 18 has provided Personal Information to us through the Website and Services, please contact us. You must also be old enough to consent to the processing of your Personal Information in your country (in some countries we may allow your parent or guardian to do so on your behalf).</p>
<h2>Cookies</h2>
<p>The Website and Services use &quot;cookies&quot; to help personalize your online experience. A cookie is a text file that is placed on your hard disk by a web page server. Cookies cannot be used to run programs or deliver viruses to your computer. Cookies are uniquely assigned to you, and can only be read by a web server in the domain that issued the cookie to you.</p>
<p>We may use cookies to collect, store, and track information for statistical purposes to operate the Website and Services. You have the ability to accept or decline cookies. Most web browsers automatically accept cookies, but you can usually modify your browser setting to decline cookies if you prefer. To learn more about cookies and how to manage them, visit <a target="_blank" href="https://www.internetcookies.org">internetcookies.org</a></p>
<h2>Do Not Track signals</h2>
<p>Some browsers incorporate a Do Not Track feature that signals to websites you visit that you do not want to have your online activity tracked. Tracking is not the same as using or collecting information in connection with a website. For these purposes, tracking refers to collecting personally identifiable information from consumers who use or visit a website or online service as they move across different websites over time. How browsers communicate the Do Not Track signal is not yet uniform. As a result, the Website and Services are not yet set up to interpret or respond to Do Not Track signals communicated by your browser. Even so, as described in more detail throughout this Policy, we limit our use and collection of your personal information.</p>
<h2>Email marketing</h2>
<p>We offer electronic newsletters to which you may voluntarily subscribe at any time. We are committed to keeping your e-mail address confidential and will not disclose your email address to any third parties except as allowed in the information use and processing section or for the purposes of utilizing a third party provider to send such emails. We will maintain the information sent via e-mail in accordance with applicable laws and regulations.</p>
<p>In compliance with the CAN-SPAM Act, all e-mails sent from us will clearly state who the e-mail is from and provide clear information on how to contact the sender. You may choose to stop receiving our newsletter or marketing emails by following the unsubscribe instructions included in these emails or by contacting us. However, you will continue to receive essential transactional emails.</p>
<h2>Links to other resources</h2>
<p>The Website and Services contain links to other resources that are not owned or controlled by us. Please be aware that we are not responsible for the privacy practices of such other resources or third parties. We encourage you to be aware when you leave the Website and Services and to read the privacy statements of each and every resource that may collect Personal Information.</p>
<h2>Information security</h2>
<p>We secure information you provide on computer servers in a controlled, secure environment, protected from unauthorized access, use, or disclosure. We maintain reasonable administrative, technical, and physical safeguards in an effort to protect against unauthorized access, use, modification, and disclosure of Personal Information in its control and custody. However, no data transmission over the Internet or wireless network can be guaranteed. Therefore, while we strive to protect your Personal Information, you acknowledge that (i) there are security and privacy limitations of the Internet which are beyond our control; (ii) the security, integrity, and privacy of any and all information and data exchanged between you and the Website and Services cannot be guaranteed; and (iii) any such information and data may be viewed or tampered with in transit by a third party, despite best efforts.</p>
<h2>Data breach</h2>
<p>In the event we become aware that the security of the Website and Services has been compromised or users Personal Information has been disclosed to unrelated third parties as a result of external activity, including, but not limited to, security attacks or fraud, we reserve the right to take reasonably appropriate measures, including, but not limited to, investigation and reporting, as well as notification to and cooperation with law enforcement authorities. In the event of a data breach, we will make reasonable efforts to notify affected individuals if we believe that there is a reasonable risk of harm to the user as a result of the breach or if notice is otherwise required by law. When we do, we will post a notice on the Website, send you an email.</p>
<h2>Changes and amendments</h2>
<p>We reserve the right to modify this Policy or its terms relating to the Website and Services from time to time in our discretion and will notify you of any material changes to the way in which we treat Personal Information. When we do, we will post a notification on the main page of the Website. We may also provide notice to you in other ways in our discretion, such as through contact information you have provided. Any updated version of this Policy will be effective immediately upon the posting of the revised Policy unless otherwise specified. Your continued use of the Website and Services after the effective date of the revised Policy (or such other act specified at that time) will constitute your consent to those changes. However, we will not, without your consent, use your Personal Information in a manner materially different than what was stated at the time your Personal Information was collected. Policy was created with <a style="color:inherit" target="_blank" href="https://www.websitepolicies.com/privacy-policy-generator">WebsitePolicies</a>.</p>
<h2>Acceptance of this policy</h2>
<p>You acknowledge that you have read this Policy and agree to all its terms and conditions. By accessing and using the Website and Services you agree to be bound by this Policy. If you do not agree to abide by the terms of this Policy, you are not authorized to access or use the Website and Services.</p>
<h2>Contacting us</h2>
<p>If you would like to contact us to understand more about this Policy or wish to contact us concerning any matter relating to individual rights and your Personal Information, you may do so via the <a target="_blank" rel="nofollow" href="http://superio.test/contact">contact form</a></p>
<p>This document was last updated on October 6, 2020</p>';
        $a->save();

        DB::table('core_settings')->insert([
            [
                'name'  => 'home_page_id',
                'val'   => '4',
                'group' => "general",
            ],
            [
                'name'  => 'terms_and_conditions_id',
                'val'   => '2',
                'group' => "general",
            ],
            [
                'name'  => 'page_contact_title',
                'val'   => "Contact Us",
                'group' => "general",
            ],
            [
                'name'  => 'page_contact_lists',
                'val'   => '[{"title":"Address","desc":"329 Queensberry Street, North Melbourne VIC 3051, Australia.","icon":"'.$contact_image['img_1'].'"},{"title":"Call Us","desc":"<a href=\"#\" class=\"phone\">123 456 7890<\/a>","icon":"'.$contact_image['img_2'].'"},{"title":"Email","desc":"<a href=\"#\">contact.london@example.com<\/a>","icon":"'.$contact_image['img_3'].'"}]',
                'group' => "general",
            ],
            [
                'name'  => 'page_contact_iframe_google_map',
                'val'   => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835253576489!2d144.95372995111143!3d-37.817327679652266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4c2b349649%3A0xb6899234e561db11!2sEnvato!5e0!3m2!1sen!2sin!4v1581584770980!5m2!1sen!2sin" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen=""></iframe>',
                'group' => "general",
            ],
            [
                'name'  => 'contact_call_to_action_title',
                'val'   => 'Recruiting?',
                'group' => "general",
            ],
            [
                'name'  => 'contact_call_to_action_sub_title',
                'val'   => 'Advertise your jobs to millions of monthly users and search 15.8 million <br> CVs in our database.',
                'group' => "general",
            ],
            [
                'name'  => 'contact_call_to_action_button_text',
                'val'   => 'Start Recruiting Now',
                'group' => "general",
            ],
            [
                'name'  => 'contact_call_to_action_button_link',
                'val'   => '#',
                'group' => "general",
            ],
            [
                'name'  => 'contact_call_to_action_image',
                'val'   => MediaFile::findMediaByName('image-1')->id,
                'group' => "general",
            ],
        ]);

        // Setting Currency
        DB::table('core_settings')->insert([
                [
                    'name'  => "currency_main",
                    'val'   => "usd",
                    'group' => "payment",
                ],
                [
                    'name'  => "currency_format",
                    'val'   => "left",
                    'group' => "payment",
                ],
                [
                    'name'  => "currency_decimal",
                    'val'   => ",",
                    'group' => "payment",
                ],
                [
                    'name'  => "currency_thousand",
                    'val'   => ".",
                    'group' => "payment",
                ],
                [
                    'name'  => "currency_no_decimal",
                    'val'   => "0",
                    'group' => "payment",
                ],
                [
                    'name'  => "extra_currency",
                    'val'   => '[{"currency_main":"eur","currency_format":"left","currency_thousand":".","currency_decimal":",","currency_no_decimal":"2","rate":"0.902807"},{"currency_main":"jpy","currency_format":"right_space","currency_thousand":".","currency_decimal":",","currency_no_decimal":"0","rate":"0.00917113"}]',
                    'group' => "payment",
                ]
            ]);

        //MAP
        DB::table('core_settings')->insert([
                [
                    'name'  => 'map_provider',
                    'val'   => 'gmap',
                    'group' => "advance",
                ],
                [
                    'name'  => 'map_gmap_key',
                    'val'   => '',
                    'group' => "advance",
                ]
            ]);

        // Payment Gateways
        DB::table('core_settings')->insert([
                [
                    'name'  => "g_offline_payment_enable",
                    'val'   => "1",
                    'group' => "payment",
                ],
                [
                    'name'  => "g_offline_payment_name",
                    'val'   => "Offline Payment",
                    'group' => "payment",
                ]
            ]);

        // Settings general
        DB::table('core_settings')->insert([
                [
                    'name'  => "date_format",
                    'val'   => "m/d/Y",
                    'group' => "general",
                ]
            ]);

        // Email general
        DB::table('core_settings')->insert([
                [
                    'name'  => "site_timezone",
                    'val'   => "UTC",
                    'group' => "general",
                ],
                [
                    'name'  => "site_title",
                    'val'   => "Superio",
                    'group' => "general",
                ],
                [
                    'name'  => "email_header",
                    'val'   => '<h1 class="site-title" style="text-align: center">Superio</h1>',
                    'group' => "general",
                ],
                [
                    'name'  => "email_footer",
                    'val'   => '<p class="" style="text-align: center">&copy; 2021 Superio. All rights reserved</p>',
                    'group' => "general",
                ],
                [
                    'name' => 'enable_preloader',
                    'val' => 1,
                    'group' => "general"
                ],
                [
                    'name'  => "enable_mail_user_registered",
                    'val'   => 1,
                    'group' => "user",
                ],
                [
                    'name'  => "user_content_email_registered",
                    'val'   => '<h1 style="text-align: center">Welcome!</h1>
                    <h3>Hello [first_name] [last_name]</h3>
                    <p>Thank you for signing up with Superio! We hope you enjoy your time with us.</p>
                    <p>Regards,</p>
                    <p>Superio</p>',
                    'group' => "user",
                ],
                [
                    'name'  => "admin_enable_mail_user_registered",
                    'val'   => 1,
                    'group' => "user",
                ],
                [
                    'name'  => "admin_content_email_user_registered",
                    'val'   => '<h3>Hello Administrator</h3>
                    <p>We have new registration</p>
                    <p>Full name: [first_name] [last_name]</p>
                    <p>Email: [email]</p>
                    <p>Regards,</p>
                    <p>Superio</p>',
                    'group' => "user",
                ],
                [
                    'name'  => "user_content_email_forget_password",
                    'val'   => '<h1>Hello!</h1>
                    <p>You are receiving this email because we received a password reset request for your account.</p>
                    <p style="text-align: center">[button_reset_password]</p>
                    <p>This password reset link expire in 60 minutes.</p>
                    <p>If you did not request a password reset, no further action is required.
                    </p>
                    <p>Regards,</p>
                    <p>Superio</p>',
                    'group' => "user",
                ]
            ]);
        // Email Setting
        DB::table('core_settings')->insert([
                [
                    'name'  => "email_driver",
                    'val'   => "log",
                    'group' => "email",
                ],
                [
                    'name'  => "email_host",
                    'val'   => "smtp.mailgun.org",
                    'group' => "email",
                ],
                [
                    'name'  => "email_port",
                    'val'   => "587",
                    'group' => "email",
                ],
                [
                    'name'  => "email_encryption",
                    'val'   => "tls",
                    'group' => "email",
                ],
                [
                    'name'  => "email_username",
                    'val'   => "",
                    'group' => "email",
                ],
                [
                    'name'  => "email_password",
                    'val'   => "",
                    'group' => "email",
                ],
                [
                    'name'  => "email_mailgun_domain",
                    'val'   => "",
                    'group' => "email",
                ],
                [
                    'name'  => "email_mailgun_secret",
                    'val'   => "",
                    'group' => "email",
                ],
                [
                    'name'  => "email_mailgun_endpoint",
                    'val'   => "api.mailgun.net",
                    'group' => "email",
                ],
                [
                    'name'  => "email_postmark_token",
                    'val'   => "",
                    'group' => "email",
                ],
                [
                    'name'  => "email_ses_key",
                    'val'   => "",
                    'group' => "email",
                ],
                [
                    'name'  => "email_ses_secret",
                    'val'   => "",
                    'group' => "email",
                ],
                [
                    'name'  => "email_ses_region",
                    'val'   => "us-east-1",
                    'group' => "email",
                ],
                [
                    'name'  => "email_sparkpost_secret",
                    'val'   => "",
                    'group' => "email",
                ],
            ]);
        // Email Setting
        DB::table('core_settings')->insert([
            [
                'name'  => "content_email_apply_job_submit",
                'val'   => "<h3>Hello [employer_name],</h3>
                            <p>A candidate apply for your job:</p>
                            <p>Candidate Name: [candidate_name]</p>
                            <p>Message: [message]</p>
                            <p>Regards,</p>
                            <p>Superio</p>",
                'group' => "email",
            ],
            [
                'name'  => "content_email_change_applicants_status",
                'val'   => "<h3>Hello [candidate_name],</h3>
                            <p>Employer [applicants_status] you from job [job_title]</p>
                            <p>Regards,</p>
                            <p>Superio</p>",
                'group' => "email",
            ]
        ]);

        //            Cookie agreement
        DB::table('core_settings')->insert([
                [
                    'name'  => "cookie_agreement_enable",
                    'val'   => "1",
                    'group' => "advance",
                ],
                [
                    'name'  => "cookie_agreement_button_text",
                    'val'   => "Got it",
                    'group' => "advance",
                ],
                [
                    'name'  => "cookie_agreement_content",
                    'val'   => "<p>This website requires cookies to provide all of its features. By using our website, you agree to our use of cookies. <a href='#'>More info</a></p>",
                    'group' => "advance",
                ],
            ]);
        // Invoice setting
        DB::table('core_settings')->insert([
            [
                'name'  => 'booking_why_book_with_us',
                'val'   => '[{"title":"No-hassle best price guarantee","link":"#","icon":"flaticon-star"},{"title":"Customer care available 24\/7","link":"#","icon":"flaticon-support"},{"title":"Hand-picked Tours & Activities","link":"#","icon":"flaticon-favorites-button"},{"title":"Free Travel Insureance","link":"#","icon":"flaticon-airplane"}]',
                'group' => "booking",
            ],
            [
                'name'  => 'logo_invoice_id',
                'val'   => MediaFile::findMediaByName("logo")->id,
                'group' => "booking",
            ],
            [
                'name'  => "invoice_company_info",
                'val'   => "<p><span style=\"font-size: 14pt;\"><strong>Superio Company</strong></span></p>
                                <p>Ha Noi, Viet Nam</p>
                                <p>www.superio.test</p>",
                'group' => "booking",
            ],
        ]);

        setting_update_item('vendor_commission_type','percent');
        setting_update_item('vendor_commission_amount',10);
    }
}
