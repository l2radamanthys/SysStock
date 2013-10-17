<!DOCTYPE html>
<htmtl>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?echo (isset($page_title))? $page_title: "Systema de Stock";?></title>
    
    <link rel="stylesheet" media="all"  href="<?=base_url();?>media/styles/reset.css" />
    <link rel="stylesheet" media="all"  href="<?=base_url();?>/media/styles/page.css" />
    <link rel="stylesheet" media="all"  href="<?=base_url();?>/media/styles/menu.css" />
    <link rel="stylesheet" media="all"  href="<?=base_url();?>/media/styles/forms.css" />
    <link rel="stylesheet" media="all"  href="<?=base_url();?>/media/styles/jquery-ui-1.10.3.custom.css" />
    
    <?echo (isset($css_include))? $css_include: "<!-- css -->";?>
    
    <script type="text/javascript" src="<?=base_url();?>media/scripts/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>media/scripts/jquery-ui-1.10.3.custom.js"></script>
    
    <?echo (isset($js_include))? $js_include: "<!-- js -->";?>    
</head>
    
<body>
    <div class="header-cont">
        <!-- header -->
        <header class="header">
            <p class="title">Systema de Stock</p>
            <br /> 
        </header>