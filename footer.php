</article>

<footer class="footer">
        <div class="footer-nav-area">
            <a class="logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/Logo_naka.svg" alt=""></a>
            <div class="footer-nav-item">
                <ul>
                    <li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>">中島研究室について</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/activities' ) ); ?>">活動内容</a></li>
                    <li><a href="<?php echo esc_url(home_url( '/news' )); ?>">ニュース</a></li>
                    <li><a href="<?php echo esc_url(home_url( '/work' )); ?>">作品・研究</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#teacher">指導教員</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#access">アクセス</a></li>
                </ul>
            </div>
            <div class="footer-nav-item">
                <h4>お問い合わせ</h4>
                <ul>
                    <li><a href="">お問い合わせフォーム</a></li>
                    <li><a href="https://twitter.com/63x4_252" target="_blank" rel="noopener noreferrer">twitter</a></li>
                    <li><a href="https://instagram.com/63x4_252" target="_blank" rel="noopener noreferrer">Instagram</a></li>
                    <li><a href="https://www.youtube.com/channel/UC1lZjsEPoC331A50vAqW3_A" target="_blank" rel="noopener noreferrer">YouTube</a></li>
                </ul>
            </div>
        </div>
        <p class="copyright">Copyright &copy; Affective Information Media Laboratory. All rights reserved.</p>
    </footer>

    <?php wp_footer(); ?>

    <?php if(is_front_page()):?>
        <script type="text/javascript">
            $(function(){
                if(window.performance){
                    if(performance.navigation.type == 1){
                        loadAnim();
                    }else{
                        let ref = document.referrer;
                        let hereHost = window.location.hostname;

                        let sStr = "^https?://" + hereHost;
                        // let sStr = hereHost;
                        let rExp = new RegExp(sStr, "i");

                        if(ref.length == 0){
                            loadAnim();
                        }else if(ref.match(rExp)){
                            moveAnim();
                        }else{
                            loadAnim();
                        }
                    }
                }
            });
        </script>
    <?php endif; ?>
</body>

</html>