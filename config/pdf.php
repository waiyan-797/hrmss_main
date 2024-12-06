<?php

return [
    'mode'                     => 'utf-8',
    'format'                   => 'A4',
    'default_font_size'        => '13',
    'default_font'             => 'pyidaungsu', 
    'margin_left'              => 10,
    'margin_right'             => 10,
    'margin_top'               => 10,
    'margin_bottom'            => 10,
    'margin_header'            => 0,
    'margin_footer'            => 0,
    'orientation'              => 'R',
    'title'                    => 'Laravel mPDF',
    'subject'                  => '',
    'author'                   => '',
    'watermark'                => '',
    'show_watermark'           => false,
    'show_watermark_image'     => false,
    'watermark_font'           => 'pyidaungsu',
    'display_mode'             => 'fullpage',
    'watermark_text_alpha'     => 0.1,
    'watermark_image_path'     => '',
    'watermark_image_alpha'    => 0.2,
    'watermark_image_size'     => 'D',
    'watermark_image_position' => 'P',
    'custom_font_dir'          => public_path('fonts/'), 
    'custom_font_data'         => [
        'pyidaungsu' => [ // Name of the font
            // 'R'  => 'One_pyidaungsu_Regular.ttf',
            'R'  => 'pyidaungsu-1.3.ttf',
            'B'  => 'pyidaungsu-1.3.ttf',
            'I'  => 'pyidaungsu-1.3.ttf',
            'BI'  => 'pyidaungsu-1.3.ttf',
            
            
          
    // 'B' => "PYIDAUNGSU-2.5.1_BOLD.ttf",
    // 'I'  => 'One_pyidaungsu_Regular.ttf',

    // 'BI'  => 'One_pyidaungsu_Regular.ttf',

    // 'I' => "verdanai.ttf",
    // 'BI' => "verdanaz.ttf",
        ],
    ],
    'auto_language_detection'  => true,
    'temp_dir'                 => storage_path('app'),
    'pdfa'                     => true,
    'pdfaauto'                 => true,
    'use_active_forms'         => false,
    
];
