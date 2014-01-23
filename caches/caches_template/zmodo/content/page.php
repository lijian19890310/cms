<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<style>
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE_AFL.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @copyright  Copyright (c) 2008 Irubin Consulting Inc. DBA Varien (http://www.varien.com)
 * @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/****************************************************/
/***********[ Mage_CSS_B Common Elements ]***********/
/****************************************************/


/********************** Columns */

/* ============================================= global style S (mark) =======================================*/
* { margin: 0; padding: 0; }
ul, ol { list-style: none; }
/* clear fix */
.clearfix { display: block; zoom: 1; }
.clearfix:after { content: "."; display: block; visibility: hidden; height: 0; clear: both; }
/* ============================================= global style E (mark) =======================================*/


/* ===============================================module style S ==========================================*/

/* All */
.col2-set, .col3-set, .col4-set, .col5-set { clear: both; }
.radius { border-width: 1px; border-style: solid; border-color: #ccc; -moz-border-radius: 5px; -khtml-border-radius: 5px; -webkit-border-radius: 5px; border-radius: 5px; }
/* Col2 */
.col2-set .col-1, .col2-set .col-2 { width: 48.5%; }
.col2-set .col-1 { float: left; }
.col2-set .col-2 { float: right; }
/* Col2-alt */
.col2-alt-set .col-1 { width: 32%; }
.col2-alt-set .col-2 { width: 65%; }
.col2-alt-set .col-1 { float: left; }
.col2-alt-set .col-2 { float: right; }
/* Col3 */
.col3-set .col-1, .col3-set .col-2, .col3-set .col-3 { float: left; width: 31.3%; }
.col3-set .col-1, .col3-set .col-2 { margin-right: 3%; }
/* Col4 */
.col4-set .col-1, .col4-set .col-2, .col4-set .col-3, .col4-set .col-4 { float: left; width: 22%; }
.col4-set .col-1, .col4-set .col-2, .col4-set .col-3 { margin-right: 4%; }
/* Table Columns */
table .col-1, table .col-2, table .col-3, table .col-4 { float: none !important; margin: 0 !important; }
.col3-set td.spacer { width: 3%; }
.col4-set td.spacer { width: 4%; }
.w995 { max-width: 1390px; min-width: 1000px; margin: 0 auto; }
.wd_com { max-width: 1190px; margin: 0 auto; }
.hd_key, .pl_tbar i, .ind_camp i, .ind_new_prod i, .ind_down i, .ind_new_prev, .ind_new_next, .ind_new_more, .ind_nprd_list .more i, .ind_new_pl a.prev, .ind_new_pl a.next, .vertical-nav-container .head i, .sel_btn { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/sprite.gif) no-repeat; }
.mini-search-cn .tit, .mini-search-cn .input-text, .mini-search-cn .input_btn { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/sprite_cn.gif) no-repeat; }
.accent { color: #E76200; font-weight: bold; }
/********************** Form */

/* Form Elements */
input.input-text, select, textarea, input, button { font: 12px arial, helvetica, sans-serif; }
input.input-text, select, textarea { border: 1px solid #DEDEDE; }
option, optgroup { font: 12px arial, helvetica, sans-serif; }
optgroup { font-weight: bold; }
textarea { overflow: auto; }
input.input-text, textarea { padding: 2px; }
input.radio { margin-right: 3px; }
input.checkbox { margin-right: 3px; }
.qty { width: 2.5em; }
.group-select label, .form-list label, .payment-methods label { font-weight: bold; }
.input-text:focus, select:focus, textarea:focus { background: #edf7fd; }
.button-set { /* Container for form buttons*/ clear: both; margin-top: 4em; border-top: 1px solid #e4e4e4; padding-top: 8px; text-align: right; }
.form-button, .form-button-alt { overflow: visible; width: auto; padding: 1px 8px; background: #0551a4; color: #fff; border:none; height:24px; line-height:24px; padding:0 15px; font: bold 12px arial, sans-serif !important; cursor: pointer; text-align: center; vertical-align: middle; }
.form-button span, .form-button-alt span { white-space: nowrap; }
.form-button-alt { border: 1px solid #406a83; background-color: #618499; }
a.form-button-alt { padding: 2px 9px; text-decoration: none; }
.form-button-alt:hover { color: #fff; text-decoration: none; }
.btn-checkout { display: block; float: right; background: transparent url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/btn_proceed_to_checkout_rad.gif) no-repeat 100% 0; font-size: 15px; font-weight: bold; padding-right: 8px; }
.btn-checkout, .btn-checkout:hover { color: #fef5e5; text-decoration: none; }
.btn-checkout span { display: block; padding: 0 17px 0 25px; background: transparent url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/btn_proceed_to_checkout_bg.gif) no-repeat; line-height: 40px; }
/* Form lists */
.form-list li { margin-bottom: 6px; }
.form-list li .input-box .input-text, .form-list li .input-box textarea { width: 250px; }
.form-list li .input-box select { width: 256px; }
.form-list li.addElement { border-top: 1px solid #DDD; padding-top: 10px; }
.group-select { margin: 28px 0; border: 1px solid #bbafa0; padding: 22px 25px 12px 25px; background: #fdfdfd; }
.group-select .legend { margin-top: -33px; float: left; border: 1px solid #0A263C; background: #f4f4f4; padding: 0 8px; color: #0A263C; font-weight: bold; font-size: 1.1em; }
.group-select li { padding: 4px 8px; }
.group-select li .input-box { float: left; width: 275px; }
.group-select li .input-text, .group-select li select, .group-select li textarea { width: 525px; }
.group-select li .input-box .input-text, .group-select li .input-box textarea { width: 250px; }
.group-select li .input-box select { width: 256px; }
/* Form Messages */
.validation-advice, .required { color: #EB340A; }
.validation-advice { clear: both; min-height: 15px; margin-top: 3px; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/validation_advice_bg.gif) no-repeat 2px 1px; padding-left: 17px; font-size: .95em; font-weight: bold; line-height: 1.25em; }
.validation-failed { border: 1px dashed #EB340A !important; background: #faebe7 !important; }
/* Expiration date and cvv number validation fix */
.v-fix { float: left; }
.v-fix .validation-advice { display: block; margin-right: -12em; width: 12em; position: relative; }
label.required { font-weight: bold; }
p.required { font-size: .95em; text-align: right; }
/********************** Messages  */
.success { color: #3d6611; }
.error { color: #df280a; }
.notice { color: #e26703; }
.success, .error { font-weight: bold; }
.messages, .messages ul { list-style: none !important; margin: 0 !important; padding: 0 !important; }
.messages { width: 100%; overflow: hidden; }
.error-msg, .success-msg, .notice-msg, .note-msg { min-height: 23px !important; margin-bottom: 1em !important; border-style: solid !important; border-width: 1px !important; background-repeat: no-repeat !important; background-position: 10px 10px !important; padding: 8px 8px 8px 32px !important; font-size: .95em !important; font-weight: bold !important; }
.error-msg li, .success-msg li, .notice-msg li { margin-bottom: .2em; }
.error-msg { border-color: #f16048; color: #df280a; background-color: #faebe7; background-image: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/error_msg_icon.gif); }
.success-msg { border-color: #446423; color: #3d6611; background-color: #eff5ea; background-image: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/success_msg_icon.gif); }
.notice-msg, .note-msg { border-color: #fcd344; color: #3d6611; background-color: #fafaec; background-image: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/note_msg_icon.gif); }
/* ===============================================module style e ==========================================*/

.live_support s, .hd_lg_btn .en,.hd_lg_btn .cn, .language-switcher ul li .cn, .hd_lg_btn i, .mini-search .input_btn, .slides_warp .pagination li, .hd_lg_btn .lg_hover i { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/icon.png) no-repeat }
/*header 0805*/
.wrapper { width: 100%; background: #FFF; }
.hd_warp { margin: 0 auto; height: 105px; padding: 29px 0 0 0; }
.logobar { clear: both; }
.top_r_box { float: right; margin-top: 10px; }
.live_support { float: left; margin-right: 35px; }
.live_support s { width: 17px; height: 13px; background-position: -24px 0; display: inline-block; margin: 0 3px 0 0 }
.live_support a { color: #353535; text-decoration: none }
.live_support a:hover { color: #004ea2; }
.live_support a:hover s { background-position: 0 0; }
.hd_lg_btn { float: left; width: 90px; height: 22px; font-size: 11px; color: #004ea2; position: relative; }
.hd_lg_btn .cn { width: 13px; height: 13px;background-position: -72px 0; display: inline-block; margin: 0 3px 0 -10px }

.hd_lg_btn .dq_lg { cursor: pointer; display: block }
.hd_lg_btn .lg_hover i { background-position: -58px -52px; }
.hd_lg_btn i { width: 7px; height: 4px; background-position: -58px -47px; display: inline-block; margin: 5px 0 0 13px; }
.hd_lg_btn .btn_language p { margin: 0 }
.language-switcher { position: absolute; right: 0; top: 20px; display: none; }
.language-switcher ul li { height: 26px; line-height: 26px; border: 1px solid #b2b2b2; background: #efefef; width: 70px; color: #004ea2; font-size: 10px; padding: 0 10px; z-index: 101; text-align: left; }
.language-switcher ul li a { display: block; text-decoration: none; }
.language-switcher ul li .en { width: 13px; height: 13px; background-position: -52px 0; display: inline-block; margin: 0 3px 0 0 }
.navbar { width: 100%; clear: both;color: #333 }
h1#logo { width: 230px; height: 43px; font-size: 0; }
/* mini search 0805 */
#search_mini_form { width: 40%; float: right; margin-top:15px;}
.mini-search { height: 24px; line-height: 24px; border: 1px solid #b2b2b2; padding: 0 5px; }
.mini-search input { float: left; }
.mini-search .input-text { width: 440px; height: 20px; line-height: 20px; border: 0; font-size: 11px; background: none }
.mini-search .input-text:focus { background: none; }
.mini-search .input_btn { width: 17px; height: 17px; background-position: -142px -31px; border: 0; cursor: pointer; overflow: hidden; font-size: 0; line-height: 0; float: right; margin: 3px 0 3px 0; }
.mini-search-cn .tit { float: left; background-position: 0 -57px; color: #979797; padding: 0 0 0 15px; margin: 2px 0 0 0 }
.search-autocomplete { z-index: 999; top: 53px; right: 10px; width: 250px; }
.search-autocomplete ul { border: 1px solid #5c7989; background-color: #f9f5f0; }
.search-autocomplete li { border-bottom: 1px solid #f4eee7; padding: 2px 8px 1px 8px; cursor: pointer; }
.search-autocomplete li .amount { float: right; font-weight: bold; }
.search-autocomplete li.odd { background-color: #fffefb; }
.search-autocomplete li.selected { background-color: #f7e8dd; }
/*menu 0805*/
.header-nav { float: left; width: 600px; color: #333; height: 45px; line-height: 45px; font-size: 18px; }
/*page 0806*/
.bkg_page_con { margin: 10px auto; }
.middle { min-height: 430px; margin: 0 auto; text-align: left; }
/* Breadcrumbs */
.breadcrumbs_warp { height: 30px; margin-bottom: 15px; }
.breadcrumbs { float: right; line-height: 30px; color: #999 }
.breadcrumbs li { display: inline; }
.breadcrumbs a { color: #999; font-size: 14px; text-decoration: none; }
.breadcrumbs a:hover, .breadcrumbs .dq { color: #004ea2 }
/* Base Mini 0806*/
.base-mini { }
.base-mini .head { margin: 0; font-size: 26px; color: #004ea2; height: 30px; line-height: 30px; }
.base-mini h3 { font-size: 16px; height: 40px; line-height: 40px; border-bottom: 1px solid #dcdcdc; margin: 15px 0 0 0; width: 180px; }
.side_pro_list li { line-height: 30px; height: 30px; clear: both; font-size: 12px; color: #666; font-weight: bold; }
.side_pro_list li a.curr { color: #004ea2; }
/*.base-mini .head h4 { line-height: 30px; color:#585858; padding:0 10px; }
.base-mini .head h4 .count { text-transform:none; color:#2f2f2f; white-space:nowrap; font-weight:normal; font-size:.95em; }
*/.base-mini h5 { font-size: 1em; }
.base-mini .content, .base-mini ol { }
.base-mini ol li { padding: 3px 4px 3px 8px; }
.base-mini ol li.odd { background: #f4f3f3; }
.base-mini ol li.even { background: #fafafa; }
.base-mini .actions { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/base_mini_actions_bg.gif) repeat-x #dee5e8; padding: 6px; }
.base-mini .product-images { float: left; width: 52px; height: 52px; }
.base-mini .product-images a img { border: 1px solid #a9a9a9; vertical-align: top; }
.base-mini .product-checkbox { float: left; width: 10px; }
.base-mini .product-names { margin-left: 18px; }
.base-mini .product-details { margin: 0 0 0 60px; height: 50px; }
.base-mini .product-details[class] { height: auto; min-height: 50px; }
.base-mini .regular-price { font-size: 11px; }
.base-mini .regular-price .price { color: #2f2f2f; }
.base-mini .special-price { font-size: 11px; }
.base-mini .minimal-price { font-size: 11px; }
.base-mini .price-box { margin: 1px 0; }
.side-col .box { margin-bottom: 5px; }
.side-col .content { padding: 5px 0; }
/*.left-menu .content { padding:10px 0; *padding:0px;}
*/.side-col .head { text-align: left; }
.side-col h2, .side-col h3, .side-col h4, .side-col h5 { float: none; }
.side-col h3 { font-size: 1.05em; }
.side-col h4 { color: #e65505; }
.side-col .actions { padding: 4px 0; font-size: .95em; text-align: right; }
.side-col .actions a, .side-col .actions a:hover { text-decoration: underline; }
.widget-btn { float: right; font-size: 11px; margin: 0 3px 1px 5px; }
.widget-btn, .widget-btn:hover { color: #646464; font-weight: bold; }
/*0808*/
.line_box { border-top: 1px solid #dcdcdc; margin-top: 25px; width: 180px; padding: 10px 0 0 0 }
.kb_search { border: 1px solid #DBDBDB; box-shadow: 0 1px 2px #CCCCCC; padding: 10px; width: 158px }
.kb_search .tit { font-size: 14px; font-weight: bold; margin: 0 0 5px 0; }
.kb_search p.info { margin: 0 0 5px 0; }
.kb_search .kb_search_b { position: relative; }
.kb_search .input_key { padding: 3px; height: 20px; width: 103px; }
.kb_search .input_btn { position: absolute; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/support/btn_side_go.gif) no-repeat; width: 46px; height: 29px; border: 0; cursor: pointer; overflow: hidden; text-indent: -100px; font-size: 0; line-height: 0; top: 0; right: 1px; }
.kb_search .validation-advice { display: none; }
/*
.page_search_warp{ background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/bkg_page_search.gif) no-repeat; height: 31px;}
.page_search_warp .tit{ font-weight: bold; color: #FFF; line-height: 30px; margin: 0 15px;}
.page_search_warp select{ height: 20px;}*/
/* jselect模拟select的样式 */
.meta { float: left; display: inline; }
.jselect { position: relative; margin: 5px 15px 0 0; height: 25px; text-align: left; font-size: 12px; }
.jtext { padding: 0 0 0 10px; width: 150px; height: 18px; line-height: 16px; font-size: 11px; border: 2px solid #DEDEDE; background: #F5F5F5; margin: 0; cursor: pointer; }
.option { margin: 0; height: 20px; line-height: 20px; }
/* 下拉三角 */
.jselect em { top: 8px; right: 10px; line-height: 0; border-style: solid; border-width: 5px 5px 0; border-color: #555 #fff; }
.jselect.curr em { border-width: 0 5px 5px !important; border-width: 0 6px 6px; }
.db-con, .jselect em { position: absolute; }
.db-con { top: 21px; left: 0; display: none; padding: 2px; border: 2px solid #ddd; background: #fff; z-index: 22; }
.db-con li { padding: 2px 10px; cursor: default; }
.db-con li.checked { background: #ABD7F5; }
.db-con li:hover { background: #DBEFFC; }
.sel_key input { background: #F5F5F5; border: 1px solid #DEDEDE; padding: 2px; height: 14px; margin: 5px 15px 0 0; font: 12px/1.55 "Lucida Grande", "Lucida Sans Unicode", Helvetica, Arial, Verdana, sans-serif; }
.sel_btn { width: 68px; height: 21px; background-position: -100px -273px; border: 0; text-indent: -200px; margin: 6px 0 0 0; cursor: pointer; overflow: hidden; font-size: 0; line-height: 0; }
/********************** Catalog Listing  0807*/
.catalog_tit { color: #4692C5; font-weight: bold; }
.catalog-listing h5 { margin-bottom: .4em; font-size: 16px; }
.catalog-listing h5 a { color: #333333; text-decoration: none; font-size: 11px; line-height: 15px; }
.catalog-listing h5 a:hover { text-decoration: underline; }
/*.catalog-listing .add-to { margin:.7em 0; color:#555; line-height:1.3em; font-size:.95em; font-weight:bold; }
.catalog-listing .add-to a, .catalog-listing .add-to a:hover { text-decoration:underline; }
.catalog-listing .ratings { margin-bottom:.6em; }*/
.catalog-listing P.product-list-sku { height: 13px; margin-bottom: 0; font-size: 12px; color: #666666; font-weight: bold; text-align: left; }
/*.catalog-listing .ratings { line-height:1.5; }
.catalog-listing .ratings .rating-box { float:none; margin-bottom:3px; }
.catalog-listing .ratings .pipe { display:none; }
.catalog-listing .ratings a { display:block; }*/


/* List Type 0807*/
.listing-type-list .listing-item { position: relative; border: 1px solid #dcdcdc; padding: 12px 10px; margin: 10px 0; background: #FFF; }
.listing-type-list .product-image { float: left; width: 20%; }
.listing-type-list .product-shop { width: 77%; padding-top: 15px; }
.listing-type-list .product-shop .description { margin: 20px 0; color: #666; overflow: hidden }
.listing-type-list .product-shop .description ul { }
.listing-type-list .product-shop .description ul li { float: left; width: 37%; height: 24px; line-height: 24px; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/icon.png) no-repeat -217px -45px; padding-left: 10px; margin-right: 5%; }
.listing-type-list .product-shop .price-box { float: left; text-align: left; white-space: nowrap; margin: 3px 13px 5px 0; padding: 0; }
.listing-type-list .product-shop .form-button { margin: 0.5em 0 0; }
.listing-type-list .product-shop .product-reviews { margin: 15px 0; font-size: .95em; }
.listing-type-list .product-shop .product-reviews a, .listing-type-list .product-shop .product-reviews a:hover { color: #6e6969; }
.listing-type-list .product-shop small { float: right; }
.listing-type-list .listing-item .rating-box { margin-bottom: 6px; }
.pl_tbar { position: absolute; height: 23px; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/repeat_x.png) repeat-x; right: 0; bottom: 0; }
.pl_tbar ul { height: 25px; margin: 4px 0 0 0; }
.pl_tbar li { float: left; line-height: 15px; border-right: 1px solid #a0a0a0; font-size: 12px; }
.pl_tbar li.last { border: none; }
.pl_tbar a { color: #999; text-decoration: none; padding: 0 15px; }
.pl_tbar a:hover { text-decoration: none; }
.pl_tbar .leftbg { width: 18px; height: 23px; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/icon.png) no-repeat -141px 0; position: absolute; left: -18px; bottom: 0 }
/*index 0806*/
.ind_col_set { margin: 30px auto 0 auto; border-top: 1px solid #dcdcdc; padding: 30px 0 }
.ind_col_l { width: 220px; }
.ind_col_l .col_l_list { padding: 0 15px; font-size: 16px; }
.ind_col_l .col_l_list li { clear: both; height: 36px; line-height: 36px; }
.ind_col_r { width: 100%; margin: 0 0 0 -220px }
.cnt_right { margin: 0 0 0 220px }
.ind_col_l .hd, .ind_col_r .hd { font-size: 26px; height: 60px; line-height: 60px; text-align: left; color: #1a1a1a }
.ind_col_r .hd { position: relative; width: 100% }
.ind_col_r .more { position: absolute; right: 0; top: 5px; font-size: 12px; color: #666 }
.ind_col_r a, .ind_col_l .col_l_list li a { color: #666 }
.ind_col_r a:hover, .ind_col_l .col_l_list li a:hover { color: #004ea2 }
.new_pro li { float: left; width: 32.5%; }
.new_pro li img { width: 100% }
.new_pro li.mid { margin: 0 1.25%; }
.follow_list { margin: 25px 0; }
.follow_list li b { height: 41px; width: 41px; float: left; margin-right: 10px; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/follow_icon.png) no-repeat }
.follow_list li.facebook b { background-position: 0 0; }
.follow_list li.twitter b { background-position: 0 -54px; }
.follow_list li.youtube b { background-position: 0 -104px; }
.follow_list li.sina b {height: 41px; width: 41px; float: left; margin-right: 10px; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/sina_icon.jpg) no-repeat }
.follow_list li a { display: block; font-size: 0; }
.ind_new_pl { position: relative; }
.ind_new_pl .slides_container { float: left; margin: 0 5%; width: 90%; height: 90px; overflow: hidden }
.ind_new_pl a.prev, .ind_new_pl a.next { float: left; cursor: pointer; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/icon.png) no-repeat; width: 1.5%; height: 20px; display: block; position: absolute; top: 35px; font-size: 0; }
.ind_new_pl a.prev { background-position: 0 -19px; left: 0 }
.ind_new_pl a.next { background-position: -14px -19px; right: 0 }
.news_more{ position:absolute;right:0; top:-15px;font-size:12px}
.slides_control { }
.slides_control .news_text { width: 90%; float: left; line-height: 20px; }
.slides_control .news_img { width: 7%; float: left; overflow: hidden }
.slides_control .news_img img { width: 100% }
.slides_control .news_txt { float: left; padding-left: 20px; width: 33%; word-wrap: break-word; }
.slides_control h3 a { font-size: 16px; color: #666 }
.slides_control p { margin: 0; color: #666; word-wrap: break-word; }
.ind_new_pl .pagination { display: none }
.in_box { height: 90px; }
/*banner 0805*/
.bann { z-index: 5; clear: both; }
.slides_warp { position: relative; }
.slides_container { overflow: hidden;}
.slides_container.ind_ban{min-height:417px; max-height:430px; }
.slides_warp .pagination { position: absolute; width: 140px; height: 24px; bottom: 20px; right: 100px; z-index: 9; }
.slides_warp .pagination li { float: left; display: inline; width: 16px; height: 16px; background-position: -199px -34px; margin: 0 6px; }
.slides_warp .pagination li.current { background-position: -170px -32px; }
.slides_warp .pagination li a { display: block; height: 16px; width: 16px; overflow: hidden; font-size: 0 }
.slides_control img { width: 100%; display: block }

/* product view 0807*/
.product-info-box .product-name { color: #333; font-size: 20px; font-weight: bold; }
.prod_media { margin: 20px 0; }
.ad-image-wrapper { width: 34%; border: 1px solid #D5D5D5; background: #FFF; text-align: center; }
.prod_media_mn { width: 60%; padding-left: 3% }
.prod_media_mn .sku { color: #666; font-size: 14px; font-weight: bold; }
.prod_media_mn .short_info { color: #505050; font-weight: bold; height: 100px; overflow: hidden; }
.ad-thumbs { height: 57px; overflow: hidden; margin: 0 48px; }
.rollzoom li { float: left; display: inline; border: 1px solid #C5C5C5; margin: 0 8px 0 0; }
.rollzoom li img { width: 55px; height: 55px; }
.ad-nav { position: relative; width: 500px; overflow: hidden; }
.ad-image-wrapper img { width: 260px; height: 260px; }
#wrap { width: 260px; margin: 0 auto; }
.ad-nav span { display: block; height: 20px; width: 13px; position: absolute; cursor: pointer; z-index: 99; top: 20px }
.ad-nav .prev { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/icon.png) no-repeat -39px -19px; left: 0; }
.ad-nav .next { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/icon.png) no-repeat -53px -19px; left: 345px; }
.product-collateral { margin: 20px 0; border: 1px solid #D5D5D5; }
.p-nav { background: #fff; border-bottom: 1px solid #D5D5D5; }
.product-collateral ul { height: 33px; }
.product-collateral ul.pv_nav li { float: left; display: inline; border-right: 1px solid #D5D5D5; line-height: 33px; padding: 0 15px; _padding: 8px 15px; cursor: pointer; }
.product-collateral ul.pv_nav li.check { background: #f3f3f3; border-top: 2px solid #004ea2; border-bottom: 0; margin-top: -1px }
.product-collateral ul.pv_nav li span { font-size: 12px; color: #666666; }
.product-collateral .pv_list_dot { list-style: disc inside; overflow: hidden; height: auto; }
.product-collateral .pv_list_dot li { list-style: disc inside; float: none; cursor: default; }
.catalog-listing .pv_list_dot { list-style: disc inside }
.cloud-zoom-lens { border: 1px solid #888; margin: -4px;	/* Set this to minus the border thickness. */ background-color: #fff; cursor: move; }
/* This is for the title text. */
.cloud-zoom-title { font-family: Arial, Helvetica, sans-serif; position: absolute !important; background-color: #000; color: #fff; padding: 3px; width: 100%; text-align: center; font-weight: bold; font-size: 10px; top: 0; }
/* This is the zoom window. */
.cloud-zoom-big { border: 1px solid #ccc; overflow: hidden; }
/* This is the loading message. */
.cloud-zoom-loading { color: white; background: #222; padding: 3px; border: 1px solid #000; }
/* side catalog*/
/*.vertical-nav-container .head h4,  .vertical-nav-container .head i, .side-support .head i { display: inline-block; zoom: 1; width: 21px; height: 21px; background-position: 0 -242px; vertical-align: middle; margin: 0 5px 0 0; }
.vertical-nav-container .head i { border: 0; }
.vertical-nav-container .content { background: #FAFAFA; padding: 0; }*/
/* side support 0807*/
.side-support { width: 180px; border-top: 1px solid #dcdcdc; margin: 25px 0 0 0 }
.side-support .hd { height: 40px; line-height: 40px; font-size: 16px; font-weight: bold }
.side_support_list li { height: 30px; line-height: 30px; padding-left: 28px; position: relative; font-weight: bold }
.side_support_list li b { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/icon.png) no-repeat; width: 21px; height: 21px; overflow: hidden; position: absolute; top: 3px; left: 0 }
.side_support_list li.zviewer_ico b { background-position: -170px 0; }
.side_support_list li.zsight_ico b { background-position: -200px 0; }
.side_down { line-height: 16px; height: 48px; width: 180px; }
.side_down dt { float: left; width: 39px; height: 48px; margin-right: 5px; }
.side_down dd { float: left; width: 135px; }
/* Live Chat*/
/*.livechat { position: absolute; top: 200px; left: -196px; width: 233px; height: 222px; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/livechat.png) no-repeat; _background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/livechat.gif) no-repeat; z-index: 99; cursor: pointer; }
.livechat a { display: block; width: 233px; height: 222px; }
.livechat img { display: none; }
.livechat_cn { position: absolute; top: 200px; left: -196px; width: 233px; height: 222px; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/livechat_cn.png) no-repeat; _background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/livechat_cn.gif) no-repeat; z-index: 99; }
.livechat_cn a { display: block; width: 188px; height: 35px; }
.livechat_cn a.chat_customer { margin: 94px 0 0 0; }
.livechat_cn img { display: none; }*/
/* ==================== other page ================================*/

.round_box { border-radius: 3px; }
/*.op_tit { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/bkg_aside_tit.gif) repeat-x; line-height: 31px; border: 1px solid #D8D8D8; border-bottom: 0; height: 33px; padding: 0 10px; }
.op_tit span { font-weight: bold; }
.op_con_warp { margin: 20px 10px 0; }*/
.op_r_box { background: #FAFAFA; border: 1px solid #dfdfdf; border-radius: 3px; padding: 10px; }
/* Success Stories */
/*.succ_stor .round_box { border: 1px solid #DFDFDF; background: #FAFAFA; padding: 10px; }
.succ_stor_t { width: 330px; }
.succ_stor_t .tit { font-weight: bold; margin: 0 0 5px 0; }
.succ_stor_simg { margin: 20px 0 0 0; }
.succ_stor_simg ul { height: 69px; }
.succ_stor_simg li { display: inline; float: left; margin: 0 15px; }
.succ_stor_list_w { margin: 20px 0; width: 100%; overflow: hidden; }
.succ_stor_list_w ul { overflow: hidden; }
.succ_stor_list_w li { float: left; width: 335px; margin: 0 30px 30px 0; border-right: 1px dotted #767676; padding: 0 5px; }
.succ_stor_list_w li.nobor { border: 0; padding: 0 0 0 5px; }
.succ_stor_list_w .info { width: 180px; margin: 0 0 0 10px; }
.succ_stor_list_w .img { box-shadow: 0 0 4px #bfbfbf; border: 1px solid #ccc; padding: 2px; border-radius: 3px; }
.succ_stor_list_w .name a { font-weight: bold; color: #424242; }
.succ_stor_list_w p { margin: 0; }
.succ_stor_list_w .desc { font-size: 11px; }
.succ_stor_list_w .more a { color: #ABABAB; font-size: 11px; }*/
/* support  epcomm admin*/
/*.support_col_1 { width: 365px; }
.support_col_r { width: 365px; }
.support_rbox { position: relative; border: 1px solid #BFBFBF; border-radius: 3px; background: #FAFAFA; padding: 10px; margin: 0 0 15px 0; }
.support_rbox .tit { font-weight: bold; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/ico_supp_ind.gif) no-repeat 0 4px; padding: 0 0 0 8px; }
.support_rbox .more { position: absolute; top: 10px; right: 10px; font-weight: bold; color: #5A5A5A; }
.support_ind_list { margin: 0 0 0 10px; }
.support_ind_list a { font-size: 11px; color: #5A5A5A; }
.support_ind_list li { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/ico_supp_list.gif) no-repeat 0 9px; padding: 0 0 0 5px; }
.support_ind_down { margin: 0 0 0 10px; }
.support_ind_down dt { font-weight: bold; color: #589ECD; }
.support_ind_down dd { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/ico_supp_list.gif) no-repeat 0 9px; padding: 0 0 0 5px; }
.support_ind_down dd a { font-size: 11px; color: #5A5A5A; }*/
.spt_w .spt_list { overflow: hidden; }
.spt_w .spt_list li { float: left; display: inline; width: 47.8%; margin: 0 15px 30px 0; height: 110px; }
.spt_w .spt_list li:hover { opacity: 0.9; }
.spt_w .spt_list li a { display: block; padding: 15px 0 0 110px; }
.spt_w .spt_list li a .tit { font-weight: bold; }
.spt_w .spt_list li a .info { color: #333; }
.spt_w .spt_list li a:hover { text-decoration: none; }
.spt_w .spt_list li p { margin: 0; }
.spt_w .spt_list li.kb { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/support/spt_kb.gif) no-repeat; }
.spt_w .spt_list li.warranty_rma { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/support/spt_war_rma.gif) no-repeat; }
.spt_w .spt_list li.dl { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/support/spt_dl.gif) no-repeat; }
.spt_w .spt_list li.remote { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/support/spt_remote.gif) no-repeat; }
.spt_w .spt_list li.install { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/support/spt_install.gif) no-repeat; }
.spt_w .spt_list li.inter { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/support/spt_inter.gif) no-repeat; }
.spt_w .spt_list li.comunity { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/support/spt_community.gif) no-repeat; }
.spt_w .spt_list li.software { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/support/spt_software.gif) no-repeat; }
.spt_w .spt_list li.contact { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/support/spt_contact.gif) no-repeat; }
.spt_w .spt_list li.live { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/support/spt_livechat.gif) no-repeat; }
.spt_contact_list { overflow: hidden; }
.spt_contact_list li { display: inline; float: left; width: 28%; margin: 10px 15px 30px 15px; text-align: center; }
.spt_contact_list li .img { width: 112px; height: 112px; margin: 0 auto; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/support/spt_contact_ico.gif) no-repeat center 0; }
.spt_contact_list li.nework .img { background-position: 0 -112px; }
.spt_contact_list li.rma_status .img { background-position: 0 -224px; }
.spt_contact_list li.install .img { background-position: 0 -336px; }
.spt_contact_list li.asistencia .img { background-position: 0 -448px; }
.spt_contact_list li.mail .img { background-position: 0 -560px; }
.spt_contact_list li a { display: block; }
.spt_w .h-light { color: #1E7EC8; font-size: 14px; }
.spt_w .h-light a { font-weight: bold; }
/* fallow us */
.fallow_list li { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/fallow.gif) no-repeat; width: 32px; height: 32px; float: left; margin: 0 5px 0 0; }
.fallow_list li a { display: block; width: 32px; height: 32px; }
.fallow_list li.t { background-position: 0 -37px; }
.fallow_list li.y { background-position: 0 -74px; }
/*interviews 0809*/
.interview_warp { margin: 0 0 20px 0; }
.interview_warp .title { font-size: 13px; font-weight: bold; }
.interview_list { }
.interview_list dt { }
.interview_list dd { margin: 2px 0 15px 0; border-bottom: 1px dotted #dbdbdb; padding: 0 0 15px 0; font-style: italic; }
/*Testimonials 0809*/
.ct_list li { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/quotationTop.png) no-repeat; position: relative; border-bottom: 1px solid #EFEFEF; padding: 10px 0 20px 35px; margin: 0 0 20px 0; }
.ct_list .ct_con { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/quotationBttm.png) no-repeat 100% 100%; padding: 0 30px 25px 0; }
.ct_list .ct_con, .ct_list .ct_by { width: 95%; text-align: center; }
.ct_by { font-weight: bold; color: #3E7FAA; }
.ct_list .ct_img { position: absolute; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/tem_logo.gif) no-repeat; width: 140px; height: 56px; overflow: hidden; top: 10px; right: 10px; display: none; }
.ct_list .ct_img span { display: block; width: 140px; height: 56px; background: #fff; font-size: 14px; font-weight: bold; }
.ct_list .newegg { background-position: 0 -112px; }
.ct_list .woot { background-position: 0 -56px; }
.ct_list .facebook { background-position: 0 -336px; }
.ct_list .youtube { background-position: 0 -168px; }
.ct_list .buy { background-position: 0 -224px; }
.ct_list .tusti { background-position: 0 -280px; }
/*public bann 0806*/
.pub_slides { clear: both }
.pub_slides .slides_container { width: 100%; height: 280px; overflow: hidden; z-index: 5; }
/*About Us 0808*/
.about_con { line-height: 20px; padding:10px; }
.about_con .h_light { font-size: 12px; font-weight: bold; color: #008FD3; font-style: italic; }
.about_con .ceo_img { float: right; margin: 0 0 15px 15px; box-shadow: 0 0 2px #AAA; border: 2px solid #FFF; }
.about_con .t_r { margin: 20px 0 0 0; text-align: right; }
.about_con .sign { font-weight: bold; }
.op_career_warp .img_fl { float: left; margin: 0 10px 10px 0; }
.success_list li { float: left; margin: 0 15px; display: inline; }
/*footer 0809*/
.footer-container { width: 100%; height: 40px; background: #004ea2; overflow:hidden }
.footer { }
/*.footer .store-switcher { display: inline; padding: 0 10px 0 0; vertical-align: middle; }
*/.footer .informational { width: 50%; height: 30px; }
.footer .informational label { color: #333333; font-weight: bold; padding-right: 3px; }
.footer .informational ul { }
.footer .informational li { display: inline; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/foot_line.gif) no-repeat 100% 5px; padding: 0 15px; }
.footer .informational li.last { background: none; padding-right: 0; }
.footer .informational a, .footer .informational a:hover { color: #FFF; text-decoration: none; }
.footer .informational a { text-decoration: none; }
.footer .informational a:hover { text-decoration: underline; }
.footer .legality { width: 50%; color: #FFF; text-align: right; margin: 10px 0 0 0; }
.footer .legality a { color: #FFF; }
.footer .legality a:hover { text-decoration: underline; }
.footer .links { width: 500px; margin: 11px 0 }
.footer .links li { margin: 0 2px; float: left; color: #999 }
.footer .links li a { color: #FFF }
/*############################################################################# old style #####################################################*/
/********************** Headings */

/*.hd_warp, .inner-head { line-height:1.25em; text-align:right; }*/
.hd_warp h1, .hd_warp h2, .hd_warp h3, .hd_warp h4, .hd_warp h5, .inner-head h1, .inner-head h2, .inner-head h3, .inner-head h4, .inner-head h5 { margin: 0; float: left; }
/* Page heading */
/*.page-head { margin: 0 0 25px 0; border-bottom: 1px solid #ccc; }
.page-head-alt { margin: 0 0 12px 0; }
.page-head, .page-head-alt { text-align: right; }
.page-head h3, .page-head-alt h3 { margin: 0; font-size: 1.7em !important; font-weight: normal !important; text-transform: none !important; text-align: left; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/icon_02.gif) no-repeat 0 10px; padding-left: 15px; }
.button-level h3 {  float: left; width: 55%; }
.page-head .link-feed { float: right; margin-top: 9px; }
.button-level .link-feed { float: none!important; font-size: 1em!important; }*/
/* Category list heading and pager 0807 */
.category-head { height: 35px; line-height: 35px; padding: 0 15px; background: #efefef; margin-bottom: 7px; position: relative }
.category-head .tit { color: #666; font-size: 14px; font-weight: bold; }
.pager_box { position: absolute; height: 25px; right: 10px; top: 5px; width: 150px; }
.prev_icon, .prev_first_icon, .next_icon, .next_last_icon { width: 10px; height: 11px; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/icon.png) no-repeat; float: left; font-size: 0; margin-top: 7px; }
.prev_icon { background-position: -72px -47px; }
.prev_first_icon { background-position: -72px -28px; }
.next_icon { background-position: -82px -28px; }
.next_last_icon { background-position: -82px -47px; }
.page_info { float: left; margin: 0 20px; height: 25px; line-height: 25px; }
.page_num { display: block; padding: 3px 5px; height: 12px; line-height: 12px; margin: 2px 3px; border: 1px solid #cccccc; background: #FFF; }
.pager { width: 200px; font-size: 12px; text-align: center; height: 25px; margin: 0 auto; }
/*.box-header { font-size:1.05em; text-align:left; background:#eee; font-weight:bold; padding:2px 8px; margin:10px 0; }
.category-head .link-feed {float:right; margin-top:10px; position:relative; }
*/
/********************* Tables */
td.label { font-weight: bold; }
/* Data Table */
.data-table { border: 1px solid #bebcb7; width: 100%; }
.data-table tr { background: #fff; }
.data-table .odd { background: #f8f7f5 }
.data-table .even { background: #eeeded !important; }
.data-table td.last, .data-table th.last { border-right: 0; }
.data-table tr.last th, .data-table tr.last td { border-bottom: 0 !important; }
.data-table th { border-right: 1px solid #c2d3e0; padding: 2px 8px; color: #0a263c; white-space: nowrap; }
.data-table th.wrap { white-space: normal; }
.data-table th a, .data-table th a:hover { color: #fff; }
.data-table td { padding: 3px 8px; }
.data-table thead tr th { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/data_table_th_bg.gif) repeat-x 0 100% #d9e5ee; }
.data-table tfoot { border-bottom: 1px solid #d9dde3; }
.data-table tfoot tr.first { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/base_mini_actions_bg.gif) 0 0 repeat-x; }
.data-table tfoot tr { background-color: #DEE5E8 !important; }
.data-table tfoot td { padding-top: 1px; padding-bottom: 1px; border-bottom: 0; border-right: 1px solid #d9dde3; }
.data-table tbody td { border-bottom: 1px solid #d9dde3; border-right: 1px solid #d9dde3; }
/* Bundle Products */
.data-table tbody.odd tr { background: #f8f7f5 !important; }
.data-table tbody.even tr { background: #f6f6f6 !important; }
.data-table tbody.odd tr td, .data-table tbody.even tr td { border-bottom: 0; }
.data-table tbody.odd tr.border td, .data-table tbody.even tr.border td { border-bottom: 1px solid #d9dde3; }
.data-table tbody td h5.title { margin: 0; padding: 0; font-size: 1em; font-weight: bold; color: #2f2f2f; }
.data-table tbody td .option-label { font-weight: bold; font-style: italic; }
.data-table tbody td .option-value { padding-left: 10px; }
.box-table td { padding: 10px; }
.box-table tfoot td { padding-top: 5px; padding-bottom: 5px; }
.box-table select { width: 100%; }
.nested-data-table th, .nested-data-table td { padding-top: 2px; padding-bottom: 2px; }
.generic-table td { padding: 0 8px }
.generic-table td.first { padding-left: 0; white-space: nowrap; }
.shipping-tracking .button-set { margin-top: 0; border: none; border-top: 0; padding-top: 0; }
/********************** Lists */
.disc { margin-bottom: 10px; list-style: disc; }
.disc li { margin-left: 20px; }
/* Bare List */ /* Unstyled list */
.bare-list { margin: 5px 0; }
.bare-list li { margin: 3px 0; }
/********************** Space Creators */
.no-display { display: none; }
.content-box { min-height: 250px; } /* Set minimum height for visual presentation */
.content { padding: 12px 12px 12px 15px; } /* Sets default padding */
.actions { line-height: 1.3em; }
.separator { padding: 0 3px; }
.pipe { padding: 0 4px; font-size: .95em; }
.divider { margin: 10px 0; height: 1px; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/dotted_divider.gif) repeat-x; font-size: 1px; line-height: 1em; overflow: hidden; }
/********************** Base Layout */

/* Structure */
/*.hd_warp { text-align:left; width:100%; }
*/
/*.side-col { width:220px; }*/
.col-left { float: left; }
.col-main { float: left; }
.col-right { float: right; }
.col-1-layout .col-main { float: none; margin: 0; }
.col-2-right-layout .col-main { float: left; width: 767px; }
.col-2-left-layout .col-main { float: right; }
.col-3-layout .col-main { width: 560px; margin-left: 17px; }
.col-2-left-layout .m_page { padding: 10px 0 0 0; }
/********************** Header======= */

/* Logo */
.page-popup h1#logo { display: none; }
.tollfree { position: absolute; top: 30px; left: 220px; }
.topkeyword { font-size: 10px; color: #333333; position: absolute; top: 65px; left: 15px; }
.youtube_ico { position: absolute; width: 72px; height: 32px; top: 40px; right: 10px; }
/* Quick Access*/
.quick-access { width: 540px; float: right; margin-top: 28px; text-align: right; padding: 0 10px; color: #fff; }
.quick-access p { margin-bottom: 4px; }
.quick-access li { display: inline; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/shop_access_pipe.gif) no-repeat 100% .35em; padding-right: 7px; padding-left: 3px; }
.quick-access li.first { padding-left: 0; }
.quick-access li.last { padding-right: 0; background: none; }
.shop-access { margin-bottom: 6px; }
.shop-access a, .shop-access a:hover { color: #ebbc58; font-size: .95em; }
.shop-access li.last { padding-right: 0; background: none; }
/* right-up icon pic */
.top-pic-right { width: 212px; height: 33px; position: absolute; margin: 0; top: 40px; right: 85px; }
/* top login url */
.header-url-con { width: 400px; height: 25px; position: absolute; right: 0; text-align: right; margin: 0 5px 0 0; }
/********************** Sidebars */
/* Currency Switcher */
.currency-switcher { height: 53px; padding: 7px 12px 10px 12px; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/currency_switcher_bg.gif) no-repeat; font-size: 1.05em; }
.currency-switcher h4 { min-height: 21px; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/icon_world.gif) no-repeat 0 2px; color: #fff; padding-left: 22px; text-transform: none; }
.currency-switcher select { width: 98%; }
/* side menu */

/* Sidebar Blocks */
.mini-product-tags .head h4 { background-image: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/icon_tag_green.gif); }
.mini-product-tags li { display: inline; padding-right: 4px; line-height: 1.5em; }
.mini-product-tags li:after { display: inline!important; }
.mini-product-tags .content { padding: 10px; }
.mini-product-tags .content a, .mini-product-tags .content a:hover { color: #1b2d3b; }
.mini-newsletter input.input-text { display: block; margin: 3px 0; width: 167px; }
.mini-cart .subtotal { background: #fbebd9; margin-top: 5px; padding: 2px 0; text-align: center; }
.mini-cart h5 { margin: 0; background: #F4F3F3; padding: 6px 8px 2px 8px; }
.mini-cart .actions { border-bottom: 1px solid #c2c2c2; padding-top: 3px; padding-bottom: 1px; }
.mini-cart .actions .form-button { margin-top: 3px; margin-bottom: 5px; }
.mini-wishlist .head h4 { background-image: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/icon_bell.gif); }
.mini-wishlist .link-cart { display: block; }
.mini-poll .head h4 { background-image: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/icon_group.gif); }
.mini-poll td.label { font-weight: bold; padding-right: 10px; }
.mini-poll td.item { white-space: nowrap; }
.mini-product-view .head h4 { background-image: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/icon_tag_green.gif); }
.popular-mini p { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/icon_01.gif) no-repeat 0 3px; margin: 5px; padding: 0 10px }
/********************** Footer */


/************************************************************/
/****************[ Mage_CSS_D Shop Elements]*****************/
/************************************************************/

.product-shop { float: right; }
.out-of-stock { height: 18px; padding-top: 3px; color: #D83820; font-weight: bold; }
.product-shop .short-description { width: 100%; overflow: hidden; margin-bottom: 10px; }
/********************** Generic Box */
.generic-box { margin-bottom: 15px; padding: 12px 15px; border: 1px solid #D0CBC1; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/base_mini_head_bg.gif) repeat-x #fff; }
.generic-product-list li { margin: 12px 0; }
/* Generic Product Grid */
.generic-product-grid { width: 100%; }
.generic-product-grid td { border-right: 1px solid #d9dde3; border-bottom: 1px solid #d9dde3; padding: 12px 10px; line-height: 1.6em; }
.generic-product-grid tr.last td { border-bottom: 0; }
.generic-product-grid td.last { border-right: 0; }
.generic-product-grid .product-image { text-align: center; }
.generic-product-grid td.empty-product { border-right: 0; background: #f5f6f6; }
/********************** Layered Navigation */
.layered-nav .head { margin: 0; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/layered_nav_head_bg.gif) no-repeat; height: 24px; }
.layered-nav h3 { display: none; }
.layered-nav .border-creator { border-style: solid; border-color: #a0b3c3; border-width: 0 1px 1px 1px; }
.layered-nav h4 { margin: 0; border: 1px solid #b9ccdd; border-left: 0; border-right: 0; padding: 3px 10px; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/layered_nav_narrowed_category_heading.gif) #d5e8ff; color: #1f5070; font-weight: bold; font-size: 1em; }
.layered-nav .narrowed-category li { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/narrow_category_bg.gif) repeat-x 0 100% #fff; padding: 4px 6px 4px 10px; }
.layered-nav .narrowed-category li .label { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/narrow_by_li_by.gif) no-repeat 0 .2em; padding-left: 20px; font-weight: bold; text-transform: uppercase; }
.layered-nav .widget-btn { float: right; margin: .1em 0 0 5px; font-size: .95em; }
.layered-nav .actions { border-style: solid; border-color: #dee5e8; border-width: 1px 0; padding: 4px 10px; background: #cad6e4; }
.narrow-by dl { background: #FCFBFB; padding: 0 0 1em 0; }
.narrow-by dt { margin: 0; padding: 7px 10px 0 28px; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/narrow_by_set.gif) no-repeat 9px .9em; color: #2f2f2f; text-transform: uppercase; }
.narrow-by dd { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/narrow_by_dd_bg.gif) repeat-x 0 100%; padding: 0 12px .8em 12px; }
.narrow-by dd li { margin-bottom: .3em; line-height: 1.3em; }
.narrow-by dd.last { background: none; }
/********************* Tool Tips */
.tool-tip { position: absolute; border: 1px solid #7ba7c9; background: #eaf6ff; }
.tool-tip .btn-close { padding: 6px 6px 0; margin-bottom: -9px; text-align: right; }
.tool-tip .inline-content { padding: 8px; }
.tool-tip .block-content { padding: 15px 20px; }
/************************************************************/
/******************[ Mage_CSS_E Shop Pages]******************/
/************************************************************/

/********************** Home */

.home-callout { margin-bottom: 12px; }
.home-callout img { display: block }
.home-spot { float: left; width: 470px; margin-left: 20px; }
.best-selling h3 { margin: 12px 0 6px 0; color: #e25203; font-size: 1.2em; }
.best-selling table { border-top: 1px solid #ccc; }
.best-selling tr.odd { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/best_selling_tr_odd_bg.gif) repeat-x 0 100% #eee; }
.best-selling tr.even { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/best_selling_tr_even_bg.gif) repeat-x 0 100% #fff; }
.best-selling td { width: 50%; border-bottom: 1px solid #ccc; padding: 8px 10px 8px 8px; font-size: .95em; }
.best-selling .product-img { float: left; border: 2px solid #dcdcdc; }
.best-selling .product-description { margin-left: 107px; line-height: 1.3em; }
.best-selling a.product-name, .home-spot .best-selling a.product-name:hover { color: #203548; }
.recently { margin: 10px 0 12px; }
.recently h3 { margin: 0 0 6px; color: #e25203; font-size: 1.2em; }
.recently .product-image { border: 1px solid #dcdcdc; }
.recently a.product-name { display: block; width: 130px; overflow: hidden; }
.recently a.product-name, .recently a.product-name:hover { font-size: 11px; color: #1d7ecf; }
.recently .add-to { margin-top: 5px; font-size: 11px; }
table.recently-list { width: 100%; }
table.recently-list td { width: 20%; }
/********************** Search */
.advanced-search { margin: 28px 0; border: 1px solid #bbafa0; padding: 22px 25px 12px 25px; background: #fbfaf6; }
.advanced-search .legend { margin-top: -33px; float: left; border: 1px solid #f19900; background: #F9F3E3; padding: 0 8px; color: #E76200; font-weight: bold; font-size: 1.1em; }
.advanced-search li { margin-bottom: 5px; }
.advanced-search li label { width: 150px; float: left; }
.advanced-search .input-text { width: 250px; }
.advanced-search select { width: 256px; padding: 2px; }
.advanced-search .field-row { float: left; width: 256px; }
.advanced-search .range .input-text { width: 70px; }
.advanced-search .range select { width: 90px; padding: 1px; }
.advanced-search-nothing-found { font-weight: bold; color: #df280a; margin-bottom: 10px; }
.advanced-search-found-amount { margin-bottom: 10px; }
.advanced-search-summary-box { padding: 10px 10px 5px 10px; margin: 0 0 10px; border: 1px solid #E9D7C9; background-color: #FFF6F1; }
.advanced-search-summary-tip { clear: both; font-weight: bold; }
.advanced-search-summary-box { margin-bottom: 10px; }
.advanced-search-summary-box ul { list-style: none; float: left; width: 50%; }
.advanced-search-summary-box ul li span { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/search_criteria.gif) 0 3px no-repeat; padding-left: 15px; font-weight: bold; color: #E17C24; }
/* Inline translation fix */
.advanced-search-summary-box ul li span.translate-inline { background: 0 !important; }
/********************** Catalog Listing */
/* Grid Type */
.listing-type-grid td { width: 33%; text-align: left; }
.listing-type-grid .add-to-compare { display: block; margin: 5px 0; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/icon_add_to_compare.gif) no-repeat 0 50%; padding-left: 22px; color: #6e6969; font-weight: bold; }
.listing-type-grid .rating-box { float: left; margin-left: 0; margin-right: 5px; }
.listing-type-grid .actions { margin: 10px 0; text-align: center; }
/* Grid Type */
.listing-type-grid { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/bkg_products-grid3.gif) 0 0 repeat; }
.listing-type-grid .grid-row { border-bottom: 0 solid #d9dde3; margin-left: -21px; margin-bottom: 10px; }
.listing-type-grid li.item { float: left; width: 150px; padding: 12px 10px; line-height: 1.6em; overflow: hidden; border: 1px solid #f4f4f4; margin-left: 21px; }
.listing-type-grid .last { border-bottom: 0; }
.listing-type-grid li.item h5 { height: 50px; overflow: hidden; }
.listing-type-grid .product-image { text-align: center; }
.listing-type-grid .rating-box { float: left; margin-left: 0; margin-right: 5px; }
.listing-type-grid .actions { margin: 10px 0; text-align: center; }
/* Rewrites for different layouts */
.col-1-layout .listing-type-grid { background-image: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/bkg_products-grid1.gif); }
.col-1-layout .listing-type-grid li.item { width: 280px; }
.col-2-left-layout .listing-type-grid, .col-2-right-layout .listing-type-grid { }
.col-2-left-layout .listing-type-grid li.item, .col-2-right-layout .listing-type-grid li.item { width: 208px; }
/********************** Product Detail */
/* Product Images */
.product-img-box h4 { font-size: 11px; color: #666666; }
.product-img-box .imgmark { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/imgmark.png) no-repeat; position: absolute; top: 150px; left: 50px; height: 43px; width: 177px; z-index: 99; }
.product-img-box .product-image-zoom { position: relative; overflow: hidden; width: 265px; height: 265px; z-index: 9; }
.product-img-box .product-image-zoom img { position: absolute; left: 0; top: 0; cursor: move; }
.image-zoom { position: relative; z-index: 9; height: 18px; margin: 0 auto 13px auto; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/slider_bg.gif) no-repeat 50% 50%; padding: 0 28px 0 28px; cursor: pointer; }
.image-zoom #track { position: relative; height: 18px; }
.image-zoom #handle { position: absolute; left: 0; top: -1px; width: 9px; height: 22px; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/magnifier_handle.gif) 0 0 no-repeat; }
.image-zoom .btn-zoom-out { position: absolute; left: 2px; top: 1px; }
.image-zoom .btn-zoom-in { position: absolute; right: 2px; top: 1px; }
.product-img-box .more-views h4 { border-bottom: 1px solid #ccc; margin-bottom: .8em; font-size: .95em; text-transform: uppercase; }
.product-img-box .more-views ul { margin-left: -9px; }
.product-img-box .more-views li { float: left; margin: 0 0 9px 9px; }
.product-img-box .more-views li a { float: left; width: 56px; height: 56px; border: 2px solid #ddd; overflow: hidden; }
.product-info-box { border: 0 solid #c4c6c8; margin-top: 0; }
.product-info-box .price-box { margin: 10px 0; }
.product-info-box .data-table .price-box { margin: 0; padding: 0; }
.product-info-box .availability { margin: 10px 0; padding: 0; font-size: 0.92em; }
.product-info-box .ratings { margin-bottom: 1em; }
.product-essential .product-shop { width: 330px; }
.product-essential .product-shop .ratings { margin-bottom: 10px; }
.no-padding { padding: 0 !important; }
.no-margin { margin: 0 !important; }
/********************** Print pages */
table.print .giftmessage-preview-link { display: none !important; }
table.print .price-excl-tax { white-space: nowrap; }
table.print .price-incl-tax { white-space: nowrap; }
table.print .price-excl-tax .label, table.print .price-excl-tax .price, table.print .price-incl-tax .label, table.print .price-incl-tax .price { display: inline; }
/********************** Pop up pages */
.page-popup { background: #fff; padding: 25px 30px; text-align: left; }
.page-popup .print-head { margin: 0 0 15px; }
.page-popup .print-head img { float: left; }
.page-popup .print-head address { float: left; margin-left: 15px; }
.product-gallery-nav { padding: 0 5px; }
/************************************************************/
/******************[ Mage_CSS_F Overrides]*******************/
/************************************************************/
.nowrap, .nobr { white-space: nowrap !important; }
/* Alignment */
.v-top { vertical-align: top; }
.v-middle { vertical-align: middle; }
.v-bottom { vertical-align: bottom; }
.a-left { text-align: left; }
.a-center { text-align: center; }
.a-right { text-align: right; }
.fl { float: left; }
.fr { float: right; }
.normal-weight { font-weight: normal; }
.auto-width { width: auto; }
/* Link highlights */
.link-cart { color: #081589 !important; font-weight: bold !important; }
.link-remove { color: #646464 !important; }
.link-print { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/icon_printer.gif) no-repeat 0 2px; padding-left: 23px; }
.link-feed { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/icon_feed.png) no-repeat left center; padding-left: 18px; line-height: 1.15; }
.order-access { padding-bottom: 8px; }
.order-info { border: solid 1px #D0CBC1; background: #DEE5E8; padding: 4px 8px; }
.order-info span { display: block; float: left; }
.order-info ul { display: inline; }
.order-info li { display: inline; padding-right: 7px; padding-left: 3px; }
.order-info li.selected { font-weight: bold; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/point-con.gif) no-repeat fixed center bottom; }
/* Noscript Notice */
.noscript { border: 1px solid #000; border-width: 0 0 1px; background: #ffff90; font-size: 12px; line-height: 1.25; text-align: center; color: #2f2f2f; }
.noscript .noscript-inner { width: 950px; margin: 0 auto; padding: 12px 0 12px; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/i_notice.gif) 20px 50% no-repeat; }
.noscript p { margin: 0; }
/* For Demo store only */
.demo-notice { margin: 0; background: #d75f07; padding: 5px 10px 6px 10px; color: #fff; line-height: 1em; text-align: center; }
/* Class: std - styles for admin-controlled content */
.std ul, .std ol, .std dl, .std p, .std address, .std blockquote { margin: 0 0 1em; padding: 0; }
.std ul { list-style: disc outside; padding-left: 1.5em; }
.std ol { list-style: decimal outside; padding-left: 1.5em; }
.std ul ul { list-style-type: circle; }
.std ul ul, .std ol ol, .std ul ol, .std ol ul { margin: .5em 0; }
.std dt { font-weight: bold; }
.std dd { padding: 0 0 0 1.5em; }
.std blockquote { font-style: italic; padding: 0 0 0 1.5em; }
.std address { font-style: normal; }
.std b, .std strong { font-weight: bold; }
.std i, .std em { font-style: italic; }
.std .a-top { text-align: right; }
/* shop by */
.shopby { border: 1px solid #cccccc; border-top: 0; }
.narrow-by h4 { margin: 5px auto 5px 10px; color: #081589; }
/* new product details */
.up-sell { width: 200px; float: right; }
.up-sell .head { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/short_tit_bg.gif) repeat-x; height: 30px; overflow: hidden; margin-bottom: 0; }
.up-sell .head h4 { line-height: 20px; margin: 5px auto auto 10px; }
.up-sell .content { border: 1px solid #e3e3e3; border-top: 0; }
.up-sell .content li { border-bottom: 1px dotted #cccccc; }
.up-sell .prod_pic { text-align: center; }
.up-sell .prod_info a { color: #333333; font-size: 11px; text-decoration: none; line-height: 15px; }
.up-sell .prod_info a:hover { text-decoration: underline; }
.product-img-right { float: right; width: 350px; margin: 0 auto auto auto; overflow: hidden; }
.product-img-right .share { margin: 10px auto; padding: 10px; border-bottom: 1px solid #ccc; border-top: 1px solid #ccc; text-align: right; }
/* nav card */
.prodcut-detail-left { width: 100%; }
.product_con { padding: 10px 15px; background: #f3f3f3; }
.product_con_cn { padding: 1px; }
.collateral-box .hd { background: #EBEEF0; border-bottom: 1px solid #D5D5D5; }
.collateral-box .hd span { display: block; height: 35px; line-height: 32px; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/ico_pv_tit.gif) no-repeat 0 10px; padding: 0 0 0 20px; font-size: 14px; font-weight: bold; margin: 0 0 0 10px; }
.collateral-box .con_box { margin: 15px; }
#con_p_2, #con_p_3 { display: none; }
#con_p_3 { text-align: center; }
.pv_dl_warp { }
.pv_dl_warp .dl_list { width: 200px; margin: 0 15px; border: 1px solid #CCC; border-radius: 5px; }
.pv_dl_warp .dl_list .hd { padding: 5px 10px; border-top-left-radius: 5px; border-top-right-radius: 5px; font-weight: bold; }
.pv_dl_warp .dl_list .item { margin: 0 10px 10px 10px; }
.pv_tem_ui1_list { overflow: hidden; }
.pv_tem_ui1_list li { display: inline; float: left; width: 180px; text-align: center; margin: 0 31px 30px 31px; }
.pv_tem_ui1_list li .tit { font-size: 14px; font-weight: bold; margin: 20px 0 10px 0; }
.pv_tem_ui1_list li .con { font-size: 12px; text-align: left; }
.pv_tem_ui1_pg { border-top: 1px dashed #DBDBDB; margin: 40px auto; padding: 40px 0 0 0; width: 675px; overflow: hidden; }
.pv_tem_ui1_pg .package { width: 210px; }
.pv_tem_ui1_pg .package .tit { font-size: 14px; font-weight: bold; }
.pv_tem_ui1_pg .package ul { margin: 10px 0 0 0; }
.pv_tem_ui1_pg .package_img { width: 460px; }
.pv_tem_ui2_warp { margin: 20px auto; }
.pv_tem_ui2_list { }
.pv_tem_ui2_list li {clear:both; margin: 0 0 20px 0; list-style: none; zoom: 1; }
.pv_tem_ui2_list li .box { margin: 0 0 0 15px; width: 410px; }
.pv_tem_ui2_list li .img { width: 300px; }
.pv_tem_ui2_list li .tit { font-size: 14px; font-weight: bold; }
.pv_tem_ui2_list .con_list { margin: 10px 0 20px 0; }
.pv_tem_ui2_list .con_list li { list-style: disc inside; padding: 0 0 0 5px; margin: 0; }
.pv_tem_ui1_pg { border-top: 1px dashed #DBDBDB; margin: 40px auto; padding: 40px 0 0 0; width: 675px; overflow: hidden; }
.pv_tem_ui1_pg .package { width: 210px; }
.pv_tem_ui1_pg .package .tit { font-size: 14px; font-weight: bold; }
.pv_tem_ui1_pg .package ul { margin: 10px 0 0 0; }
.pv_tem_ui1_pg .package_img { width: 460px; }
/* new breadmenu style &*/
.product-infoheader { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/bread_bg.gif) repeat-x 0 -60px; height: 28px; }
.product-infoheader .bg_l { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/bread_bg.gif) no-repeat 0 0; height: 28px; display: block; float: left; width: 8px; }
.product-infoheader .mate { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/bread_bg.gif) no-repeat right -30px; height: 28px; }
.product-infoheader .breadcrumbs { margin: 0 auto 0 10px; overflow: hidden; padding: 5px 0 0 10px; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/icon_01.gif) no-repeat 0 9px; }
/* other page style (about us ,contact us...)*/
.pub_bann, .pub_nav { width: 760px; }
.pub_bann { height: 110px; }
.pub_nav { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/pub_nav.gif) no-repeat; height: 60px; }
.pub_nav ul { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/pub_nav_bg.gif) repeat-x; height: 22px; }
.pub_nav ul li { float: left; margin: 0 5px; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/pub_nav_lineY.gif) no-repeat 100% 3px; padding: 0 20px; height: 22px; }
.pub_nav ul li a { color: #b2d5e6; text-decoration: none; }
.pub_nav ul li a:hover { color: #ffffff; font-weight: bold; }
.pub_nav ul li.check { color: #333333; font-weight: bold; position: relative; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/pub_nav_check_bg.gif) repeat-x; }
.pub_con { padding: 5px 0; }
h3.pub_tit { background: #dedede url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/icon_03.gif) no-repeat 5px 5px; height: 25px; padding-left: 25px; line-height: 25px; font-size: 14px; color: #015fc0; }
.pub_con .pub_con_box { padding: 5px; }
.pub_round_tit { background: #F4F4F4; overflow: hidden; }
.pub_round_tit span { display: block; height: 26px; width: 5px; }
.pub_round_tit .right { background-position: -26px 0; }
.pub_round_tit h3 { float: left; height: 26px; line-height: 25px; overflow: hidden; margin: 0 10px; }
.pub_round_tit h2 { line-height: 20px; margin-left: 15px; font-size: 14px; }
/*contact us 0808*/
.contact_c1 { padding: 15px;}
.contact_c1 .fl .china { margin: 30px 0 0 0; }
.contact_c1 h3,.contact_c2 h3 { font-size: 14px; font-weight:normal }
.contact_c1 .pos_box { position: relative; margin: 10px 15px 0 50px; }
.contact_c1 .pos_box .address { position: absolute; top: 185px; left: 40px; }
.contact_c2 { overflow: hidden; margin: 10px auto; border: 1px solid #ccc; border-right:none;border-left:none; padding: 20px 10px; }
.contact_c2 .pos_box { margin: 10px 15px 0 50px; }
/*news */
.news ul { }
.news ul li { border-bottom: 1px dotted #dbdbdb; overflow: hidden; margin-top: 15px; }
.news ul li img { width: 100px; height: 69px; float: left; margin-bottom: 10px; }
.news ul li .news_con { float: left; margin-left: 10px; width: 600px; }
.news ul li .news_con h3 { font-size: 12px; }
.news ul li .news_con p { font-size: 10px; line-height: 13px; }
/* new faq */
/*.faq_warp { overflow: hidden; width: 100%; }
.faq_type { width: 100%; height: 80px; position: relative; margin: 0 0 20px 0; }
.faq_type ul { overflow: hidden; position: absolute; top: 0; left: 0; }
.faq_type ul li { float: left; width: 68px; height: 77px; margin: 0 15px 0 0; }
.faq_nav_box { width: 100%; margin: 0 auto 10px; }
.faq_nav { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/faq_line.gif) repeat-x 0 31px; _height: 29px; _background-position: 0 29px; }
.faq_nav ul { overflow: hidden; _height: 30px; }
.faq_nav ul li { overflow: hidden; float: left; margin: 0 10px 0 0; cursor: pointer; _width: 110px; }
.faq_nav ul li span { height: 32px; display: block; }
.faq_nav ul li .left { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/faq_nav_hov.gif) no-repeat; float: left; width: 12px; }
.faq_nav ul li .txt { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/faq_nav_hov.gif) repeat-x 0 -64px; float: left; padding: 0 12px; min-width: 50px; line-height: 30px; text-align: center; }
.faq_nav ul li .right { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/faq_nav_hov.gif) no-repeat 0 -32px; float: left; width: 12px; }
.faq_nav ul li.check .left { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/faq_nav.gif) no-repeat; }
.faq_nav ul li.check .txt { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/faq_nav.gif) repeat-x 0 -64px; }
.faq_nav ul li.check .right { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/faq_nav.gif) no-repeat 0 -32px; }
.top_round { overflow: hidden; margin: -1px 0 0 0; border-left: 1px solid #c6c6c6; height: 7px; }
.top_round .right { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/faq_round.gif) no-repeat -7px 0; height: 7px; width: 7px; display: block; float: right; }
.nav_con { border-left: 1px solid #c6c6c6; border-right: 1px solid #c6c6c6; }
.faq .foot_round { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/faq_line.gif) repeat-x 0 100%; height: 7px; overflow: hidden; }
.faq .foot_round span { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/faq_round.gif) no-repeat; height: 7px; width: 7px; }
.faq .foot_round .left { background-position: 0 -7px; }
.faq .foot_round .right { background-position: -7px -7px; }
.nav_con_list { padding: 15px; }
.nav_con_list h4 { background: #f4f4f4; margin: 0; border: 1px solid #ccc; line-height: 25px; padding-left: 10px; }
.nav_con_list .answer { margin: 5px 10px 20px 10px; overflow: hidden; }
.nav_con_list .answer .title { color: #004a89; font-size: 14px; font-weight: bold; }
.nav_con_list .answer .con { margin-left: 10px; width: 630px; }
.nav_con .first { display: block; }*/
/*careers page */
.left-col { float: left; width: 48%; }
.right-col { float: right; width: 48%; }
.career .left-col img { margin: 0 10px 10px 0; float: left; }
.career h2 { font-size: 14px; }
.career_cn { padding:10px;}
.career_cn .pictxt { overflow: hidden; _zoom: 1; }
.career_cn .pictxt .img_fl { float: left; display: inline; margin: 0 10px 10px 0; }
.career_cn .career_col { padding: 5px; background: #F4F4F4 url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/bkg_hd.gif) repeat-x 0 30px; margin: 15px 0; }
.career_cn .career_col .career_col_b { width: 30%; margin: 0 12px; }
.career_cn .career_col .tit { font-size: 16px; font-weight: bold; margin: 0 0 5px 0; }
.career_cn .career_info_w .hd { font-size: 16px; font-weight: bold; }
.career_cn .career_info_w .item { margin: 0 0 30px 0; }
.career_cn .career_name { background: #DFEDF8; font-size: 14px; font-weight: bold; padding: 3px 5px; }
.career_cn .career_info_w .tit, .career_cn .career_info_w ol, .career_cn .career_info_w .get_career { padding: 0 10px; }
.career_cn .career_info_w .tit { font-weight: bold; margin: 0 0 5px 0; }
.career_cn .career_info_w ol { margin: 0 0 20px 0; }
.career_cn .career_info_w ol li { list-style: disc inside; }
.career_cn .career_info_w .get_career { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/btn_get_career.png) no-repeat; width: 80px; height: 38px; }
.career_cn .career_info_w .get_career a { display: block; color: #FFF; text-align: center; line-height: 36px; font-weight: bold; font-size: 14px; }
/* 404 error page */
.404box p.logo { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/logo.gif) no-repeat; width: 162px; height: 38px; }
/* product detail video&download*/
.prod_media .left { width: 186px; text-align: center }
.prod_media .left .download { width: 186px; height: 59px; margin: 5px 0 0 0; }
.prod_media .left .txt { margin: 10px 0 0 0; }
.prod_media .right { text-align: center; margin: 0 10px auto auto; }
.prod_media .right .txt, .prod_media .left .txt { color: #4161A8; font-size: 11px; font-weight: bold; }
.float_video { border: 0 #c2c2c2 solid; display: none; }
.kit_video .box_header { height: 39px; }
.kit_video .box_header span { display: block; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/video/box_tit.png) no-repeat; height: 39px; width: 13px; }
.kit_video .box_header .left { background-position: 0 1px; float: left; display: inline; }
.kit_video .box_header .right { background-position: -3px -39px; float: right; display: inline; }
.kit_video .box_header_con { float: left; width: 664px; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/video/box_tit.png) repeat-x 0 -78px; height: 39px; }
.kit_video .box_header_con img { margin: 4px 0 0 0; }
.kit_video .video_box_con { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/video/box_bg.png) repeat-y 3px 0; }
.kit_video .video_box_con .left { width: 422px; margin: 2px auto auto 5px; float: left; display: inline; }
.kit_video .video_box_con .right { float: right; display: inline; }
.kit_video .video_box_con .right li { background: #f5f5f5; border-bottom: 1px solid #c2c2c2; overflow: hidden; }
.kit_video .video_box_con .right li span { display: block; float: left; color: #4161a8; font-weight: bold; line-height: 60px; margin: 0 auto auto 10px; }
.kit_video .video_box_con .right li img { float: right; margin: 5px 10px; }
.kit_video .video_box_con .right { margin: 2px 5px auto auto; width: 255px; }
.kit_video .video_box_con .name { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/video/name_tit.gif)repeat-x; margin: 5px 5px 0 5px; padding-top: 5px; }
.kit_video .video_box_con .name p { margin: 5px 10px 0 10px; text-align: left; }
.kit_video .video_box_con .name p.sku { color: #4161a8; }
.video_box_foot { overflow: hidden; }
.video_box_foot span { display: block; width: 16px; height: 16px; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/video/box_foot.png) no-repeat; }
.video_box_foot .left { float: left; margin-left: 3px; }
.video_box_foot .right { float: right; background-position: 0 -16px; margin-right: 3px; }
.video_box_foot .box_con { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/video/box_foot.png) repeat-x 0 -32px; height: 16px; float: left; width: 652px; }
.kit_video .video_box_con .right .clips a { display: block; overflow: hidden; background: #f5f5f5; padding: 3px 0; border-bottom: 1px solid #ccc; }
.kit_video .video_box_con .right .clips a:hover { background: #fff url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/video/list_hov.gif) repeat-x; }
.kit_video .video_box_con .right .clips a .left { width: 150px; line-height: 20px; text-align: left; }
.kit_video .video_box_con .right .clips a span, .clips a img { display: block; }
.kit_video .video_box_con .right .clips a span { color: #4161a8; float: left; }
.kit_video .video_box_con .right .clips a img { height: 50px; width: 71px; }
.kit_video .playlist { height: 288px; overflow: auto; }
/* facebox style*/
#basic-modal-content { display: none; }
/* Overlay */
#simplemodal-overlay { background-color: #000; cursor: wait; }
/* Container */
#simplemodal-container { height: 400px; width: 690px; color: #bbb; border: 0; padding: 0; }
#simplemodal-container code { background: #141414; border-left: 3px solid #65B43D; color: #bbb; display: block; margin-bottom: 12px; padding: 4px 6px 6px; }
#simplemodal-container a { color: #ddd; }
#simplemodal-container a.modalCloseImg { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/close.gif) no-repeat; width: 15px; height: 13px; display: inline; z-index: 3200; position: absolute; top: 10px; right: 10px; cursor: pointer; }
#simplemodal-container #basic-modal-content { padding: 8px; }
/* tech support */
.tech ul li { float: left; height: 70px; margin: 20px auto auto 20px; width: 195px; }
.tech ul li.tech_tel { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/tech1.png) no-repeat scroll 0 0; }
.tech ul li.tech_tel span { display: block; font-weight: bold; margin: 32px auto auto 75px; }
.tech ul li.tech_mail { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/tech3.png) no-repeat scroll 0 0; }
.tech ul li.tech_mail a { display: block; font-size: 9px; margin: 35px auto auto 70px; }
/* support list */
.support_total { }
.support_total a { text-decoration: none; }
.support_total h5 { color: #000000; font-size: 12px; line-height: 30px; padding: 0 10px; margin: -5px 0 0 0; }
.support_total_list { margin: 15px 20px; color: #000; }
.support_total_list li { margin: 5px auto 15px auto; min-height: 110px; _height: 90px; }
.support_total_list li .con { margin: 0 0 0 130px; border-bottom: 1px solid #ccc; padding: 10px 5px; min-height: 70px; }
.support_total_list .li1 { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/support_ico1.gif) no-repeat; }
.support_total_list .li2 { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/support_ico2.gif) no-repeat; }
.support_total_list .li3 { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/support_ico3.gif) no-repeat; }
.support_total_list .li4 { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/support_ico4.gif) no-repeat; }
.support_total_list .li5 { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/support_ico5.gif) no-repeat; }
.support_total_list .li6 { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/support_ico6.gif) no-repeat; }
.support_total_list .li7 { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/support_ico7.gif) no-repeat; }
.support_total_list li .con h3 a { color: #000000; font-size: 20px; font-weight: 100; margin: 0; }
.support_total_list li .con .blue { color: #4161a8; }
.support_total_list li p { font-size: 13px; margin-bottom: 0; }
.support_total_list li p.mailto { font-size: 13px; font-weight: bold; }
.popular_link { margin: 0 auto 10px auto; }
.popular_tit { background: #f4f4f4; font-size: 12px; line-height: 30px; padding: 0 10px; color: #333; font-weight: bold }
.popular_list { overflow: hidden; height: 180px; }
.popular_list li { float: left; display: inline; margin: 10px 30px }
.popular_list li .img { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/popular_link.gif) no-repeat; height: 126px; width: 126px; }
.popular_list .img a { display: block; height: 126px; width: 126px }
.popular_list li.ptz .img { background-position: 0 -126px; }
.popular_list li.kb .img { background-position: 0 -252px; }
.popular_list li a { font-weight: bold }
/* download center */
.download { }
.download .down_type { position: relative; height: 100px; }
.download .down_type ul { overflow: hidden; position: absolute; top: 20px; left: 200px; }
.download .down_type ul li { float: left; height: 77px; width: 69px; margin: 0 15px 0 0; }
.download .down_type ul li p { color: #4161a8; font-weight: bold; text-align: center; }
.download .down_type ul li p a { text-decoration: none; color: #4161a8; font-size: 11px; }
.download .down_type ul li p a:hover { color: #f88000; }
.down_select { background: #e8eaeb; height: 55px; width: 600px; margin: 15px auto; border-radius: 3px; padding: 5px; }
/*.down_select span.left, .down_select span.right{ background:url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/download_round.gif) no-repeat; display:block; height:55px; width:7px;}*/
.down_select span.right { background-position: -7px 0; }
.down_select .con { float: left; overflow: hidden; width: 90%; }
.down_select .con p { float: left; margin: 15px 10px 0 0; }
.down_select .con p.txt { font-weight: bold; line-height: 20px; margin-left: 30px; }
.down_select .con input, .down_select .con select { width: 150px; height: 20px; }
.down_select .con p.btn { margin: 13px 0 0 0; }
.down_list { width: 700px; margin: 20px auto 0; }
.list_head { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/down_tit.gif) repeat-x; height: 26px; border-bottom: 1px solid #ccc; border-top: 2px solid #ccc; overflow: hidden; }
.list_head li { float: left; color: #666; font-size: 11px; font-weight: bold; text-align: center; line-height: 25px; }
.listbox .id { width: 40px }
.listbox .sku { width: 120px; ; text-align: left; margin-left: 15px }
.listbox .type { width: 120px; margin-left: 15px }
.listbox .name { width: 200px; text-align: left; margin-left: 15px }
.listbox .manual { width: 80px; margin-left: 15px }
.list_con { margin-bottom: 30px; }
.list_con li { overflow: hidden; border-bottom: 1px solid #ccc; zoom: 1; }
.list_con li p { float: left; line-height: 35px; text-align: center; font-size: 11px; min-height: 20px; height: 20px }
.list_con li .software a { display: block; width: 16px; height: 16px; }
.list_con li .tutoing a { display: block; width: 16px; height: 16px; }
.list_con li .manual a { display: block; width: 16px; height: 16px; }
.list_con li .how a { display: block; width: 16px; height: 16px; }
.list_con li a { margin: 4px auto 0 auto; }
#loading-mask { color: #D85909; font-size: 1.1em; font-weight: bold; opacity: 0.8; position: absolute; text-align: center; z-index: 500; }
#loading-mask .loader { background: none repeat scroll 0 0 #FFF4E9; border: 2px solid #F1AF73; color: #D85909; font-weight: bold; left: 50%; margin-left: -60px; padding: 15px 60px; position: fixed; text-align: center; top: 45%; width: 120px; z-index: 1000; }
/* customer case */
.pub_con .mid { width: 450px; margin: 0 auto; }
.pub_con .url000 { color: #333333; font-weight: bold; text-decoration: none; }
.pub_con .url000:hover { text-decoration: underline; }
/* solution */
.bann_url { position: relative; height: 100px; }
.bann_url ul { overflow: hidden; position: absolute; left: 200px; top: 10px; }
.bann_url ul li { float: left; margin: 0 15px 0 0; }
.solution_list { margin: 15px 0; }
.solution_list li { border-bottom: 1px dotted #ccc; float: left; width: 350px; margin: 0 15px 30px; overflow: hidden; height: 60px; }
.solution_list li .name { float: left; width: 250px; }
.solution_list li .btn { float: right; width: 70px; height: 20px; }
.solution_list li a { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/url_blue_bg.gif) repeat-x; display: block; height: 16px; text-align: center; border: 1px solid #336666; color: #333; font-size: 11px; text-decoration: none; line-height: 15px; }
.solution_list li a:hover { font-weight: bold; }
/* video list page 0808 */

.video_list li { float: left; display: inline; width: 23%; padding: 5px; border: 1px solid #DBDBDB; margin: 0 7px 10px 0; }
.video_list li.w_m { width: 23%; }
.video_list li .video_box { /*width: 220px; height: 160px; */ margin: 0; position: relative; text-align: center }
.video_list li .video_box img { width: 100%; height: 100% }
.video_list li .play_box { background-color: white; opacity: 0.3; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=30)"; filter: alpha(opacity=30); display: none; cursor: pointer; position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
.video_list li #play_bnt { width: 40px; height: 40px; left: 90px; display: none; position: absolute; top: 60px;  cursor: pointer;}
.video_list li .video_box:hover .play_box, .video_list li .video_box:hover #play_bnt { display: block }
.video_list li .video_txt { margin: 10px 0 0 0; line-height: 20px; text-align: left }
.video_list li .video_txt h3 { height: 20px; line-height: 16px; font-size: 12px; font-weight: bold }
.video_list li .video_txt h3 a { color: ##004ea2;  cursor: pointer;}
.video_list li .h60 { height: 100px; line-height: 20px; overflow: hidden }
.user_ps { margin: 15px 0; border: 1px solid #efefef; padding: 10px; }
.other { font-weight: bold; cursor: pointer }
.orange { display: inline-block; font-weight: normal; color: #F60; padding-left: 8px; }
.other_txt { display: none; }
.other_block { display: block }
/* tech ticket page */
.red { color: red; }
.ticket .content1, .ticket .content2 { width: 95%; margin: 0 auto 10px auto; }
.ticket .content1 .right { width: 350px; }
.ticket .content1 .left p, .ticket .content1 .right p { margin: 0; }
.ticket .content2 .type { margin: 20px auto 20px auto; text-align: center; }
.ticket .search_box { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/ticket_bg_search.gif) repeat-x; border: 1px solid #ccc; height: 50px; margin: 25px auto 15px auto; }
.ticket .search_box p { float: left; margin: 0; }
.ticket .search_box p.txt { font-size: 10px; font-weight: bold; line-height: 50px; margin: 0 0 0 10px; }
.ticket .search_box button { border: 0; background: none; height: 25px; width: 121px; cursor: pointer; margin: 10px auto auto 10px; }
.ticket .search_box input { border: 1px solid #ccc; height: 23px; margin: 12px auto auto 10px; width: 190px; }
.ticket .form_list { }
.ticket .form_list li { float: left; width: 350px; overflow: hidden; margin: 0 0 15px 0; }
.ticket .form_list li.textarea { width: 700px; }
.ticket .form_list li p { float: left; width: 120px; text-align: right; }
.ticket .form_list select { float: left; margin: 0 0 0 10px; width: 200px; }
.ticket .form_list input { float: left; margin: 0 0 0 10px; width: 200px; }
.ticket .form_list textarea { float: left; margin: 0 0 0 10px; width: 550px; }
.ticket .content2 .btn { text-align: center; }
.ticket .detail_box { width: 95%; margin: 10px auto; }
.ticket .title_red { background: red; line-height: 30px; padding: 0 10px; font-size: 13px; color: #fff; }
.ticket .detail_list { margin: 20px 0 0 0; }
.ticket .detail_list li { margin: 0 0 15px 0; }
.ticket .detail_list .tab_head { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/ticket_tit_bg.gif) repeat-x; border: 1px solid #ccc; height: 30px; padding: 0 10px; overflow: hidden; }
.ticket .detail_list .tab_head p { line-height: 30px; }
.ticket .detail_list .tab_head p.txt { float: left; margin: 0 10px 0 0; }
.ticket .detail_list .tab_head p.date { float: right; }
.ticket .detail_list .con { padding: 0 10px; overflow: hidden; margin: 10px 0 0 0; }
.ticket .detail_list .con .tit_txt { float: left; width: 40px; }
.ticket .detail_list .con .detail { float: left; width: 640px; margin: 0 0 0 10px; }
/* shop 0809*/
.where .map { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/where_map.jpg) no-repeat; width: 570px; height: 320px; margin: 10px auto; padding: 1px; position: relative; }
.where .tooltips { position: relative; height: 10px; width: 10px; }
.where .tip_box .address { float: left; padding: 5px; }
.where .tip_box { position: absolute; display: none; }
.where .fl { top: 330px; right: -75px; }
.where .or { top: 120px; left: 30px; }
.where .ca { top: 230px; left: 50px; }
.where .tx { top: 310px; left: 220px; }
.where .il { top: 200px; right: 50px; }
.where .ga { top: 270px; right: 25px; }
.where .pa { top: 160px; right: -10px; }
.where .on { top: 110px; right: -20px; }
.where .nh { top: 120px; right: -65px; }
.where .bc { top: 60px; left: 85px; }
.where .address .title { font-size: 12px; font-weight: bold; margin: 0; }
.where .address .con { margin: 0; }
.where .tooltips a { display: block; width: 10px; height: 10px; background: #FF0; cursor: pointer; }
.where .tip_base { }
.where .tip_base .top_left { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/tipbox_tl.png) no-repeat; width: 21px; height: 19px; }
.where .tip_base .top_bg { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/tipbox_tbg.png) repeat-x; height: 19px; }
.where .tip_base .top_right { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/tipbox_tr.png) no-repeat; width: 21px; height: 19px; }
.where .tip_base .con_left { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/tipbox_l.png) repeat-y; }
.where .tip_base .con_right { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/tipbox_r.png) repeat-y; }
.where .tip_base .con_add { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/tipbox_bg.png); }
.where .tip_base .foot_left { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/tipbox_fl.png) no-repeat; width: 21px; height: 20px; }
.where .tip_base .foot_bg { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/tipbox_fbg.png) repeat-x; height: 20px; }
.where .tip_base .foot_right { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/tipbox_fr.png) no-repeat; height: 20px; }
.where .tip_base .tip_top_img { height: 19px; position: relative; }
.where .tip_base .tip_top_img span { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/tipbox_top.png) no-repeat; width: 55px; height: 35px; position: absolute; top: -32px; left: -10px; }
.where .onlinestore { padding: 0; }
.where .onlinestore .foot_round { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/faq_line.gif) repeat-x 0 100%; height: 7px; overflow: hidden; }
.where .onlinestore .foot_round span { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/faq_round.gif) no-repeat; width: 7px; height: 7px; }
.where .onlinestore .foot_round .left { background-position: 0 -7px; }
.where .onlinestore .foot_round .right { background-position: -7px -7px; }
.store_list { width: 98%; margin: 15px auto; overflow: hidden; }
.store_list li { overflow: hidden; margin: 0 10px 10px 0; float: left; width: 176px; height: 68px; border: 1px solid #DCDCDC }
.store_list li p { margin: 0; }
.store_list li p.name { font-size: 9px; }
.store_list li p a { color: #1e7ec8; }
.store_list li p a:hover { text-decoration: underline; }
/*.where_note { background: #F4F4F4; color: #666; font-weight: bold; text-align: center; line-height: 25px; width: 100%; margin: 0; }*/
/* Customer Testimonials */
.testim .video { width: 90%; margin: 0 auto 10px auto; overflow: hidden; }
.testim .video img { float: left; }
.testim .pub_banner { height: 180px; }
.testim .con { float: left; margin: 0 0 0 15px; }
.testim .con strong { font-size: 16px; font-style: italic; }
.review_list { width: 90%; margin: 40px auto 10px auto; }
.review_list .list_head { background: #f3f3f3; border: 1px solid #ccc; overflow: hidden; padding: 3px; }
.review_list .list_head p { margin: 0; line-height: 25px; }
.review_list .list_head .subject { float: left; font-weight: bold; margin: 0 0 0 10px; }
.review_list .list_head .data { float: right; font-weight: bold; margin: 0 10px 0 0; }
.review_list .list_con { padding: 10px 15px; }
/*================ nav style ================*/
.nav_sty1 { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/faq_line.gif) repeat-x 0 31px; overflow: hidden; zoom: 1; }
.nav_sty1 li { cursor: pointer; float: left; margin: 0 10px 0 0; overflow: hidden; *width:168px;
}
.nav_sty1 li span { display: block; height: 32px; }
.nav_sty1 li .left { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/faq_nav_hov.gif) no-repeat; width: 12px; }
.nav_sty1 li .txt { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/faq_nav_hov.gif) repeat-x 0 -64px; float: left; line-height: 30px; min-width: 50px; padding: 0 12px; text-align: center; *width:120px;
}
.nav_sty1 li .right { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/faq_nav_hov.gif) no-repeat 0 -32px; width: 12px; }
.nav_sty1 li.check .left { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/faq_nav.gif) no-repeat 0 0; }
.nav_sty1 li.check .txt { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/faq_nav.gif) repeat-x 0 -64px; }
.nav_sty1 li.check .right { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/faq_nav.gif) no-repeat 0 -32px; }
.nav_sty1_con { border-left: 1px solid #C6C6C6; border-right: 1px solid #C6C6C6; }
.nav_sty1_foot { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/faq_line.gif) repeat-x 0 100%; height: 7px; overflow: hidden; }
.nav_sty1_foot span { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/faq_round.gif) no-repeat; height: 7px; width: 7px; }
.nav_sty1_foot .left { background-position: 0 -7px; }
.nav_sty1_foot .right { background-position: -7px -7px; }
/* ==================================== quote page ========================== */
.quote-form { margin: 10px 0; padding: 5px 0; width: 100%; }
.quote-form li { overflow: hidden; padding: 0 20px; }
.quote-form li.radio { border-top: 1px solid #ccc; border-bottom: 1px solid #ccc; padding-top: 0.8em; }
.quote-form li.no-bor-top { border-top: 0; }
.quote-form li p { float: left; margin-right: 15px; }
.quote-tit, .quote-raido-tit { font-weight: bold; width: 120px; }
.quote input { border: 1px solid #ccc; height: 20px; }
.quote select { width: 105px; height: 20px; }
.quote-input-l { width: 300px; }
.quote-input-m { width: 180px; }
.quote-form label { display: block; font-weight: 100; color: #164795; }
.quote-form label input { margin-right: 5px; }
.quote-comm { padding: 5px 20px; }
.quote-comm-tit { font-weight: bold; margin: 0; }
.quote-comm-rtit { margin: 15px 0 0 0; }
.quote-btn { margin: 5px 0 20px 0; text-align: right; }
.quote-btn button { margin-right: 40px; }
.quote-form li.radio input, .quote-comm input { border: 0; }
.quote-comm label { margin-right: 10px; }
/*video sample*/
.op_tit .cate, .op_tit .key, .op_tit .btn { display: inline; float: left; }
.op_tit .cate { margin: 0 0 0 80px; }
.op_tit .key { margin: 1px 40px 0 40px; }
.op_tit .key input { height: 15px; }
.op_tit .btn { margin: -2px 0 0 0; }
.pager_pre { margin-left: -80px; }
.zviewer { width: 722px; margin: 10px auto; }
.zviewer .hd { font-size: 16px; border-bottom: 1px solid #CCC; margin: 10px 0 5px 0; }
.zviewer .con { font-size: 14px; line-height: 20px; }
.zviewer .hd, .zviewer .con { padding: 8px; }
.zviewer_guide, .zviewer_app { margin: 40px 0; }
.zviewer_app .iphone { margin: 0 50px 0 0; }
.zviewer_app .iphone, .zviewer_app .android { text-align: center; }
.zviewer_app a { font-size: 14px; }
.zviewer .video { margin: 20px 0; }
/*服务与下载*/
.support_list { margin: 0 0 0 20px; }
.support_list li { float: left; margin: 0 15px 15px 0; text-align: center; font-size: 12px; line-height: 25px; width: 120px; font-weight: bold }
.support_list li .imgbox { border: 1px solid #bababa; margin-bottom: 10px; display: block; overflow: hidden; width: 107px; height: 107px }
.support_list li .img1 { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/support_ico3.gif) no-repeat; }
.support_list li .img2 { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/support_ico9.jpg) no-repeat; }
.support_list li .img3 { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/support_ico5.gif) no-repeat; }
.support_list li .img4 { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/support_ico4.gif) no-repeat; }
.support_list li .img5 { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/support_ico2.gif) no-repeat; }
.support_list li .img6 { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/support_ico10.jpg) no-repeat; }
.support_list li .img7 { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/support_ico8.jpg) no-repeat; }
/*development history*/
.history_box { width: 625px; margin: 30px auto; font-family: "宋体" }
.history_hd { width: 625px; height: 35px; line-height: 35px; color: #FFF; background: #f9be00; font-size: 24px; text-align: center }
.history_cnt li { float: left; color: #434343; font-size: 14px; }
.history_cnt li.li_cnt { width: 250px; padding-top: 30px; overflow: hidden }
.history_cnt li.li_img { width: 124px; }
.history_cnt li h1 { color: #979797; font-size: 24px; margin-bottom: 10px; text-align: right }
.history_cnt li .mb20 { margin-bottom: 20px; }
.history_cnt li .mb50 { margin-bottom: 50px; }
.history_cnt li .pd30 { padding-top: 20px; }
.history_cnt li .text_l { text-align: left }
/*Organization chart*/
.chart_list { width: 710px; margin: 30px auto; overflow: hidden }
.chart_list li { margin-right: 10px; float: left; height: 94px; }
.chart_big_img { clear: both; width: 100%; text-align: center }
/*qualification and honor*/
.op_con_warp{padding:10px 0 0 15px}
.honor_box { width: 100%; overflow: hidden }
.honor_box li { float: left; width: 221px; height:194px; display:inline; text-align: center; margin: 0 15px 15px 0; overflow: hidden }
.honor_box li p { margin-top:5px; line-height:22px}
.honor_box li img { border: 1px solid #B1B1B1; padding:2px; }
.strength_list {width:825px; margin:25px auto; overflow:hidden}
.strength_list li{width:260px; float:left; display:inline; margin-right:15px}
/*product list*/
#product_list_cnt { float: left; width: 60%; margin: 0 15px; }
/** satisfaction **/
ul li { list-style: none; }
.media_expasure { width:97%; float: left; padding-left: 10px; }
.fan_manyi_t { text-align: center; font-size: 14px; padding: 5px; }
.fan_manyi_intro { padding: 0 6px 10px 15px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; border-top: 1px solid #999 }
.fan_manyi_intro li { clear: both; padding: 5px 0; }
.fan_manyi_intro li strong { font-size: 14px; }
.fan_mian_input { border: 1px solid #a5acb2; padding: 1px; }
.fan_red { color: #f00; padding-left: 5px; }
.fan_manyi_intro_inul { display: block; padding: 10px 10px 0 30px; }
.fan_manyi_intro_inul .sapnleft { float: left; padding-right: 6px; text-align: right; width: 50px; }
.fan_fankui { text-align: center; border-collapse: collapse; width: 600px; display: block; margin: 10px; background: #fff; }
.fan_bottom, .fan_quick { cursor: pointer; border: 0; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/submit_qes.jpg) no-repeat; width: 61px; height: 23px; margin: 30px 0 30px 10px; font-size: 0; line-height: 0; float: left; }
.fan_quick { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/reset_qes.jpg) no-repeat; }
.fan_shuoming { clear: both; font-size: 12px; line-height: 160%; color: #f00; text-indent: 2em; margin-bottom: 20px; }
.fan_fankui td { border: 1px solid #666; border-collapse: collapse; }
/*view*/
.view_hd_list { height: 35px; }
.view_hd_list li { float: left; height: 34px; line-height: 34px; font-size: 14px; font-weight: bold; padding: 0 15px; border: 1px solid #D5D5D5; background: #fff; margin: 0 10px 0 0; cursor: pointer }
.view_hd_list li:hover, .view_hd_list li.curr { background: #EBEEF0; }
.view_cnt { border-top: 1px solid #D5D5D5; }
.hide { display: none; }
/*faq*/
.faq_list { margin: 10px; overflow: hidden }
.faq_list li { height: 30px; line-height: 30px; border-bottom: 1px dotted #CCCCCC }
.nav_con_list dt { font-weight: bold; height: 30px; line-height: 30px; cursor: pointer; }
.nav_con_list a.orange { font-weight: normal; color: #F90; margin-left: 10px; }
.nav_con_list dd { display: none }
.nav_con_list dd.answer { display: block; }
h3.comtit { font-size: 14px; font-weight: bold; margin: 10px 0 10px 15px; padding-left: 15px; position: relative }
h3.comtit i { width: 5px; height: 20px; background: #0077AE; border-radius: 3px; position: absolute; top: 0; left: 0 }
.about_con_warp { padding: 10px 10px 20px; overflow: hidden }
.support_software { }
.support_software li { overflow: hidden; padding: 10px; border-bottom: 1px dashed #dbdbdb; }
.support_software .media img { width: 150px; height: 150px; }
.support_software .media { text-align: center; float: left; display: inline; margin: 0 30px 0 0; }
.support_software .item { float: left; display: inline; width: 30%; margin: 0 25px; }
.support_software .tit { background: #f0f0f0; padding: 5px 10px; font-weight: bold; color: #454545; margin: 0; }
.support_software .list { margin: 0 10px; }
.support_software .list li { padding: 0 0 0 13px; border: 0; line-height: 25px; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/icon_02.gif) no-repeat 0 11px; }
.support_software .all_download { }
.support_software .all_download a { display: block; background: #0089c9 url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/download.png) no-repeat 10px 6px; padding: 5px 10px 5px 18px; border-radius: 5px; color: #FFF; font-weight: bold; }
.support_software .all_download a:hover { background-color: #13a0e1; text-decoration: none; }
.product-specs { width: 500px; margin: 0 auto; overflow: hidden }
.product-specs img { width: 100% }
/* page headding for cn*/
.page-head-cn { margin: 0 0 15px 0; }
.page-head-cn { text-align: right; }
.page-head-cn h3 { margin: 0; font-size: 1.7em !important; font-weight: normal !important; text-transform: none !important; text-align: left; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/icon_02.gif) no-repeat 0 20px; padding-left: 15px; padding-top: 10px; }
/*discover 0809*/
.dis_box { width: 100%; line-height: 22px; font-size: 14px; color: #333; }
.dis_cnt { clear: both; margin-bottom: 30px; overflow: hidden; }
.dis_cnt .ceoimg { margin: 0 20px 0 0 }
.dis_cnt h1, .history_list h1, .tech_box h1 { font-size: 30px; }
.dis_f { font-size: 16px; padding-left: 25px }
.dis_cnt p { margin: 0 }
.history_list { position: relative }
.history_list dl { clear: both; margin-bottom: 50px; padding: 50px 0 0 0; }
.history_list dt { float: left; width: 192px; height: 192px; margin: 0 15px 0 0 }
.history_list dd { float: left; padding: 50px 0 0 0; width: 78% }
.history_list dd.first { padding: 0; }
.history_list .year1, .history_list .year2, .history_list .year3, .history_list .year4, .history_list .year5, .history_list .year6, .history_list .year7, .history_list .year8, .history_list .year9 { position: absolute; left: 21%; width: 57px; height: 184px }
.history_list .year1 { top: 140px; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/discover/history_10.jpg) no-repeat }
.history_list .year2 { top: 390px; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/discover/history_11.jpg) no-repeat }
.history_list .year3 { top: 630px; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/discover/history_12.jpg) no-repeat }
.history_list .year4 { top: 140px; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/discover/history_13.jpg) no-repeat }
.history_list .year5 { top: 390px; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/discover/history_14.jpg) no-repeat }
.history_list .year6 { top: 630px; width: 87px; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/discover/history_15.jpg) no-repeat }
.history_list .year7 { top: 880px; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/discover/history_16.jpg) no-repeat }
.history_list .year8 { top: 1110px; width: 87px; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/discover/history_17.jpg) no-repeat }
.history_list .year9 { top: 1350px; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/discover/history_18.jpg) no-repeat }
.history_list .year10 { top: 1600px; background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/discover/history_19.jpg) no-repeat }
.culture_left { width: 40%; float: left }
.culture_right { width: 56%; padding-left: 3%; float: left }
.culture_right dl { clear: both; margin-bottom: 30px; overflow: hidden }
.culture_right dt { float: left; margin-right: 2%; width: 8% }
.culture_right dd { float: left; width: 86%; }
.vision_box { clear: both; border-top: 1px solid #dcdcdc; padding-top: 50px; }
.tech_box h1 { text-align: center; margin-bottom: 30px; }
.tech_box { clear: both; margin-bottom: 30px; overflow: hidden }
.tech_box .leftdiv { float: left }
.tech_box .rightdiv { float: left }
.tech_box .w50 { width: 50%; }
.tech_box .w60 { width: 60%; }
.tech_box .w40 { width: 40%; }
.tech_box .w45 { width: 45%; }
.tech_box .w55 { width: 55%; }
.package_warp .con { padding-left: 1.5% }
/*downloads*/
.col_1_hd { clear: both; font-size: 26px; height: 40px; line-height: 40px; margin-bottom: 15px; }
.col_1_cnt { clear: both; margin-bottom: 30px; overflow: hidden }
.col_1_left { width: 67%; float: left; height: 245px; font-size: 14px; color: #666 }
.col_1_right { float: right; border-left: 1px solid #dcdcdc; width: 30%; padding: 0 1.4%; height: 245px }
.col_1_right img { width: 100%; margin: 0 0 10px 0; }
.col_1_cnt h3 { font-size: 18px; height: 25px; line-height: 25px; margin-bottom: 10px; }
#search_by_sku { clear: both; margin: 10px 0 15px 0 }
#search_by_sku legend { display: block; float: left; height: 29px; line-height: 29px; }
#search_by_sku .search_box { float: left; font-size: 12px; height: 26px; line-height: 26px; width: 330px; margin: 0 10px 0 15px; border: 1px solid #dcdcdc; }
#search_by_sku .search_text { padding: 3px 5px; border: none; width: 330px; height: 26px; overflow: hidden; }
#search_by_sku .search_btn { float: left; font-size: 14px; border: none; background: #0551a4; width: 107px; height: 29px; line-height: 29px; color: #FFF; cursor: pointer; }
.category_box { margin-top: 30px; }
.category_box img { float: left; margin-right: 15px; }
.sup_tool_list { border-bottom: 1px solid #dcdcdc; overflow: hidden; padding: 0 0 20px 0; margin-bottom: 20px; }
.sup_tool_list li { float: left; margin-right: 2%; width: 18.4%; }
.sup_tool_list li.last { margin: 0; }
.sup_tool_list li img { width: 100%; }
.b_14 { color: #0551a4; font-size: 14px; }
/*network*/
.tab_list { border-bottom: 3px solid #f4f4f4; height: 42px; }
.tab_list li { background: #0551a4; height: 30px; line-height: 30px; padding: 0 15px; float: left; margin: 5px 10px 5px 0; color: #FFF; font-size: 14px; cursor: pointer; }
.tab_list li.current { height: 42px; line-height: 42px; background: #f4f4f4; margin: 0 10px 0 0; color: #333; font-size: 18px; }
.net_p_box { }
.net_p_list { position: relative; padding: 30px 10px 20px 10px; border-bottom: 1px solid #DCDCDC; overflow: hidden }
.net_p_list dl { width: 30%; float: left; }
.net_p_list dt { font-size: 16px; margin-bottom: 15px; }
.net_p_list dd { height: 24px; line-height: 24px; }
a.down_btn { background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/css/images/down_icon.jpg) no-repeat; padding-left: 28px; position: absolute; right: 15px; bottom: 20px; font-size: 16px; color: #0551a4; }

/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE_AFL.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @copyright  Copyright (c) 2008 Irubin Consulting Inc. DBA Varien (http://www.varien.com)
 * @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

#znav { padding:0;}

/************** ALL LEVELS  *************/ /* Style consistent throughout all nav levels */
/*#znav li { position:relative; float:left;  text-align:center; height: 39px; width:136px; z-index: 99; }
#znav li.hov_0, #znav li.hov_1, #znav li.hov_2, #znav li.hov_3, #znav li.hov_4, #znav li.hov_5{ background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/bkg_menu.gif) no-repeat;}
#znav li.nav-menu1{width: 136px;}
#znav li.hov_0{ background-position: 0 -50px;}
#znav li.hov_1{ background-position: -136px -50px;}
#znav li.hov_2{ background-position: -278px -50px;}
#znav li.hov_3{ background-position: -440px -50px;}
#znav li.hov_4{ background-position: -560px -50px;}
#znav li.hov_5{ background-position: -702px -50px;}
#znav li.nav-menu2{width: 142px;}
#znav li.nav-menu3{width: 162px;}
#znav li.nav-menu4{width: 125px;}
#znav li.nav-menu5{width: 144px;}
#znav li.nav-menu6{ width: 145px; }
#znav li.nav-menu5 ul{ width:110%;}
#znav li.over { z-index:999; }
#znav a,
#znav a:hover { display:block; line-height:1.3em; text-decoration:none; font-size:12px; }
#znav span { display:block; cursor:pointer; white-space:nowrap; }
#znav li ul span {white-space:normal; }*/

/************ 0 LEVEL  ***************/
/*#znav li.active a { color:#d96708; }
#znav a { padding:11px 12px 10px 8px; color:#333; font-weight:bold; }
#znav li.over a,
#znav a:hover { color:#fff; }*/

/************ 1ST LEVEL ************/
/*
#znav ul li,
#znav ul li.active { float:none;  height:25px; border-bottom: 1px dotted #E2E7E9;  width:100%; *margin-left:0px; text-align:left; display:block}
#znav ul li.last { background:#ecf3f6; padding-bottom:0; }

#znav ul a,
#znav ul a:hover { float:none;  background:none;display:block }
#znav ul li a { font-weight:normal !important; display:block}*/
/************ 2ND LEVEL ************/

/*#znav ul { position:absolute; width:100%; top:38px; left:0; background:#FFF url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/menu_line.gif) no-repeat center -287px; padding: 6px 0 0 0; border: 1px solid #96A5AF; border-top: 0; opacity: 0.95; z-index: 9999; display: none; }
#znav ul.nav-prod{width: 125%;}
#znav ul.nav-prod_cn{width: 100%;}*/
/* Show menu */
/*#znav li li.over{ background:#4F98CD; color:#fff;display:block;}


#znav ul li a{color:#6A6A6A;  padding:0 0 0 5px; height:25px; display:block; line-height:25px; font-weight:bold !important; }
#znav ul li a:hover { height:25px; display:block; line-height:25px; color:#fff; }
#znav ul span, #znav ul li.last li span { padding:3px 15px 4px 15px;}
#znav ul li.about{ position:relative}

#webmenu li ul { display: none; }
#znav ul .second-menu, #znav ul .third-menu,{ position: absolute; }
#znav ul .second-menu { top: 42px; left: 0; background:#0969c4; border-top:none; z-index:99999 }
#znav ul .second-menu a{width:220px; font-size: 12px; display:block; text-align:left; display: block; color:#FFF }
#znav ul .second-menu a:hover,#znav ul .second-menu a.current {margin-left:1px; background:#4F98CD; color:#Fff;}
#znav ul .third-menu{ top:0; left: 177px; z-index:5; background:#4F98CD ; background-image:none; border:none;}
#znav ul .third-menu a { width:172px;background: #4F98CD; font-weight: normal;display: block; color:#fff }
#znav ul .third-menu a.arrow:hover,#znav ul .third-menu a.current{ background: #4F98CD; color:#fff; text-decoration:underline; margin:0; display:block}
*/
/*new css*/

/************ 1ST LEVEL ************/
/*.first_menu li a i,.first_menu li a:hover b,.first_menu li a.curr b,.second-menu li .hov_icon, .second_menu li a.current b.hov_icon{background:url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/icon.png) no-repeat}
.first_menu li{ float:left;padding:0 25px 0 10px; display:block; text-align:left; position:relative}
.first_menu li a{ text-decoration:none; color:#333; display:block}
.first_menu li a b{ background-position:-27px -53px;width:8px; height:5px; display:inline-block; margin:0 0 3px 13px;}
.first_menu li a:hover,.first_menu li a.curr{ color:#004ea2;}
.first_menu li a:hover b,.first_menu li a.curr b{ background-position:-27px -47px;}*/

/************ 2ND LEVEL ************/
/*.second_menu{ background:#d1d1d1; padding:20px; position:absolute;left:0;top:46px; display:block; z-index:99999;}
.second_menu li{ padding:0; white-space:nowrap; font-size:16px;}
.second_menu li a{color:#333; text-decoration:none}
.second_menu li a:hover,.second_menu li a.current{color:#004ea2;}
.second_menu li a.current b.hov_icon{ background-position:-43px -47px; width:5px; height:8px; margin:0 0 0 13px;}*/
/************ 3ee LEVEL ************/
/*.three_menu{ background:#FFF; padding:10px 10px 10px 0; position:absolute;  top:20px; right:20px;}
.three_menu li{height:34px; line-height:34px;}
*/


/* 头部内容 */
/*.nav_normal,.menu_arrow{background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/icon.png) no-repeat; display: inline-block;}

.nav_box{line-height:45px;position: relative;width:60%; float:left;}
.nav{font-size: 18px;line-height: 45px;}
.nav li{float: left;padding:0 25px 0 10px;cursor: pointer;}
.nav_normal{ background-position:-27px -53px;width:8px; height:5px; display:inline-block; margin:0 0 3px 13px;}
.menu_box{background: #d1d1d1;padding: 20px;position: absolute;top: 46px; left: 0;width: 895px;height: 270px; text-align:left; z-index:9999}
.nav li.cur a{color: #004ea2;}
.nav li.cur .nav_normal{ background-position:-27px -47px;}
.logo{width:200px;height: 40px;background-position: 0 0;}
.one_menu,.two_menu,.three_menu{float: left; font-size: 14px;font-weight: bold;}
.one_menu{width: 150px;line-height: 45px;}
.two_menu{width: 220px;line-height: 35px;}
.three_menu{width: 195px;}
.one_menu{height: 259px;font-size: 14px;font-weight: bold;padding: 10px 0 0 0;}
.two_menu{}
.one_menu span,.two_menu span,.three_menu span{display: block;height: 45px;cursor: pointer;}
.two_menu span,.three_menu span{height:35px;}
.two_menu span{padding-left: 35px;}
.three_menu span{padding-left: 15px;}
.one_menu span.cur{color: #004ea2;}
.two_menu span.cur{background: #004ea2; color: #fff;}
.three_menu span.cur{background: #00acdd;color: #fff;}
.bg_white{background: #ffffff;height: 259px;padding: 12px 15px 0 0; float: left;}
.products_img{float: left; padding: 10px 0 0 50px;}
.menu_arrow{background-position:-43px -47px; width:5px; height:8px; margin:0 0 0 13px;}
.th_all{ float:left;padding-left:15px; border-left:1px solid #dcdcdc;min-height:240px;}
*/
.pos_r{position:relative;}
.nav_normal,.menu_arrow{background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/icon.png) no-repeat; display: inline-block;}
.nav_box{line-height:63px; height:63px;position: relative;width:60%; float:left;}
.nav{font-size: 16px;line-height:63px;}
.nav li{float: left;margin: 0 37px 0 0;line-height:63px; height:63px;}
.nav li span{cursor: pointer;}
.nav li .products{position: relative;z-index: 999;}
.nav li span.menu_name{height: 35px;display: block;}
.nav_normal{background-position:-27px -53px;width: 8px;height: 5px;margin: 0 0 0 7px;}
.menu_box{background: #d1d1d1;padding: 15px;position: absolute;top: 63px; left: -10px; display:block;height: 300px; z-index:99999}
.nav li.cur .menu_name a{color: #004ea2;}
.nav li.cur .nav_normal{background-position: -27px -47px;}
#setWidth{}
.one_menu,.two_menu,.three_menu{width: 180px;float: left;line-height: 35px; font-size: 14px; text-align:left;}
#setWidth li.one_menu{font-size: 14px; position:relative;width:160px;line-height: 35px;height:35px;}
.two_menu,.three_menu{ padding:10px 0;}
.one_menu span{height: 35px;}
.one_menu span,.two_menu span,.three_menu span{display: block;cursor: pointer; }
#twomenu li,.three_menu span{height:35px; line-height:35px;}
.two_menu span{padding:0 20px;}
.three_menu span{padding-left: 15px;}
.one_menu span.cur{color: #004ea2;}
.two_menu span.cur{background: #004ea2; color: #fff;}
.two_menu span.cur a{color: #fff;}
.three_menu span.cur{background: #00acdd;color: #fff;}
.three_menu span.cur a,.three_menu span.cur a:hover{color: #fff;text-decoration: none;}
.bg_white{background: #ffffff;height: 249px;padding: 12px 15px 0 0; float: left;}
.products_img{position: absolute;background: #ffffff;height:249px;top:0;left: 220px;width: 240px;}

.menu_arrow{background-position: -43px -47px;width: 8px;height: 9px; position:absolute;right:15px; top:15px}
.second-menu,.third-menu,.fourth-menu{position: absolute;}
.nav li ul{display:none;}
.nav li ul li {float:none;margin: 0;}
.third-menu,.fourth-menu{ float:left;width: 195px; font-size: 14px;background: #ffffff;top:0;left:150px;height: 280px;}
.fourth-menu{left: 195px;top:0;padding-left: 30px;border-left:1px solid #dcdcdc}
.th_pr_2{top:-35px;}
.th_pr_3{top:-70px;}
.th_pr_4{top:-105px;}
.th_pr_5{top:-140px;}
.th_pr_6{top:-175px;}
.th_pr_7{top:-210px;}

/*--- 其他下拉菜单样式 ----*/
.other_menu{position: absolute;top:63px;left: 0;background: #D1D1D1;padding:5px 15px; z-index:9999}
.other_menu li{width: 160px;line-height: 35px;height: 35px;}
.other_menu li a{color:#555555;}
.other_menu li a:hover{color:#004ea2;text-decoration: none;}






/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE_AFL.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @copyright  Copyright (c) 2008 Irubin Consulting Inc. DBA Varien (http://www.varien.com)
 * @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/****************************************************/
/****************[ Mage_CSS_B Clears ]***************/
/****************************************************/
.page-head:after,
.page-head-alt:after,
.page-popup .print-head:after,
.clear:after,
.col2-set:after,
.col3-set:after,
.col4-set:after,
.col2-alt-set:after,
.head:after,
.inner-head:after,
.header-top:after,
.quick-access:after,
.header-nav:after,
#nav:after,
.middle:after,
.product-essential:after,
.more-views ul:after,
.button-set:after,
.actions:after,
.legend:after,
.form-list li:after,
.button-container:after,
.ratings:after,
.page-head:after,
.page-head-alt:after,
.group-select li:after,
.search-autocomplete li:after,
.tool-tip .btn-close:after,
.side-col li:after,
.account-box li:after,
.address-list li:after,
.generic-product-list li:after,
.listing-type-list .listing-item:after,
.listing-type-list .product-info .product-reviews:after,
.my-review-detail:after,
.product-options dt:after,
.product-options-bottom:after,
.product-options dd ul.options-list li:after,
.add-to-holder:after,
.listing-type-grid .grid-row:after,
.advanced-search-summary-box:after,
.shopping-cart-totals .checkout-types:after,
.advanced-search li:after,
.mini-search:after,
.footer:after,
.m_page:after{ content:"."; display:block; clear:both; font-size:0; line-height:0; height:0; overflow:hidden; }

.treeview, .treeview ul { 
	padding: 0;
	list-style: none;
}

.treeview div.hitarea {
	height: 20px;
	width: 16px;
	margin-left:3px;
	*margin-left:-5px;
	margin-top:1px;
	float: left;
	cursor: pointer;
	position:absolute;
	z-index:9999;
}
.treeview .expandable{ background: url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/tv-expandable.gif) no-repeat 5px 8px;}
.treeview .collapsable{background:#fff url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/tv-collapsable.gif) no-repeat 5px 8px; border-bottom:1px solid #ccc; }
.treeview .open, .treeview .potential{ padding: 0 0 0 20px;color: #666;font-weight: bold; font-size:12px;}
/* fix for IE6 */
* html div.hitarea {
	background: #FFF;
	filter: alpha(opacity=0);
	display: inline;
	float:none;
}

.treeview li {
	line-height:25px;
	margin: 0;
	padding:3px 0;
 border-bottom: 1px dotted #efefef;  
}
.treeview li.last{ border: 0;}
.treeview li span{ display:block;}
.treeview li ul{}
.treeview li ul li{  line-height:18px; padding-left:20px; border: 0;}
.treeview li ul li span{ background:none;}
.treeview a{ text-decoration:none; color:#164795; font-size:12px; }
.treeview a.selected {font-weight:bold;}
.treeview li a{color:#454545; font-size:12px; }
.treeview li ul li a{ color:#333333; margin-left:5px; font-size:12px;}

#treecontrol { margin: 1em 0; }

.treeview .hover { color:#ff6600; cursor: pointer; }


.treeview li a{ color:#333333; text-decoration:none; display:block; padding-bottom:1px; padding-left:5px; font-size:12px;}
.treeview li a:hover{ color: #1171B2; font-weight:bold;}
#sec_list{padding: 0 0 0 20px;}
#sec_list li{padding-left:0; }
#sec_list li a{margin-left:0; padding-left:0;font-size:12px;}
/**
#navigation li a{ font-size:12px; color:#003366; }
#navigation li a;hover{  color:#FF0000;}
#navigation li ul li a{ font-size:12px; color:#333333;}
#navigation li ul li a:hover{ color:red;}
**/

#navigation li a{ font-size:12px; color:#545452; text-decoration:none; font-weight:bold; margin-left:10px;}
#navigation li a:hover{ color:#FF6600;}
#navigation ul li a{ font-size:11px; font-weight:bold; color:#333333; text-decoration:none; margin-left:5px;}
#navigation ul li a:hover{ color:#FF6600;}

.news_list{ padding: 5px 0 20px 0; margin: 0 0 10px 0; border-bottom: 1px solid #EFEFEF;}
.news_head{}
.news_head .data{ margin: 0 0 5px 0;  color: #666; font-style: italic;}
.news_head .subject{ font-weight: bold; margin: 0 0 2px 0;}
.postDetails{ display: none;}

.entry-header-blog{ border-bottom: 2px solid #efefef; padding: 5px;}
.entry-title-blog{ margin: 2px 0;}
.entry-header-blog .data{ margin:0; color: #666; font-style: italic;}
.blog-contents{ padding: 5px; margin: 10px 0; line-height: 20px;}
.post_btm{ margin: 20px 0 0 0; padding: 20px 0 0 0; border-top: 2px solid #EFEFEF;}

.aw_pages a, .aw_pages strong{ border: 1px solid #CCC; background: #F4F4F4; padding: 3px 5px;}
.aw_pages strong{ border: 1px solid #014169; background: #106599; color: #FFF;}
.aw_pages .pages strong{ border: 0; background: #FFF; color: #333;}
.aw_pages strong.dis{ background: #F4F4F4; color: #666; border: 1px solid #CCC;}

.techticket .pub_bann{ margin:5px auto 0; text-align:center;}
.techticket .content{ margin:0 auto 10px auto; padding:15px 0 0 0; width:750px;}
.techticket .content .left, .techticket .content .right{ margin:30px 0 0 0;}
.techticket .content .right{ text-align:left; margin:30px 250px 0 0;}

.techticket .nav{ margin:20px 0 0 0;}
.techticket .nav_head{ background:url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/techticket/nav_bg.gif) repeat-x; height:40px; overflow:hidden; padding:0 0 0 15px;}
.techticket .nav_head li{display:inline; float:left; height:35px; margin:4px 0 0 0;}
.techticket .nav_head li span{background:url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/techticket/nav.gif) no-repeat 0 -37px; display:block; width:200px; height:35px; line-height:30px; text-align:center; cursor:pointer;}
.techticket .nav_head li.check span{background:url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/techticket/nav.gif) no-repeat; margin-top:1px; }
.techticket_con{ border-width:1px; border-style:solid; border-color:#ccc; -moz-border-radius:0 0 5px 5px; -webkit-border-radius:0 0 5px 5px; -khtml-boder-radius:0 0 5px 5px; border-radius:0 0 5px 5px; padding:5px; border-top:0;}
.techticket_con .nav_con{ padding:15px 5px 5px 5px; border:0;}
.techticket_con .techticket_con_0 ul{ overflow:hidden; margin:15px 0 0 0;}
.techticket_con .techticket_con_0 ul li{ float:left; width:320px; overflow:hidden; margin:0 0 10px 0; }
.techticket_con_0 ul li.radio{ width:600px; text-align:center;}
.techticket_con_0 ul li.radio label{ font-weight:100;}
.techticket_con_0 ul li span{ display:block; float:left; width:120px; text-align:right;}
.techticket_con_0 ul li span span{ width:5px; float:right;}
.techticket_con_0 ul li span .red{ color:red;}
.techticket_con_0 ul li input{ display:inline; margin:0 0 0 10px; width:180px;}
.techticket_con_0 ul li select{ display:inline; margin:0 0 0 10px; width:180px;}
.techticket_con_0 ul li.detail{ width:700px;}
.techticket_con_0 ul li textarea{ width:495px; margin:0 0 0 10px;}
.techticket_con_0 ul li.radio input{ width:30px;}
.techticket_con_0 .btn{ width:700px; text-align:center;}
.techticket_con_1{ width:706px; margin:0 auto; display:none;}

.techticket_search{ background:#f3f3f3 url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/techticket/search_bg.gif) repeat-x; min-height:50px; _height:50px; border:1px solid #cecece; padding:0; width:700px; margin:15px auto; overflow:hidden;}
.tech-ticket-search{ color:red; margin-left:80px; font-size:10px;}
.techticket_search input{ border:1px solid #999; float:left; height:23px; margin:15px auto auto 80px; width:400px;}
.techticket_search button{ background:url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/techticket/search_btn.gif) no-repeat; border:0; width:121px; height:25px; text-indent:-99999px; margin:15px auto auto 15px; cursor:pointer;}
.techticket .raw_info{ margin:15px 0; border:1px solid #d0d0d0;}
.techticket .raw_info div{ background:#ebebeb; border:1px solid #fff;  padding:10px; line-height:30px;}
.techticket .tab_head{ background:url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/techticket/tab_head.gif) no-repeat; height:30px;}
.techticket .tab_head p.left, .techticket .tab_head p.right{ margin:0;  line-height:28px;}
.techticket .tab_head p.left{ margin:0 0 0 10px;}
.techticket .tab_head p.right{ margin:0 10px 0 0 ;}
.techticket .table{ margin: 0 auto 15px auto; width:706px;}
.techticket .table table{ width:706px; border:1px solid #ccc; border-top:0;}
.techticket .table table th{ background:#f7f9f9; font-size:11px; border-right:1px solid #ccc; border-bottom:1px solid #ccc; line-height:25px; text-align:left; padding:3px; text-align:center;}
.techticket .table table td{ background:#f8f7f5; border-right:1px solid #ccc; border-bottom:1px solid #ccc; font-size:10px; padding:5px 3px;}
.techticket .table table td.view span{ background:url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/techticket/icon_view.gif) no-repeat 0 3px; padding-left:15px; display:block; width:25px; margin:0 auto;}
.techticket .table .notable{ border:1px solid #ccc; border-top:0; padding:10px 3px;}

.techticket-box{ width:706px; margin:10px auto;}

.all-over-bg{ background:#000; display:block; height:1500px; filter:alpha(opacity=50); opacity:0.5; z-index:999901; width:100%; position:absolute; top:0; left:0; display:none;}
.techticket-ok{ background:url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/techticket/ok_bg.png) no-repeat; z-index:999999; width:409px;  height:271px; position:fixed; top:20%; left:35%; display:none;}
.techticket-ok .box{ position:relative; padding:1px;}
.techticket-ok .box .logo{ position:absolute; left:10px; top:15px;}
.techticket-ok .box .close{ height:16px; width:29px; position:absolute; top:15px; right:15px; cursor:pointer;}
.techticket-ok .box .con{ width:90%; font-size:11px; margin:60px auto 0; text-align:left;}
.techticket-ok .box .number{ background:#f4f4f4; border:1px solid #ccc; padding:3px; font-size:14px; font-weight:bold; margin:10px 0;}

#sub_comment{ background:url(http://www.zmodo.com.cn/skin/frontend/default/tem_zmodo_cn/images/techticket/btn_comment.gif) no-repeat; border:0; text-indent:-9999px; cursor:pointer; width:105px; height:23px; float:right;}

.ind_col_l {
width: 220px;
}
.base-mini{width: 220px;float:left;}
.base-mini .head {
padding-top:10px;
margin: 0;
font-size: 26px;
color: #004ea2;
height: 30px;
line-height: 30px;
padding-bottom:10px;
}
.side_pro_list li {
list-style: none;
line-height: 30px;
height: 30px;
clear: both;
font-size: 12px;
color: #666;
font-weight: bold;
}
.col-right { float: right; }
.side_pro_list li { line-height: 30px; height: 30px; clear: both; font-size: 12px; color: #666; font-weight: bold; }
.side_pro_list li a.curr { color: #004ea2; }
.mini-right{width:770px;float:right;padding-top:10px;}
.line_box { border-top: 1px solid #dcdcdc; margin-top: 25px; width: 180px; padding: 10px 0 0 0 }
.dis_box h1{margin: 0 0 5px;
line-height: 1.35;
color: #0a263c;}
.tech_box {
clear: both;
margin-bottom: 30px;
overflow: hidden;
}
.tech_box h1 {
text-align: center;
margin-bottom: 30px;
}
.tech_box .w40 {
width: 40%;
}
.tech_box .leftdiv {
float: left;
}
.tech_box .rightdiv {
float: left;
}
.tech_box .w65 { width: 65%; }
.tech_box .w60 { width: 60%; }
.tech_box .w50 { width: 50%; }
.tech_box .w45 { width: 45%; }
.tech_box .w55 { width: 55%; }
.tech_box .w40 { width: 40%; }
.tech_box .w35 { width: 35%; }
.dis_box {
line-height: 22px;
font-size: 14px;
color: #333;
}

.culture_right {
padding-left: 3%;
width:100%;
}
.fl {
float: left;
}
.dis_f {
font-size: 16px;
padding-left: 25px;
}
.culture_right dt {
float: left;
margin-right: 2%;
width: 8%;
}
.culture_right dd {
float: left;
width: 86%;
}
.culture_left1 {
width: 40%;
float: left;
}
.culture_right1 {
width: 60%;
float: left;
}
.culture_right h1 {line-height: 1.35;
color: #0a263c;}
dl {
display: block;
-webkit-margin-before: 1em;
-webkit-margin-after: 1em;
-webkit-margin-start: 0px;
-webkit-margin-end: 0px;
}
</style>
<div class="index_main">
		<div class="base-mini">
		  <div class="head">了解</div>
		  <ul class="side_pro_list line_box">
			<li><a href="http://zone.zmodo.com/cms/index.php?m=content&c=index&a=lists&catid=73">公司历史</a></li>
			<li><a href="http://zone.zmodo.com/cms/index.php?m=content&c=index&a=lists&catid=101">品牌故事</a></li>
			<li><a href="http://zone.zmodo.com/cms/index.php?m=content&c=index&a=lists&catid=15">文化与愿景</a></li>                      
			<li><a href="http://zone.zmodo.com/cms/index.php?m=content&c=index&a=lists&catid=2">技术优势</a></li>
		  </ul>
		</div>


        <div class="mini-right">
            <div class="content">
                <?php echo $content;?>
            </div>
        </div>
</div>

<?php include template("content","footer"); ?>
