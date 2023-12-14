<script>
    let username = "tibo"

    let music = "highwayToHell";
    let type = "rock";
</script>

<body>
    <header>
        <div>
            <span>Jukebox</span>
        </div>
        <div>
            {#if username}
                { username }
            {:else}
                connection
            {/if}
        </div>
    </header>
    <main>
        <div class="gradient">

        </div>
    </main>
</body>
<style>
    @font-face {
        font-family: 'FugazOne';
        src: url(../components/fonts/FugazOne-Regular.ttf);
    }
    body{
        height:100%;
    }

    header {
        color: white;

        display: flex;
        justify-content: space-between;

        height: 5vh;
    }
    header > div {
        margin-inline: 1vh;
    }
    header > div:first-child{
        display: flex;
        align-items: center;

        font-size: 4vh;
    }
    header > div:first-child > span {
        font-family: FugazOne;
    }
    header > div:last-child{
        display: flex;
        align-items: center;
        font-family: 'Courier New', Courier, monospace;
    }

    main {
        position: relative;
        border-radius: 4px;
        height: calc(95vh - 1vh);
        margin-inline: 1vh;
        overflow: hidden;
    }

    @keyframes rotate {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
    }

    .gradient {
        --size: 150%;
        --speed: 25s;
        --easing: cubic-bezier(0.8, 0.2, 0.2, 0.8);

        width: var(--size);
        height: var(--size);
        filter: blur(calc(var(--size) / 5));
        background-image: linear-gradient(hsl(158, 82, 57, 85%), hsl(252, 82, 57));
        background-color: rgb(128, 2, 2);
        filter: blur(100px);
        animation: rotate var(--speed) var(--easing) alternate infinite;
        border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
    }
</style>