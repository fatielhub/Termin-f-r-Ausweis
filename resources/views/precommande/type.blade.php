@extends('layouts.app')
@section('title', 'Type de demande — CNI Rendez-vous')

@section('content')
<div class="container-narrow py-12">

    {{-- Page Header --}}
    <div class="text-center mb-10">
        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-400 flex items-center justify-center mx-auto mb-4 shadow-lg shadow-emerald-200">
            <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0"/>
            </svg>
        </div>
        <h1 class="text-2xl font-extrabold text-gray-900 mb-2">Type de demande</h1>
        <p class="text-gray-500">Sélectionnez le type de demande qui vous correspond.</p>
    </div>

    <div class="card">
        <div class="card-body">

            {{-- Validation errors --}}
            @if($errors->any())
                <div class="alert-danger mb-6">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <div>
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
            @endif

            <form method="GET" action="{{ route('precommande.step1') }}" id="type-form">
                {{-- Type selection cards --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-8">

                    {{-- Première demande --}}
                    <label for="type-nouvelle" class="type-card-label cursor-pointer">
                        <input type="radio" name="type_demande" id="type-nouvelle" value="nouvelle" class="sr-only type-radio" {{ request('type_demande') === 'nouvelle' ? 'checked' : '' }}>
                        <div class="type-card-body p-6 rounded-2xl border-2 border-gray-100 bg-white hover:border-emerald-300 transition-all duration-200 h-full">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900 mb-1">Première Demande</h3>
                                    <p class="text-sm text-gray-500">Demandez votre CNIE pour la première fois.</p>
                                </div>
                            </div>
                            <div class="check-indicator mt-4 hidden">
                                <span class="badge-success">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                    Sélectionné
                                </span>
                            </div>
                        </div>
                    </label>

                    {{-- Renouvellement --}}
                    <label for="type-renouvellement" class="type-card-label cursor-pointer">
                        <input type="radio" name="type_demande" id="type-renouvellement" value="renouvellement" class="sr-only type-radio" {{ request('type_demande') === 'renouvellement' ? 'checked' : '' }}>
                        <div class="type-card-body p-6 rounded-2xl border-2 border-gray-100 bg-white hover:border-emerald-300 transition-all duration-200 h-full">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-xl bg-teal-100 text-teal-600 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900 mb-1">Renouvellement</h3>
                                    <p class="text-sm text-gray-500">Renouvelez votre carte expirée, perdue ou endommagée.</p>
                                </div>
                            </div>
                            <div class="check-indicator mt-4 hidden">
                                <span class="badge-success">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                    Sélectionné
                                </span>
                            </div>
                        </div>
                    </label>
                </div>

                {{-- CGU --}}
                <div class="bg-gray-50 rounded-xl p-4 mb-6">
                    <label class="form-check" for="cgu">
                        <input type="checkbox" id="cgu" class="form-check-input" required>
                        <span class="form-check-label">
                            J'accepte les <a href="#" class="text-emerald-600 hover:underline font-medium">conditions d'utilisation</a>
                            et la <a href="#" class="text-emerald-600 hover:underline font-medium">politique de confidentialité</a>.
                            <span class="text-red-500 ml-0.5">*</span>
                        </span>
                    </label>
                </div>

                <button type="submit" class="btn btn-primary btn-full btn-lg">
                    Continuer
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </button>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Highlight selected type card
    const radios = document.querySelectorAll('.type-radio');
    radios.forEach(radio => {
        const label = radio.closest('.type-card-label');
        const body = label.querySelector('.type-card-body');
        const indicator = label.querySelector('.check-indicator');

        function update() {
            if (radio.checked) {
                body.classList.add('border-emerald-500', 'bg-emerald-50/50', 'shadow-md', 'shadow-emerald-100');
                body.classList.remove('border-gray-100');
                indicator.classList.remove('hidden');
            } else {
                body.classList.remove('border-emerald-500', 'bg-emerald-50/50', 'shadow-md', 'shadow-emerald-100');
                body.classList.add('border-gray-100');
                indicator.classList.add('hidden');
            }
        }

        update(); // on load
        radio.addEventListener('change', () => {
            radios.forEach(r => {
                const l = r.closest('.type-card-label');
                const b = l.querySelector('.type-card-body');
                const i = l.querySelector('.check-indicator');
                b.classList.remove('border-emerald-500', 'bg-emerald-50/50', 'shadow-md', 'shadow-emerald-100');
                b.classList.add('border-gray-100');
                i.classList.add('hidden');
            });
            update();
        });
    });
</script>
@endpush
@endsection
