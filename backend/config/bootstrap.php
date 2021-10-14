<?php
Yii::$container->set('dosamigos\tinymce\TinyMce', [
    'language' => 'ru',
    'options' => ['rows' => 20],
    'clientOptions' => [
        'plugins' => [
            'advlist autolink lists link charmap hr preview pagebreak',
            'searchreplace wordcount textcolor visualblocks visualchars code fullscreen nonbreaking',
            'emoticons save insertdatetime media table contextmenu template paste image responsivefilemanager filemanager print',
            'tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry',
        ],
        'toolbar' => 'undo redo | print emoticons |styleselect | bold underline italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | responsivefilemanager link image media | tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry',
        'external_filemanager_path' => '/admin/plugins/responsivefilemanager/filemanager/',
        'filemanager_title' => 'Responsive Filemanager',
        'external_tiny_mce_wiris_path' => '/admin/plugins/tiny_mce_wiris/',
        'external_plugins' => [
            'filemanager' => '/admin/plugins/responsivefilemanager/filemanager/plugin.min.js',
            'responsivefilemanager' => '/admin/plugins/responsivefilemanager/tinymce/plugins/responsivefilemanager/plugin.min.js',
            'tiny_mce_wiris' => 'https://www.wiris.net/demo/plugins/tiny_mce/plugin.js'
        ],
        'relative_urls' => false,
    ]
]);