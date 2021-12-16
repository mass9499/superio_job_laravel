<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Job\Models\Job;
use Modules\Media\Models\MediaFile;
use Modules\Skill\Models\Skill;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $job_types = [
            'Freelance', 'Full Time', 'Internship', 'Part Time', 'Temporary'
        ];
        foreach ($job_types as $job_type){
            DB::table('bc_job_types')->insert(['name' => $job_type, 'status' => 'publish', 'created_at'  => date("Y-m-d H:i:s")]);
        }

        $IDs = [];

        $IDs[] = DB::table('bc_jobs')->insertGetId([
            'title' => 'Product Manager, Studio',
            'slug' => 'product-manager-studio',
            'content' => '<h4>Job Description</h4>
                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>
                            <h4>Key Responsibilities</h4>
                            <ul class="list-style-three">
                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>
                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>
                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>
                                <li>Accurately estimate design tickets during planning sessions.</li>
                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>
                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>
                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>
                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>
                            </ul>
                            <h4>Skill &amp; Experience</h4>
                            <ul class="list-style-three">
                                <li>You have at least 3 years’ experience working as a Product Designer.</li>
                                <li>You have experience using Sketch and InVision or Framer X</li>
                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>
                                <li>You are familiar using Jira and Confluence in your workflow</li>
                            </ul>',
            'category_id' => 8,
            'thumbnail_id' => '',
            'location_id' => rand(1, 5),
            'create_user' => 1,
            'company_id' => 1,
            'job_type_id' => rand(1, 5),
            'expiration_date' => date('Y-m-d H:i:s', strtotime('500 day')),
            'hours' => '30h',
            'hours_type' => 'week',
            'salary_type' => 'monthly',
            'salary_min' => 4500,
            'salary_max' => 6000,
            'gender' => 'Both',
            'map_lat' => '30.918411906603435',
            'map_lng' => '-114.72952493625287',
            'map_zoom' => '16',
            'experience' => 2,
            'is_featured' => 1,
            'is_urgent' => 0,
            'status' => 'publish',
            'created_at' =>  date("Y-m-d H:i:s")
        ]);

        $IDs[] = DB::table('bc_jobs')->insertGetId([
            'title' => 'Recruiting Coordinator',
            'slug' => 'recruiting-coordinator',
            'content' => '<h4>Job Description</h4>
                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>
                            <h4>Key Responsibilities</h4>
                            <ul class="list-style-three">
                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>
                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>
                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>
                                <li>Accurately estimate design tickets during planning sessions.</li>
                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>
                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>
                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>
                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>
                            </ul>
                            <h4>Skill &amp; Experience</h4>
                            <ul class="list-style-three">
                                <li>You have at least 3 years’ experience working as a Product Designer.</li>
                                <li>You have experience using Sketch and InVision or Framer X</li>
                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>
                                <li>You are familiar using Jira and Confluence in your workflow</li>
                            </ul>',
            'category_id' => 5,
            'thumbnail_id' => '',
            'location_id' => rand(1, 5),
            'create_user' => 1,
            'company_id' => 1,
            'job_type_id' => rand(1, 5),
            'expiration_date' => date('Y-m-d H:i:s', strtotime('500 day')),
            'hours' => '30h',
            'hours_type' => 'week',
            'salary_type' => 'monthly',
            'salary_min' => 4500,
            'salary_max' => 6000,
            'gender' => 'Both',
            'map_lat' => '30.918411906603435',
            'map_lng' => '-114.72952493625287',
            'map_zoom' => '16',
            'experience' => 2,
            'is_featured' => 0,
            'is_urgent' => 1,
            'status' => 'publish',
            'created_at' =>  date("Y-m-d H:i:s")
        ]);

        $IDs[] = DB::table('bc_jobs')->insertGetId([
            'title' => 'Senior Product Designer',
            'slug' => 'senior-product-designer',
            'content' => '<h4>Job Description</h4>
                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>
                            <h4>Key Responsibilities</h4>
                            <ul class="list-style-three">
                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>
                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>
                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>
                                <li>Accurately estimate design tickets during planning sessions.</li>
                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>
                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>
                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>
                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>
                            </ul>
                            <h4>Skill &amp; Experience</h4>
                            <ul class="list-style-three">
                                <li>You have at least 3 years’ experience working as a Product Designer.</li>
                                <li>You have experience using Sketch and InVision or Framer X</li>
                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>
                                <li>You are familiar using Jira and Confluence in your workflow</li>
                            </ul>',
            'category_id' => 3,
            'thumbnail_id' => '',
            'location_id' => rand(1, 5),
            'create_user' => 1,
            'company_id' => 2,
            'job_type_id' => rand(1, 5),
            'expiration_date' => date('Y-m-d H:i:s', strtotime('500 day')),
            'hours' => '30h',
            'hours_type' => 'week',
            'salary_type' => 'monthly',
            'salary_min' => 4500,
            'salary_max' => 6000,
            'gender' => 'Both',
            'map_lat' => '30.918411906603435',
            'map_lng' => '-114.72952493625287',
            'map_zoom' => '16',
            'experience' => 2,
            'is_featured' => 1,
            'is_urgent' => 1,
            'status' => 'publish',
            'created_at' =>  date("Y-m-d H:i:s")
        ]);

        $IDs[] = DB::table('bc_jobs')->insertGetId([
            'title' => 'Senior Full Stack Engineer, Creator Success',
            'slug' => 'senior-full-stack-engineer-creator-success',
            'content' => '<h4>Job Description</h4>
                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>
                            <h4>Key Responsibilities</h4>
                            <ul class="list-style-three">
                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>
                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>
                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>
                                <li>Accurately estimate design tickets during planning sessions.</li>
                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>
                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>
                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>
                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>
                            </ul>
                            <h4>Skill &amp; Experience</h4>
                            <ul class="list-style-three">
                                <li>You have at least 3 years’ experience working as a Product Designer.</li>
                                <li>You have experience using Sketch and InVision or Framer X</li>
                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>
                                <li>You are familiar using Jira and Confluence in your workflow</li>
                            </ul>',
            'category_id' => 4,
            'thumbnail_id' => '',
            'location_id' => rand(1, 5),
            'create_user' => 1,
            'company_id' => 3,
            'job_type_id' => rand(1, 5),
            'expiration_date' => date('Y-m-d H:i:s', strtotime('500 day')),
            'hours' => '30h',
            'hours_type' => 'week',
            'salary_type' => 'monthly',
            'salary_min' => 4500,
            'salary_max' => 6000,
            'gender' => 'Both',
            'map_lat' => '30.918411906603435',
            'map_lng' => '-114.72952493625287',
            'map_zoom' => '16',
            'experience' => 2,
            'is_featured' => 1,
            'is_urgent' => 0,
            'status' => 'publish',
            'created_at' =>  date("Y-m-d H:i:s")
        ]);

        $IDs[] = DB::table('bc_jobs')->insertGetId([
            'title' => 'General Ledger Accountant',
            'slug' => 'general-ledger-accountant',
            'content' => '<h4>Job Description</h4>
                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>
                            <h4>Key Responsibilities</h4>
                            <ul class="list-style-three">
                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>
                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>
                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>
                                <li>Accurately estimate design tickets during planning sessions.</li>
                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>
                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>
                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>
                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>
                            </ul>
                            <h4>Skill &amp; Experience</h4>
                            <ul class="list-style-three">
                                <li>You have at least 3 years’ experience working as a Product Designer.</li>
                                <li>You have experience using Sketch and InVision or Framer X</li>
                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>
                                <li>You are familiar using Jira and Confluence in your workflow</li>
                            </ul>',
            'category_id' => 1,
            'thumbnail_id' => '',
            'location_id' => rand(1, 5),
            'create_user' => 1,
            'company_id' => 4,
            'job_type_id' => rand(1, 5),
            'expiration_date' => date('Y-m-d H:i:s', strtotime('500 day')),
            'hours' => '30h',
            'hours_type' => 'week',
            'salary_type' => 'monthly',
            'salary_min' => 4500,
            'salary_max' => 6000,
            'gender' => 'Both',
            'map_lat' => '30.918411906603435',
            'map_lng' => '-114.72952493625287',
            'map_zoom' => '16',
            'experience' => 2,
            'is_featured' => 0,
            'is_urgent' => 0,
            'status' => 'publish',
            'created_at' =>  date("Y-m-d H:i:s")
        ]);

        $IDs[] = DB::table('bc_jobs')->insertGetId([
            'title' => 'Assistant / Store Keeper',
            'slug' => 'assistant-store-keeper',
            'content' => '<h4>Job Description</h4>
                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>
                            <h4>Key Responsibilities</h4>
                            <ul class="list-style-three">
                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>
                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>
                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>
                                <li>Accurately estimate design tickets during planning sessions.</li>
                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>
                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>
                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>
                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>
                            </ul>
                            <h4>Skill &amp; Experience</h4>
                            <ul class="list-style-three">
                                <li>You have at least 3 years’ experience working as a Product Designer.</li>
                                <li>You have experience using Sketch and InVision or Framer X</li>
                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>
                                <li>You are familiar using Jira and Confluence in your workflow</li>
                            </ul>',
            'category_id' => 9,
            'thumbnail_id' => '',
            'location_id' => rand(1, 5),
            'create_user' => 1,
            'company_id' => 1,
            'job_type_id' => rand(1, 5),
            'expiration_date' => date('Y-m-d H:i:s', strtotime('500 day')),
            'hours' => '30h',
            'hours_type' => 'week',
            'salary_type' => 'monthly',
            'salary_min' => 4500,
            'salary_max' => 6000,
            'gender' => 'Both',
            'map_lat' => '30.918411906603435',
            'map_lng' => '-114.72952493625287',
            'map_zoom' => '16',
            'experience' => 2,
            'is_featured' => 1,
            'is_urgent' => 0,
            'status' => 'publish',
            'created_at' =>  date("Y-m-d H:i:s")
        ]);

        $IDs[] = DB::table('bc_jobs')->insertGetId([
            'title' => 'Product Sales Specialist',
            'slug' => 'product-sales-specialist',
            'content' => '<h4>Job Description</h4>
                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>
                            <h4>Key Responsibilities</h4>
                            <ul class="list-style-three">
                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>
                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>
                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>
                                <li>Accurately estimate design tickets during planning sessions.</li>
                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>
                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>
                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>
                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>
                            </ul>
                            <h4>Skill &amp; Experience</h4>
                            <ul class="list-style-three">
                                <li>You have at least 3 years’ experience working as a Product Designer.</li>
                                <li>You have experience using Sketch and InVision or Framer X</li>
                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>
                                <li>You are familiar using Jira and Confluence in your workflow</li>
                            </ul>',
            'category_id' => 2,
            'thumbnail_id' => '',
            'location_id' => rand(1, 5),
            'create_user' => 1,
            'company_id' => 5,
            'job_type_id' => rand(1, 5),
            'expiration_date' => date('Y-m-d H:i:s', strtotime('500 day')),
            'hours' => '30h',
            'hours_type' => 'week',
            'salary_type' => 'monthly',
            'salary_min' => 4500,
            'salary_max' => 6000,
            'gender' => 'Both',
            'map_lat' => '30.918411906603435',
            'map_lng' => '-114.72952493625287',
            'map_zoom' => '16',
            'experience' => 2,
            'is_featured' => 0,
            'is_urgent' => 0,
            'status' => 'publish',
            'created_at' =>  date("Y-m-d H:i:s")
        ]);

        $IDs[] = DB::table('bc_jobs')->insertGetId([
            'title' => 'Executive, HR Operations',
            'slug' => 'executive-hr-operations',
            'content' => '<h4>Job Description</h4>
                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>
                            <h4>Key Responsibilities</h4>
                            <ul class="list-style-three">
                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>
                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>
                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>
                                <li>Accurately estimate design tickets during planning sessions.</li>
                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>
                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>
                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>
                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>
                            </ul>
                            <h4>Skill &amp; Experience</h4>
                            <ul class="list-style-three">
                                <li>You have at least 3 years’ experience working as a Product Designer.</li>
                                <li>You have experience using Sketch and InVision or Framer X</li>
                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>
                                <li>You are familiar using Jira and Confluence in your workflow</li>
                            </ul>',
            'category_id' => 5,
            'thumbnail_id' => '',
            'location_id' => rand(1, 5),
            'create_user' => 1,
            'company_id' => 1,
            'job_type_id' => rand(1, 5),
            'expiration_date' => date('Y-m-d H:i:s', strtotime('500 day')),
            'hours' => '30h',
            'hours_type' => 'week',
            'salary_type' => 'monthly',
            'salary_min' => 4500,
            'salary_max' => 6000,
            'gender' => 'Both',
            'map_lat' => '30.918411906603435',
            'map_lng' => '-114.72952493625287',
            'map_zoom' => '16',
            'experience' => 2,
            'is_featured' => 0,
            'is_urgent' => 0,
            'status' => 'publish',
            'created_at' =>  date("Y-m-d H:i:s")
        ]);

        $IDs[] = DB::table('bc_jobs')->insertGetId([
            'title' => 'Restaurant Team Member',
            'slug' => 'restaurant-team-member',
            'content' => '<h4>Job Description</h4>
                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>
                            <h4>Key Responsibilities</h4>
                            <ul class="list-style-three">
                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>
                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>
                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>
                                <li>Accurately estimate design tickets during planning sessions.</li>
                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>
                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>
                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>
                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>
                            </ul>
                            <h4>Skill &amp; Experience</h4>
                            <ul class="list-style-three">
                                <li>You have at least 3 years’ experience working as a Product Designer.</li>
                                <li>You have experience using Sketch and InVision or Framer X</li>
                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>
                                <li>You are familiar using Jira and Confluence in your workflow</li>
                            </ul>',
            'category_id' => 7,
            'thumbnail_id' => '',
            'location_id' => rand(1, 5),
            'create_user' => 1,
            'company_id' => 3,
            'job_type_id' => rand(1, 5),
            'expiration_date' => date('Y-m-d H:i:s', strtotime('500 day')),
            'hours' => '30h',
            'hours_type' => 'week',
            'salary_type' => 'monthly',
            'salary_min' => 4500,
            'salary_max' => 6000,
            'gender' => 'Both',
            'map_lat' => '30.918411906603435',
            'map_lng' => '-114.72952493625287',
            'map_zoom' => '16',
            'experience' => 2,
            'is_featured' => 1,
            'is_urgent' => 1,
            'status' => 'publish',
            'created_at' =>  date("Y-m-d H:i:s")
        ]);

        $IDs[] = DB::table('bc_jobs')->insertGetId([
            'title' => 'Group Marketing Manager',
            'slug' => 'group-marketing-manager',
            'content' => '<h4>Job Description</h4>
                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>
                            <h4>Key Responsibilities</h4>
                            <ul class="list-style-three">
                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>
                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>
                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>
                                <li>Accurately estimate design tickets during planning sessions.</li>
                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>
                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>
                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>
                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>
                            </ul>
                            <h4>Skill &amp; Experience</h4>
                            <ul class="list-style-three">
                                <li>You have at least 3 years’ experience working as a Product Designer.</li>
                                <li>You have experience using Sketch and InVision or Framer X</li>
                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>
                                <li>You are familiar using Jira and Confluence in your workflow</li>
                            </ul>',
            'category_id' => 2,
            'thumbnail_id' => '',
            'location_id' => rand(1, 5),
            'create_user' => 1,
            'company_id' => 1,
            'job_type_id' => rand(1, 5),
            'expiration_date' => date('Y-m-d H:i:s', strtotime('500 day')),
            'hours' => '30h',
            'hours_type' => 'week',
            'salary_type' => 'monthly',
            'salary_min' => 4500,
            'salary_max' => 6000,
            'gender' => 'Both',
            'map_lat' => '30.918411906603435',
            'map_lng' => '-114.72952493625287',
            'map_zoom' => '16',
            'experience' => 2,
            'is_featured' => 0,
            'is_urgent' => 0,
            'status' => 'publish',
            'created_at' =>  date("Y-m-d H:i:s")
        ]);

        $IDs[] = DB::table('bc_jobs')->insertGetId([
            'title' => 'Software Engineer (Android), Libraries',
            'slug' => 'software-engineer-android-lib',
            'content' => '<h4>Job Description</h4>
                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>
                            <h4>Key Responsibilities</h4>
                            <ul class="list-style-three">
                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>
                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>
                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>
                                <li>Accurately estimate design tickets during planning sessions.</li>
                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>
                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>
                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>
                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>
                            </ul>
                            <h4>Skill &amp; Experience</h4>
                            <ul class="list-style-three">
                                <li>You have at least 3 years’ experience working as a Product Designer.</li>
                                <li>You have experience using Sketch and InVision or Framer X</li>
                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>
                                <li>You are familiar using Jira and Confluence in your workflow</li>
                            </ul>',
            'category_id' => 4,
            'thumbnail_id' => '',
            'location_id' => rand(1, 5),
            'create_user' => 1,
            'company_id' => 4,
            'job_type_id' => rand(1, 5),
            'expiration_date' => date('Y-m-d H:i:s', strtotime('500 day')),
            'hours' => '30h',
            'hours_type' => 'week',
            'salary_type' => 'monthly',
            'salary_min' => 2500,
            'salary_max' => 3500,
            'gender' => 'Both',
            'map_lat' => '30.918411906603435',
            'map_lng' => '-114.72952493625287',
            'map_zoom' => '16',
            'experience' => 2,
            'is_featured' => 1,
            'is_urgent' => 0,
            'status' => 'publish',
            'created_at' =>  date("Y-m-d H:i:s")
        ]);

        $IDs[] = DB::table('bc_jobs')->insertGetId([
            'title' => 'Product Designer / UI Designer',
            'slug' => 'product-designer-ui-designer',
            'content' => '<h4>Job Description</h4>
                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>
                            <h4>Key Responsibilities</h4>
                            <ul class="list-style-three">
                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>
                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>
                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>
                                <li>Accurately estimate design tickets during planning sessions.</li>
                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>
                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>
                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>
                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>
                            </ul>
                            <h4>Skill &amp; Experience</h4>
                            <ul class="list-style-three">
                                <li>You have at least 3 years’ experience working as a Product Designer.</li>
                                <li>You have experience using Sketch and InVision or Framer X</li>
                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>
                                <li>You are familiar using Jira and Confluence in your workflow</li>
                            </ul>',
            'category_id' => 3,
            'thumbnail_id' => '',
            'location_id' => rand(1, 5),
            'create_user' => 1,
            'company_id' => 1,
            'job_type_id' => rand(1, 5),
            'expiration_date' => date('Y-m-d H:i:s', strtotime('500 day')),
            'hours' => '30h',
            'hours_type' => 'week',
            'salary_type' => 'monthly',
            'salary_min' => 800,
            'salary_max' => 3000,
            'gender' => 'Both',
            'map_lat' => '30.918411906603435',
            'map_lng' => '-114.72952493625287',
            'map_zoom' => '16',
            'experience' => 2,
            'is_featured' => 1,
            'is_urgent' => 1,
            'status' => 'publish',
            'created_at' =>  date("Y-m-d H:i:s")
        ]);

        $skill_ids = [];
        $skills = ['app', 'administrative', 'android', 'wordpress', 'design', 'react', 'javascript', 'html'];

        foreach ($skills as $k=> $skill){
            $t = new Skill(['name' => $skill, 'status' => 'publish', 'created_at'  => date("Y-m-d H:i:s")]);
            $t->save();
            $skill_ids[] = $t->id;
        }

        foreach ($IDs as $job_id){
            foreach ($skill_ids as $k=> $skill_id) {

                if( rand(0 , count($skill_ids) ) == $k) continue;
                if( rand(0 , count($skill_ids) ) == $k) continue;
                if( rand(0 , count($skill_ids) ) == $k) continue;

                DB::table('bc_job_skills')->insert([
                    'job_id' => $job_id,
                    'skill_id' => $skill_id,
                    'created_at'  => date("Y-m-d H:i:s")
                ]);
            }
        }

        // Settings
        DB::table('core_settings')->insert(
            [
                [
                    'name' => 'job_page_search_title',
                    'val' => 'Find Jobs',
                    'group' => "job",
                ],
                [
                    'name' => 'job_page_search_title_ja',
                    'val' => '仕事を探す',
                    'group' => "job",
                ],
                [
                    'name' => 'jobs_list_layout',
                    'val' => 'job-list-v1',
                    'group' => "job",
                ],
                [
                    'name' => 'job_single_layout',
                    'val' => 'job-single-v1',
                    'group' => "job",
                ],
                [
                    'name' => 'job_sidebar_search_fields',
                    'val' => '[{"title":"Search by Keywords","type":"keyword","position":"1"},{"title":"Location","type":"location","position":"2"},{"title":"Category","type":"category","position":"3"},{"title":"Job type","type":"job_type","position":"4"},{"title":"Date Posted","type":"date_posted","position":"5"},{"title":"Experience Level","type":"experience","position":"6"},{"title":"Salary","type":"salary","position":"7"}]',
                    'group' => "job",
                ],
                [
                    'name' => 'job_sidebar_cta',
                    'val' => '{"title":"Recruiting?","desc":"Advertise your jobs to millions of monthly users and search 15.8 million CVs in our database.","button":{"url":"#","name":"Start Recruiting Now","target":"_blank"},"image":"'.MediaFile::findMediaByName("ads-bg-4")->id.'"}',
                    'group' => "job",
                ]
            ]
        );
    }
}
