<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urgence Sang : {{ $campaign->title }}</title>
    
    <!-- Open Graph Data / WhatsApp Rich Card -->
    <meta property="og:title" content="🚨 URGENCE VITALE : {{ $campaign->title }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="https://images.unsplash.com/photo-1615461066841-6116e61058f4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" />
    <meta property="og:description" content="L'Hôpital Général a besoin de vous aujourd'hui. Objectif : {{ $campaign->expected_donors_count }} donneurs. 15 minutes suffisent pour sauver 3 vies." />
    <meta property="og:site_name" content="Batement Solidaire" />
    
    <!-- Fallback if redirect is slow -->
    <meta http-equiv="refresh" content="0; url=http://localhost:8080/campaign/{{ $campaign->slug }}">
</head>
<body style="background-color: #fef2f2; font-family: sans-serif; text-align: center; padding-top: 50px;">
    <h2 style="color: #dc2626;">Redirection vers l'application...</h2>
    <p>Si vous n'êtes pas redirigé automatiquement, <a href="http://localhost:8080/campaign/{{ $campaign->slug }}" style="color: #dc2626; font-weight: bold;">cliquez ici</a>.</p>
    <script>
        window.location.href = "http://localhost:8080/campaign/{{ $campaign->slug }}";
    </script>
</body>
</html>
