<?php if (!defined('__TYPECHO_ROOT_DIR__')) {
    exit;
}
?>
<div class="col-mb-12 col-offset-1 col-3 kit-hidden-tb" id="secondary" role="complementary">

    <?php if ($this->options->sidebarBlock && in_array('ShowBlogInfo', $this->options->sidebarBlock)): ?>
    <!-- 博主信息 -->
    <section id="blog-user-profile" class="widget <?php echo in_array('HideBlogInfo', $sidebarM) ? $hideClass : ''; ?>">
        <h3 class="widget-title"><?php _e('博客信息');?></h3>
        <div class="widget-list personal-information">
            <div id="user">
                <img src="<?php echo $this->options->logoUrl ? $this->options->logoUrl : $this->options->themeUrl('assets/img/avatar.png'); ?>" alt="<?php echo $this->options->nickname ? $this->options->nickname . '的头像' : $this->options->title . '的头像'; ?>" class="user-avatar">
                <div class="profile-content">
                    <a class="user-name <?php echo $color['link']; ?>" target="_blank" href="<?php echo $this->options->nicknameUrl ? $this->options->nicknameUrl : $this->options->siteUrl; ?>"><?php echo $this->options->nickname ? $this->options->nickname : $this->options->title; ?></a>
                    <p class="user-introduction"><?php echo $this->options->introduction ? $this->options->introduction : $this->options->description; ?></p>
                </div>
            </div>
            <div class="website-18px">
                <?php Typecho_Widget::widget('Widget_Stat')->to($quantity);?>
                <div class="info float-left border-right">
                    <p class="quantity"><?php $quantity->publishedPostsNum();?></p>
                    文章数
                </div>
                <div class="info float-left border-right">
                    <p class="quantity"><?php $quantity->publishedCommentsNum();?></p>
                    评论数
                </div>
                <div class="info float-left">
                    <p class="quantity"><?php echo $this->options->birthday ? round((time() - strtotime($this->options->birthday)) / 86400, 0) . '天' : '0天'; ?></p>
                    运行天数
                </div>
            </div>
        </div>
    </section>
    <?php endif;?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
    <!-- 最新文章 -->
    <section class="widget" id="new-post-18px">
		<h3 class="widget-title"><?php _e('最新文章');?></h3>
        <ul class="widget-list">
            <?php $latestArticles = $this->widget('Widget_Contents_Post_Recent');?>
            <?php while ($latestArticles->next()): ?>
                <a target="<?php $this->options->sidebarLinkOpen();?>" class="<?php echo $color['link']; ?>" href="<?php $latestArticles->permalink();?>">
                    <!-- <?php $img = postImg($latestArticles);?> -->
                    <!-- <img src="<?php echo $img ? $img : "{$this->options->siteUrl}usr/themes/18px/assets/img/18px.jpg"; ?>" alt=""> -->
                    <p><?php $latestArticles->title()?></p>
                </a>
            <?php endwhile;?>
        </ul>
    </section>
    <?php endif;?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>

    <!-- 最近回复 -->
    <section class="widget" id="recent-reply-18px">
		<h3 class="widget-title"><span><?php _e('最近回复');?></span></h3>
        <ul class="widget-list">
        <?php $this->widget('Widget_Comments_Recent')->to($comments);?>
        <?php while ($comments->next()): ?>
            <li>
                <a href="<?php $comments->permalink();?>" target="<?php $this->options->sidebarLinkOpen();?>">
                    <?php $comments->gravatar('40', '');?>
                    <div class="name-comment">
                        <span class="name"><?php $comments->author(false);?></span>
                        <span class="comment"><?php $comments->excerpt(35, '...');?></span>
                    </div>
                </a>
            </li>
        <?php endwhile;?>
        </ul>
    </section>
    <?php endif;?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>

    <!-- 标签云 -->
    <?php if ($this->options->sidebarBlock && in_array('ShowTag', $this->options->sidebarBlock)): ?>
        <section class="widget" id="tag-18px">
            <h3 class="widget-title">标签云</h3>
            <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=1&desc=0&limit=50')->to($tags);?>
            <?php if ($tags->have()): ?>
            <div class="tag-list pt-2 widget-list" aria-label="标签云" role="list">
                <?php while ($tags->next()): ?>
                    <a role="listitem" target="<?php $this->options->sidebarLinkOpen();?>" data-toggle="tooltip" data-placement="top" href="<?php $tags->permalink();?>" rel="tag" class="size-<?php $tags->split(5, 10, 20, 30);?> <?php echo $color['tag']; ?> <?php echo $rounded; ?>" title="<?php $tags->count();?> 篇文章"><?php $tags->name();?></a>
                <?php endwhile;?>
            </div>
            <?php else: ?>
                <p class="text-center pb-2 widget-list"><?php _e('没有任何标签');?></p>
            <?php endif;?>
        </section>
    <?php endif;?>

    <!-- 分类 -->
    <section class="widget" id="category-18px">
		<h3 class="widget-title"><span><?php _e('分类');?></span></h3>
        <?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list');?>
	</section>
    <?php endif;?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
    <!-- 归档 -->
    <section class="widget" id="">
		<h3 class="widget-title"><span><?php _e('归档');?></span></h3>
        <ul class="widget-list">
            <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
    ->parse('<li><a href="{permalink}">{date}</a></li>');?>
        </ul>
	</section>
    <?php endif;?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
    <!-- 订阅 -->
	<section class="widget">
		<h3 class="widget-title"><span><?php _e('其它');?></span></h3>
        <ul class="widget-list">
            <?php if ($this->user->hasLogin()): ?>
				<li class="last"><a href="<?php $this->options->adminUrl();?>" target="<?php $this->options->sidebarLinkOpen();?>"><?php _e('进入后台');?> (<?php $this->user->screenName();?>)</a></li>
                <li><a href="<?php $this->options->logoutUrl();?>" target="<?php $this->options->sidebarLinkOpen();?>"><?php _e('退出');?></a></li>
            <?php else: ?>
                <li class="last"><a href="<?php $this->options->adminUrl('login.php');?>" target="<?php $this->options->sidebarLinkOpen();?>"><?php _e('登录');?></a></li>
            <?php endif;?>
            <li><a href="<?php $this->options->feedUrl();?>" target="<?php $this->options->sidebarLinkOpen();?>"><?php _e('文章 RSS');?></a></li>
            <li><a href="<?php $this->options->commentsFeedUrl();?>" target="<?php $this->options->sidebarLinkOpen();?>"><?php _e('评论 RSS');?></a></li>
        </ul>
	</section>
    <?php endif;?>

</div><!-- end #sidebar -->
