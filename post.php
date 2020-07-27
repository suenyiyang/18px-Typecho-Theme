<?php if (!defined('__TYPECHO_ROOT_DIR__')) {
    exit;
}
?>
<?php $this->need('header.php');?>

<?php $this->need('sidebar.php');?>

<div class="col-mb-12 col-8" id="post-main" role="main">
    <article class="post-18px" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="post-title" itemprop="name headline"><a itemprop="url" href="<?php $this->permalink()?>"><?php $this->title()?></a></h1>
        <ul class="post-meta">
            <!-- 作者 -->
            <li itemprop="author" itemscope itemtype="http://schema.org/Person"><i class="icon icon-author"></i><a itemprop="name" href="<?php $this->author->permalink();?>" rel="author"><?php $this->author();?></a></li>
            <!-- 时间 -->
            <li><i class="icon icon-time"></i><time datetime="<?php $this->date('c');?>" itemprop="datePublished"><?php $this->date();?></time></li>
            <!-- 分类 -->
            <li><i class="icon icon-category"></i><?php $this->category(',');?></li>
            <!-- 评论 -->
            <li itemprop="interactionCount"><i class="icon icon-comment"></i><a itemprop="discussionUrl" href="<?php $this->permalink()?>#comments"><?php $this->commentsNum('%d 条评论');?></a></li>
            <!-- 浏览量 -->
            <li><i class="icon icon-eye"></i><span data-times="<?php echo getPostView($this); ?>"><?php echo getPostView($this); ?>次</span></li>
        </ul>
        <div class="post-content" itemprop="articleBody">
            <?php $this->content();?>
        </div>
        <p itemprop="keywords" class="tags"><?php _e('标签: ');?><?php $this->tags(', ', true, 'none');?></p>
    </article>
    <ul class="post-near">
        <li>上一篇: <?php $this->thePrev('%s', '没有了');?></li>
        <li>下一篇: <?php $this->theNext('%s', '没有了');?></li>
    </ul>
    <?php $this->need('comments.php');?>


</div><!-- end #main-->


<?php $this->need('footer.php');?>
