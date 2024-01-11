<script>
    let username = "tibo"

    let music = {
        name: "Highway to hell",
        type: "rock",

        color: {
            bg1: "#ee7752",
            bg2: "#e73c7e",
            bg3: "#23a6d5",
            bg4: "#23d5ab",
        }
    }
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
        <div class="gradient" style="
            --bg1: {music.color.bg1};
            --bg2: {music.color.bg2};
            --bg3: {music.color.bg3};
            --bg4: {music.color.bg4};
        ">

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

    @keyframes gradient {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }

    .gradient {
        background: linear-gradient(-45deg, var(--bg1), var(--bg2), var(--bg3), var(--bg4));
	    background-size: 400% 400%;
	    animation: gradient 15s ease infinite;
	    height: 100vh;
    }
</style>