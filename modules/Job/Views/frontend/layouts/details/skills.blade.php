<!-- Job Skills -->
@if($row->skills)
<h4 class="widget-title">{{ __("Job Skills") }}</h4>
<div class="widget-content">
    <ul class="job-skills">
        @foreach($row->skills as $skill)
        <li><a>{{ $skill->name }}</a></li>
        @endforeach
    </ul>
</div>
@endif
