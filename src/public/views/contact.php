<link href="<?= get_assets_uri("css/contact.css") ?>" rel="stylesheet" type="text/css" id="contact-stylesheet">
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Contact us</h2>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Page title area -->

<section class="contact-page">
    <div class="container">
        <div class="contain">


            <div class="form">
                <h2 class="form-headline">Send us a message</h2>
                <form id="submit-form" action="">
                    <p>
                        <input id="name" class="form-input" type="text" placeholder="Your Name*">
                        <small class="name-error"></small>
                    </p>
                    <p>
                        <input id="email" class="form-input" type="email" placeholder="Your Email*">
                        <small class="name-error"></small>
                    </p>
                    <p class="full-width">
                        <input id="company-name" class="form-input" type="text" placeholder="Company Name*" required>
                        <small></small>
                    </p>
                    <p class="full-width">
                        <textarea minlength="20" id="message" cols="30" rows="7" placeholder="Your Message*" required></textarea>
                        <small></small>
                    </p>
                    <p class="full-width">
                        <input type="checkbox" id="checkbox" name="checkbox" checked> Yes, I would like to receive communications by call / email about Company's services.
                    </p>
                    <p class="full-width">
                        <input type="submit" class="submit-btn" value="Submit" onclick="checkValidations()">
                        <button class="reset-btn" onclick="reset()">Reset</button>
                    </p>
                </form>
            </div>

        </div>

    </div>
</section>

<script src="<?= get_assets_uri("js/contact.js") ?>"></script>