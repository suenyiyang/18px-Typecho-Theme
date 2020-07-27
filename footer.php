<?php if (!defined('__TYPECHO_ROOT_DIR__')) {
    exit;
}
?>

        </div><!-- end .row -->
    </div>
</div><!-- end #body -->

<footer id="footer" role="contentinfo">
    <div class="other-info">

    </div>
    <div class="beian-number">
        <?php echo $this->options->beian ? "<a href='http://www.miit.gov.cn/'>{$this->options->beian}</a>" : ''; ?>
    </div>
    <?php if ($this->options->footerOptions && in_array('copyright', $this->options->footerOptions)): ?>
        &copy; <span><?php echo $this->options->copyrightText; ?></span> <a href="<?php $this->options->siteUrl();?>"><?php $this->options->title();?></a>.
    <?php endif;?>
    <div class="my-18px">
        <?php _e('Powered by <a href="http://www.typecho.org">Typecho</a> Theme by <a href="https://18px.shaunyoung.cn">18px</a> designed by <a href="https://shaunyoung.cn">小扬Shaun</a> with ');?>
        <span style='color:#d14836'>❤</span>
    </div>

</footer><!-- end #footer -->

<?php $this->footer();?>
<script src="/usr/themes/18px/assets/js/index.js"></script>
</body>
</html>
