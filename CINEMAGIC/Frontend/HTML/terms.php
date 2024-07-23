<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="../CSS/moviestyle.css">


<!-- terms and conditions.php -->
<div id="termsModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeContactForm()">&times;</span>
        <h2>Terms and Conditions</h2>
        <p>Welcome to Cinemagic! We're thrilled to have you explore our website. Before you proceed, please take a moment to review and agree to the following terms and conditions:</p>

<p>1. *Acceptance of Terms:* By accessing or using this website, you agree to be bound by these terms and conditions, which govern your use of this website. If you do not agree with any part of these terms and conditions, please refrain from using our website.</p>

<p>2. *Use of Website:* The content of the pages on this website is for your general information and use only. It is subject to change without notice. We strive to ensure the accuracy and timeliness of the information provided, but we make no representations or warranties of any kind, express or implied, about the completeness, accuracy, reliability, suitability, or availability with respect to the website or the information, products, services, or related graphics contained on the website for any purpose. Your use of any information or materials on this website is entirely at your own risk, for which we shall not be liable.</p>

<p>3. *Intellectual Property:* This website contains material which is owned by or licensed to us. This material includes, but is not limited to, the design, layout, look, appearance, and graphics. Reproduction is prohibited other than in accordance with the copyright notice, which forms part of these terms and conditions. All trademarks reproduced on this website, which are not the property of, or licensed to the operator, are acknowledged on the website.</p>

<p>4. *Links to Other Websites:* From time to time, this website may also include links to other websites. These links are provided for your convenience to provide further information. They do not signify that we endorse the website(s). We have no responsibility for the content of the linked website(s).</p>

<p>5. *Unauthorized Use:* Unauthorized use of this website may give rise to a claim for damages and/or be a criminal offense.</p>

<p>6. *Limitation of Liability:* In no event will we be liable for any loss or damage including, without limitation, indirect or consequential loss or damage, or any loss or damage whatsoever arising from loss of data or profits arising out of, or in connection with, the use of this website.</p>

<p>7. *Governing Law:* Your use of this website and any dispute arising out of such use of the website is subject to the laws of [your country/region].</p>

<p>8. *Changes to Terms and Conditions:* We reserve the right to modify these terms and conditions at any time. Any changes will be effective immediately upon posting on this website. Your continued use of the website after any such changes constitutes your acceptance of the new terms and conditions.</p>

<p>9. *Privacy Policy:* Your privacy is important to us. Please review our Privacy Policy to understand how we collect, use, and disclose your personal information.</p>

<p>10. *Cookies:* This website uses cookies to monitor browsing preferences. By using this website, you consent to our use of cookies in accordance with our Privacy Policy.</p>

<p>11. *User Accounts:* If you create an account on this website, you are responsible for maintaining the confidentiality of your account and password and for restricting access to your computer. You agree to accept responsibility for all activities that occur under your account or password.</p>

<p>12. *User Conduct:* You agree not to use this website for any unlawful purpose or in any way that could damage, disable, overburden, or impair the website or interfere with any other party's use and enjoyment of the website.</p>

<p>13. *Indemnification:* You agree to indemnify and hold us harmless from any claim or demand, including reasonable attorneys' fees, made by any third party due to or arising out of your breach of these terms and conditions or your violation of any law or the rights of a third party.</p>

<p>14. *Termination:* We reserve the right to terminate or suspend your access to all or any part of the website at any time, with or without cause, with or without notice.</p>

<p>15. *Communications:* By using this website, you consent to receive communications from us electronically. We will communicate with you by email or by posting notices on this website.</p>

<p>16. *Feedback:* We welcome your feedback, comments, and suggestions for improving our website and services. However, please note that any feedback you provide shall be deemed non-confidential and non-proprietary.</p>

<p>17. *Severability:* If any provision of these terms and conditions is found to be invalid or unenforceable, the remaining provisions shall remain in full force and effect.</p>

<p>18. *Entire Agreement:* These terms and conditions constitute the entire agreement between you and us regarding your use of this website, superseding any prior agreements between you and us relating to your use of this website.</p>

<p>19. *Waiver:* Our failure to exercise or enforce any right or provision of these terms and conditions shall not constitute a waiver of such right or provision.</p>

<p>20. *Contact Us:* If you have any questions or concerns about these terms and conditions, please [contact us](mailto:info@cinemagic.com).</p>

    </div>
</div>

<script>
    // Variable to store the previous page URL
    var previousPage = document.referrer;

    // Function to open the contact form modal
    function openContactForm() {
        document.getElementById('termsModal').style.display = 'block';
    }

    // Function to close the contact form modal
    function closeContactForm() {
        // Check if the previous page URL exists
        if (previousPage) {
            // Redirect to the previous page
            window.location.href = previousPage;
        } else {
            // If no previous page URL is available, simply close the modal
            document.getElementById('termsModal').style.display = 'none';
        }
    }
</script>

