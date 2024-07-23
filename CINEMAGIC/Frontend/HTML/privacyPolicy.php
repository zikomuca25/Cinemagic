<!-- Privacy policy.php -->
<div id="privacyModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeContactForm()">&times;</span>
        <h2>privacy policy</h2>
        <p>*Privacy Policy*</p>

<p>At Cinemagic, we are committed to protecting your privacy. This Privacy Policy outlines how we collect, use, and disclose your personal information when you use our website.</p>

<p>1. *Information We Collect:*</p>
<p>When you visit our website, we may collect certain information automatically, including your IP address, browser type, operating system, and browsing behavior. Additionally, if you choose to create an account or sign up for our newsletter, we may collect personal information such as your name, email address, and preferences.</p>

<p>2. *How We Use Your Information:*</p>
<p>We use the information we collect to personalize your experience on our website, to improve our services, and to communicate with you about promotions, events, and updates. We may also use your information for internal purposes such as data analysis and research.</p>

<p>3. *Cookies:*</p>
<p>We use cookies to track your preferences and activities on our website. Cookies are small files stored on your device that allow us to recognize and remember you. You can choose to disable cookies in your browser settings, but please note that certain features of our website may not function properly without cookies.</p>

<p>4. *Third-Party Services:*</p>
<p>We may use third-party services such as analytics providers and advertising networks to help us analyze and improve our website. These third parties may collect information about your online activities over time and across different websites.</p>

<p>5. *Data Security:*</p>
<p>We take reasonable measures to protect your personal information from unauthorized access, disclosure, alteration, and destruction. However, please be aware that no method of transmission over the internet or electronic storage is 100% secure.</p>

<p>6. *Data Retention:*</p>
<p>We will retain your personal information for as long as necessary to fulfill the purposes outlined in this Privacy Policy, unless a longer retention period is required or permitted by law.</p>

<p>7. *Your Rights:*</p>
<p>You have the right to access, update, and delete your personal information. You may also opt-out of receiving marketing communications from us at any time by following the unsubscribe instructions provided in our emails.</p>

<p>8. *Children's Privacy:*</p>
<p>Our website is not intended for children under the age of 13. We do not knowingly collect personal information from children under the age of 13. If you believe that we have inadvertently collected information from a child under 13, please contact us immediately.</p>

<p>9. *Changes to this Privacy Policy:*</p>
<p>We reserve the right to update or modify this Privacy Policy at any time. Any changes will be effective immediately upon posting on this page. We encourage you to review this Privacy Policy periodically for any updates.</p>

<p>10. *Contact Us:*</p>
<p>If you have any questions or concerns about this Privacy Policy, please [contact us](mailto:privacy@cinemagic.com).</p>


    </div>
</div>

<script>
    // Variable to store the previous page URL
    var previousPage = document.referrer;

    // Function to open the contact form modal
    function openContactForm() {
        document.getElementById('privacyModal').style.display = 'block';
    }

    // Function to close the contact form modal
    function closeContactForm() {
        // Check if the previous page URL exists
        if (previousPage) {
            // Redirect to the previous page
            window.location.href = previousPage;
        } else {
            // If no previous page URL is available, simply close the modal
            document.getElementById('privacyModal').style.display = 'none';
        }
    }
</script>