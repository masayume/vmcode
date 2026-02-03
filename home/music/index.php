  <html>
<head>
<title>MUSIC page - masayume</title>
    <!-- Bootstrap core CSS -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/home.css" rel="stylesheet">
    <meta charset="UTF-8">
<style>
  body { 
/*	background-image:url('img/ub-wallp.jpg'); 
	background-color: #0033cc;
*/

/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#1e5799+0,2989d8+50,207cca+51,7db9e8+100;Blue+Gloss+Default */
	background: rgb(30,87,153); /* Old browsers */
	background: -moz-linear-gradient(-45deg, rgba(80,37,153,1) 0%, rgba(131,47,216,1) 50%, rgba(122,32,202,1) 51%, rgba(185,125,232,1) 100%); /* FF3.6-15 */
	background: -webkit-linear-gradient(-45deg, rgba(80,37,153,1) 0%,rgba(131,47,216,1) 50%,rgba(122,32,202,1) 51%,rgba(185,125,232,1) 100%); /* Chrome10-25,Safari5.1-6 */
	background: linear-gradient(135deg, rgba(80,37,153,1) 0%,rgba(131,47,216,1) 50%,rgba(122,32,202,1) 51%,rgba(185,125,232,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1e5799', endColorstr='#7db9e8',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
  }
  a, a:visited {  color: #ffffff; }
  h3, h4 {  color: #00aaff; }
  .container{ text-align:left; border:1px solid #666; }
  ._img{ display:inline-block; margin:5px 20px; padding:5px; border:1px solid #CCC; }
  ._text{ display:inline-block; margin:5px 20px; padding:5px; border:1px solid #CCC; top: 0px; }
  ._exa{ display:inline-block; margin:2px 1px; padding:2px; border:1px solid #CCC; top: 0px; vertical-align: text-top;}
</style>

</head>
<body>
<div class="container-fluid">

  <div class="_exa">
    <h4>MUSIC PAGE</h4>
      <ul>
        <li> <a href="/index.php" target="_blank"><b>INDEX</b></a> 
             <a href="/godot" target="_blank"><b>GODOT</b></a> 
             <a href="/inspire.php" target="_blank"><b>INSPIRE</b></a> </li>
        <li> <a href="/pixelart/" target="_blank"><b>PIXELART</b></a> 
             <a href="/tools.php" target="_blank"><b>TOOLS</b></a> </li>
        <li> <a href="/nihongo.php" target="_blank"><b>NIHONGO page</b></a> </li>
        <li> <a href='/training'>training</a> <a href="https://www.masayume.it/training">(remote)</a></li>
      </ul>

    <h4>Video,Music,Sound</h4>
      <ul>
        <li><a href="/jsSID">jsSID</a> <a href='https://github.com/jhohertz/jsSID'>gh</a> - 
            <a href="/3dpiano">piano3D</a> <a href='https://github.com/reality3d/3d-piano-player'>gh</a></li>
        <li><a href="/demon/soundboard/">soundboard</a></li>
      </ul>
 
  </div>


  <div class="_exa">

    <h4>STRUDEL</h4>
      <ul>
        <li> <a href="/HTML5/holden/index.php?art1=211&art2=211" target="_blank"><b>MAIN holden★</b></a> 
        <li> <a href="/HTML5/holden/index.php?art1=192&art2=192&tag1=STRUDEL&tag2=STRUDEL" target="_blank"><b>Songs ★</b></a> 
        <li> <a href="/HTML5/holden/index.php?art1=15&art2=15&tag1=STRUDEL&tag2=STRUDEL" target="_blank"><b>Albums ★</b></a> 
      </ul>
 
    <h4>EXAMPLES</h4>
      <details>
        <summary><strong><b>STRUDEL ⬇️</b></strong></summary> 
          <p>
            <ul>
            </ul>
          </p>
      </details>

  </div>
    
  <div class="_exa">

    <div class="image-container">
      <!-- php_image_show -->
      <?php
        $ai_dirs    = array('inspire/STRUDEL/', 'inspire/@Music/');
        $directory  = $ai_dirs[array_rand($ai_dirs, 1)];
        $images     = glob($directory . '*.{jpg,jpeg,png,gif,svg,webp,mp4}', GLOB_BRACE);
        if ($images) {
          $image      = $images[array_rand($images)];
          $imagefile  = $image;
          echo "      <img src=\"" . $imagefile . "\" title=\"$imagefile\" width=\"300\">";
        }
      ?>
      <div class="overlay-text">Strudel</div>
    </div>

  </div>


<div class="_exa">

    <div class="image-container">
      <!-- php_image_show -->
      <?php
        $ai_dirs    = array('inspire/@COVERS/AlbumArt/');
        $directory  = $ai_dirs[array_rand($ai_dirs, 1)];
        $images     = glob($directory . '*.{jpg,jpeg,png,gif,svg,webp,mp4}', GLOB_BRACE);
        $image      = $images[array_rand($images)];
        $imagefile  = $image;
        echo "      <img src=\"" . $imagefile . "\" title=\"$imagefile\" width=\"300\">";
      ?>
      <div class="overlay-text">Albums</div>
    </div>

    <br clear="all">

    <div class="image-container">
      <!-- php_image_show -->
      <?php
        $ai_dirs    = array('inspire/@COVERS/AlbumArt/songs/');
        $directory  = $ai_dirs[array_rand($ai_dirs, 1)];
        $images     = glob($directory . '*.{jpg,jpeg,png,gif,svg,webp,mp4}', GLOB_BRACE);
        $image      = $images[array_rand($images)];
        $imagefile  = $image;
        echo "      <img src=\"" . $imagefile . "\" title=\"$imagefile\" width=\"300\">";
      ?>
      <div class="overlay-text">Songs</div>
    </div>

</div>



  
  <div class="_exa">
    <h4>MUSIC</h4>
  <ul>
    <li><a href="https://github.com/odoare/TeAr" title="text arpeggiator"><b>TeAr</b></a>
        <a href="https://www.masayume.it/blog9/web/content/tear-text-arpeggiator"><b>my</b></a></li>
    <li><a href="https://chiptune.app/">Chipjs★</a>
        <a href="https://www.masayume.it/blog9/web/content/famistudio/">famistudio★</a></li>
    <li><a href="https://telesplit.com/"><b>telesplit ★</b></a> <a href="https://www.masayume.it/blog9/web/content/telesplit"><b>my</b></a></li>
    <li><a href="http://everynoise.com/">everysound ★</a></li>
    <li><a href="https://www.zophar.net/music"><b>zophar.net ★★</b></a></li>
    <li><a href="/demon/OSS/oss.php">OSS ★</a>, 
        <a href="https://incompetech.com/music">incompetech</a></li>
    <li><a href="https://openai.com/blog/musenet/#try">musenet</a>
        <a href="https://musescore.com/user/2891181/sheetmusic"><b>musescore</b></a></li>
    <li><a href="https://www.bespokesynth.com/"><b>bespoke synth</b></a>
        <a href="https://www.masayume.it/blog9/web/content/bespoke-synth"><b>my</b></a></li>
    <li><a href="https://onlinesequencer.net/"><b>online sequencer ★</b></a></li>

    <li><a href="https://boscaceoil.net/linux-info.html">BoscaCeoil</a>,
        <a href="tenori-off.glitch.me">TenoriOff</a></li>
    <li><a href="/jsSID">jsSID</a> <a href='https://github.com/jhohertz/jsSID'>gh</a>,
        <a href="/3dpiano">piano3D</a> <a href='https://github.com/reality3d/3d-piano-player'>gh</a></li>
    <li><a href="https://www.youtube.com/c/8bitMusicTheory/playlists" target="_blank"><b>8bitMusicTheory ★</b></a></li>
    <li><a href="https://icons8.com/music/?ref=masayume.it" target="_blank"><b><i>Fugue</i></b></a>, 
        <a href="https://no-lick.com/?ref=masayume.it" target="_blank"><b><i>No Lick</i></b></a></li>
    <li><a href="https://soundcloud.com/soundsuigood" target="_blank"><b><i>sounds ui good</i></b></a></li>
    <li><a href="https://musicformakers.com/?ref=masayume.it" target="_blank"><b><i>music for makers</i></b></a></li>
    <li><a href="http://stampede.it/?ref=masayume.it" target="_blank"><b><i>stampede</i></b></a>
        <a href="https://musicmaker.site/?ref=masayume.it" target="_blank"><b><i>musicmaker</i></b></a></li>
    <li><a href="https://www.tunepocket.com/?ref=masayume.it" target="_blank"><b><i>TunePocket</i></b></a>
        <a href="https://www.noteflight.com/home">noteflight★</a></li>
    <li><a href="">SID2MIDI WIN ★</a></li>
    <li><a href="https://www.tony-b.org/">Tony-B 機</a> <a href="https://teropa.info/musicmouse/"><b>music鼠</b></a></li>
    <li><a href="https://openmusicarchive">O.M.A.</a> <a href="https://musopen.org/">musopen</a></li>
    <li><a href="https://freepd.com">freepd</a>
        <a href="https://imslp.org/wiki/Main_Page">imslp</a>
        <a href="https://www.cpdl.org/wiki/index.php/Main_Page">cpdl</a></li>
    <li><a href="https://ccmixter.org">ccmixter</a>
        <a href="https://www.youtube.com/c/audiolibrary-channel/videos">youtube</a></li>
    <li><a href="https://www.pond5.com/royalty-free-music/item/66815019-battle-fight-orchestral-cinematic-horns-games-indie-dev">POND5</a>        
    <li><a href="https://www.freemusicpublicdomain.com/">freemusic PD</a></li>
    <li><a href="https://www.freesoundtrackmusic.com/">freeSTmusic</a></li>
    <li><a href="https://www.vitling.xyz/toys/autotracker/"><b>rawWASM★</b></a>
        <a href="https://www.masayume.it/blog9/web/content/amiga-mod-music-online-bassoon-tracker"><b>my</b></a></li>
    <li><a href="https://www.vitling.xyz/toys/autotracker/"><b>Autotrackr★</b></a>
        <a href="https://publicdomain4u.com/music/">PD4u</a></li>
    <li><a href="https://eternalbox.dev/jukebox_index.html">eternalbox</a>
        </ul>

  </div>




  <div class="_exa">

    <h4>AI MUSIC</h4>
    <ul>
      <li><a href="https://suno.com/"><b>SUNO★</b></a></li>
      <li><a href="https://elevenlabs.io/music"><b>ElevenLabs★</b></a> </li>
      <li><a href="https://www.beatoven.ai/"><b>Beatoven★</b></a></li>
      <li><a href="https://www.udio.com/"><b>UDIO★</b></a> </li>
      <li><a href="https://huggingface.co/spaces/enzostvs/ai-jukebox"><b>AIjukebox★</b></a>
      <li><a href="https://www.aiva.ai/"><b>AIVAAI★</b></a>
          <a href="https://www.masayume.it/blog/content/aiva-ai-assisted-music-composing"><b>my</b></a></li></li>
    </ul>

    <h4>WORDS</h4>
      <ul>
        <li><a href="https://www.powerthesaurus.org/enclave/synonyms" target="_blank">power thesaurus</a></li>
        <li><a href="https://www.masayume.it/blog/content/onelook-reverse-thesaurus" target="_blank">reverse thesaurus</a></li>
      </ul>



  </div>

  <div class="_exa">
      <!-- php_image_show -->
      <?php
        $ai_dirs    = array('inspire/@JAPAN/', 'inspire/@CARTOONS/', 'inspire/@backs/', 
                            'inspire/@gnokkenland/', 'inspire/@drawthink/', 'inspire/@pixelart/', 'inspire/@TEXTURES/');
        $directory  = $ai_dirs[array_rand($ai_dirs, 1)];
      $images     = glob($directory . '*.{jpg,jpeg,png,gif,svg,webp}', GLOB_BRACE);
        $image      = $images[array_rand($images)];
        $imagefile  = $image;
        echo "      <img src=\"" . $imagefile . "\" title=\"$imagefile\" width=\"300\">";

      ?>

  </div>

<div class="_exa">
    <h4>??</h4>
    <ul>
      <li><a href="link" target="_blank">...</a></li>
      <li><a href="link" target="_blank">...</a></li>
    </ul>

  </div>


  <div class="_exa">
    <h4>??</h4>
    <ul>
      <li><a href="link" target="_blank">...</a></li>
      <li><a href="link" target="_blank">...</a></li>
    </ul>

  </div>

  <div class="_exa">
      <!-- php_image_show -->
      <?php
        $ai_dirs    = array('inspire/@backs/', 'inspire/@backs/101_dalmatians/');
        $directory  = $ai_dirs[array_rand($ai_dirs, 1)];
      $images     = glob($directory . '*.{jpg,jpeg,png,gif,svg,webp}', GLOB_BRACE);
        $image      = $images[array_rand($images)];
        $imagefile  = $image;
        echo "      <img src=\"" . $imagefile . "\" title=\"$imagefile\" width=\"400\">";

      ?>

  </div>  

  





</div> <!-- container -->

<!-- FOOTER -->
</body>
</html>
