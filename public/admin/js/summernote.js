jQuery(function(e){
    'use strict';
    $(document).ready(function() {
        $('.summernote').summernote({
            stripTags: ['style'],
            stripAttributes: ['border', 'style'],
            onAfterStripTags: function ($html) {
                $html.find('table').addClass('table');
                return $html;
            }
        });
    });
  });