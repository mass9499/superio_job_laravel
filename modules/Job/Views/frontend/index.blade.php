@extends('layouts.app')

@section('content')
    @includeIf('Job::frontend.layouts.search.'. $style)
@endsection

@section('footer')
    <script>
        jQuery(".view-more").on("click", function () {
            jQuery(this).closest('ul').find('li.tg').toggleClass("d-none");
            jQuery(this).find('.tg-text').toggleClass('d-none');
        });

        if($( ".job-salary-range-slider" ).length) {
            //Salary Range Slider
            $(".job-salary-range-slider").slider({
                range: true,
                min: {{ $min_max_price[0] }},
                max: {{ $min_max_price[1] }},
                values: [ {{ request()->get('amount_from') ?? 0 }}, {{ request()->get('amount_to') ?? $min_max_price[1] }} ],
                slide: function (event, ui) {
                    $(".job-salary-amount .min").text(bc_format_money(ui.values[0]));
                    $(".job-salary-amount .max").text(bc_format_money(ui.values[1]));
                    $("input[name=amount_from]").val(ui.values[0]);
                    $("input[name=amount_to]").val(ui.values[1]);
                }
            });

            $(".job-salary-amount .min").text(bc_format_money($(".job-salary-range-slider").slider("values", 0)));
            $(".job-salary-amount .max").text(bc_format_money($(".job-salary-range-slider").slider("values", 1)));
        }
    </script>
@endsection
