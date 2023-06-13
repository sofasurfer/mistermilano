<?php
  // Read the JSON file 
  $json = file_get_contents('./dist/manifest.json');
    
  // Decode the JSON file
  $json_data = json_decode($json,true);
?>
<!DOCTYPE html>
<html lang="en" id="open-navigation">
<head>
    <meta charset="utf-8">
    <title>Mister Milano | Official Website</title>
    <meta name="description" content="The band Mister Milano clears the table of old disco clichés by creating nothing less than a new genre: Fazzoletti-Pop translating Handkerchief-Pop. Music for ambitious romanticists.">
    <meta name="author" content="SofaSurfer">
    <!-- Preventing IE11 to request by default the /browserconfig.xml more than one time -->
    <meta name="msapplication-config">
    <!-- Disable touch highlighting in IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <!-- Ensure edge compatibility in IE (HTTP header can be set in web server config) -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <!-- Force viewport width and pixel density. Plus, disable shrinking. -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Disable Skype browser-plugin -->
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">

    <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon-16x16.png">
    <link rel="mask-icon" href="/images/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <style>
    @font-face {
      font-family: 'ForwardRoughItalic';
      src: url('/fonts/Forward-RoughItalic.otf') format("opentype");
    }
    @font-face {
      font-family: 'B612-Italic';
      src: url('/fonts/B612-Italic.ttf') format("truetype");
    }    
    </style>
    <link rel="stylesheet" href="/dist/<?= $json_data['index.css']; ?>" >
</head>

<body>

<!-- header-->

<!-- content-->
<main class="c-content" role="main">

    <div class="c-container-wide c-showroom c-text-light c-color-change-bottom c-bg-primary">               
    <!-- showroom, z weites bild mit anderem ratio für mobile screens-->
        <figure class="c-showroom-img"><img class="" sizes="100vw" src="/images/cover-2023.jpg" data-was-processed="true"></figure>               
        <!--text-->
        <div class="c-container c-container-no-padding c-showroom-text">
            <div class="c-row">
                <div class="c-col-10 c-showroom-text-inner animation-element fade-up in-view">
                  <h1 class="animation">Mister<br/>Milano</h1>
                  <span class="c-category-title">I RAGAZZI<br/>DELLA NEBBIA</span>
                </div>
            </div>
        </div>
    </div>
    <!-- section title -->
    <div class="c-container c-section-title">
        <div class="c-row">
            <div class="c-col-8">
                <h2>Tour</h2>
            </div>
        </div>
    </div>
  
    <div class="c-container c-section-tour">
        <div class="c-row">
            <div class="c-col-12">
              <table class="table table-hover" itemscope itemtype="http://schema.org/Event" >
              <?php
              $arrContextOptions=array(
                "ssl"=>array(
                    "verify_peer"=>false,
                    "verify_peer_name"=>false,
                ),
              );              
              $url = 'https://www.yagwud.com/cms/wp-admin/admin-ajax.php?action=events_list&bid=mistermilano';
              $content = file_get_contents($url, false, stream_context_create($arrContextOptions));
              $json = json_decode($content, true);

              // Check if tours exist
              if( count($json['shows']) > 0 && !empty($json['shows'][0]) ){
                foreach($json['shows'] as $item) {
                  include 'templates/tour-item.php';
                }    
              }
              ?>
            </table>
            </div>
        </div>
    </div>



    <!-- section title -->
    <div class="c-container c-section-title">
        <div class="c-row">
            <div class="c-col-8">
                <h2>Video</h2>
            </div>
        </div>
    </div>

    <div class="c-container c-video">
        <div class="c-row">
            <div class="c-col-12">
                <div class="c-video-container">
                  <iframe src="https://www.youtube.com/embed/Win4rN9PVWQ" allowfullscreen="" frameborder="0"></iframe>
                </div>
            </div>
            <div class="c-col-6">
                <div class="c-video-container">
                  <iframe src="https://www.youtube.com/embed/3E45tvEpBrY" allowfullscreen="" frameborder="0"></iframe>
                </div>
            </div>
            <div class="c-col-6">
                <div class="c-video-container">
                  <iframe src="https://www.youtube.com/embed/tCMMMyOh7JA" allowfullscreen="" frameborder="0"></iframe>
                </div>
            </div>
            <div class="c-col-6">
                <div class="c-video-container">
                  <iframe src="https://www.youtube.com/embed/bU0LoN97Zew" allowfullscreen="" frameborder="0"></iframe>
                </div>
            </div>
            <div class="c-col-6">
                <div class="c-video-container">
                  <iframe src="https://www.youtube.com/embed/GtGKoo0daDQ" allowfullscreen="" frameborder="0"></iframe>
                </div>
            </div>
        </div>          
    </div>



    <!-- text only -->
    <div class="c-container c-text-only">
        <div class="c-row c-abouttext">
            <div class="c-col-8 c-text-block">
                <h2>Max Usata - Igor Stepniewski -<br/>Lou Caramella</h2>
                <div id="c-text-de" class="c-text-de">
                  <p>Und mit einem Mal kommen die Erinnerungen. Es sind nicht die Strandferien in Rimini — kein Nebel der Zwischensaison, er klebt zu allen Jahreszeiten an der Südseite des Jura. Erinnerungen an eine Kindheit am Rande einer bankrotten Schweizer Stadt. Die Hochsaison ist längst vorbei. In diesem Quartier mit den Wohnblöcken, Genossenschaftswohnungen, ehemaligen Arbeitersiedlungen, kleinen alleinstehenden Häuschen, bizarren Chalets und selbst entworfenen, hässlichen Eigentumshäusern. Ebenso vielfältig wie die architektonische Planlosigkeit sind die Menschen, die sie bewohnen. Sie sind gewürfelt und geworfen: Die Exhibitionisten, mehr Tier als Mensch, schlammbedeckt, rennen am Pausenplatz vorbei in den Wald, das Nachbarskind, das auf seine schamanisch begabte und vom Alkohol infantilisierte Mutter aufzupassen hat. All die Kinder im Nebel, wie sie mit ihren Säbeln den Nebel in Blöcke schlagen, einen gnädigen Mittwochnachmittag lang, ihn am Abend wie ein Kleid abstreifen, ihn an die mit hässlichen Jacken überfrachtete Garderobe hängen — wenn sie können. In diesem Quartier wird italienisch gesprochen, in diesem Quartier ist die Misere kein Geheimnis, durch die stets zugezogenen Vorhänge dringt sie auf die Strassen. Die Polizei würde niemand rufen, irgendwann kommt sie dann von selbst.</p>
                  <p>Die Hoffnung liegt in der Zweideutigkeit, in der inhärenten Mehrsprachigkeit der Musik, die glitzernd, kitschig und vielfarbig die Texte untermalt, manchmal schwertraurig, bald strebend und voller Hoffnung. So kehren Mister Milano fünf Jahre nach dem ersten Album zurück. Mit einem Bündel Lieder, darin ein Figurenkabinett. Die Ragazzi vor ihrem vernebelten Bühnenbild, eine Welt, die vielleicht nie genau so war, aber genauso wahr ist. Darin ein Instrumentarium: Bass, Schlagzeug, Orgel. Und Congas für ein diffuses, knapp noch mittelständisches Fernweh. Ein Barpiano für die Bar. Ein Virtuosenflügel dem Traum, irgendwann doch noch berühmt zu werden. Und Lucio Battisti für den Sonnenstrahl, mittwochnachmittags hinter verwahrlosten oder sorgfältig getrimmten Hecken, hinter schiefen Zäunen und gepflegten kleinen Vorgärten, zwischen Bauernhof, Maisfeld, Bäckerei, Metzger, Kleinladen, Kiosk.</p>
                </div>
                <div id="c-text-en" class="c-text-en">
                  <p>The memories come all at once. Not the fog of beach vacations to Rimini at the height of the season, but the year-round fog that clings to the southern portion of the Jura Mountains. The fog of youth, memories stashed on the outskirts of a bankrupt Swiss town. A neighborhood of apartment blocks, housing co-ops, former workers' quarters, detached cottages, bizarre chalets, grotesque condominiums. Their inhabitants are as varied and haphazard as the architecture. Tossed and turned, beastly, mud-covered, running beyond the break into the nearby woods. A child stunted by fetal alcohol syndrome watches over his shaman of a mother. Boys beat the fog into blocks with their imaginary sabers, shed it like a dress in the evening, hang it up on a wardrobe already overloaded with coats. Italian is spoken in this neighborhood. In this neighborhood, misery is not a secret: it penetrates the always-drawn curtains and seeps into the streets. No one calls the police. Eventually they come of their own accord.</p>
                  <p>Hope lies in ambiguity, in the inherent multilingualism—glittering, kitschy, many-colored, music that is melancholy one minute and striving the next.</p>
                  <p>Five years after their self-titled debut, MISTER MILANO returns to explore the sonic and lyrical terrain of I RAGAZZI DELLA NEBBIA. Their setting: the foggy youth they once inhabited, or might have. The accuracy matters less than the story. On stage, i raggazi of the present place bass, drums and organ … they add congas, imbuing the fog with a touch of that diffuse, barely middle-class wanderlust. A barroom piano. A grand piano for their dreams of someday becoming famous. A little Lucio Battisti for a much-needed drop of sunshine. Wednesday afternoons spent behind neglected hedges, crooked fences. Here, an overly tidy front-yard garden. There, an overgrown cornfield. A wholesome-looking corner bakery. A stinking butcher shop. A kiosk. Another kiosk. What’s inside that innocent-looking store?</p>           
                </div>
                <div id="c-text-fr" class="c-text-fr">                
                  <p>Et d'un seul coup, les souvenirs reviennent. Ce ne sont pas ceux de vacances à la plage à Rimini. Pas un brouillard d'entre saison, mais un brouillard qui colle en toutes saisons à la face sud du Jura. </p>
                  <p>Souvenirs d'une enfance passée à la périphérie d'une ville suisse en faillite. </p>
                  <p>La haute saison est terminée depuis longtemps. Un quartier de barres d'immeubles, de logements coopératifs, d'anciennes cités ouvrières, de petites maisons isolées, de chalets bizarres et de vilains immeubles en copropriété, conçus par les habitants eux-mêmes. Les personnes qui les habitent sont tout aussi variées que l'absence de plan architectural. Ils sont jetés là comme des dés : les exhibitionnistes, qui, plus animaux qu'humains, couverts de boue, passent devant la cour de récréation et courent vers la forêt, l'enfant du voisin qui doit veiller sur sa mère, douée pour le chamanisme et infantilisée par l'alcool. Tous ces enfants dans le brouillard, qui le découpent en blocs avec leurs sabres, le temps d'un gracieux mercredi après-midi, l'enlèvent le soir comme un vêtement, l'accrochent à leur vestiaire surchargé de vestes moches - s'ils le peuvent. Dans ce quartier, on parle italien, dans ce quartier, la misère n'est pas un secret, elle s'infiltre dans les rues à travers les rideaux toujours tirés. Personne n'appellerait la police, elle finira par venir d'elle-même.</p>
                  <p>L'espoir réside dans l'ambiguïté, dans le multilinguisme inhérent à la musique, scintillante, kitsch et multicolore, qui teinte les textes, parfois de façon triste et lourde, puis devenant bientôt inspirante et pleine d'espoir. Mister Milano revient ainsi cinq ans après leur premier album. Avec une collection de chansons, dans lesquelles défilent une suite de personnages. Les ragazzi posent devant leur décor embrumé, devant un monde qui n'a peut-être jamais été exactement comme celui-ci, mais qui est tout aussi vrai. Dans ce décor, un ensemble d'instruments : basse, batterie, orgue. Et des congas pour une nostalgie diffuse, tout juste suggérée. Un piano de bar pour le bar. Un piano de virtuose pour le rêve de devenir un jour célèbre. Et Lucio Battisti pour le rayon de soleil, le mercredi après-midi, derrière les haies négligées ou soigneusement taillées, derrière les clôtures inclinées et les petits jardins bien entretenus, entre la ferme, le champ de maïs, la boulangerie, la boucherie, le petit magasin, le kiosque.</p>
                </div>
            </div>
            <div class="c-col-4 c-link-block">
                <a id="c-l-en" href="#en" class="active" class="">EN</a>
                <a id="c-l-de" href="#de">DE</a>
                <a id="c-l-fr" href="#fr" class="">FR</a>
            </div>
        </div>
    </div>

    <!-- img content wide-->
    <div class="c-container-wide c-img-wide">
        <figure>
            <img src="./images/MisterMilano-Portrait-Farbig01.jpg" alt="" />
            <figcaption class="c-legend">Mister Milano</figcaption>
        </figure>
    </div>
    <!-- section title -->
    <div class="c-container c-section-title">
        <div class="c-row">
            <div class="c-col-8">
                <h2>Records:</h2>
            </div>
        </div>
    </div>

    <div class="c-container c-albums">
        <div class="c-row">
            <div class="c-col-6">
                <figure><img src="./images/IRAGAZZIDELLANEBBIA.png" /></figure>
                <p>I RAGAZZI DELLA NEBBIA<br/>
                <a class="btn" target="_blank" href="http://eepurl.com/isHXTk" role="button">Vorbestellen</a>
            </div>
            <div class="c-col-6">
                <figure><img src="./images/cover.png" /></figure>
                <p>STANDARD EDITION<br/>
                LP + CD + Free Digital Download</p>
                <a class="btn" target="_blank" href="https://www.twogentlemen.net/products/mister-milano/" role="button">Buy Now</a>
            </div>
        </div>
    </div>    

    <!-- section title -->
    <div class="c-container c-section-title">
        <div class="c-row">
            <div class="c-col-8">
                <h2>Contact:</h2>
            </div>
        </div>
    </div>
    <!-- sponsor only -->
    <div class="c-container c-text-contact">
        <div class="c-row">
            <div class="c-col-6 c-text-block">
                <a class="button" href="mailto:mistermilano@gmx.net">mistermilano@gmx.net</a>
            </div>
            <div class="c-col-6 c-text-block">
                <a class="button" target="_blank" href="https://www.youtube.com/channel/UCvX7RwA7dIyeo3A3zeb73Wg">youtube</a> / <a class="button" target="_blank" href="https://www.facebook.com/MisterMilanos/">facebook</a>
            </div>
        </div>
    </div>
    <div class="c-container c-section-title">
        <div class="c-row">
            <div class="c-col-8">
                <h2>Unterstuetz durch:</h2>
            </div>
        </div>
    </div>
    <div class="c-container c-support">
        <div class="c-row">
            <div class="c-col-6">
                <a href="http://interpreten.ch/" target="_blank"><img src="./images/logo_sig.png" /></a>
            </div>
            <div class="c-col-6">
            <a href="https://www.fondation-suisa.ch/" target="_blank"><img src="./images/logo_suisa.png" /></a>
            </div>
        </div>
    </div>

    <!-- img content wide-->
    <div class="c-container c-img-fullwidth">
       <figure>
           <img src="./images/footer.jpg" alt="" />
        </figure>
    </div>


</main>

<!-- footer-->
<!--footer class="c-footer" role="contentinfo">
    <div class="c-container c-container-no-padding c-footer-main">
        Footer Main
    </div>

    <div class="c-container c-container-no-padding c-footer-disclaimer">
        <div class="c-row c-row-reverse">
            <div class="c-col-6 c-text-right">
                <ul class="c-footer-disclaimer-list">
                    <li><a href="/">Impressum</a></li>
                    <li><a href="/">Disclaimer</a></li>
                </ul>
            </div>
            <div class="c-col-6">
                &copy; neofluxe
            </div>

        </div>
    </div>
</footer-->
<!-- Matomo -->
<script>
  var _paq = window._paq = window._paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//piwik.sofasurfer.org/";
    _paq.push(['setTrackerUrl', u+'matomo.php']);
    _paq.push(['setSiteId', '26']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Matomo Code -->

<script src="/dist/<?= $json_data['index.js']; ?>"></script>
</body>
</html>
