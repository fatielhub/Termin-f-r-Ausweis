<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>FAQ - CNIE</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 text-gray-800">

  <div class="max-w-4xl mx-auto mt-14 px-4 sm:px-6 lg:px-8">
    <h1 class="text-4xl font-bold text-center text-green-700 mb-12">Foire Aux Questions</h1>

    @foreach([
      ['section' => 'Autour de la CNIE', 'questions' => [
        ["À partir de quel âge un citoyen est obligé de disposer d'une CNIE ?", "À partir de l'âge de 16 ans, tout citoyen doit obligatoirement avoir une CNIE."],
        ["Est-ce que la CNIE peut être délivrée aux mineurs ?", "Oui, elle peut être délivrée à partir de 12 ans sur demande des parents ou tuteurs."],
        ["Le citoyen est-il censé changer de Carte Nationale une fois la nouvelle Carte lancée ?", "Non, ce n'est pas obligatoire tant que l’ancienne est encore valide."],
        ["Quelles sont les exigences de la photo qui sera utilisée pour l'établissement de la CNIE ?", "La photo doit être récente, sur fond clair, sans lunettes de soleil ni couvre-chef."],
        ["Où trouver les pièces justificatives nécessaires ?", "Les pièces nécessaires sont listées sur le site CNIE.ma selon chaque cas."],
        ["Comment doit-on procéder en cas de perte du code PIN ?", "Il faut se rendre à l’agence concernée pour réinitialiser le code PIN."],
        ["Quelle est la durée de validité de la carte nationale d'identité électronique ?", "10 ans pour les adultes, 5 ans pour les mineurs."],
        ["Comment s’effectue la modification ou la suppression des données additionnelles ?", "Via une demande administrative avec justificatifs."]
      ]],
      ['section' => 'Utilisation du site CNIE.MA', 'questions' => [
        ["Quels sont les services proposés par le Portail ?", "Demande en ligne, prise de rendez-vous, suivi de dossier, etc."],
        ["Quelles sont les étapes pour faire une demande ?", "Remplir formulaire, télécharger le reçu, prendre RDV, aller à l'agence."],
        ["Comment vérifier le statut de sa demande ?", "Via le portail CNIE.ma avec le numéro de la demande."],
        ["Que faire en cas d’oubli du numéro de la demande ?", "Revoir l’e-mail de confirmation ou contacter le support."],
        ["Comment modifier un rendez-vous ?", "Depuis la rubrique 'Mes rendez-vous' sur le portail."],
        ["Comment modifier une pré-demande ?", "Se connecter au portail et modifier tant qu’elle n’est pas validée."],
        ["Comment retélécharger le formulaire de pré-demande ?", "Depuis l’espace personnel sur CNIE.ma."]
      ]]
    ] as $block)
      <h2 class="text-2xl font-semibold text-green-600 mb-4 mt-8">{{ $block['section'] }}</h2>

      @foreach($block['questions'] as $index => [$q, $r])
        <div class="mb-4 bg-white rounded-2xl border-l-4 border-green-400 shadow-md">
          <button onclick="toggleFaq('q{{ $loop->parent->index }}_{{ $index }}')" class="w-full px-6 py-4 text-left flex justify-between items-center">
            <span class="font-semibold text-lg text-green-800">{{ $q }}</span>
            <svg class="w-5 h-5 text-green-500 transition-transform duration-300" id="icon-q{{ $loop->parent->index }}_{{ $index }}"
              fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div id="q{{ $loop->parent->index }}_{{ $index }}" class="hidden px-6 pb-4 text-gray-700 text-sm">
            {{ $r }}
          </div>
        </div>
      @endforeach
    @endforeach
  </div>

  <script>
    function toggleFaq(id) {
      const el = document.getElementById(id);
      const icon = document.getElementById('icon-' + id);
      el.classList.toggle('hidden');
      icon.classList.toggle('rotate-180');
    }
  </script>
</body>
</html>
