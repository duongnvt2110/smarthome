<div>
    <?php 
        $taxonomy     = 'product_cat';
        $orderby      = 'id';  
        $show_count   = 0;      // 1 for yes, 0 for no
        $pad_counts   = 0;      // 1 for yes, 0 for no
        $hierarchical = 1;      // 1 for yes, 0 for no  
        $title        = '';  
        $empty        = 0;

        $args = array(
            'taxonomy'     => $taxonomy,
            'orderby'      => $orderby,
            'show_count'   => $show_count,
            'pad_counts'   => $pad_counts,
            'hierarchical' => $hierarchical,
            'title_li'     => $title,
            'hide_empty'   => $empty
        );

        $orderChildCategory = [
            '70'=>[
                '1'=>81,
                '2'=>117
            ],
            '78' => [
                '0'=>111,
                '1'=>112,
                '2'=>113
            ],
            '92' => [
                '0'=>93,
                '1'=>94,
                '2'=>95
            ],
            '103'=>[
                '1'=>123,
                '0'=>122,
                '2'=>124
            ],
            '106'=>[
                '2'=>109,
                '1'=>107,
                '0'=>108
            ]
        ];
        
        $all_categories = get_categories( $args );
        foreach($all_categories as $tab => $cat){
            if($cat->category_parent == 0) {
                $args2 = array(
                    'taxonomy'     => $taxonomy,
                    'child_of'     => 0,
                    'parent'       => $cat->term_id,
                    'orderby'      => $orderby,
                    'show_count'   => $show_count,
                    'pad_counts'   => $pad_counts,
                    'hierarchical' => $hierarchical,
                    'title_li'     => $title,
                    'hide_empty'   => $empty,
                    'number' => 3,
                );
                echo '<div class="nav-tab">';
                $sub_cats = get_categories( $args2 );
                if($sub_cats) {
                    if(isset($orderChildCategory[$cat->term_id])){
                        echo '<div class="nav-bar-text">';
                        echo '<div class="text" style="display:inline-block;"><a href='.get_term_link($cat->term_id).'>'.$cat->name.'</a></div>';
                        echo '<div class="sub-right">';
                        echo '<ul class="nav" id="myTab" role="tablist">';
                        $active_check = 0;
                        foreach($orderChildCategory[$cat->term_id] as $key => $item){
                            $sub_cat = $sub_cats[$key];
                            $active = ($active_check==0)?'tab_active':'';
                            echo '<li>';
                            echo    '<span id="sub_'.$sub_cat->term_id.'" class="'.$active.'" type="button" onclick=openPage("sub_cat_'.$sub_cat->term_id.'",'.$tab.')>'.$sub_cat->name.'</span>';
                            echo '</li>';
                            $active_check++;
                        }
                    }
                    echo '<li><a href="'.get_term_link($cat->term_id).'" style="color:#777;">Xem Thêm</a></li>';
                    echo '</ul>';
                    echo '</div>';
                    echo '</div>'; 
                    if(isset($orderChildCategory[$cat->term_id])){
                        $active_check = 0;
                        foreach($orderChildCategory[$cat->term_id] as $key => $item){
                            $sub_cat = $sub_cats[$key];
                            $active = ($active_check==0)?'block':'none';
                            echo '<div id="sub_cat_'.$sub_cat->term_id.'" class="tab-item tabcontent'.$tab.'" style="display:'.$active.'">';
                            echo do_shortcode('[products columns="6" category="'.$sub_cat->slug.'" limit="6"]');
                            echo '</div>';
                            $active_check++;
                        }
                    }
                }else{
                    echo '<div class="nav-bar-text">';
                    echo '<div class="text" style="display:inline-block;"><a href='.get_term_link($cat->term_id).'>'.$cat->name.'</a></div>';
                    echo '<div class="sub-right">';
                    echo '<ul class="nav" id="myTab" role="tablist">';
                    echo '<li><a href="'.get_term_link($cat->term_id).'" style="color:#777;">Xem Thêm</a></li>';
                    echo '</ul>';
                    echo '</div>';
                    echo '</div>'; 
                    echo '<div id="sub_cat_'.$cat->term_id.'" class="tab-item tabcontent'.$tab.'">';
                    echo do_shortcode('[products columns="6" category="'.$cat->slug.'" limit="6"]');
                    echo '</div>';
                }
                echo '</div>';
            }
        }
    ?>
</div>