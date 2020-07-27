<?php if (!defined('__TYPECHO_ROOT_DIR__')) {
    exit;
}
?>
<!DOCTYPE HTML>
<html class="no-js">
<head>
    <meta charset="<?php $this->options->charset();?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="<?php $this->options->description();?>">
    <meta name="keywords" content="<?php $this->options->keywords()?>">
    <title><?php $this->archiveTitle(array(
    'category' => _t('分类 %s 下的文章'),
    'search' => _t('包含关键字 %s 的文章'),
    'tag' => _t('标签 %s 下的文章'),
    'author' => _t('%s 发布的文章'),
), '', ' - ');?><?php $this->options->title();?><?php echo $this->options->subTitle ? " - {$this->options->subTitle}" : ''; ?></title>

    <!-- 使用url函数转换相关路径 -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/style.css');?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl("assets/css/canvas/{$this->options->canvasBg}.css");?>">
    <?php if ($this->options->themeColor): ?>
        <style>
            :root{
                --theme-color:<?php echo $this->options->themeColor ?>;
            }
        </style>
    <?endif;?>
    <!-- 网站logo -->
    <link rel="shortcut icon" href="<?php echo $this->options->logoUrl; ?>" type="image/x-icon">

    <!--[if lt IE 9]>
    <script src="//cdnjscn.b0.upaiyun.com/libs/html5shiv/r29/html5.min.js"></script>
    <script src="//cdnjscn.b0.upaiyun.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header();?>
</head>
<body>
<canvas id="canvas" width="1536" height="834"></canvas>
<script src="<?php $this->options->canvasBg != 'none' ? $this->options->themeUrl("assets/js/canvas/{$this->options->canvasBg}.js") : '';?>"></script>
<header id="header" class="clearfix">
    <div class="container">
        <div class="row">
            <!-- 网站logo -->
            <div class="site-name col-mb-12 col-9">
                <a id="logo" href="<?php $this->options->siteUrl();?>">
                    <img src="<?php $this->options->logoUrl()?>" alt="<?php $this->options->title()?>" />
                    <div class="site-name-text">
                        <?php $this->options->title()?>
                    </div>
                </a>
            </div>

            <!-- 目录 -->
            <div class="col-mb-12 header-category">
                <nav id="nav-menu" class="clearfix" role="navigation">
                    <a<?php if ($this->is('index')): ?> class="current"<?php endif;?> href="<?php $this->options->siteUrl();?>"><?php _e('首页');?></a>
                    <?php $this->widget('Widget_Contents_Page_List')->to($pages);?>
                    <?php while ($pages->next()): ?>
                    <a<?php if ($this->is('page', $pages->slug)): ?> class="current"<?php endif;?> href="<?php $pages->permalink();?>" title="<?php $pages->title();?>"><?php $pages->title();?></a>
                    <?php endwhile;?>
                </nav>
            </div>

            <!-- 搜索 -->
            <div class="site-search col-3 kit-hidden-tb">
                <form id="search" method="post" action="<?php $this->options->siteUrl();?>" role="search">
                    <label for="s" class="sr-only"><?php _e('搜索关键字');?></label>
                    <input type="text" id="s" name="s" class="text" required="required" placeholder="<?php _e('输入关键字搜索');?>" />
                    <button type="submit" class="submit"><?php _e('搜索');?></button>
                </form>
            </div>

            <!-- 展开折叠按钮 -->
            <div class="burger">
                <div class="burger-line1"></div>
                <div class="burger-line2"></div>
                <div class="burger-line3"></div>
            </div>

            <!-- 展开折叠 -->
            <div class="nav-folder">
                <!-- 目录 -->
                <div class="col-mb-12">
                    <nav id="nav-menu" class="clearfix" role="navigation">
                        <a<?php if ($this->is('index')): ?> class="current"<?php endif;?> href="<?php $this->options->siteUrl();?>"><?php _e('首页');?></a>
                        <?php $this->widget('Widget_Contents_Page_List')->to($pages);?>
                        <?php while ($pages->next()): ?>
                        <a<?php if ($this->is('page', $pages->slug)): ?> class="current"<?php endif;?> href="<?php $pages->permalink();?>" title="<?php $pages->title();?>"><?php $pages->title();?></a>
                        <?php endwhile;?>
                    </nav>
                </div>

                <!-- 搜索 -->
                <div class="site-search col-3 kit-hidden-tb">
                    <form id="search" method="post" action="<?php $this->options->siteUrl();?>" role="search">
                        <label for="s" class="sr-only"><?php _e('搜索关键字');?></label>
                        <input type="text" id="s" name="s" class="text" required="required" placeholder="<?php _e('输入关键字搜索');?>" />
                        <button type="submit" class="submit"><?php _e('搜索');?></button>
                    </form>
                </div>
            </div>
        </div><!-- end .row -->
    </div>
</header><!-- end #header -->
<div id="body">
    <div class="container">
        <div class="row body-row">



