<div class="circle">
    <div class="logo" style="background-image: url('<?php echo get_template_directory_uri(); ?>/resources/images/logo.jpg')"></div>
    <div class="text">
        <p>
            Donateurs gezocht - doneren kan
        </p>
    </div>
</div>


<style>
    .circle {
        position: fixed;
        width: 200px;
        height: 200px;
        right: 0;
        z-index: 40;
        bottom: 0;
        border-radius: 100vmax;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .logo {
        position: absolute;
        width: 140px;
        height: 140px;
        background-size: cover;
        border-radius: 100vmax;
        background-position: center;
    }

    .text {
        position: absolute;
        width: 100%;
        height: 100%;
        font-family: consolas;
        color: #000;
        font-size: 17px;
        animation: textRotation 8s linear infinite;
    }

    @keyframes textRotation {
        to {
            transform: rotate(360deg);
        }
    }

    .text span {
        position: absolute;
        left: 50%;
        font-size: 1.2em;
        transform-origin: 0 100px;
    }
</style>

<script>
    const text = document.querySelector(".text");
    text.innerHTML = text.innerText
        .split("")
        .map(
            (char, i) => `<span style="transform:rotate(${i * 10.3}deg)">${char}</span>`
        )
        .join("");
</script>
