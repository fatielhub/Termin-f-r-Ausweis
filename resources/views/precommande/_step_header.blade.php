{{--
    Reusable Step Header Partial
    Variables: $currentStep (int), $totalSteps (int), $title (string)
--}}
@php
    $pct = round(($currentStep / $totalSteps) * 100);
    $steps = [
        1 => 'Identité',
        2 => 'Parents',
        3 => 'Grands-parents',
        4 => 'Rendez-vous',
    ];
@endphp

<div class="mb-8 animate-fade-in-up">
    {{-- Title --}}
    <div class="flex items-center justify-between mb-4">
        <div>
            <p class="text-xs font-semibold uppercase tracking-widest text-emerald-600 mb-1">Demande CNIE</p>
            <h1 class="text-xl font-extrabold text-gray-900">{{ $title }}</h1>
        </div>
        <span class="badge-success text-sm px-3 py-1.5">
            Étape {{ $currentStep }}/{{ $totalSteps }}
        </span>
    </div>

    {{-- Progress bar --}}
    <div class="progress">
        <div class="progress-bar" style="width: {{ $pct }}%"></div>
    </div>

    {{-- Step labels --}}
    <div class="flex justify-between mt-2">
        @foreach($steps as $n => $label)
            <span class="text-xs {{ $n <= $currentStep ? 'text-emerald-600 font-semibold' : 'text-gray-400' }} transition-colors">
                {{ $label }}
            </span>
        @endforeach
    </div>
</div>
