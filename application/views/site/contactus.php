<div id="content">

    <section class="section-bg">
        <header class="list-header">
            <h1>Contact Us</h1>
        </header>
        <div class="container">
            <div class="row">

                <div class="col-md-4">
                    <div style="padding: 10px; background-color: white" align="left">

                        <h3>Contact Address</h3>

                        <p><i class="fa fa-map-marker"></i> <b>Address:</b> Kawasoti, Nawalpur </p>

                        <p><i class="fa fa-envelope"></i> <b>Email:</b> bhattaraipallavi4@gmail.com</p>

                        <p><i class="fa fa-phone"></i> <b>Phone:</b> 078-540704</p>

                        

                    </div>
                    <div style="padding: 10px; background-color: white; align:left;">
                        <h3>Contact Form</h3>

                        <?php
                            if(isset($msg)){
                                ?>
                                <div class="alert alert-info">
                                    <?php echo $msg; ?>
                                </div>
                        <?php
                            }
                        ?>
                        <form class="form-vertical" action="" method="post">
                            <div class="form-group">
                                <input class="form-control" placeholder="Your Name..."  name="name"
                                       maxlength="40" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Your Email..."  name="email"
                                       maxlength="40" type="email">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message"  style="height: 130px;"
                                          placeholder="Write down your message..."></textarea>
                            </div>
                            <div class="form-group">
                                <input class=" form-control btn btn-md btn-success pull-right" value="Send"
                                       name="btn_contact" type="submit">
                            </div>

                        </form>


                    </div>

                </div>
                <div class="col-md-8">
                    <!--  <div style="background: rgba(60, 63, 65, 0.70); width: 704px;  padding: 2px">-->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d56563.22918530393!2d84.06675641812397!3d27.618265304052517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3994511652e01951%3A0x8a76deafd5974c60!2sStandard+Institute+of+Technology+and+Education!5e0!3m2!1sen!2snp!4v1546106797698" width="100%" height="500px" frameborder="1" style="border:1" allowfullscreen></iframe>
                    <!--</div>-->
                </div>
            </div>
            <!--row-->
        </div>
        <!--container-->
    </section>


    <!--list-tuto-->
</div><!--content-->