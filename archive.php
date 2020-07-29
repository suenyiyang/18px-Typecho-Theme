<?php if (!defined('__TYPECHO_ROOT_DIR__')) {
    exit;
}
?>
<?php $this->need('header.php');?>

<?php $this->need('sidebar.php');?>
    <div class="archive-container">
        <h3 class="archive-title"><?php $this->archiveTitle(array(
    'category' => _t('分类 %s 下的文章'),
    'search' => _t('包含关键字 %s 的文章'),
    'tag' => _t('标签 %s 下的文章'),
    'author' => _t('%s 发布的文章'),
), '', '');?></h3>
        <div class="col-mb-12 col-8" id="archive-main" role="main">
						<?php if ($this->have()): ?>
						<?php while ($this->next()): ?>
							<article class="post" itemscope itemtype="http://schema.org/BlogPosting">
								<h2 class="post-title" itemprop="name headline">
										<a itemprop="url" href="<?php $this->permalink()?>" target="<?php $this->options->listLinkOpen();?>"><?php $this->title()?></a>
								</h2>
								<div class="post-coverPic" style="background-color:<?php echo $this->fields->coverPicBgc ? $this->fields->coverPicBgc : "rgb(245,245,245)"; ?>;">
										<a itemprop="url" href="<?php $this->permalink()?>" target="<?php $this->options->listLinkOpen();?>">
												<img src="<?php $this->fields->coverPic ? $this->fields->coverPic() : $this->options->themeUrl('assets/img/18px.jpg');?>" alt="">
										</a>
									</div>
								<div class="post-summary" itemprop="articleBody">
										<p><?php $this->fields->summaryContent ? $this->fields->summaryContent() : $this->excerpt($this->options->summary, '...');?></p>
								</div>
								<ul class="post-meta">
										<!-- 作者 -->
										<li itemprop="author" itemscope itemtype="http://schema.org/Person"><i class="icon icon-author"></i><a itemprop="name" href="<?php $this->author->permalink();?>" target="<?php $this->options->listLinkOpen();?>" rel="author"><?php $this->author();?></a></li>
										<!-- 时间 -->
										<li><i class="icon icon-time"></i><time datetime="<?php $this->date('c');?>" itemprop="datePublished"><?php $this->date();?></time></li>
										<!-- 分类 -->
										<li><i class="icon icon-category"></i><?php $this->category('');?></li>
										<!-- 评论 -->
										<li itemprop="interactionCount"><i class="icon icon-comment"></i><a itemprop="discussionUrl" href="<?php $this->permalink()?>#comments" target="<?php $this->options->listLinkOpen();?>"><?php $this->commentsNum('%d 条评论');?></a></li>
										<!-- 浏览量 -->
										<li><i class="icon icon-eye"></i><span><?php echo getPostView($this); ?>次</span></li>
								</ul>
							</article>
						<?php endwhile;?>
            <?php else: ?>
                <article class="post">
                    <h2 class="post-title"><?php _e('没有找到内容');?></h2>
                </article>
            <?php endif;?>

            <div class="page-nav">
					<?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;');?>
			</div>
        </div><!-- end #main -->
    </div>



	<?php $this->need('footer.php');?>
