<?php
/**
 * CKEditor5 for Typecho
 *
 * @package CKEditor5
 * @author tynefung
 * @version 0.0.2
 * @link https://github.com/tynefung
 */
class CKEditor5_Plugin implements Typecho_Plugin_Interface
{
    public static function activate() {
        Typecho_Plugin::factory('admin/write-post.php')->richEditor = array('CKEditor5_Plugin', 'render');
        Typecho_Plugin::factory('admin/write-page.php')->richEditor = array('CKEditor5_Plugin', 'render');
    }

    public static function deactivate(){}

    public static function config(Typecho_Widget_Helper_Form $form){}
    
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}

    public static function render() {
        $ckEditor5 = Typecho_Common::url('CKEditor/ckeditor5', Helper::options()->pluginUrl);
        echo <<<CODE
                <link rel="stylesheet" href="{$ckEditor5}/ckeditor5.css" />
                <style>.ck-content {   height: 400px; resize: vertical; }</style>
                <script type="importmap">
                {
                    "imports": {
                        "ckeditor5": "{$ckEditor5}/ckeditor5.js",
                        "ckeditor5/": "{$ckEditor5}/"
                    }
                }
                </script>
                <script type="module" src="{$ckEditor5}/init.js"></script>
        CODE;
    }
}
