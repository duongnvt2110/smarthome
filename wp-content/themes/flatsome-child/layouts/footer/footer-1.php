<div class="wrapper footer-one">
    <div class="row">
        <div class="col medium-12 small-12 large-6">
            <div class="company-info">
                <div class="info footer-left">		
                    <div id="logo" class="flex-col logo">
                        <?php get_template_part('template-parts/header/partials/element','logo'); ?>
                    </div>
                    <span class="branch-title">
                        <strong>
                            Công Ty TNHH CÁP ĐIỆN XANH
                        </strong>
                    </span>
				</div>
            </div>
        </div>
        <div class="col medium-12 small-12 large-6"> 
            <div class="row info footer-right">	
                <div class="row">
                    <div class="col medium-12 small-12 large-4">
                            <!-- <ul class="product-categories">
                                <li><a href="/" class="nav-top-link">Trang Chủ</a></li>
                                <li><a href="/gioithieu/" class="nav-top-link">Giới thiệu</a></li>
                                <li><a href="/san-pham/" class="nav-top-link">Sản Phẩm</a></li>
                                <li><a href="/bang-gia/" class="nav-top-link">Bảng giá</a></li>
                                <li><a href="/tin-tuc/" class="nav-top-link">Tin Tức</a></li>
                                <li><a href="/hoi-dap/" class="nav-top-link">Hỏi Đáp</a></li>
                                <li><a href="/tuyen-dung/" class="nav-top-link">Tuyển Dụng</a></li>
                                <li><a href="/lien-he/" class="nav-top-link">Liên Hệ</a></li>
                            </ul> -->
                            <?php echo the_widget('WC_Widget_Product_Categories',[
                                'max_depth' => 1,
                                'dropdown' => 0,
                                'hierarchical'=> 1,
                                'title' => 'Sản Phẩm'
                            ]) ?>
                    </div>  
                    <div class="col medium-12 small-12 large-4">
                        <div class="widget widget_product_categories"> 
                                <h2>Chính Sách</h2>
                                <ul class="product-categories">
                                    <li><a href="/chinh-sach-dich-vu-chung" class="nav-top-link">Dịch Vụ Chung</a></li>
                                    <li><a href="/huong-dan-dat-hang-mua-hang" class="nav-top-link">Hướng Dãn Đặt Hàng</a></li>
                                    <li><a href="/thong-bao-chinh-sach-giao-nhan-hang-hoa" class="nav-top-link">Giao Nhận Hàng Hóa</a></li>
                                    <li><a href="/huong-dan-thanh-toan" class="nav-top-link">Hướng Dẫn Thanh Toán</a></li>
                                    <li><a href="/chinh-sach-bao-mat-thong-tin-khach-hang-tai-cap-dien-xanh" class="nav-top-link">Bảo Mật Thông Tin</a></li>
                                    <li><a href="/chinh-sach-bao-hanh" class="nav-top-link">Bảo Hành</a></li>
                                </ul>
                            </div>
                        </div>  
                    <div class="col medium-12 small-12 large-4">
                        <div class="widget_product_categories"> 
                            <h2 class="widgettitle">Hỗ  trợ trực tuyến Zalo</h2>
                            <p>
                                <img src="/wp-content/uploads/2021/10/zalo_contact.jpg" style="height:300px;width:300px;"></img>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>