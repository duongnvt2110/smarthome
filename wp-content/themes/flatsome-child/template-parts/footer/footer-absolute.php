<?php

$align = 'small-text-center';
if (get_theme_mod('footer_bottom_align') == 'center') {
    $align = 'text-center';
}

ob_start();

do_action('flatsome_absolute_footer_secondary');
$flatsome_absolute_footer_secondary = trim(ob_get_clean());
$flatsome_footer_right_text = trim(get_theme_mod('footer_right_text'));

?>

<div class="absolute-footer <?php echo flatsome_option('footer_bottom_text'); ?> medium-text-center <?php echo $align; ?>">
    <div class="container clearfix">
        <div class="footer-primary">
            <div class="copyright-footer">
                <div class="wrapper wp-footer">
                    <div class="row">
                        <div class="col medium-4 small-12 large-3">
                            <div id="logo" class="flex-col logo">
                                <?php get_template_part('template-parts/header/partials/element', 'logo'); ?>
                            </div>
                            <div class="copyright">
                                <div class="brand">Showroom Smart Điện Xanh</div>
                                <div class="brand">Công ty TNHH Cáp Điện Xanh</div>
                                <div>Copyright © <span>2021 capdienxanh.com</span></div>
                            </div>
                        </div>
                        <div class="col medium-4 small-12 large-2">
                            <div class="footer-document">
                                <h1>Tài Liệu</h1>
                                <div><a href="/tai-lieu-huong-dan" class="nav-top-link">Tài liệu hướng dẫn</a></div>
                                <div><a href="/chinh-sach-bao-hanh" class="nav-top-link">Chính sách bảo hành</a></div>
                                <div><a href="/bang-gia-thiet-bi" class="nav-top-link">Bảng giá thiết bị</a></div>
                            </div>
                        </div>
                        <div class="col medium-4 small-12 large-4">
                            <div class="footer-contact">
                                <h2>Liên Hệ</h2>
                                <div><i class="fas fa-phone"></i> Tel: 0988 551 739 – 0349 813 889 </div>
                                <div><i class="fas fa-envelope"></i> Email: cskhcapdienxanh1@gmail.com </div>
                                <div><i class="fas fa-home"></i> 15, Đinh Tiên Hoàng, P. Thới Bình, Q. Ninh Kiều, TP. Cần Thơ. </div>
                            </div>
                        </div>
                        <div class="col medium-4 small-12 large-3">
                            <div>
                                <h2>Đăng kí nhận báo giá</h2>
                                <div>
                                    <!-- <form class="wpcf7-form init">
                                <input type="text" name="your-name" placeholder="Điên thoại của bạn" value="" size="40" class="wpcf7-form-control wpcf7-text register-price" >
                                <input type="submit" value="Đăng ký" class="wpcf7-form-control wpcf7-submit button" aria-invalid="false">
                            </form> -->
                                    <?php echo do_shortcode('[contact-form-7 id="736" title="Liên Lạc"]') ?>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="absolute-footer-two">
                        <div class="">
                            <div class="footer-social row">
                                <div class="col medium-4 small-12 large-4">
                                    <span class=" icon primary button circle facebook">
                                        <i class="icon-facebook" style="color:white"></i>
                                    </span>
                                    <div class="url-social">
                                        <a href="https://www.facebook.com/nhathongminhlumicantho/" target="_blank">facebook.com/nhathongminhlumicantho</a>
                                    </div>
                                </div>
                                <div class="col medium-4 small-12 large-4">
                                    <span class="icon primary button circle youtube">
                                        <i class="icon-youtube" style="color:white"></i>
                                    </span>
                                    <div class="url-social">
                                        <a href="https://www.youtube.com/channel/UCo3dkKL7gUlsSvZYg5spVkA" target="_blank">Lumi Cần Thơ - Showroom Smart Điện Xanh</a>
                                    </div>
                                </div>
                                <div class="col medium-4 small-12 large-4">
                                    <span class="icon primary button circle relate-link">
                                        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/logo.jpg' ?>" />
                                    </span>
                                    <div class="url-social">
                                        <a href="https://capdienxanh.com/" target="_blank">https://capdienxanh.com/</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php do_action('flatsome_absolute_footer_primary'); ?>
            </div>
        </div>
    </div>
    <div class="icon-wrapper hide-for-small">
        <a href="https://www.facebook.com/nhathongminhlumicantho/" target="_blank" data-label="Facebook" rel="noopener noreferrer nofollow" class="icon primary button circle facebook tooltip tooltipstered">
            <i class="icon-facebook" style="color:white"></i>
        </a>
        <a href="https://www.youtube.com/channel/UCo3dkKL7gUlsSvZYg5spVkA" target="_blank" data-label="Youtube" rel="noopener noreferrer nofollow" class="icon primary button circle youtube tooltip tooltipstered">
            <i class="icon-youtube" style="color:white"></i>
        </a>
        <a href="https://capdienxanh.com/" target="_blank" data-label="relate-link" rel="noopener noreferrer nofollow" class="icon primary button circle tooltip tooltipstered relate-link">
            <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/logo.jpg' ?>" />
        </a>
    </div>