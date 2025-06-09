<?php 
include_once "site_parts/web_custom_header.php";
?>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-decoration: none;
    list-style: none;
    scroll-behavior: smooth;
    font-family: "Lato", sans-serif;
}



/* Home Section Start */
.home {
    width: 100%;
    height: 90vh;
    background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.2)),
        url(./images/hostel.jpg);
    background-repeat: no-repeat;
    background-size: cover;
}

.home .content {
    text-align: center;
    padding-top: 200px;
}

.home .content h5 {
    color: white;
    font-size: 38px;
    font-weight: 550;
    text-shadow: 0px 1px 1px black;
}

.home .content h1 {
    color: white;
    font-size: 60px;
    font-weight: 550;
    text-shadow: 0px 1px 1px black;
    margin-top: 5px;
}

.changecontent::after {
    content: " ";
    color: #00ff44;
    text-shadow: 0px 1px 1px black;
    animation: changetext 10s infinite linear;
}

.home .content p {
    color: white;
    font-size: 15px;
    font-weight: 600;
    text-shadow: 0px 1px 1px black;
    margin-bottom: 30px;
    margin-top: 5px;
}

.home .content a {
    padding: 10px;
    background: white;
    color: black;
    letter-spacing: 2px;
    font-weight: 550;
    border-radius: 5px;
    text-decoration: none;
    transition: 0.5s;
}

.home .content a:hover {
    background: #00ff44;
    color: white;
}

@media (max-width: 850px) {
    .home {
        background-position: 50%;
    }
}

@media (max-width: 450px) {
    .home .content h5 {
        font-size: 25px;
    }

    .home .content h1 {
        font-size: 38px;
    }

    .home .content p {
        font-size: 13px;
    }
}

/* Home Section End */

/* Section Contact Us Start */
.book {
    background: #f9f9f9;
    padding: 50px;
}

.main-text h1 {
    text-align: center;
    text-shadow: 0px 1px 1px black;
    font-weight: 600;
}

.main-text h1 span {
    color: #00ff44;
}

.book .card {
    border-radius: 10px;
    box-shadow: 0px 5px 5px -6px black;
}

.book .row {
    margin-top: 30px;
}

.book form input {
    padding: 10px;
    color: black;
    border: none;
    outline: none;
    font-size: 15px;
    border-radius: 10px;
    box-shadow: 0px 5px 5px -6px black;
}

.book form textarea {
    border: none;
    border-radius: 10px;
    resize: none;
    box-shadow: 0px 5px 5px -6px black;
    height: 200px;
}

.book .submit {
    width: 160px;
    font-size: 16px;
    font-weight: 550;
    background: #00ff44;
    color: black;
    margin-top: 10px;
    transition: 0.5s;
}

.book .submit:hover {
    width: 170px;
}

@media (max-width: 765px) {
    .book {
        padding: 0;
    }

    .main-text h1 {
        padding: 20px;
    }
}

/* Section Contact Us End */

/* Section Packages Start */
.main-txt h1 {
    text-align: center;
    margin-top: 30px;
    font-weight: 600;
    text-shadow: 0px 1px 1px black;
}

.main-txt h1 span {
    color: #00ff44;
}

.packages .card {
    border-radius: 5px;
    border: none;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
}

.packages .card img {
    border-radius: 5px;
}

.packages .card .card-body {
    background: transparent;
}

.packages .card .card-body h3 {
    font-size: 25px;
    font-weight: 600;
}

.packages .card .card-body p {
    font-size: 15px;
}

.checked {
    color: #00ff44;
}

.star i {
    font-size: 15px;
}

.packages .card .card-body h6 {
    font-size: 20px;
}

.packages .card .card-body a {
    padding: 10px;
    text-decoration: none;
    background: #00ff44;
    color: black;
    border-radius: 5px;
}

/* Section Packages End */

/* Section Gallary Start */
.gallary {
    margin-top: 50px;
}

.gallary .card {
    border-radius: 10px;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
    cursor: pointer;
}

.gallary .card img {
    border-radius: 10px;
    transition: 0.5s;
}

.gallary .card img:hover {
    transform: scale(1.1);
}

/* Section Gallary End */

/* About Start */
.about {
    padding: 50px;
    margin-top: 50px;
    background: #f9f9f9;
}

.about .card {
    border-radius: 10px;
}

.about .card img {
    border-radius: 10px;
}

.about h2 {
    font-weight: 600;
    letter-spacing: 1px;
}

.about p {
    text-align: justify;
    font-weight: 500;
}

#about-btn {
    width: 150px;
    height: 38px;
    border: none;
    border-radius: 5px;
    background: #00ff44;
    color: black;
    letter-spacing: 2px;
    font-weight: 550;
    transition: 0.5s ease;
    cursor: pointer;
}

#about-btn:hover {
    width: 170px;
}

@media (max-width: 765px) {
    .about {
        padding: 0;
    }
}

/* About End */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

.contact {
    position: relative;
    min-height: 100vh;
    padding: 50px 100px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    background: url(29356850_2830589290368728_5841006878036852736_n.jpg);
    background-size: cover;
}

.contact .content {
    max-width: 800px;
    text-align: center;
}

.contact .content h1 {
    font-size: 50px;
    font-weight: bolder;
    color: white;
}

.contact .content p {
    font-weight: bolder;
    font: size 30px;
    color: white;
}

.container_1 {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 30px;
}

.container_1 .contactInfo {
    width: 50%;
    display: flex;
    flex-direction: column;
}

.container_1 .contactInfo .box {
    position: relative;
    padding: 20px 0;
    display: flex;
}

.container_1 .contactInfo .box .icon {
    min-width: 60px;
    height: 60px;
    background: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    font-size: 22px;
}

.container_1 .contactInfo .box .text {
    display: flex;
    margin-left: 20px;
    font-size: 16px;
    color: #fff;
    flex-direction: column;
    font-weight: 300;
}

.container_1 .contactInfo .box .text h3 {
    font-weight: 500;
    color: #00bcd4;
}

.contactForm {
    width: 40%;
    padding: 40px;
    background: #fff;
}

.contactForm h2 {
    font-size: 30px;
    color: #333;
    font-weight: 500px;
}

.contactForm .inputBox {
    position: relative;
    width: 100%;
    margin-top: 10px;
}

.contactForm .inputBox input,
.contactForm .inputBox textarea {
    width: 100%;
    padding: 5px 0;
    font-size: 16px;
    margin: 10px 0;
    border: none;
    border-bottom: 2px solid #333;
    outline: none;
    resize: none;
}

.contactForm .inputBox span {
    position: absolute;
    left: 0;
    padding: 5px 0;
    font-size: 16px;
    margin: 10px 0;
    pointer-events: none;
    transition: 0.5s;
    color: #666;
}

.contactForm .inputBox input:focus~span,
.contactForm .inputBox input:valid~span,
.contactForm .inputBox textarea:focus~span,
.contactForm .inputBox textarea:valid~span {
    color: #e91e63;
    font-size: 12px;
    transform: translateY(-20px);
}

.contactForm .inputBox input[type="submit"] {
    width: 100px;
    background: #00bcd4;
    color: #fff;
    border: none;
    cursor: pointer;
    padding: 10px;
    font-size: 18px;
}

@media (max-width: 991px) {
    .contact {
        padding: 50px;
    }

    .container_1 {
        flex-direction: column;
    }

    .container_1 .contactInfo {
        margin-bottom: 40px;
    }

    .container_1 .contactInfo .contactForm {
        width: 100%;
    }
}
</style>


<!-- Home Section Start -->
<div class="home">
    <div class="content">
        <h5>Welcome To</h5>
        <h1><span style="color: #00ff44">NSBM</span> Accommodation Finder</h1>
        <a href="./landlord_register.php">Register Now</a>
    </div>
</div>
<!-- Home Section End -->

<!-- About Start -->
<section class="about border" id="about">
    <div class="container" style="
          border: 2px solid blue; /* Add border */
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
          padding: 40px;
        ">
        <div class="main-txt">
            <h1>About <span>Us</span></h1>
        </div>

        <div class="row" style="margin-top: 50px">
            <div class="col-md-6 py-3 py-md-0">
                <div class="card">
                    <img src="./images/student_center.jpg" alt="" />
                </div>
            </div>

            <div class="col-md-6 py-3 py-md-0">
                <p>
                    NSBM Green University is the first ever green university in South
                    Asia and sets an example for the whole South Asia by paving the
                    way for environmental sustainability. The university is open for
                    both national and international student community and it has
                    turned a new chapter in Sri Lankan higher education. NSBM Green
                    University is established under the Ministry of Education and it
                    is renowned for its world-class academic offerings. This
                    state-of-the-art university offers nationally and internationally
                    recognized, UGC-approved degree programmes and foreign degree
                    programmes in four faculties: Business, Computing, Engineering,
                    Science, and Postgraduate Studies.
                </p>

                <a href="https://www.nsbm.ac.lk/story-of-nsbm/">
                    <button id="about-btn">Read More..</button>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- About End -->

<!-- Section Packages Start -->
<section class="packages" id="packages">
    <div class="container">
        <div class="main-txt">
            <h1><span>Property </span>Listing</h1>
        </div>

        <div class="row" style="margin-top: 30px">
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <img src="./images/hostel (1).jpg" alt="" />
                    <div class="card-body">
                        <h3>Sweet Home</h3>

                        <h6>Price: <strong>Rs.8500</strong></h6>

                    </div>
                </div>
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <img src="./images/hostel (2).jpg" alt="" />
                    <div class="card-body">
                        <h3>Zen Den</h3>

                        <h6>Price: <strong>Rs.10,000</strong></h6>

                    </div>
                </div>
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <img src="./images/hostel (3) 1.jpg" alt="" />
                    <div class="card-body">
                        <h3>Bunker</h3>

                        <h6>Price: <strong>Rs.13,000</strong></h6>

                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 30px">
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <img src="./images/hostel (9) (1).jpg" alt="" />
                    <div class="card-body">
                        <h3>Green Hostels</h3>

                        <h6>Price: <strong>Rs.9000</strong></h6>

                    </div>
                </div>
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <img src="./images/hostel (5) (1).jpg" alt="" />
                    <div class="card-body">
                        <h3>UniNest</h3>

                        <h6>Price: <strong>Rs.15,000</strong></h6>

                    </div>
                </div>
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <img src="./images/hostel (6).jpg" alt="" />
                    <div class="card-body">
                        <h3>Willow House</h3>

                        <h6>Price: <strong>Rs.12,000</strong></h6>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section Packages End -->

<!-- Section Gallary Start -->
<section class="gallary" id="gallary">
    <div class="container">
        <div class="main-txt">
            <h1><span>G</span>allary</h1>
        </div>

        <div class="row" style="margin-top: 30px">
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <img src="./images/HOME (1).jpg" alt="" height="230px" />
                </div>
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <img src="./images/HOME 2.jpg" alt="" height="230px" />
                </div>
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <img src="./images/HOME 3.jpg" alt="" height="230px" />
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 30px">
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <img src="./images/HOME 4.jpg" alt="" height="230px" />
                </div>
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <img src="./images/HOME 5.jpg" alt="" height="230px" />
                </div>
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <img src="./images/HOME 6.jpg" alt="" height="230px" />
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section Gallary End -->


<?php
include_once "site_parts/web_custom_footer.php";
?>