<?php 
if (is_post_type_archive('dicas')) { get_template_part('search', 'dicas'); }
else { get_template_part('404'); }
?>