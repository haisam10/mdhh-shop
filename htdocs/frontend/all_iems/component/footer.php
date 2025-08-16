<footer>
    <div class="footer-container">
        <div class="footer-content d-flex a-i-cn">
            <div class="footer-logo a-i-cn">
                <img src="frontend/all_iems/image/favicon.png" alt="MDHH Shop Logo">
                <p>MDHH Shop</p>
            </div>
            <div class="footer-links d-flex fx-d-col">
                <a href="/about">About Us</a>
                <a href="/contact">Contact Us</a>
                <a href="/privacy-policy">Privacy Policy</a>
                <a href="/terms-of-service">Terms of Service</a>
            </div>
            <div class="footer-links d-flex fx-d-col">
                <a href="/refund-policy">Refund Policy</a>
                <a href="/developer-team">Developer Team</a>
                <a href="/shipping-policy">Shipping Policy</a>
                <a href="/faq-page">FAQ Page</a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 MDHH Shop. All rights reserved. &nbsp;|&nbsp; View the source
                <a href="https://github.com/haisam10" target="_blank"> Created by ▲ MDHH Group </a>
            </p>
        </div>
    </div>
</footer>
<style>
    @media only screen and (max-width: 750px) {
        .footer-content {
            flex-wrap: wrap!important;
            padding: 20px!important;
            .footer-logo {
                margin-left: 1px!important;
                width: 17%!important;
                padding: 0px!important;

                img {
                    margin: 10px;
                }
            }

            padding: 20px;

            .footer-links {
                padding: 0px 20px 0px 0px!important;

                a {
                    color: var(--font-color);
                    text-decoration: none;
                    padding: 5px;
                    transition: 1s all;

                    &:hover {
                        transition: 1s all;
                        text-decoration: underline;
                    }
                }
            }
        }

        .footer-bottom {
            text-align: center;
            padding: 1px;
            color: var(--font-color);
            background-color: var(--second-color);

            a {
                color: var(--font-color);
                text-decoration: none;
                transition: 1s all;

                &:hover {
                    transition: 1s all;
                    text-decoration: underline;
                }
            }
        }

        .footer-container {
            margin-top: 50px;
            background-color: var(--fifth-color);
            color: var(--font-color);
            border-top: 1px solid var(--fourth-color);
        }
    }
</style>