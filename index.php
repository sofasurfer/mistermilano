<?php
  // Read the JSON file 
  $json = file_get_contents('./dist/manifest.json');
    
  // Decode the JSON file
  $json_data = json_decode($json,true);
?>
<!DOCTYPE html>
<html lang="de" id="open-navigation">
<head>
    <meta charset="utf-8">
    <title>Prototype</title>
    <meta name="author" content="neofluxe GmbH">
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
    <style>
    @font-face {
      font-family: 'ForwardRoughItalic';
      src: url('/fonts/Forward-RoughItalic.otf') format("opentype");
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
        <div class="c-row">
            <div class="c-col-8 c-text-block">
                <h2>Max Usata - Igor Stepniewski - Lou Caramella</h2>
                <p>Und mit einem Mal kommen die Erinnerungen. Es sind nicht die Strandferien in Rimini — kein Nebel der Zwischensaison, er klebt zu allen Jahreszeiten an der Südseite des Jura. Erinnerungen an eine Kindheit am Rande einer bankrotten Schweizer Stadt. Die Hochsaison ist längst vorbei. In diesem Quartier mit den Wohnblöcken, Genossenschaftswohnungen, ehemaligen Arbeitersiedlungen, kleinen alleinstehenden Häuschen, bizarren Chalets und selbst entworfenen, hässlichen Eigentumshäusern. Ebenso vielfältig wie die architektonische Planlosigkeit sind die Menschen, die sie bewohnen. Sie sind gewürfelt und geworfen: Die Exhibitionisten, mehr Tier als Mensch, schlammbedeckt, rennen am Pausenplatz vorbei in den Wald, das Nachbarskind, das auf seine schamanisch begabte und vom Alkohol infantilisierte Mutter aufzupassen hat. All die Kinder im Nebel, wie sie mit ihren Säbeln den Nebel in Blöcke schlagen, einen gnädigen Mittwochnachmittag lang, ihn am Abend wie ein Kleid abstreifen, ihn an die mit hässlichen Jacken überfrachtete Garderobe hängen — wenn sie können. In diesem Quartier wird italienisch gesprochen, in diesem Quartier ist die Misere kein Geheimnis, durch die stets zugezogenen Vorhänge dringt sie auf die Strassen. Die Polizei würde niemand rufen, irgendwann kommt sie dann von selbst.</p>
                <p>Die Hoffnung liegt in der Zweideutigkeit, in der inhärenten Mehrsprachigkeit der Musik, die glitzernd, kitschig und vielfarbig die Texte untermalt, manchmal schwertraurig, bald strebend und voller Hoffnung. So kehren Mister Milano fünf Jahre nach dem ersten Album zurück. Mit einem Bündel Lieder, darin ein Figurenkabinett. Die Ragazzi vor ihrem vernebelten Bühnenbild, eine Welt, die vielleicht nie genau so war, aber genauso wahr ist. Darin ein Instrumentarium: Bass, Schlagzeug, Orgel. Und Congas für ein diffuses, knapp noch mittelständisches Fernweh. Ein Barpiano für die Bar. Ein Virtuosenflügel dem Traum, irgendwann doch noch berühmt zu werden. Und Lucio Battisti für den Sonnenstrahl, mittwochnachmittags hinter verwahrlosten oder sorgfältig getrimmten Hecken, hinter schiefen Zäunen und gepflegten kleinen Vorgärten, zwischen Bauernhof, Maisfeld, Bäckerei, Metzger, Kleinladen, Kiosk.</p>
            </div>
            <div class="c-col-4 c-link-block">
                    <a href="#de" class="active">DE</a>
                    <a href="#fr" >FR</a>
                    <a href="#en" >EN</a>
            </div>
        </div>
    </div>

    <!-- img content wide-->
    <div class="c-container c-img-wide">
    <figure>
        <img src="./images/mistermilano.jpg" alt="" />
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
            <div class="c-col12 c-text-block">
                <a class="button" href="mailto:mistermilano@gmx.net">mistermilano@gmx.net</a>
            </div>
        </div>
    </div>
    <div class="c-container c-section-title">
        <div class="c-row">
            <div class="c-col-8">
                <h2>Unterstütz durch:</h2>
            </div>
        </div>
    </div>
    <div class="c-container c-albums">
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
           <img src="../images/cover-footer.jpg" alt="" />
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
</body>
</html>
