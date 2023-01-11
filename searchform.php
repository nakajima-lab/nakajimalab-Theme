            <form class="search" action="<?php echo home_url(); ?>" method="get">
                        <input class="search-area" type="text" name="s" value="<?php the_search_query(); ?>" placeholder="マニュアルを検索">
                        <input type="hidden" name="post_type"
                        value="<?php echo esc_html(get_post_type_object(get_post_type())->manual); ?>">
                        <button class="s-btn">検索</button>
                    </form>