<!-- contact_form.php -->
<div id="AboutUsModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeContactForm()">&times;</span>
        <h2>About Us</h2>
        <p>Welcome to Cinemagic, where the magic of cinema has been enchanting audiences for decades!</p>
            <p>Since our establishment in [year of establishment], Cinemagic has been a cherished cornerstone of our community, weaving together generations of movie lovers under one roof. Our journey began with a simple yet ambitious vision: to create a space where the transformative power of film could be celebrated and shared with all.</p>
            <p>Over the years, we've witnessed countless cinematic milestones, from the golden age of Hollywood classics to the emergence of groundbreaking modern masterpieces. Through every era, Cinemagic has remained steadfast in our commitment to delivering exceptional movie experiences that leave a lasting impression.</p>
            <p>As the years have passed, our dedication to innovation has propelled us forward, ensuring that we stay at the forefront of the ever-evolving world of cinema. Our theaters have evolved with the times, boasting state-of-the-art technology that guarantees an immersive viewing experience like no other.</p>
            <p>But while our facilities may have undergone transformations, our core values remain unchanged. At Cinemagic, we believe in the power of storytelling to inspire, educate, and unite. We take pride in curating a diverse selection of films that cater to the eclectic tastes of our discerning audience, from the latest Hollywood blockbusters to hidden gems waiting to be discovered.</p>
            <p>Beyond the silver screen, Cinemagic is a place where memories are made and shared. Whether it's a first date, a family outing, or a solo escape from the everyday hustle, our welcoming atmosphere and friendly staff ensure that every visit is an unforgettable experience.</p>
            <p>As we reflect on the journey that has brought us to where we are today, we extend our heartfelt gratitude to our loyal patrons who have supported us throughout the years. Your passion for cinema fuels our own, driving us to continually raise the bar and exceed your expectations.</p>
            <p>Thank you for being a part of our story. Here's to many more years of cinematic magic at Cinemagic!</p>

    </div>
</div>

<script>
    // Variable to store the previous page URL
    var previousPage = document.referrer;

    // Function to open the contact form modal
    function openContactForm() {
        document.getElementById('AboutUsModal').style.display = 'block';
    }

    // Function to close the contact form modal
    function closeContactForm() {
        // Check if the previous page URL exists
        if (previousPage) {
            // Redirect to the previous page
            window.location.href = previousPage;
        } else {
            // If no previous page URL is available, simply close the modal
            document.getElementById('AboutUsModal').style.display = 'none';
        }
    }
</script>