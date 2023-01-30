<script  src="https://translate.google.com/translate_a/element.js?cb=LoadTs"></script>
<script >
 function LoadTs(){
    new google.translate.TranslateElement({
      defaultLanguage: 'bn',
      pageLanguage: 'bn',
     // includedLanguages: 'en,bn',
      layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
      autoDisplay:false,
      multiLanguagePage:true
    },'gt-el');

    // hide gt top bar
    var toolBar = document.getElementsByClassName('goog-te-banner-frame skiptranslate')[0];
    if(toolBar !== undefined) {
        toolBar.style.display  = 'none';
        document.body.style.top = '0px';
    }

    // var toolBar = document.getElementsByClassName('goog-te-gadget-simple')[0];
    // if(toolBar !== undefined) {
    //     toolBar.style.width  = '100%'; 
    // }

  };
</script>

@if (Request::route()->getName() != 'docs')
<script>
  $(document).ready(function(){
    $('#gt-el').bind('DOMNodeInserted', function(event) {
      $('.goog-te-menu-value span:first').html('Translate');
      $('.goog-te-menu-frame.skiptranslate').load(function(){
        setTimeout(function(){
          $('.goog-te-menu-frame.skiptranslate').contents().find('.goog-te-menu2-item-selected .text').html('Translate');    
        }, 100);
      });
    });
  });
</script> 
@else
<script>
    $('#gt-el').bind('DOMNodeInserted', function(event) {
      $('.goog-te-menu-value span:first').html('Translate');
      $('.goog-te-menu-frame.skiptranslate').load(function(){
        setTimeout(function(){
          $('.goog-te-menu-frame.skiptranslate').contents().find('.goog-te-menu2-item-selected .text').html('Translate');    
        }, 100);
      });
    });

</script>  
@endif

