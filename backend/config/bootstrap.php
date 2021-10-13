<?php
Yii::$container->set('dosamigos\tinymce\TinyMce', [
    'language' => 'ru',
    'options' => ['rows' => 20],
    'clientOptions' => [
        'plugins' => [
            'advlist autolink lists link charmap hr preview pagebreak',
            'searchreplace wordcount textcolor visualblocks visualchars code fullscreen nonbreaking',
            'save insertdatetime media table contextmenu template paste image responsivefilemanager filemanager',
        ],
        'toolbar' => 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | responsivefilemanager link image media',
        'external_filemanager_path' => '/admin/plugins/responsivefilemanager/filemanager/',
        'filemanager_title' => 'Responsive Filemanager',
        'external_plugins' => [
            'filemanager' => '/admin/plugins/responsivefilemanager/filemanager/plugin.min.js',
            'responsivefilemanager' => '/admin/plugins/responsivefilemanager/tinymce/plugins/responsivefilemanager/plugin.min.js',
        ],
        'relative_urls' => false,
    ]
]);