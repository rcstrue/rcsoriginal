    <!--==========================
      Footer
    ============================-->
    <footer class="section-bg" id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="footer-info">
                                    <h3><strong><span style="font-size:36px; color:#431f6e;">RCS</span></strong></h3>
                                    <p>A well known name for Facility Management Services</p>

                                    <h4>Corporate Office</h4>
                                    <p>110, 3rd Floor, Someshwar Square,<br>
                                    Agam Heritage, Vesu,<br>
                                    Surat, Gujarat - 395007</p>
                                    <p>Phone: +91 261 2215264</p>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="footer-links">
                                    <h4>Useful Links</h4>
                                    <ul>
                                        <li><a href="RCS_Profile.pdf">RCS Profile</a></li>
                                        <li><a href="RCS_Client_List.pdf">Client List</a></li>
                                        <li><a href="https://play.google.com/store/apps/details?id=solution.nsbit.rcstrue">RCS App</a></li>
                                        <li><a href="terms-of-service.html">Terms of Service</a></li>
                                        <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form">
                            <h4>Send us a message</h4>
                            <p>Feel free to contact us</p>

                            <form id="contactForm" class="contactForm" method="post" autocomplete="on">
                                <div class="form-group">
                                    <input class="form-control" id="name" name="userName" placeholder="Your Name" type="text" autocomplete="name">
                                    <div class="validation" id="nameError"></div>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" id="email" name="userEmail" placeholder="Your Email" type="email" autocomplete="email">
                                    <div class="validation" id="emailError"></div>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" id="subject" name="subject" placeholder="Subject" type="text">
                                    <div class="validation" id="subjectError"></div>
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control" id="message" name="content" placeholder="Message" rows="5"></textarea>
                                    <div class="validation" id="messageError"></div>
                                </div>

                                <div id="sendmessage" style="display:none; color:#155724; background:#d4edda; padding:10px; border-radius:5px; margin-top:10px;">
                                    Your message has been sent successfully!
                                </div>

                                <div id="errormessage" style="display:none; color:#721c24; background:#f8d7da; padding:10px; border-radius:5px; margin-top:10px;"></div>

                                <div class="text-center">
                                    <button title="Send Message" type="submit">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <a href="http://www.rcsfacility.com/"><span style="color:#431f6e;"><strong>RCS True Facilities Pvt Ltd</strong></span></a>. All Rights Reserved
            </div>

            <div class="credits">
                Designed by <a href="http://marcommessentials.com/">Marcomm Essentials</a> |
                <a href="RCS_Profile.pdf">Profile Download</a> |
                <a href="RCS_Client_List.pdf">Client List</a>
            </div>
        </div>
    </footer>
    <!-- #footer -->

    <!-- JavaScript Libraries -->
    <script src="files/jquery.min.js"></script>
    <script src="files/jquery-migrate.min.js"></script>
    <script src="files/bootstrap.bundle.min.js"></script>
    <script src="files/easing.min.js"></script>
    <script src="files/mobile-nav.js"></script>
    <script src="files/wow.min.js"></script>
    <script src="files/waypoints.min.js"></script>
    <script src="files/counterup.min.js"></script>
    <script src="files/owl.carousel.min.js"></script>
    <!-- Template Main Javascript File -->
    <script src="files/main.js"></script>

    <!-- Contact Form Script -->
    <script>
    document.getElementById("contactForm").addEventListener("submit", function(event) {
        event.preventDefault();

        let name = document.getElementById("name").value.trim();
        let email = document.getElementById("email").value.trim();
        let subject = document.getElementById("subject").value.trim();
        let message = document.getElementById("message").value.trim();

        let isValid = true;

        // Name validation
        if (name.length < 4) {
            document.getElementById("nameError").innerHTML = "Name must be at least 4 characters.";
            isValid = false;
        } else {
            document.getElementById("nameError").innerHTML = "";
        }

        // Email validation
        let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!email.match(emailPattern)) {
            document.getElementById("emailError").innerHTML = "Please enter a valid email.";
            isValid = false;
        } else {
            document.getElementById("emailError").innerHTML = "";
        }

        // Subject validation
        if (subject.length < 4) {
            document.getElementById("subjectError").innerHTML = "Subject must be at least 4 characters.";
            isValid = false;
        } else {
            document.getElementById("subjectError").innerHTML = "";
        }

        // Message validation
        if (message.length < 8) {
            document.getElementById("messageError").innerHTML = "Message must be at least 8 characters.";
            isValid = false;
        } else {
            document.getElementById("messageError").innerHTML = "";
        }

        if (!isValid) {
            document.getElementById("errormessage").innerHTML = "Please fix the errors above.";
            document.getElementById("errormessage").style.display = "block";
            document.getElementById("sendmessage").style.display = "none";
            return;
        }

        let formData = new FormData(this);

        fetch("contact.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === "success") {
                document.getElementById("sendmessage").style.display = "block";
                document.getElementById("errormessage").style.display = "none";
                document.getElementById("contactForm").reset();
            } else {
                let errors = data.errors || {};
                let msg = "";
                if (errors.name) msg += errors.name + "<br>";
                if (errors.email) msg += errors.email + "<br>";
                if (errors.subject) msg += errors.subject + "<br>";
                if (errors.message) msg += errors.message + "<br>";
                if (!msg) msg = data.message || "Something went wrong.";
                document.getElementById("errormessage").innerHTML = msg;
                document.getElementById("errormessage").style.display = "block";
                document.getElementById("sendmessage").style.display = "none";
            }
        })
        .catch(error => {
            document.getElementById("errormessage").innerHTML = "Error: " + error;
            document.getElementById("errormessage").style.display = "block";
        });
    });
    </script>

</body>
</html>
