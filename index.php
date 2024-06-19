<?php
<<<<<<< HEAD
$lang = 'en';
if( !empty($_GET['lang']) ){
    $lang = $_GET['lang'];
}
?>
<!DOCTYPE html>
<html lang="<?= $lang; ?>">
=======
  // Read the JSON file 
  $json = file_get_contents('./dist/manifest.json');
    
  // Decode the JSON file
  $json_data = json_decode($json,true);
?>
<!DOCTYPE html>
<html lang="en" id="open-navigation">
>>>>>>> mister
<head>
    <meta charset="utf-8">
    <title>Mister Milano | Official Website</title>
    <meta name="description" content="The band Mister Milano clears the table of old disco clichés by creating nothing less than a new genre: Fazzoletti-Pop translating Handkerchief-Pop. Music for ambitious romanticists.">
<<<<<<< HEAD
    <meta name="keywords" content="Band, Fazzoletti-Pop, Disco, MisterMilano">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="alternate" hreflang="en" href="https://www.mistermilano.it/?lang=en" />
    <link rel="alternate" hreflang="de" href="https://www.mistermilano.it/?lang=de" />
    <link rel="alternate" hreflang="it" href="https://www.mistermilano.it/?lang=it" />
    <link rel="alternate" hreflang="fr" href="https://www.mistermilano.it/?lang=fr" />
    <link rel="alternate" hreflang="jp" href="https://www.mistermilano.it/?lang=jp" />

    <link rel="shortcut icon" href="/assets/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/assets/images/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="/assets/css/main.css?ver=2" rel="stylesheet">
  </head>
  <body class="home">
    <div class="logo-title">
      <a href="#videos" title="Scroll DOWN"><img src="/assets/images/logo.svg"/></a>
    </div>
    <div class="container-fluid parallax home"> </div>

    <div id="videos" class="container-fluid">
      <div class="row">
          <div id="carousel-example-generic" class="carousel slide" data-interval="false" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-example-generic" data-slide-to="1"></li>
              <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
             <div class="item active">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe src="https://www.youtube.com/embed/Win4rN9PVWQ" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="carousel-caption">
                Mister Milano - Il buffone
                </div>
             </div>
             <div class="item">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe src="https://www.youtube.com/embed/3E45tvEpBrY" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="carousel-caption">
                Mister Milano - Alta Clotura
                </div>
             </div>
             <div class="item">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe src="https://www.youtube.com/embed/bU0LoN97Zew" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="carousel-caption">
                Mister Milano - Da Uno A Novanta
                </div>
              </div>
             <div class="item">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe src="https://www.youtube.com/embed/tCMMMyOh7JA" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="carousel-caption">
                Mister Milano - Zecchino d'Oro
                </div>
              </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
      </div>
    </div>
    <div id="tourdates" class="container">
        <div class="row">
            <div class="col-md-12">
            <h1>Plattenrelease Tour</h1>
            <table class="table table-hover" itemscope itemtype="http://schema.org/Event" >
              <?php
              $url = 'https://www.yagwud.com/cms/wp-admin/admin-ajax.php?action=events_list&bid=mistermilano';
              $content = file_get_contents($url);
              $json = json_decode($content, true);

              // Check if tours exist
              if( count($json['shows']) > 0 && !empty($json['shows'][0]) ){
                foreach($json['shows'] as $item) {
                  include 'tpl/tour-item.php';
                }    
              }else{
                include 'tpl/mailchimp.php';
              }
              ?>
            </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
              <h1>New Record</h1>
            </div>
            <div class="col-md-12 text-center">
              <center>
                <p><img class="img-responsive" src="/assets/images/cover.png" /></p>
                <p>STANDARD EDITION</p>
                <p>LP + CD + Free Digital Download</p>
                <a class="btn btn-default order" target="_blank" href="https://www.twogentlemen.net/products/mister-milano/" role="button">Buy Now</a>
              </center>
            </div>
        </div>    
        <div class="row">
            <div class="col-md-12">        
            <h1>Mister Milano</h1>
            <div>
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" <?= ($lang == 'en') ? 'class="active"' : '';?> ><a href="#en" aria-controls="en" role="tab" data-toggle="tab">EN</a></li>
                <li role="presentation" <?= ($lang == 'de') ? 'class="active"' : '';?>><a href="#de" aria-controls="de" role="tab" data-toggle="tab">DE</a></li>
                <li role="presentation" <?= ($lang == 'it') ? 'class="active"' : '';?>><a href="#it" aria-controls="it" role="tab" data-toggle="tab">IT</a></li>
                <li role="presentation" <?= ($lang == 'fr') ? 'class="active"' : '';?>><a href="#fr" aria-controls="fr" role="tab" data-toggle="tab">FR</a></li>
                <li role="presentation" <?= ($lang == 'jp') ? 'class="active"' : '';?>><a href="#jp" aria-controls="jp" role="tab" data-toggle="tab">JP</a></li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane <?= ($lang == 'en') ? 'active' : '';?>" id="en">
                    <p>The band Mister Milano clears the table of old disco clichés by creating nothing less than a new genre: Fazzoletti-Pop translating </p>
                    <p>Handkerchief-Pop. Music for ambitious romanticists. Mister Milano is Max Usata lead singer from the band Puts Marie, one of the more successfully exported Swiss music groups, Igor Stepniewski bassist for Puts Marie and the drummer Lou Caramella. The trio produces sleazy Italian Eighties electronical Pop driven by drifty & obscure Hip-Hop beats and Eastern German organs from the Seventies. A sound that`s unapologetic, mean, 
                    soaked with bass, and all a pure pleasure. After touring as well as recording in places like New York, Portland Oregon and St.Petersburg the trio is now releasing their album in all major cities in Switzerland.</p>
                    <p>A genuine musical parody dedicating it’s content to the sad and lost Italian Pop-, tv- and nightculture. A homage to our Southern roots and neighbors. Pink and light blue we wish it to be, Rai Uno, large breasted, corny, glamorous, dark romantic, in love, dishonest, lost and forgotten and all that finally exhumed by Mister Milano. The songs talk about Italy, of paid off soccer players, corrupt editorial departments, the rich, gray suited TV barons that seduce young and beautiful innocent girls, it also talks about immigrants bleeding to death on high barbwire border fences or getting lost floating in a dinghy in the middle of the Mediterranean Sea.</p>
                    <p>In 2012 the three Italian Swiss performed a wide traveled theatre production, which even made it to the Fringe in Edinburgh. Out of that Mister Milano was spawned and two years later they released their first single “Il Collezionista” on the Oregonian label Voodoo Doughnut Recordings. In collaboration with the American producer Jeff Stuart Saltzman and the Swiss label Two Gentlemen (Sophie Hunger, Anna Aaron, Young Gods...) Mister Milano releases their self-titled debut album.</p>
                    <p>For the newcomer that hasn`t seen their latest clip to the single „Zecchino d’Oro“ will most definitely fall for the new Italian Wave and won’t miss a single show.</p>
                </div>              
                <div role="tabpanel" class="tab-pane <?= ($lang == 'de') ? 'active' : '';?>" id="de">
                    <p>Die Band Mister Milano aus Biel und Zürich räumt mit alten Disco Klischées auf und entwickelt daraus nichts weniger als einen neuen Musikstil: Fazzoletti-Pop, Musik für anspruchsvolle Romantiker.</p>
                    <p>Mister Milano sind Max Usata Frontmann von Puts Marie, einem der momentan erfolgreichsten Schweizer Musikexporte, Igor Stepniewski, ebenfalls von Puts Marie, und der Zürcher Schlagzeuger Lou Caramella. Das Trio produziert kitschigen italienischen 80er-Jahre Elektro-Pop mit treibenden obskuren Hip-Hop-Beats und ostdeutschen Siebzigerjahre-Orgeln. Das klingt unerhört böse, basslastig und ist trotzdem eine helle Freude. Nach Aufnahmen und Konzerttourneen in New York, Portland und St.Petersburg tourt das Trio jetzt durch die Schweiz und bringt sein neues Album mit.</p>
                    <p>Eine ernstgemeinte musikalische Parodie an die traurige, verlorene italienische Pop-, TV und Nachtkultur. Eine Hommage an unsere südlichen Nachbarn, pink und hellblau, RAI Uno und grossbusig, kitschig, glamourös, dunkel, romantisch, verliebt und verlogen.</p>
                    <p>Mister Milano singen von Italien, von bestochenen Fussballern und korrupten Redaktionen, von reichen grau gekleideten Fernsehbaronen, welche junge und schöne Mädchen verführen oder von Migranten auf Grenzzäunen verblutend oder orientierungslos in kleinen Holzbooten im Mittelmeer treibend. Die drei Italo-Schweizer führten 2012 in New York ein weitgereistes und erfolgreiches Musiktheater auf, welches sie bis ans Fringe Festival in Edinburgh brachte.</p>
                    <p>Als Folgeprojekt entstand daraus Mister Milano und zwei Jahre später veröffentlichten sie auf dem amerikanischen Label Voodoo doughnut recording ihre erste Single “Il Collezionista”. In Zusammenarbeit mit dem Produzenten Jeff Stuart Saltzman aus Portland Oregon und dem Lausanner Label Two Gentlemen (Sofie Hunger, Anna Aron, Young Gods...) bringen Mister Milano jetzt ihr Debut-Album raus.</p>
                    <p>Wer das Video zur neusten Single „Zecchino d’Oro“ gesehen hat, wird mit Bestimmtheit der neuen Italienischen Welle verfallen sein und keines der Konzerte von Mister Milano auslassen.</p>
                </div>         
                <div role="tabpanel" class="tab-pane <?= ($lang == 'it') ? 'active' : '';?>" id="it">
                    <p>Ecco, dimenticatevi degli obsoleti clichés sulla discomusic e lasciate spazio al Fazzoletti-Pop; musica per romantici esigenti. </p>
                    <p>I Mister Milano, di Bienne e Zurigo, sono Max Usata, frontman dei Puts Marie, gruppo svizzero che sta riscontrando un buon successo all’estero, Igor Stepniewski, altro membro dei Puts Marie, e il batterista zurighese Lou Caramella. </p>
                    <p>Il trio propone una combinazione tra un kitschoso elettro-pop italiano in stile 
                    anni ‘80, oscuri beats hip-hop e tastiere tipiche della DDR anni ’70. Malvagità e pesantezza ma anche grande gioia e delizia.</p>
                    <p>Dopo aver registrato ed essersi esibito a New York, Portland e San
                    Pietroburgo, il trio è ora in viaggio in Svizzera per presentare il nuovo album.</p>
                    <p>Una parodia seria sulla disorientata e malinconica cultura italiana del pop, della 
                    TV e della vita notturna. Un omaggio ai nostri vicini del sud, al rosa e all’azzurro, alla RAI, alle maggiorate, a un glamour cupo e bugiardo. I Mister Milano cantano dell’Italia, dei calciatori disonesti e delle redazioni corrotte, dei grigi e ricchi baroni della TV che adescano giovani e belle ragazze, o dei migranti feriti sulle recinzioni di confine o spaesati su piccole imbarcazioni nel Mediterraneo.</p>
                    <p>Nel 2012 i tre italo-svizzeri mettono in piedi un fortunato spettacolo musicale a New York e dopo varie repliche lo stesso viene anche presentato al Fringe Festival di Edimburgo. Dalla ricerca di un nuovo progetto condiviso prendonopoi vita i Mister Milano e nel 2014 esce il loro primo singolo “Il Collezionista”, dato alle stampe dall’etichetta americana Voodoo Doughnut Recording.</p>
                    <p>In collaborazione con il produttore Jeff Stuart Saltzman di Portland, Oregon e l’etichetta svizzera Two Gentlemen di Losanna (Sophie Hunger, Anna Aron, Young Gods, ...), i Mister Milano pubblicano ora il loro album di debutto.</p>
                    <p>Chi ha visto il video del loro ultimo singolo “Zecchino d’Oro” sarà sicuramente già stato contagiato dalla loro peculiare “italianità” e non potrà immaginarsi di perdere nessuno dei prossimi concerti.</p>
                </div>
                <div role="tabpanel" class="tab-pane <?= ($lang == 'fr') ? 'active' : '';?>" id="fr">
                    <p>Le groupe Mister Milano de Bienne et Zurich met fin aux vieux clichés de discothèques et il en résulte ni plus ni moins que le développement d’un nouveau style de musique : la pop Fazzoletti; de la musique destinée aux romantiques exigeants. Mister Milano, ce sont Max Usata, leader de Puts Marie - une exportation musicale suisse actuellement parmi les plus réussies - Igor Stepniewski, également de Puts Marie et le batteur zurichois Lou Caramella.</p>
                    <p>Ce trio produit de l’électro-pop kitsch italienne des années 80 à grand renfort de beats hip-hop entraînants et obscurs et d’orgues 70’s d’Allemagne de l’Est. Derrière une intention agressive, chargée de basse, on retrouve l’émerveillement pop des grands songwriters. À la suite d’enregistrements et de concerts à New York, Portland et Saint-Pétersbourg, le trio est maintenant en tournée suisse et annonce la sortie de son premier album.</p>
                    <p>Une parodie musicale sérieuse de la culture pop, TV et nocturne italienne, aussi triste que perdue. Un hommage à nos voisins du sud: pink et bleu ciel, RAI Uno et poitrines généreuses ; kitsch, glamour, sombre, romantique, amoureux et hypocrite. Mister Milano nous chante l’Italie des footballeurs soudoyés et des rédactions corrompues, des barons de la télévision riches et vêtus de gris séduisant de belles jeunes filles, ou de migrants perdant leur sang sur des clôtures de frontières ou dérivant désorientés dans de petites barques en bois sur les vagues de la Méditerranée.</p>
                    <p>En 2012, les trois Italo-suisses ont présenté à New York une comédie musicale au long cours qui a connu un grand succès, les menant jusqu’au Fringe Festival à Édimbourg. Mister Milano a été créé à la suite de succès et publié, deux ans plus tard, son premier single, « Il Collezionista », sur le label américain Voodo Doughnut Recordings.</p>
                    <p>En collaboration avec le producteur Jeff Stuart Salzman de Portland, Oregon, et le label lausannois Two Gentlemen (Sophie Hunger, The Animen, The Young Gods,...), Mister Milano s’apprête désormais à sortir son premier album.</p>
                    <p>Quiconque ayant visionné la vidéo du tout nouveau single «Zecchino d’Oro» sera certainement tombé sous l’emprise de la nouvelle vague talienne et ne manquera aucun concert de Mister Milano.</p>
                </div>       
                <div role="tabpanel" class="tab-pane <?= ($lang == 'jp') ? 'active' : '';?>" id="jp">
                    <p>ミスター・ミラノ　   
                    スイスのチューリヒとビエンヌを拠点に活動。
                    ワンパターンなディスコミュージックとはかけ離れた新しいジャンルを発信している。高級ロマン主義者のためのファッツォレッティポップス。
                    現在世界に活動の場を広げているプッツ・マリーよりマックス・ウサタ、イゴール・シュテップニエブスキーそしてチューリヒ出身ドラム　ルー・カラメルのトリオ。
                    奇妙なドライビング・ヒップホップ・ビートや東ドイツの70年代オルガン音楽でなんとも安っぽくイタリア80年代エレクトロポップスを造り出している。ブーイングがおこりそう・・・。いや、それが楽しくてたまらない。
                    ニュー・ヨークやポートランドやセント・ピータースブルグでのレコーディング、ライブを終え現在ニューアルバムのリリースツアー中である。イタリアの哀愁ただよう懐かしいポップスとTV文化や水商売をもじっている。南欧の隣人（ピンクと水色、煌びやかな女性、めちゃくちゃ恋愛模様、ライ・ウノ）へのオマージュ。
                    ミスター・ミラノの詞からはイタリアの金になびくサッカー選手、富に支配され腐敗されたテレビ局、そして国境で血を流し、小舟で地中海に迷う移民たちの声が聞こえる。
                    イタリア系スイス人の３人は2012年ニュー・ヨークで成功をおさめたミュージカルに出演しその後エディンバーグのフリンゲフェスティバルまでの世界ツアーをはたした。ミスター・ミラノはそのプロジェクトを引き継ぎ２年後アメリカのレーベル 『ブードゥー』でファーストシングル『Il Collezionista』を発売。ポートランド、オレゴンに拠点のあるプロデューサ　ジェフ・シュトゥアト・サルツマンとルツェルンにあるレーベル　ツー・
                    ゼントルマン（ソフィー・ハンガー、アンナ・アーロン、ヤング・ゴーヅ）の協力で
                    ファーストアルバムを発売中。新しいビデオ『Zecchino d'Oro』をみたら、絶対に新しいイタリアンウエーブにはまってしまうだろう。そしてきっと、ミスター・ミラノの演奏を一つも聞き逃さない</p>
                </div>            
              </div>
            </div>
          </div>
        </div>    
        <div class="row">
            <div class="col-md-12">        
              <h2>Mit finanzieller Unterstützung durch </h2>
            </div>
        </div>
        <div class="row supporter">
            <div class="col-md-2 col-md-offset-4">
              <a title="FONDATION SUISA" href="https://www.fondation-suisa.ch/" target="_blank">
              <img height="" src="/assets/images/logo_suisa.png" class="img-responsive center-block" alt="FONDATION SUISA" /></a>
            </div>
            <div class="col-md-2">
              <a title="Schweizerische Interpretengenossenschaft SIG" href="http://interpreten.ch/" target="_blank">
              <img height="" src="/assets/images/logo_sig.png" class="img-responsive center-block" alt="Schweizerische Interpretengenossenschaft SIG" /></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">        
            <h2>Contact</h2>
            <p>
                <a class="button" href="&#109;&#x61;&#105;&#108;&#x74;&#111;&#x3a;&#109;&#x69;&#115;&#x74;&#101;&#114;&#x6d;&#x69;&#x6c;&#97;&#x6e;&#x6f;&#x40;&#x67;&#109;&#120;&#x2e;&#110;&#x65;&#x74;">&#x6d;&#x69;&#115;&#116;&#101;&#x72;&#x6d;&#x69;&#108;&#x61;&#x6e;&#x6f;&#x40;&#x67;&#109;&#120;&#x2e;&#110;&#x65;&#116;</a>
            </p>
            <p class="sharing">
              <a target="_blank" href="https://www.youtube.com/channel/UCUovrSE3WPnpIL0h3OHzr8A" title="Youtube"><i class="fab fa-youtube"></i></a>
              <a target="_blank" href="https://www.facebook.com/MisterMilanos/" title="Facebook"><i class="fab fa-facebook-square"></i></a>
            </p>       
=======
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
    @font-face {
      font-family: 'B612-Regular';
      src: url('/fonts/B612-Regular.ttf') format("truetype");
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
                <div class="c-col-12 c-showroom-text-inner animation-element fade-up in-view">
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

                if( !empty($json['shows']) ){
                    // Check if tours exist
                    if( count($json['shows']) > 0 && !empty($json['shows'][0]) ){
                        foreach($json['shows'] as $item) {
                        include 'templates/tour-item.php';
                        }    
                    }
                }else{
                    echo( "<tr><td><h2>SORRY, no upcoming shows.</h2></td></tr>" );
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
            <div class="c-col-6">
                <div class="c-video-container">
                  <iframe src="https://player.vimeo.com/video/883221427?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" allowfullscreen="" frameborder="0"></iframe>
                </div>
                <span c-caption>
                MUSIC BY MISTER MILANO<br/>
                IMAGES BY PIER PAOLO PASOLINI
                </span>
            </div>
            <div class="c-col-6">
                <div class="c-video-container">
                  <iframe src="https://player.vimeo.com/video/869990839?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" allowfullscreen="" frameborder="0"></iframe>
                </div>
                <span c-caption>
                Canzone Del Sole<br/>
                Video Art by Mister Milano<br/>
                Canzone Del Sole - Mediterranee (Jean-Daniel Pollet. 1963)<br/>
                </span>
            </div>
            <div class="c-col-4">
                <div class="c-video-container">
                  <iframe src="https://www.youtube.com/embed/yRrvRSUDxQk" allowfullscreen="" frameborder="0"></iframe>
                </div>
            </div>
            <div class="c-col-4">
                <div class="c-video-container">
                  <iframe src="https://www.youtube.com/embed/1u0H8ExBxyc" allowfullscreen="" frameborder="0"></iframe>
                </div>
            </div>
            <div class="c-col-4">
                <div class="c-video-container">
                  <iframe src="https://www.youtube.com/embed/Win4rN9PVWQ" allowfullscreen="" frameborder="0"></iframe>
                </div>
            </div>
            <div class="c-col-4">
                <div class="c-video-container">
                  <iframe src="https://www.youtube.com/embed/3E45tvEpBrY" allowfullscreen="" frameborder="0"></iframe>
                </div>
            </div>
            <div class="c-col-4">
                <div class="c-video-container">
                  <iframe src="https://www.youtube.com/embed/tCMMMyOh7JA" allowfullscreen="" frameborder="0"></iframe>
                </div>
            </div>
            <div class="c-col-4">
                <div class="c-video-container">
                  <iframe src="https://www.youtube.com/embed/bU0LoN97Zew" allowfullscreen="" frameborder="0"></iframe>
                </div>
            </div>
            <div class="c-col-4">
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
>>>>>>> mister
            </div>
        </div>
    </div>

<<<<<<< HEAD
    <div class="logo">
      <!-- <img src="[[++site_url]]stream/mistermilano/web/logo.png"/> -->
      <a href="#videos" title="Scroll DOWN"><img src="/assets/images/logo-3.png"/></a>
    </div>
    <footer>         
      <p><a href="https://www.sofasurfer.org" target="_blank" title="Built by SofaSurfer">Built by SofaSurfer</a></p>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="/assets/js/main.js"></script>
    <!-- Piwik -->
    <script type="text/javascript">
      var _paq = _paq || [];
      _paq.push(["setDomains", ["*.www.mistermilano.it"]]);
      _paq.push(['trackPageView']);
      _paq.push(['enableLinkTracking']);
      (function() {
        var u="//piwik.sofasurfer.org/";
        _paq.push(['setTrackerUrl', u+'piwik.php']);
        _paq.push(['setSiteId', '26']);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
      })();
    </script>
    <noscript><p><img src="//piwik.sofasurfer.org/piwik.php?idsite=26" style="border:0;" alt="" /></p></noscript>
    <!-- End Piwik Code -->
  </body>
</html>

=======
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
                <a class="btn" target="_blank" href="https://mistermilano.bandcamp.com/album/i-ragazzi-della-nebbia" role="button">Buy Now</a>
            </div>
            <div class="c-col-6">
                <figure><img src="./images/cover.png" /></figure>
                <p>STANDARD EDITION<br/>
                LP + CD + Free Digital Download</p>
                <a class="btn" target="_blank" href="https://mistermilano.bandcamp.com/album/mister-milano" role="button">Buy Now</a>
            </div>
        </div>
    </div>    


    <div class="c-container c-albums">
        <div class="c-row">
            <div class="c-col-6">
                <h2>Listen:</h2>
                <ul class="stream-list">
                    <li><a class="stream-link" target="_blank" href="https://open.spotify.com/album/6zgfazM9A4dYfW0JrI3nkF?si=rFUOeoT-TTaJDNMgRxGJfg&nd=1"><img src="./images/social_media/spotify_small.png" alt="Spotify" /></a></li>
                    <li><a class="stream-link" target="_blank" href="https://music.apple.com/ch/album/i-ragazzi-della-nebbia-ep/1709643654"><img src="./images/social_media/apple_music_small.png" alt="Apple Music" /></a></li>
                    <li><a class="stream-link" target="_blank" href="https://mistermilano.bandcamp.com/album/i-ragazzi-della-nebbia"><img src="./images/social_media/bandcamp_small.png" alt="Bandcamp" /></a></li>
                </ul>
            </div>
            <div class="c-col-6">
                <h2>Social:</h2>
                <ul class="stream-list">
                    <li><a class="social-link" target="_blank" href="https://www.instagram.com/mister__milano/"><img src="./images/social_media/instagram.svg" alt="Instagram" /></a></li>
                    <li><a class="social-link" target="_blank" href="https://www.facebook.com/MisterMilanos/"><img src="./images/social_media/facebook.svg" alt="Facebook" /></a></li>
                    <li><a class="social-link" target="_blank" href="https://www.youtube.com/@blaublaurecords9786"><img src="./images/social_media/youtube.svg" alt="YouTube" /></a></li>
                </ul>
            </div>
        </div>
    </div>
    
    
    <div class="c-container c-section-title">
        <div class="c-row">
            <div class="c-col-8">
                <h2>Supported by:</h2>
            </div>
        </div>
    </div>
    <div class="c-container c-support">
        <div class="c-row">


            <div class="c-col-3">
                <a href="https://www.biel-bienne.ch" target="_blank"><img src="./images/logo_biel.jpeg" /></a>
            </div>
            <div class="c-col-3">
                <a href="https://www.swisslos.ch/de/informationen/guter-zweck/kantonale-fonds/funktion-und-adressen.html" target="_blank"><img src="./images/logo_suisslos.png" /></a>
            </div>
            <div class="c-col-3">
                <a href="https://www.fondation-suisa.ch/" target="_blank"><img src="./images/logo_suisa_2.png" /></a>
            </div>
            <div class="c-col-3">
                <a href="https://prohelvetia.ch" target="_blank"><img src="./images/logo_prohelvetia.jpg" /></a>
            </div>
        </div>
        <div class="c-row">
            <div class="c-col-3">
                <a href="http://interpreten.ch/" target="_blank"><img src="./images/logo_sig.png" /></a>
            </div>
            <div class="c-col-3">
                <a href="https://www.stadt-zuerich.ch/prd/de/index/kultur.html" target="_blank"><img src="./images/logo_zuerich.svg" /></a>
            </div>
            <div class="c-col-3">
                <a href="https://www.ernst-goehner-stiftung.ch" target="_blank"><img src="./images/logo_EGS.svg" /></a>
            </div>
        </div>
    </div>



    <!-- section title -->
    <div class="c-container c-albums">
        <div class="c-row">
            <div class="c-col-6">
                <h2>Contact:</h2>
                <p><a class="button" href="mailto:mistermilano@gmx.net">mistermilano@gmx.net</a></p>
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
>>>>>>> mister
