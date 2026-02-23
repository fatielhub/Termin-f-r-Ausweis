@extends('layouts.app')
@section('title', 'FAQ — CNI Rendez-vous')

@section('content')
<div class="container-medium py-12">

    {{-- Header --}}
    <div class="text-center mb-12">
        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-400 flex items-center justify-center mx-auto mb-4 shadow-lg shadow-emerald-200">
            <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3s-1.79 3-4 3a3.5 3.5 0 01-1.907-.55M12 18h.01"/>
            </svg>
        </div>
        <h1 class="text-3xl font-extrabold text-gray-900 mb-3">Foire Aux Questions</h1>
        <p class="text-gray-500 max-w-lg mx-auto">Trouvez rapidement les réponses à vos questions sur la CNIE et notre service de rendez-vous.</p>
    </div>

    {{-- FAQ Sections --}}
    @foreach([
        ['section' => 'Autour de la CNIE', 'icon' => 'M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0', 'color' => 'text-emerald-600 bg-emerald-100', 'questions' => [
            ["À partir de quel âge un citoyen est obligé de disposer d'une CNIE ?", "À partir de l'âge de 16 ans, tout citoyen doit obligatoirement avoir une CNIE."],
            ["Est-ce que la CNIE peut être délivrée aux mineurs ?", "Oui, elle peut être délivrée à partir de 12 ans sur demande des parents ou tuteurs légaux."],
            ["Le citoyen est-il censé changer de carte nationale une fois la nouvelle carte lancée ?", "Non, ce n'est pas obligatoire tant que l'ancienne reste valide. Le renouvellement se fait normalement à expiration."],
            ["Quelles sont les exigences de la photo pour l'établissement de la CNIE ?", "La photo doit être récente, sur fond clair, sans lunettes de soleil ni couvre-chef."],
            ["Où trouver les pièces justificatives nécessaires ?", "Les pièces nécessaires sont listées sur le site officiel CNIE.ma selon chaque situation."],
            ["Comment procéder en cas de perte du code PIN ?", "Il faut se rendre à l'agence concernée muni de votre carte pour réinitialiser le code PIN."],
            ["Quelle est la durée de validité de la CNIE ?", "10 ans pour les adultes, 5 ans pour les mineurs."],
            ["Comment s'effectue la modification des données additionnelles ?", "Via une demande administrative formelle accompagnée des justificatifs nécessaires."],
        ]],
        ['section' => 'Utilisation du portail CNIE.MA', 'icon' => 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'color' => 'text-blue-600 bg-blue-100', 'questions' => [
            ["Quels sont les services proposés par le portail ?", "Demande en ligne, prise de rendez-vous, suivi de dossier, téléchargement de formulaires, etc."],
            ["Quelles sont les étapes pour faire une demande ?", "1. Remplir le formulaire en ligne. 2. Obtenir un rendez-vous. 3. Se présenter au centre avec les pièces requises."],
            ["Comment vérifier le statut de sa demande ?", "Via le portail CNIE.ma avec votre code de suivi reçu lors de la confirmation."],
            ["Que faire en cas d'oubli du code de suivi ?", "Consultez l'e-mail de confirmation reçu lors de votre inscription ou contactez notre support."],
            ["Comment modifier un rendez-vous ?", "Depuis la rubrique de suivi de votre demande, vous pouvez demander une modification."],
            ["Comment modifier une pré-demande ?", "Connectez-vous au portail et modifiez votre pré-demande tant qu'elle n'a pas encore été validée."],
            ["Comment retélécharger le formulaire de pré-demande ?", "Depuis l'espace de suivi en utilisant votre code de dossier."],
        ]],
    ] as $block)
        <div class="mb-10">

            {{-- Section Title --}}
            <div class="flex items-center gap-3 mb-5">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0 {{ $block['color'] }}">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $block['icon'] }}"/></svg>
                </div>
                <h2 class="text-xl font-bold text-gray-900">{{ $block['section'] }}</h2>
            </div>

            {{-- Questions --}}
            <div class="space-y-3">
                @foreach($block['questions'] as $index => [$q, $r])
                    @php $id = 'faq_' . $loop->parent->index . '_' . $index; @endphp
                    <div class="card overflow-hidden" id="card-{{ $id }}">
                        <button onclick="toggleFaq('{{ $id }}')"
                                class="w-full text-left flex items-start justify-between gap-4 px-6 py-4 hover:bg-emerald-50/60 transition-colors focus:outline-none"
                                aria-expanded="false" aria-controls="{{ $id }}">
                            <span class="font-semibold text-gray-800 pr-2">{{ $q }}</span>
                            <svg id="icon-{{ $id }}" class="w-5 h-5 text-emerald-500 flex-shrink-0 transition-transform duration-300 mt-0.5"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div id="{{ $id }}" class="hidden px-6 pb-5">
                            <div class="border-t border-gray-100 pt-4 text-sm text-gray-600 leading-relaxed">
                                {{ $r }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach

    {{-- CTA bottom --}}
    <div class="card bg-gradient-to-br from-emerald-50 to-teal-50 border-emerald-200 text-center py-8 px-6 mt-10">
        <h3 class="font-bold text-gray-900 text-lg mb-2">Vous n'avez pas trouvé votre réponse ?</h3>
        <p class="text-gray-500 text-sm mb-5">Notre équipe est disponible pour vous aider.</p>
        <a href="mailto:contact@cnirendezvous.ma" class="btn btn-primary">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            Contactez-nous
        </a>
    </div>
</div>

@push('scripts')
<script>
    function toggleFaq(id) {
        const content = document.getElementById(id);
        const icon = document.getElementById('icon-' + id);
        const isHidden = content.classList.contains('hidden');
        content.classList.toggle('hidden');
        icon.style.transform = isHidden ? 'rotate(180deg)' : '';
    }
</script>
@endpush
@endsection