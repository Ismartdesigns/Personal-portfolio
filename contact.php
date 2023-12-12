<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

include("includes/config.php");

$msg = $error = '';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (empty($name) || empty($email) || empty($message)) {
        $error = 'All fields are required';
    } else {
        $to = 'michael@michaeldsc.com.ng';
        $subject = 'New Contact Form Submission';

        $email_message = "Name: $name\n";
        $email_message .= "Email: $email\n\n";
        $email_message .= "Message:\n$message";

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->isSMTP();
            $mail->Host = 'michaeldsc.com.ng';
            $mail->SMTPAuth = true;
            $mail->Username = 'michael@michaeldsc.com.ng';
            $mail->Password = '3}]Eu0Rm7Hc$';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            //Recipients
            $mail->setFrom($email);
            $mail->addAddress($to);

            // Content
            $mail->isHTML(false);
            $mail->Subject = $subject;
            $mail->Body = $email_message;

            // Send email
            $mail->send();
            $msg = 'Message sent successfully!';
        } catch (Exception $e) {
            $error = 'Failed to send the message. Please try again later.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en-US">

<?php include("includes/head.php") ?>

<body class="v-dark dsn-line-style dsn-effect-scroll dsn-cursor-effect dsn-ajax">


    <!-- ========== Loading Page ========== -->
    <?php include("includes/loader.php") ?>
    <!-- ========== End Loading Page ========== -->


    <!-- ========== Menu ========== -->
    <?php include("includes/header.php") ?>
    <!-- ========== End Menu ========== -->


    <main class="main-root">
        <div id="dsn-scrollbar">
            <div class="main-content">

                <!-- ========== Header Normal ========== -->

                <header class="header-page over-hidden p-relative header-padding-top header-padding-bottom dsn-header-animation">
                    <div class="bg-circle-dotted"></div>
                    <div class="dsn-container">
                        <div class="content-hero p-relative d-flex align-items-center text-center flex-column h-100 dsn-hero-parallax-title">
                            <p class="subtitle p-relative line-shap  ">
                                <span class="pl-10 pr-10 background-section dsn-load-animate">Lat's Talk</span>
                            </p>
                            <h1 class="title mt-20 dsn-load-animate">Contact Us</h1>
                        </div>
                    </div>
                </header>
                <!-- ========== End Header Normal ========== -->


                <div class="wrapper">

                    <div class="container root-contact">
                        <!-- <div class="full-width">
                            <div class="map-custom p-absolute w-100 h-100" data-dsn-lat="30.0489206"
                                data-dsn-len="31.258553" data-dsn-zoom="14">
                            </div>
                        </div> -->
                        <div class="box-contact-inner section-margin">
                            <div class="row align-items-center">
                                <div class="col-lg-7">
                                    <div class="form-box">
                                        <div class="line line-top"></div>
                                        <div class="line line-bottom"></div>
                                        <div class="line line-left"></div>
                                        <div class="line line-right"></div>

                                        <div class="mb-30 d-flex text-left flex-column align-items-start">
                                            <p class="sub-heading line-shap line-shap-before mb-15">
                                                <span class="line-bg-right">Stay connected</span>
                                            </p>
                                            <h2 class="section-title  title-cap">
                                                Get in Touch
                                            </h2>
                                        </div>
                                        <p class="mb-30">
                                            It’s all about the humans behind a brand and those experiencing it,
                                            we’re right there. In the middle.
                                        </p>

                                        <form id="contact-form" class="form" method="post" data-toggle="validator">
                                            <div class="messages"></div>
                                            <div class="input__wrap controls">
                                                <?php if ($msg) { ?>
                                                    <div class="alert alert-success" role="alert">
                                                        <?php echo htmlentities($msg); ?>
                                                    </div>
                                                <?php } elseif ($error) { ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <?php echo htmlentities($error); ?>
                                                    </div>
                                                <?php } ?>
                                                <div class="form-group">
                                                    <div class="entry-box">
                                                        <label>Your name *</label>
                                                        <input id="form_name" type="text" name="name" placeholder="Type your name" required="required" data-error="name is required.">
                                                    </div>
                                                    <div class="help-block with-errors"></div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="entry-box">
                                                        <label>Your E-Mail *</label>
                                                        <input id="form_email" type="email" name="email" placeholder="Type your Email Address" required="required" data-error="Valid email is required.">
                                                    </div>
                                                    <div class="help-block with-errors"></div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="entry-box">
                                                        <label>What's up?</label>
                                                        <textarea id="form_message" class="form-control" name="message" placeholder="Leave us a message" required="required" data-error="Please,leave us a message."></textarea>
                                                    </div>
                                                    <div class="help-block with-errors"></div>
                                                </div>

                                                <div class="text-right">
                                                    <div class="image-zoom w-auto d-inline-block" data-dsn="parallax">
                                                        <button type="submit" name="submit" class="dsn-button">
                                                            <span class="dsn-border border-color-default"></span>
                                                            <span class="text-button">Send Message</span>

                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="col-lg-5">
                                    <div class="box-info-contact">

                                        <ul>
                                            <li>
                                                <h5 class="title-block mb-15">Contact</h5>
                                                <p class="text-p ">+234 (815) 458 6840</p>
                                                <div class="over-hidden mt-5">
                                                    <a class="link-hover" data-hover-text="michael@michaeldsc.com.ng" href="#">michael@michaeldsc.com.ng</a>
                                                </div>

                                            </li>
                                            <li>
                                                <h5 class="title-block mb-15">Address</h5>
                                                <p class="text-p">Nigeria <br> Lagos</p>
                                            </li>
                                            <li>
                                                <h5 class="title-block mb-15">Follow Us</h5>
                                                <div class="social-item over-hidden">
                                                    <a class="link-hover" data-hover-text="Instagram." href="#" target="_blank" rel="nofollow">Instagram.</a>
                                                </div>
                                                <div class="social-item over-hidden">
                                                    <a class="link-hover" data-hover-text="Facebook." href="#" target="_blank" rel="nofollow">Facebook.</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ==========  next page  ========== -->
                    <section class="next-page p-relative section-padding border-top background-section">
                        <div class="bg-circle-dotted"></div>
                        <div class="bg-circle-dotted bg-circle-dotted-right"></div>
                        <div class="container">
                            <div class="c-wapp d-flex justify-content-between">
                                <div class="d-flex flex-column">
                                    <p class="sub-heading line-shap line-shap-after ">
                                        <span class="line-bg-left">
                                            Don't be weird.
                                        </span>
                                    </p>
                                    <h2 class="section-title max-w750 mt-15">
                                        Would you like more information or
                                        do you have a question?

                                    </h2>


                                </div>

                                <!-- <div class="button-box d-flex justify-content-end align-items-center">
                                    <div>
                                        <a href="work.html" class="mt-30 effect-ajax dsn-button p-relative">
                                            <span class="dsn-border-rdu "></span>Our Work
                                        </a>
                                    </div>
                                </div> -->

                            </div>
                        </div>
                    </section>
                    <!-- ========== End next page ========== -->

                </div>


                <?php include("includes/footer.php") ?>
            </div>
        </div>


    </main>


    <!-- ========== Scroll Right Page To Top Page ========== -->
    <div class="scroll-to-top">
        <img src="assets/img/scroll_top.svg" alt="">
        <div class="box-numper">
            <span>10%</span>
        </div>
    </div>
    <!-- ========== End Scroll Right Page To Top Page ========== -->


    <!-- ========== Cursor Page ========== -->
    <div class="cursor">

        <div class="cursor-helper">
            <span class="cursor-drag">Drag</span>
            <span class="cursor-view">View</span>
            <span class="cursor-open"><i class="fas fa-plus"></i></span>
            <span class="cursor-close">Close</span>
            <span class="cursor-play">play</span>
            <span class="cursor-next"><i class="fas fa-chevron-right"></i></span>
            <span class="cursor-prev"><i class="fas fa-chevron-left"></i></span>
        </div>

    </div>
    <!-- ========== End Cursor Page ========== -->

    <!-- ========== Style Option Page ========== -->
    <div class="box-options c-hidden d-flex align-items-center">
        <div class="box-icon d-flex align-items-center justify-content-center text-center">
            <svg class="fa-spin" enable-background="new 0 0 512 512" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                <path d="m272.066 512h-32.133c-25.989 0-47.134-21.144-47.134-47.133v-10.871c-11.049-3.53-21.784-7.986-32.097-13.323l-7.704 7.704c-18.659 18.682-48.548 18.134-66.665-.007l-22.711-22.71c-18.149-18.129-18.671-48.008.006-66.665l7.698-7.698c-5.337-10.313-9.792-21.046-13.323-32.097h-10.87c-25.988 0-47.133-21.144-47.133-47.133v-32.134c0-25.989 21.145-47.133 47.134-47.133h10.87c3.531-11.05 7.986-21.784 13.323-32.097l-7.704-7.703c-18.666-18.646-18.151-48.528.006-66.665l22.713-22.712c18.159-18.184 48.041-18.638 66.664.006l7.697 7.697c10.313-5.336 21.048-9.792 32.097-13.323v-10.87c0-25.989 21.144-47.133 47.134-47.133h32.133c25.989 0 47.133 21.144 47.133 47.133v10.871c11.049 3.53 21.784 7.986 32.097 13.323l7.704-7.704c18.659-18.682 48.548-18.134 66.665.007l22.711 22.71c18.149 18.129 18.671 48.008-.006 66.665l-7.698 7.698c5.337 10.313 9.792 21.046 13.323 32.097h10.87c25.989 0 47.134 21.144 47.134 47.133v32.134c0 25.989-21.145 47.133-47.134 47.133h-10.87c-3.531 11.05-7.986 21.784-13.323 32.097l7.704 7.704c18.666 18.646 18.151 48.528-.006 66.665l-22.713 22.712c-18.159 18.184-48.041 18.638-66.664-.006l-7.697-7.697c-10.313 5.336-21.048 9.792-32.097 13.323v10.871c0 25.987-21.144 47.131-47.134 47.131zm-106.349-102.83c14.327 8.473 29.747 14.874 45.831 19.025 6.624 1.709 11.252 7.683 11.252 14.524v22.148c0 9.447 7.687 17.133 17.134 17.133h32.133c9.447 0 17.134-7.686 17.134-17.133v-22.148c0-6.841 4.628-12.815 11.252-14.524 16.084-4.151 31.504-10.552 45.831-19.025 5.895-3.486 13.4-2.538 18.243 2.305l15.688 15.689c6.764 6.772 17.626 6.615 24.224.007l22.727-22.726c6.582-6.574 6.802-17.438.006-24.225l-15.695-15.695c-4.842-4.842-5.79-12.348-2.305-18.242 8.473-14.326 14.873-29.746 19.024-45.831 1.71-6.624 7.684-11.251 14.524-11.251h22.147c9.447 0 17.134-7.686 17.134-17.133v-32.134c0-9.447-7.687-17.133-17.134-17.133h-22.147c-6.841 0-12.814-4.628-14.524-11.251-4.151-16.085-10.552-31.505-19.024-45.831-3.485-5.894-2.537-13.4 2.305-18.242l15.689-15.689c6.782-6.774 6.605-17.634.006-24.225l-22.725-22.725c-6.587-6.596-17.451-6.789-24.225-.006l-15.694 15.695c-4.842 4.843-12.35 5.791-18.243 2.305-14.327-8.473-29.747-14.874-45.831-19.025-6.624-1.709-11.252-7.683-11.252-14.524v-22.15c0-9.447-7.687-17.133-17.134-17.133h-32.133c-9.447 0-17.134 7.686-17.134 17.133v22.148c0 6.841-4.628 12.815-11.252 14.524-16.084 4.151-31.504 10.552-45.831 19.025-5.896 3.485-13.401 2.537-18.243-2.305l-15.688-15.689c-6.764-6.772-17.627-6.615-24.224-.007l-22.727 22.726c-6.582 6.574-6.802 17.437-.006 24.225l15.695 15.695c4.842 4.842 5.79 12.348 2.305 18.242-8.473 14.326-14.873 29.746-19.024 45.831-1.71 6.624-7.684 11.251-14.524 11.251h-22.148c-9.447.001-17.134 7.687-17.134 17.134v32.134c0 9.447 7.687 17.133 17.134 17.133h22.147c6.841 0 12.814 4.628 14.524 11.251 4.151 16.085 10.552 31.505 19.024 45.831 3.485 5.894 2.537 13.4-2.305 18.242l-15.689 15.689c-6.782 6.774-6.605 17.634-.006 24.225l22.725 22.725c6.587 6.596 17.451 6.789 24.225.006l15.694-15.695c3.568-3.567 10.991-6.594 18.244-2.304z" />
                <path d="m256 367.4c-61.427 0-111.4-49.974-111.4-111.4s49.973-111.4 111.4-111.4 111.4 49.974 111.4 111.4-49.973 111.4-111.4 111.4zm0-192.8c-44.885 0-81.4 36.516-81.4 81.4s36.516 81.4 81.4 81.4 81.4-36.516 81.4-81.4-36.515-81.4-81.4-81.4z" />
            </svg>
        </div>
        <div class="box-inner-option p-absolute">
            <div class="day-night ">
                <span class="title-mode text-center">Style Color</span>
                <div class="night active" data-dsn-theme="dark">

                    <svg width="48" height="48" viewBox="0 0 48 48">
                        <rect x="12.3" y="23.5" width="2.6" height="1"></rect>
                        <rect x="16.1" y="15.3" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -6.8871 16.5732)" width="1" height="2.6"></rect>
                        <rect x="23.5" y="12.3" width="1" height="2.6"></rect>
                        <rect x="30.1" y="16.1" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -2.5145 27.0538)" width="2.6" height="1"></rect>
                        <rect x="33.1" y="23.5" width="2.6" height="1"></rect>
                        <rect x="30.9" y="30.1" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -12.9952 31.4264)" width="1" height="2.6"></rect>
                        <rect x="23.5" y="33.1" width="1" height="2.6"></rect>
                        <rect x="15.3" y="30.9" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -17.3677 20.9457)" width="2.6" height="1"></rect>
                        <path d="M24,18.7c-2.9,0-5.3,2.4-5.3,5.3s2.4,5.3,5.3,5.3s5.3-2.4,5.3-5.3S26.9,18.7,24,18.7z M24,28.3c-2.4,0-4.3-1.9-4.3-4.3s1.9-4.3,4.3-4.3s4.3,1.9,4.3,4.3S26.4,28.3,24,28.3z">
                        </path>
                    </svg>
                </div>
                <div class="moon" data-dsn-theme="night">


                    <svg width="48" height="48" viewBox="0 0 48 48">
                        <path d="M24,33.9c-5.4,0-9.9-4.4-9.9-9.9c0-4.3,2.7-8,6.8-9.4l0.8-0.3l-0.1,0.9c-0.2,0.6-0.2,1.3-0.2,1.9c0,5.2,4.3,9.5,9.5,9.5c0.6,0,1.3-0.1,1.9-0.2l0.8-0.2L33.3,27C32,31.1,28.3,33.9,24,33.9z M20.4,15.9c-3.2,1.4-5.3,4.5-5.3,8.1c0,4.9,4,8.9,8.9,8.9c3.6,0,6.7-2.1,8.1-5.3c-0.4,0-0.8,0.1-1.3,0.1c-5.8,0-10.5-4.7-10.5-10.5C20.4,16.7,20.4,16.3,20.4,15.9z">
                        </path>
                    </svg>
                </div>
            </div>
            <div class="mode-layout">
                <span class="title-mode text-center">Style Layout</span>
                <div class="icon d-flex align-items-center justify-content-center">

                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 35 35" xml:space="preserve">
                        <g>
                            <g>
                                <path d="M0,25.366h35V9.546H0V25.366z M2.121,11.667h30.758v11.578H2.121V11.667z" />
                                <rect y="28.283" width="35" height="6.717" />
                                <rect width="35" height="6.717" />
                            </g>
                        </g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                        <g></g>
                    </svg>
                </div>

            </div>
        </div>

    </div>
    <!-- ========== End Style Option Page ========== -->

    <!-- ========== social network ========== -->
    <div class="social-side social-network d-flex align-items-center ">
        <div class="icon" data-dsn="parallax">
            <i class="fa fa-share-alt" aria-hidden="true"></i>
        </div>
        <ul class="socials d-flex flex-column p-absolute ">
            <li>
                <a href="" target="_blank">
                    <i class="fab fa-dribbble"></i>
                    <span>Db</span>
                </a>
            </li>
            <li>
                <a href="" target="_blank">
                    <i class="fab fa-twitter"></i>
                    <span>Tw</span>
                </a>
            </li>
            <li>
                <a href="" target="_blank">
                    <i class="fab fa-behance"></i>
                    <span>Be</span>
                </a>
            </li>
            <li>
                <a href="" target="_blank">
                    <i class="fab fa-facebook-f"></i>
                    <span>Fb</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- ========== End social network ========== -->

    <!-- ========== paginate-right-page ========== -->
    <div class="dsn-paginate-right-page"></div>

    <!-- ========== Line left & right with creative page ========== -->
    <div class="line-border-style w-100 h-100"></div>


    <!-- Optional JavaScript -->
    <script src="assets/js/jquery-3.1.1.min.js"></script>
    <script src="assets/js/plugins.min.js"></script>
    <script src="assets/js/dsn-grid.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUU5FZiF5WLFFfgIC1n64Zr0zfpQZjBBg&callback=initMap"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>