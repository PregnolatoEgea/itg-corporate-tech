<?php
$url=get_permalink();
?>
<a href="https://www.linkedin.com/cws/share?url=".<?php echo $url; ?>>SVG Linkedin</a>
<a href="http://twitter.com/share" class="twitter-share-button"
   data-url="<?php echo $url; ?>"
   data-via="italgas"
   data-text="<?php the_title(); ?>"
   data-related="Italgas"
   data-count="vertical">SVG Twtitter</a>
<script src="https://platform.twitter.com/widgets.js" type="text/javascript"></script>
