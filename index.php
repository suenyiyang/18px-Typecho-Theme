<?php
/**
 * 这是由 <a href="https://shaunyoung.cn/" target="_blank">小扬Shaun</a> 开发的一套简洁模板
 *
 * @package 拾捌px
 * @author 小扬Shaun
 * @version 1.0.0
 * @link https://shaunyoung.cn/
 */

if (!defined('__TYPECHO_ROOT_DIR__')) {
    exit;
}

$this->need('header.php');
?>

<?php $this->need('sidebar.php');?>

<div class="col-mb-12 col-8 main" id="main" role="main">
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
  <nav class="page-nav">
	<?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;');?>
	</nav>
</div><!-- end #main-->


<?php $this->need('footer.php');?>
