<div id="loader">
    <svg id="a" class='heart' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 600.7">
        <path
            d="M400.28,533.46c1.42-5.95,2.73-11.92,4.28-17.83,6.47-24.81,19.8-45.79,36.25-65.07,23.73-27.83,50.99-52.16,76.85-77.88,20.43-20.32,40.85-40.67,57.13-64.65,10.71-15.77,18.5-32.83,21.51-51.75,7.9-49.75-16.38-97.49-63.4-113.48-35.23-11.98-68.62-7.02-98.15,16.47-17.67,14.06-27.74,33.09-32.59,54.96-.98,4.41-1.7,8.87-2.58,13.53-1.34-6.21-2.26-12.34-4-18.23-9.79-33.25-29.27-58.33-63.51-68.02-41.32-11.7-78.03-2.65-107.36,29.92-12.6,14-19.34,31.06-22.17,49.62-5.46,35.78,5.88,66.8,27.05,95.03,17.43,23.24,37.87,43.73,58.51,64.05,20.8,20.47,41.88,40.7,62.02,61.8,19.44,20.37,35.31,43.31,43.69,70.64,2.29,7.48,3.87,15.17,5.08,22.97-2.25-4.59-4.36-9.26-6.76-13.77-14.36-26.95-33.6-50.13-55.47-71.24-22.31-21.54-46.43-40.91-71.19-59.53-16.9-12.7-33.85-25.34-50.51-38.35-24.94-19.47-47.49-41.24-63.15-69.18-15.58-27.79-24.1-57.57-21.64-89.52,3.06-39.75,18.7-73.62,50.28-99.16,19.67-15.9,42.03-25.76,67.2-28,62.18-5.54,108.8,20.12,141.8,72.19,2.04,3.22,3.78,6.64,5.48,10.06,1.7,3.4,3.17,6.92,4.99,10.96,.57-1.25,1.01-2.21,1.45-3.19,18.04-40.71,47.55-69.54,89.91-83.63,44.02-14.65,86.02-9.38,123.99,18.11,27.1,19.62,43.34,46.84,51.06,79.21,8.95,37.54,2.16,72.87-15.5,106.57-11.87,22.64-27.85,42.2-47.41,58.37-24.28,20.08-49.48,39.06-74.45,58.3-25.49,19.64-50.59,39.75-73.09,62.84-18.98,19.48-36.21,40.36-48.97,64.59-2.15,4.08-3.95,8.34-5.91,12.51l-.72-.18Z"
            fill="none" stroke="#a83031" stroke-width="3" stroke-dasharray="2000" stroke-dashoffset="2000">
        </path>
    </svg>
</div>

<style>
    #loader {
        background: white;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .heart path {
        animation: drawHeart 3s ease-out forwards;
    }

    @keyframes drawHeart {
        to {
            stroke-dashoffset: 0;
        }
    }

    #app {
        opacity: 0;
        transition: opacity 2s ease-in;
        display: none;
    }

    body.loaded #loader {
        display: none;
    }

    body.loaded #app {
        display: block;
        opacity: 1;
    }
</style>

<script>
    window.addEventListener('load', () => {
        const loader = document.getElementById('loader');
        const app = document.getElementById('app');

        // Check if the user has visited before
        if (!localStorage.getItem('hasVisited')) {
            // If not, show the loader and set the flag in localStorage
            setTimeout(() => {
                document.body.classList.add('loaded');
                localStorage.setItem('hasVisited', 'true'); // Mark as visited
            }, 3000); // Duration matches the animation time
        } else {
            // If they have visited before, immediately show the content without the loader
            document.body.classList.add('loaded');
        }
    });
</script>
