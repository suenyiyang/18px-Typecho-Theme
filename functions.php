<?php
if (!defined('__TYPECHO_ROOT_DIR__')) {
    exit;
}

// 主题配置
function themeConfig($form)
{
    // 网站logo地址
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', null, null, _t('站点 LOGO 地址'), _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO'));
    $form->addInput($logoUrl);

    // 个人简介
    $introduction = new Typecho_Widget_Helper_Form_Element_Text('introduction', null, null, _t('个人简介'), _t('在这里输入个人简介，会被展示在页面中，留空则使用设置中的站点描述信息'));
    $form->addInput($introduction);

    //  侧边栏博客信息的运行天数
    $birthday = new Typecho_Widget_Helper_Form_Element_Text('birthday', null, null, _t('站点创建时间'), _t('在这里填写站点创建时间后，在侧边栏的博客信息区域就会显示网站运行天数。如果省略 网站运行天数会显示为 0 天。站点创建时间的格式为：yyyy-mm-dd，例如：2019-11-11。'));
    $form->addInput($birthday);

    // 副标题
    $subTitle = new Typecho_Widget_Helper_Form_Element_Text('subTitle', null, '求实求真，大气大为', _t('网站副标题'), _t('在这里输入网站副标题，会被展示在网站标题之后'));
    $form->addInput($subTitle);

    // 备案号
    $beian = new Typecho_Widget_Helper_Form_Element_Text('beian', null, null, _t('备案号'), _t('在这里输入网站备案号，会自动加工信部备案官网超链接并放置在页面底部'));
    $form->addInput($beian);

    // 选择背景特效
    $canvasBg = new Typecho_Widget_Helper_Form_Element_Radio('canvasBg', array(
        'coderain' => '代码雨',
        'none' => '不使用',
    ), 'coderain', _t('背景特效'), _t('背景特效使用HTML5 canvas 标签'));
    $form->addInput($canvasBg);

    // 主题色
    $themeColor = new Typecho_Widget_Helper_Form_Element_Text('themeColor', null, null, _t('主题色'), _t('在这里输入十六进制主题色，留空将使用<span style="color:#1677b3;">默认主题色</span>'));
    $form->addInput($themeColor);

    // 侧边栏
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock',
        array(
            'ShowBlogInfo' => _t('显示博客信息'),
            'ShowRecentPosts' => _t('显示最新文章'),
            'ShowRecentComments' => _t('显示最近回复'),
            'ShowCategory' => _t('显示分类'),
            'ShowTag' => _t('显示标签云'),
            'ShowArchive' => _t('显示归档'),
            'ShowOther' => _t('显示其它杂项')),
        array('ShowBlogInfo', 'ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowTag', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'), _t('在这里选择需要展示在侧边栏的内容'));
    $form->addInput($sidebarBlock->multiMode());

    // 摘要字数
    $summary = new Typecho_Widget_Helper_Form_Element_Text('summary', null, '100', _t('文章摘要字数'), _t('在这里输入文章摘要字数，默认为100字'));
    $form->addInput($summary);

    //  文章列表链接跳转
    $listLinkOpen = new Typecho_Widget_Helper_Form_Element_Radio('listLinkOpen', array(
        '_self' => '直接从当前页面跳转',
        '_blank' => '在新标签页中打开',
    ), '_self', _t('文章列表的文章链接跳转方式'), _t('这里的文章列表包括 首页、分类页、标签页、搜索页 左侧的文章链接。'));
    $form->addInput($listLinkOpen);

    //  侧边栏链接跳转
    $sidebarLinkOpen = new Typecho_Widget_Helper_Form_Element_Radio('sidebarLinkOpen', array(
        '_self' => '直接从当前页面跳转',
        '_blank' => '在新标签页中打开',
    ), '_self', _t('侧边栏链接跳转方式'), _t('侧边栏链接包括了 最新文章区域、最新评论区域、文章分类区域、标签云区域、文章归档区域。'));
    $form->addInput($sidebarLinkOpen);

    //  文章内容链接
    $postLinkOpen = new Typecho_Widget_Helper_Form_Element_Radio('postLinkOpen', array(
        '_self' => '直接从当前页面跳转',
        '_blank' => '在新标签页中打开',
    ), '_blank', _t('文章内的链接跳转方式'), _t('文章内的链接包括了普通文章中插入的链接和独立页面中插入的链接。'));
    $form->addInput($postLinkOpen);

    //  独立页友链
    $pageLinks = new Typecho_Widget_Helper_Form_Element_Textarea('pageLinks', null, null, _t('独立页友情链接'), _t('独立页友情链接只会在友情链接的页面显示，需要 JSON 格式 数据。请在创建独立页面时，把自定义模板设置为“友链”。如需查看详细说明可以访问：https://https://shaunyoung.cn/archives/70/。'));
    $form->addInput($pageLinks);
}

// 文章自定义数据
function themeFields($layout)
{
    // 文章封面图
    $coverPic = new Typecho_Widget_Helper_Form_Element_Text('coverPic', null, null, _t('封面图片Url'), _t('在这里填入一个图片URL地址, 作为文章的封面，留空将使用默认封面'));
    $layout->addItem($coverPic);

    // 文章封面图背景色
    $coverPicBgc = new Typecho_Widget_Helper_Form_Element_Text('coverPicBgc', null, null, _t('封面图片背景色'), _t('在这里填入一个rgb或十六进制颜色, 当封面图片无法充满盒子时，使用背景色充满盒子，留空将使用默认背景色'));
    $layout->addItem($coverPicBgc);

    //$文章摘要
    $summaryContent = new Typecho_Widget_Helper_Form_Element_Text('summaryContent', null, null, _t('文章摘要'), _t('请输入文章摘要内容，这里输入的文章摘要字数不受限制'));
    $layout->addItem($summaryContent);
}

// 获取文章阅读数
function getPostView($archive)
{
    $cid = $archive->cid;
    $db = Typecho_Db::get();
    $prefix = $db->getPrefix();
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
        return 0;
    }
    $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
    if ($archive->is('single')) {
        $views = Typecho_Cookie::get('extend_contents_views');
        if (empty($views)) {
            $views = array();
        } else {
            $views = explode(',', $views);
        }
        if (!in_array($cid, $views)) {
            //  如果cookie不存在才会加1
            $db->query($db->update('table.contents')->rows(array('views' => (int) $row['views'] + 1))->where('cid = ?', $cid));
            array_push($views, $cid);
            $views = implode(',', $views);
            Typecho_Cookie::set('extend_contents_views', $views); //  记录查看cookie
        }
    }
    return $row['views'];
}

// 自定义首页和分类页面每页显示文章数
function themeInit($archive)
{
    if ($archive->is('index')) {
        $archive->parameter->pageSize = 6; // 自定义首页显示主题数
    } elseif ($archive->is('archive')) {
        $archive->parameter->pageSize = 6; // 自定义分类页显示主题数
    }
}

//  根据设置获取文章头图
function postImg($a)
{
    return $a->fields->coverPic ? $a->fields->coverPic : null;
}
