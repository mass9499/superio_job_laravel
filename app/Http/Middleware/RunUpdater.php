<?php

    namespace App\Http\Middleware;

    use App\User;
    use Closure;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Artisan;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Schema;
    use Modules\Booking\Models\Service;
    use Modules\Booking\Models\ServiceTranslation;
    use Modules\Core\Models\Settings;
    use Modules\User\Helpers\PermissionHelper;
    use Modules\User\Models\Plan;

    class RunUpdater
    {
        /**
         * Handle an incoming request.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \Closure  $next
         * @return mixed
         */
        public function handle($request, Closure $next)
        {
            if (strpos($request->path(), 'install') === false && file_exists(storage_path().'/installed') and !app()->runningInConsole()) {

                $this->updateTo110();
                $this->updateGig();
                $this->updateTo120();

            }
            return $next($request);
        }

        public function updateTo120(){
            $version = '1.9';
            if (version_compare(setting_item('schema_120_version'), $version, '>=')) return;

            Artisan::call('migrate', [
                '--force' => true,
            ]);

            Schema::table('users', function (Blueprint $table) {
                if (!Schema::hasColumn('users', 'role_id')) {
                    $table->bigInteger('role_id')->nullable();
                }
            });

            if($admin = \Modules\User\Models\Role::query()->where('name','administrator')->first()){
                $admin->code = 'administrator';
                $admin->name = 'Administrator';
                $admin->save();
            }

            $admin->givePermission(PermissionHelper::all());

            if($employer = \Modules\User\Models\Role::query()->where('name','employer')->first()){
                $employer->code = 'employer';
                $employer->name = 'Employer';
                $employer->save();
            }
            if($candidate = \Modules\User\Models\Role::query()->where('name','candidate')->first()){
                $candidate->code = 'candidate';
                $candidate->name = 'Candidate';
                $candidate->save();
            }

            $employer->givePermission(['job_manage','employer_manage','media_upload']);
            $candidate->givePermission(['candidate_manage','media_upload','gig_manage']);

            if(Schema::hasTable('core_model_has_roles')) {
                $old_data = DB::table('core_model_has_roles')->get();
                foreach ($old_data as $item) {
                    User::query()->where('id', $item->model_id)->update(['role_id' => $item->role_id]);
                }
            }


            // User Plan
            $plans = [
                'Basic',
                'Standard',
                'Extended',
            ];
            $prices = [199,499,799];
            $count = [5,20,50];
            foreach ($plans as $k=>$plan){
                $a = new Plan();
                $data = [
                    'title'=>$plan,
                    'price'=>$prices[$k],
                    'duration'=>1,
                    'duration_type'=>'month',
                    'annual_price'=>$prices[$k] + 1000,
                    'is_recommended'=>$k == 1 ? 1 : 0,
                    'content'=>'<ul>
                                                <li><span>1 job posting</span></li>
                                                <li><span>0 featured job</span></li>
                                                <li><span>Job displayed for 20 days</span></li>
                                                <li><span>Premium Support 24/7 </span></li>
                                            </ul>',
                    'max_service'=>$count[$k],
                    'role_id'=>2,
                    'status'=>'publish'
                ];
                $a->fillByAttr(array_keys($data),$data);
                $a->save();
            }

            setting_update_item('schema_120_version',$version);
        }

        public function updateGig(){
            $version = '1.7';
            if (version_compare(setting_item('schema_gig_version'), $version, '>=')) return;

            Artisan::call('migrate', [
                '--force' => true,
            ]);

            Schema::table('users', function (Blueprint $table) {
                if (!Schema::hasColumn('users', 'billing_first_name')) {
                    $table->string('billing_first_name')->nullable();
                    $table->string('billing_last_name')->nullable();
                }
                if (!Schema::hasColumn('users', 'country')) {
                    $table->string('country',30)->nullable();
                    $table->string('state')->nullable();
                    $table->string('city')->nullable();
                    $table->string('zip_code')->nullable();
                    $table->string('address')->nullable();
                    $table->string('address2')->nullable();
                }

            });
            if(Schema::hasTable('bc_orders')) {
                Schema::table('bc_orders', function (Blueprint $table) {
                    if (!Schema::hasColumn('bc_orders', 'billing')) {
                        $table->text('billing')->nullable();
                    }
                });
            }
            if(Schema::hasTable('bc_order_items')) {
                Schema::table('bc_order_items', function (Blueprint $table) {
                    if (!Schema::hasColumn('bc_order_items', 'meta')) {
                        $table->text('meta')->nullable();
                    }
                });
            }

            if(Schema::hasTable('user_plan')) {
                Schema::table('user_plan', function (Blueprint $table) {
                    if (!Schema::hasColumn('user_plan', 'status')) {
                        $table->tinyInteger('status')->nullable()->default(1);
                    }
                });
            }

            setting_update_item('schema_gig_version',$version);
        }

        public function updateTo110()
        {
            if (setting_item('update_to_1.10')) {
                return false;
            }
            Artisan::call('migrate', [
                '--force' => true,
            ]);


            Schema::table('users', function (Blueprint $table) {
                if (!Schema::hasColumn('users', 'vendor_commission_amount')) {
                    $table->integer('vendor_commission_amount')->nullable();
                    $table->decimal('total_before_fees', 10, 2)->nullable();
                }
                if (!Schema::hasColumn('users', 'vendor_commission_type')) {
                    $table->string('vendor_commission_type', 30)->nullable();
                }
            });
            // Fix null status user
            User::query()->whereRaw('status is NULL')->update([
                'status' => 'publish'
            ]);

            if (empty(setting_item('enable_mail_vendor_registered'))) {
                DB::table('core_settings')->insert(
                    [
                        'name'  => 'enable_mail_vendor_registered',
                        'val'   => '1',
                        'group' => 'vendor'
                    ]
                );
                DB::table('core_settings')->insert(
                    [
                        'name'  => 'vendor_content_email_registered',
                        'val'   => '<h1 style="text-align: center;">Welcome!</h1>
                            <h3>Hello [first_name] [last_name]</h3>
                            <p>Thank you for signing up with Superio! We hope you enjoy your time with us.</p>
                            <p>Regards,</p>
                            <p>Superio</p>',
                        'group' => 'vendor'
                    ]
                );
            }
            if (empty(setting_item('admin_enable_mail_vendor_registered'))) {
                DB::table('core_settings')->insert(
                    [
                        'name'  => 'admin_enable_mail_vendor_registered',
                        'val'   => '1',
                        'group' => 'vendor'
                    ]
                );
                DB::table('core_settings')->insert(
                    [
                        'name'  => 'admin_content_email_vendor_registered',
                        'val'   => '<h3>Hello Administrator</h3>
                            <p>An user has been registered as Vendor. Please check the information bellow:</p>
                            <p>Full name: [first_name] [last_name]</p>
                            <p>Email: [email]</p>
                            <p>Registration date: [created_at]</p>
                            <p>You can approved the request here: [link_approved]</p>
                            <p>Regards,</p>
                            <p>Superio</p>',
                        'group' => 'vendor'
                    ]
                );
            }
            if (empty(setting_item('booking_enquiry_enable_mail_to_vendor_content'))) {
                DB::table('core_settings')->insert([
                    [
                        'name'  => "booking_enquiry_enable_mail_to_vendor_content",
                        'val'   => "<h3>Hello [vendor_name]</h3>
                            <p>You get new inquiry request from [email]</p>
                            <p>Name :[name]</p>
                            <p>Emai:[email]</p>
                            <p>Phone:[phone]</p>
                            <p>Content:[note]</p>
                            <p>Service:[service_link]</p>
                            <p>Regards,</p>
                            <p>Superio</p>
                            </div>",
                        'group' => "enquiry",
                    ]
                ]);
            }
            if (empty(setting_item('booking_enquiry_enable_mail_to_admin_content'))) {
                DB::table('core_settings')->insert([
                    [
                        'name'  => "booking_enquiry_enable_mail_to_admin_content",
                        'val'   => "<h3>Hello Administrator</h3>
                            <p>You get new inquiry request from [email]</p>
                            <p>Name :[name]</p>
                            <p>Emai:[email]</p>
                            <p>Phone:[phone]</p>
                            <p>Content:[note]</p>
                            <p>Service:[service_link]</p>
                            <p>Vendor:[vendor_link]</p>
                            <p>Regards,</p>
                            <p>Superio</p>",
                        'group' => "enquiry",
                    ],
                ]);
            }

            if (!Schema::hasTable((new Service())->getTable())) {
                Schema::create((new Service())->getTable(), function (Blueprint $table) {
                    $table->bigIncrements('id');

                    $table->string('title', 255)->nullable();
                    $table->string('slug', 255)->charset('utf8')->index();
                    $table->integer('category_id')->nullable();
                    $table->integer('location_id')->nullable();
                    $table->string('address', 255)->nullable();
                    $table->string('map_lat', 20)->nullable();
                    $table->string('map_lng', 20)->nullable();
                    $table->tinyInteger('is_featured')->nullable();
                    $table->tinyInteger('star_rate')->nullable();
                    //Price
                    $table->decimal('price', 12, 2)->nullable();
                    $table->decimal('sale_price', 12, 2)->nullable();

                    //Tour type
                    $table->integer('min_people')->nullable();
                    $table->integer('max_people')->nullable();
                    $table->integer('max_guests')->nullable();
                    $table->integer('review_score')->nullable();
                    $table->integer('min_day_before_booking')->nullable();
                    $table->integer('min_day_stays')->nullable();
                    $table->integer('object_id')->nullable();
                    $table->string('object_model', 255)->nullable();
                    $table->string('status', 50)->nullable();


                    $table->integer('create_user')->nullable();
                    $table->integer('update_user')->nullable();
                    $table->softDeletes();
                    $table->timestamps();
                });
            }

            Schema::table((new Service())->getTable(), function (Blueprint $table) {
                if (!Schema::hasColumn((new Service())->getTable(), 'status')) {
                    $table->string('status', 50)->nullable();
                }
            });

            if (!Schema::hasTable((new ServiceTranslation())->getTable())) {
                Schema::create((new ServiceTranslation())->getTable(), function (Blueprint $table) {
                    $table->bigIncrements('id');
                    $table->bigInteger('origin_id')->nullable();
                    $table->string('locale', 10)->nullable();

                    $table->string('title', 255)->nullable();
                    $table->text('address')->nullable();
                    $table->text('content')->nullable();

                    $table->integer('create_user')->nullable();
                    $table->integer('update_user')->nullable();
                    $table->unique(['origin_id', 'locale']);
                    $table->timestamps();
                });
            }

            Schema::table('core_pages', function (Blueprint $table) {
                if (!Schema::hasColumn('core_pages', 'header_style')) {
                    $table->string('header_style',255)->nullable();
                }
                if (!Schema::hasColumn('core_pages', 'custom_logo')) {
                    $table->integer('custom_logo')->nullable();
                }
            });


            Schema::table('bc_attrs', function (Blueprint $table) {
                if (!Schema::hasColumn('bc_attrs', 'hide_in_filter_search')) {
                    $table->tinyInteger('hide_in_single')->nullable();
                    $table->tinyInteger('hide_in_filter_search')->nullable();
                }
                if (!Schema::hasColumn('bc_attrs', 'position')) {
                    $table->smallInteger('position')->nullable();
                }
            });

            Schema::table('bc_jobs', function (Blueprint $table) {
                if (!Schema::hasColumn('bc_jobs', 'apply_type')) {
                    $table->string('apply_type', 20)->nullable();
                    $table->text('apply_link')->nullable();
                    $table->text('apply_email')->nullable();
                }
            });

            Schema::table('bc_candidate_contact', function (Blueprint $table) {
                if (!Schema::hasColumn('bc_candidate_contact', 'object_model')) {
                    $table->string('contact_to', 20)->nullable();
                    $table->bigInteger('object_id')->nullable();
                    $table->string('object_model', 20)->nullable();
                }
            });

            if (empty(setting_item('job_banner_search_fields'))) {
                DB::table('core_settings')->insert([
                    [
                        'name'  => "job_banner_search_fields",
                        'val'   => '[{"title":"Keyword","type":"keyword","position":"1"},{"title":"Location","type":"location","position":"2"},{"title":"Category","type":"category","position":"3"}]',
                        'group' => "job",
                    ]
                ]);
            }

            Schema::table('bc_jobs', function (Blueprint $table) {
                if (Schema::hasColumn('bc_jobs', 'salary_min')) {
                    $table->decimal('salary_min', 15)->change();
                    $table->decimal('salary_max', 15)->change();
                }
            });

            Schema::table('bc_candidates', function (Blueprint $table) {
                if (!Schema::hasColumn('bc_candidates', 'video_cover_id')) {
                    $table->bigInteger('video_cover_id')->nullable();
                }
            });

            Settings::store('update_to_1.10', true);
            Artisan::call('cache:clear');
        }


    }
