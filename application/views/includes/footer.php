<div id="line">
    <hr/>
</div>
<footer>
    <div class="footer1">
        <div class="container">
            <div class="row">
                <div class="col col-md-3">
                    <h1><small>Saral gyan</small></h1>
                    <p>Copyright &copy; <?php echo "2020 - ".date("Y"); ?>. All Rights Reserved</p>
                </div>
                <div class="col col-md-3">
                    <h3><i class="fa fa-info-circle"></i> About Us</h3>
                    <hr/>

                    <p class="text-justify">
                        <?php echo ABOUT_COMPANY; ?>
                        <br/> <br/>
                        <span class="pull-right"><a href="<?php echo LINK_URL?>site/aboutus">See More...</a></span>
                        <br/>
                    </p>
                </div>
                <div class="col col-md-3">
                    <h3><i class="fa fa-link"></i> Extra Links</h3>
                    <hr/>
                    <p><a href=""><i class="fa fa-folder-open"></i> References</p>
                    <p><a href="<?php echo LINK_URL;?>site/index"><i class="fa fa-home"></i> Home</a></p>

                    <p><a href=""><i class="fa fa-question-circle"></i> FAQ</a></p>
                    <form class="form-inline text-left" method="post" action="<?php echo LINK_URL."site/subscribe"; ?>">
                        <input type="email" name="email" required="" class="form-control" size="30" placeholder=" Enter Email to subscribe & hit enter">
                    </form>

                </div>
                <div class="col col-md-3">
                    <h3><i class="fa fa-envelope"></i> Contact Us</h3>
                    <hr/>
                    <p><i class="fa fa-map-marker"></i> <b>Address:</b> Kawasoti, Nawalpur, Nepal </p>
                    <p><i class="fa fa-envelope"></i> <b>Email:</b> bhattaraipallavi4@gmail.com</p>
                    <p><i class="fa fa-phone"></i> <b>Phone:</b> 078 - 540704</p>
                    <div class="social">
                        <a href="" onclick="window.open('https://www.facebook.com/scholarmaterials');return false;" title="facebook page"><i class="fa fa-facebook"></i></a>
                        <a href="#" title="linked in"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div><!--footer1-->
    <div class="footer2">
        <h5><a href="<?php echo LINK_URL."site/privacy_policy"; ?>">Privacy Policy</a> | <a href="<?php echo LINK_URL."site/terms_condition"; ?>">Terms of use</a></h5>
    </div><!--footer2-->
</footer><!--footer-->

<a href="#" title="Top" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<script type="text/javascript" src="<?php echo PUBLIC_PATH;?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo PUBLIC_PATH;?>js/bootstrap.min.js"></script>

<script src="<?php echo LIBRARY_PATH;?>highlight/highlight.pack.js"></script>
<script>hljs.initHighlightingOnLoad();</script>


</body>
</html>
