<div class="card card-custom landing-project-card h-100">
    <div class="card-body d-flex flex-column">
        <div class="d-flex align-items-start justify-content-between mb-4">
            <div class="mr-3">
                <a href="{{ route('project.show', $project) }}"
                    class="card-title text-hover-primary font-weight-bolder font-size-h5 text-dark mb-2 d-block">
                    {{ $project->project_title }}
                </a>
                <div class="d-flex align-items-center flex-wrap">
                    @if($project->project_code)
                    <span class="project-code-badge mr-2 mb-1">{{ $project->project_code }}</span>
                    @endif
                    @if($project->projectStatus)
                    <span class="label label-inline label-light-primary font-weight-bold mb-1">
                        {{ __('labels.' . $project->projectStatus->code) !== 'labels.' . $project->projectStatus->code ? __('labels.' . $project->projectStatus->code) : $project->projectStatus->code }}
                    </span>
                    @endif
                </div>
            </div>
        </div>

        <p class="text-muted font-size-sm mb-4 flex-grow-1 landing-project-desc">
            {{ $project->project_description ? \Illuminate\Support\Str::limit($project->project_description, 140) : '-' }}
        </p>

        <div class="d-flex flex-wrap mb-4">
            <div class="landing-project-meta mr-5 mb-2">
                <span class="text-muted font-size-sm d-block mb-1">{{ __('labels.sector') }}</span>
                <span class="font-weight-bold text-dark-75 font-size-sm">
                    {{ $project->subsector?->sector?->sector_name ?? __('labels.no_sector') }}
                </span>
            </div>
            <div class="landing-project-meta mr-5 mb-2">
                <span class="text-muted font-size-sm d-block mb-1">{{ __('labels.budget') }}</span>
                <span class="font-weight-bold text-dark-75 font-size-sm">
                    Rp {{ number_format($project->budget ?? 0) }}
                </span>
            </div>
            <div class="landing-project-meta mb-2">
                <span class="text-muted font-size-sm d-block mb-1">{{ __('labels.progress') }}</span>
                <span class="font-weight-bold text-dark-75 font-size-sm">
                    {{ number_format($project->latest_progress?->real_percent ?? 0) }}%
                </span>
            </div>
        </div>

        <div class="d-flex align-items-center justify-content-between mt-auto pt-2">
            <span class="text-muted font-size-sm">
                <i class="flaticon2-calendar-9 text-primary mr-1"></i>
                {{ $project->start_date ? $project->start_date->translatedFormat('d M Y') : '-' }}
            </span>
            <a href="{{ route('project.show', $project) }}" class="btn btn-sm btn-light-primary font-weight-bold">
                {{ __('labels.details') }}
            </a>
        </div>
    </div>
</div>
