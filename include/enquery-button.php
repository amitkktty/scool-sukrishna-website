<style>
    .button-container {
        display: flex;
        justify-content: center;
        align-items: center;
        position: sticky;
        bottom: 0;
        width: 100%;
        padding: 15px;
        background-color: #ffffff;
        box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
        z-index: 99;
    }

    /* Styling for individual CTA buttons */
    .cta-button {
        padding: 15px 30px;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        background-color: #009846;
        color: white;
        transition: background-color 0.3s, transform 0.3s;
        margin: 0 10px;
    }

    .cta-button:hover {
        background-color: #110C2D;
        transform: scale(1.08);
    }

    .cta-button:focus {
        outline: none;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.8);
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .cta-button {
            padding: 12px 25px;
            font-size: 14px;
        }
    }

    @media (max-width: 480px) {
        .cta-button {
            padding: 10px 20px;
            font-size: 12px;
        }

        .button-container {
            flex-direction: column;
            align-items: stretch;
        }

        .cta-button {
            margin: 10px 0;
            width: 100%;
        }
    }
</style>
<div class="button-container">
    <button class="cta-button"><a href="contact-us.php"><i class="fas fa-mobile-alt"></i> Contact Now</a></button>
    <button class="cta-button"><a href="https://wa.me/918084696222" target="_blank"><i class="fab fa-whatsapp"></i>
            Let's Tallk on
            Whatsapp</a></button>
    <button class="cta-button modelOpener"><i class="fas fa-play"></i> Get Started</button>
</div>